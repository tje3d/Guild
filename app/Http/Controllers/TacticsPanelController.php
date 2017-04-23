<?php

namespace App\Http\Controllers;

use App\Tactic;
use Illuminate\Http\Request;
use \Auth;
use \Datatables;
use \RBAC;

class TacticsPanelController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!RBAC::isAdmin() && !Auth::user()->hasAnyPermission('tactics')) {
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
        return view('tacticspanel.index');
    }

    /**
     * Datatable Feed
     * @return json
     */
    public function datatable()
    {
        $query = Tactic::query();

        return Datatables::eloquent($query)
            ->addColumn('image', function ($item) {
                return \Html::image($item->getFirstMedia()->getUrl('thumb_small'), null, ['style' => 'height: 40px', 'class' => 'img-thumbnail']);
            })
            ->addColumn('action', function ($item) {
                $col = '<div class="btn-group">';
                $col .= '<a href="' . route('tacticspanel.delete', [$item]) . '" class="btn btn-xs btn-warning" onclick="return confirm(\'You sure?\')"><i class="fa fa-trash"></i></a>';
                $col .= '<a href="' . route('tacticspanel.edit', [$item]) . '" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>';
                $col .= '</div>';
                return $col;
            })
            ->rawColumns(['action', 'image'])
            ->make(true);
    }

    /**
     * Delete a Tactic
     */
    public function delete(Tactic $tactic)
    {
        $tactic->delete();

        return back()->with('success', 'Deleted successful.');
    }

    /**
     * Create page
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        return view('tacticspanel.create');
    }

    /**
     * Handle form submit
     * @param  Request $request
     */
    public function postCreate(Request $request)
    {
        $this->validate($request, [
            'title'   => 'required',
            'content' => 'required',
            'image'   => 'required|image|mimes:jpeg,jpg,gif,png'
        ]);

        $tactic = Tactic::create([
            'title'   => $request->title,
            'content' => $request->content
        ]);

        $tactic->addMedia($request->file('image'))->toMediaCollection();

        return redirect()->route('tacticspanel.edit', $tactic)->with('success', 'Created Successful');
    }

    /**
     * Edit page
     */
    public function edit(Tactic $tactic)
    {
        return view('tacticspanel.edit', compact('tactic'));
    }

    /**
     * Handle form
     */
    public function postEdit(Tactic $tactic, Request $request)
    {
        $this->validate($request, [
            'title'   => "required",
            'content' => 'required',
            'image'   => 'sometimes|image|mimes:jpeg,jpg,gif,png'
        ]);

        $tactic->update([
            'title'   => $request->title,
            'content' => $request->content
        ]);

        if ($request->file('image')) {
        	$tactic->getFirstMedia()->delete();
            $tactic->addMedia($request->file('image'))->toMediaCollection();
        }

        return back()->with('success', 'Edited Successful');
    }
}
