<?php

namespace App\Http\Controllers;

use App\Character;
use Illuminate\Http\Request;
use \Datatables;
use \RBAC;
use \Auth;

class CharactersController extends Controller
{
	public function __construct()
	{
		$this->middleware(function($request, $next){
			if (!RBAC::isAdmin() && !Auth::user()->hasAnyPermission('characters') ) {
				return redirect()->route('dashboard');
			}

			return $next($request);
		});
	}

    /**
     * Index page
     * @param  Request $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index(Request $request)
    {
        return view('characters.index');
    }

    /**
     * Datatable Feed
     * @return json
     */
    public function datatable()
    {
        $query = Character::query();
        $query->with('race', 'klass');

        return Datatables::eloquent($query)
            ->addColumn('race', function ($item) {
                return \Html::image($item->raceIcon());
            })
            ->addColumn('class', function ($item) {
                return \Html::image($item->klassIcon());
            })
            ->addColumn('status', function ($item) {
            	if (!is_null($item->accepted)) {
            		return "<a href=\"".route('characters.setstatus', ['character' => $item, 'type' => 'uncheck'])."\"><span class=\"label label-success\">Accepted</span></a>";
            	} else {
            		return "<a href=\"".route('characters.setstatus', ['character' => $item, 'type' => 'check'])."\"><span class=\"label label-warning\">Not Checked</span></a>";
            	}
            })
            ->addColumn('action', function ($item) {
                $col = '<div class="btn-group">';
                $col .= '<a href="' . route('characters.delete', [$item]) . '" class="btn btn-xs btn-warning" onclick="return confirm(\'You sure?\')"><i class="fa fa-trash"></i></a>';
                $col .= '<a href="' . route('characters.edit', [$item]) . '" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>';
                $col .= '</div>';
                return $col;
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }

    /**
     * Delete a character
     */
    public function delete(Character $character)
    {
    	$character->delete();

    	return back()->with('success', 'Character deleted successful.');
    }

    /**
     * Create page
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        return view('characters.create');
    }

    /**
     * Handle form submit
     * @param  Request $request
     */
    public function postCreate(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required|unique:characters,name',
            'level'    => 'sometimes|numeric|max:255|min:1',
            'guild'    => 'sometimes',
            'race_id'  => 'required|exists:races,id',
            'klass_id' => 'required|exists:klasses,id',
            'faction'  => 'required|in:Alliance,Horde',
            'gender'   => 'required|in:0,1',
        ]);

        $character = \App\Character::create([
            'name'     => ucfirst(strtolower($request->name)),
            'level'    => $request->level,
            'guild'    => $request->guild,
            'race_id'  => $request->race_id,
            'klass_id' => $request->klass_id,
            'faction'  => $request->faction,
            'gender'   => $request->gender,
        ]);

        foreach ($request->question as $id => $answer) {
            $character->answers()->create([
                'question_id' => $id,
                'data'        => $answer ?: '',
            ]);
        }

        return redirect()->route('characters.edit', $character)->with('success', 'Created Successful');
    }

    /**
     * Edit page
     */
    public function edit(Character $character)
    {
        return view('characters.edit', compact('character'));
    }

    /**
     * Handle form
     */
    public function postEdit(Character $character, Request $request)
    {
        $this->validate($request, [
            'name'     => "required|unique:characters,name,{$character->id}",
            'level'    => 'sometimes|numeric|max:255|min:1',
            'guild'    => 'sometimes',
            'race_id'  => 'required|exists:races,id',
            'klass_id' => 'required|exists:klasses,id',
            'faction'  => 'required|in:Alliance,Horde',
            'gender'   => 'required|in:0,1',
        ]);

        $character->update([
            'name'     => ucfirst(strtolower($request->name)),
            'level'    => $request->level ?: $character->level,
            'guild'    => $request->guild ?: $character->guild,
            'race_id'  => $request->race_id,
            'klass_id' => $request->klass_id,
            'faction'  => $request->faction,
            'gender'   => $request->gender,
        ]);

        foreach ($request->question as $id => $answer) {
            $character->answers()
                ->where('question_id', $id)
                ->update(['data' => $answer ?: '']);
        }

        return back()->with('success', 'Edited Successful');
    }

    /**
     * Change character accepted status
     * @param Character $character
     * @param Request   $request
     * @param string    $type      can be check or uncheck
     */
    public function setStatus(Character $character, Request $request, $type)
    {
    	$newStatus = $type == "check" ? date("Y-m-d H:i:s") : null;
    	$character->update(['accepted' => $newStatus]);

    	return back()->with('success', 'Status Changed Successful');
    }
}
