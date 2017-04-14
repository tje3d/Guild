<?php

namespace App\Http\Controllers;

use App\Character;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use \Warmane;

class ApplyController extends Controller
{
    public function __construct()
    {
        // Check if user comes from search page
        $this->middleware(function ($request, $next) {
            if (!session()->has('apply')) {
                return redirect()->route('apply')->with('error', 'Direct access denied!');
            }

            return $next($request);
        })->except('index', 'searchHero');

        // Remove Cached Hero Name
        $this->middleware(function ($request, $next) {
            session()->forget('apply');
            return $next($request);
        })->only('index', 'searchHero');
    }

    /**
     * Index page
     */
    public function index()
    {
        return view('apply.index');
    }

    /**
     * Search hero name in warmane
     */
    public function searchHero(Request $request)
    {
        $this->validate($request, [
            'hero' => 'required|max:30|unique:characters,name',
        ], [
            'hero.unique' => 'This character already registerd',
        ]);

        $heroName = ucfirst(strtolower($request->hero));

        $character = Warmane::character($heroName);

        if (!$character->exists()) {
            return back()->with('error', $heroName . ' in realm Icecrown not found!');
        }

        if ($character->realm() != "Icecrown") {
            return back()->with('error', 'Wrong realm! We are playing in Icecrown realm.');
        }

        if ($character->faction() != "Alliance") {
            return back()->with('error', 'Whooops! You are not alliance.');
        }

        session()->put('apply', $heroName);

        return redirect()->route('apply.questions');
    }

    /**
     * Questions Page
     */
    public function questions()
    {
        $heroName  = session()->get('apply');
        $character = Warmane::character($heroName);
        return view('apply.questions', compact('character', 'heroName'));
    }

    /**
     * Handle questions page form
     */
    public function postQuestions(Request $request)
    {
        $heroName   = session()->get('apply');
        $warmanChar = Warmane::character($heroName);
        $messageBag = new MessageBag();
        $questions  = $request->get('question', []);

        if (!$request->rules) {
        	$messageBag->add("rules", 'Please accepts our rules.');
        }

        foreach (\App\Question::get() as $question) {
            if (empty($questions[$question->id])) {
                $messageBag->add("question[{$question->id}]", 'Please answer this question.');
            }
        }

        if ($messageBag->count() > 0) {
            return redirect()->route('apply.questions')->withInput()->withErrors($messageBag);
        }

        $character = \App\Character::create([
            'name'     => $heroName,
            'level'    => $warmanChar->level(),
            'klass_id' => \App\Klass::where('name', $warmanChar->klass())->first()->id,
            'race_id'  => \App\Race::where('name', $warmanChar->race())->first()->id,
            'faction'  => $warmanChar->faction(),
            'gender'   => $warmanChar->gender() == "Male" ? 0 : 1,
            'guild'    => $warmanChar->guild(),
        ]);

        foreach ($questions as $id => $answer) {
            $character->answers()->create([
                'question_id' => $id,
                'data'        => $answer,
            ]);
        }

        return redirect()->route('apply')->with('success', 'Thanks for registration.');
    }
}
