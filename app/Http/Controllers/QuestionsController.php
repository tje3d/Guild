<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use \Auth;
use \Datatables;
use \RBAC;

class QuestionsController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!RBAC::isAdmin() && !Auth::user()->hasAnyPermission('questions')) {
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
        return view('questions.index');
    }

    /**
     * Datatable Feed
     * @return json
     */
    public function datatable()
    {
        $query = Question::query();

        return Datatables::eloquent($query)
            ->addColumn('action', function ($item) {
                $col = '<div class="btn-group">';
                $col .= '<a href="' . route('questions.delete', [$item]) . '" class="btn btn-xs btn-warning" onclick="return confirm(\'You sure?\')"><i class="fa fa-trash"></i></a>';
                $col .= '<a href="' . route('questions.edit', [$item]) . '" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>';
                $col .= '</div>';
                return $col;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Delete a question
     */
    public function delete(Question $question)
    {
        $question->delete();

        return back()->with('success', 'Question deleted successful.');
    }

    /**
     * Create page
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * Handle form submit
     * @param  Request $request
     */
    public function postCreate(Request $request)
    {
        $this->validate($request, [
            'ask'  => 'required|unique:questions,ask',
            'type' => 'required|in:textarea,checkbox,radio,text'
        ]);

        $question = \App\Question::create([
            'ask'  => $request->ask,
            'type' => $request->type,
            'data' => []
        ]);

        return redirect()->route('questions.edit', $character)->with('success', 'Created Successful');
    }

    /**
     * Edit page
     */
    public function edit(Question $question)
    {
        return view('questions.edit', compact('question'));
    }

    /**
     * Handle form
     */
    public function postEdit(Question $question, Request $request)
    {
        $this->validate($request, [
            'ask'  => "required|unique:questions,ask,{$question->id}",
            'type' => 'required|in:textarea,checkbox,radio,text'
        ]);

        $question->update([
            'ask'  => $request->ask,
            'type' => $request->type,
            'data' => []
        ]);

        return back()->with('success', 'Edited Successful');
    }

    /**
     * Sortable Page
     */
    public function sort(Request $request)
    {
    	$questions = Question::ordered()->get();
    	return view('questions.sort', compact('questions'));
    }

    /**
     * Handle Form Sortable Page
     */
    public function postSort(Request $request)
    {
    	$ids = collect(json_decode($request->data))->pluck('id');
    	Question::setNewOrder($ids);
    	
    	return back()->with('success', 'Sorted Successfull');
    }
}
