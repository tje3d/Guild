<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Setting;

class TeamSpeakController extends Controller
{
    public function index(Request $request)
    {
        return view('settings.teamspeak');
    }

    /**
     * Handle Form
     * @param  Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postIndex(Request $request)
    {
        $this->validate($request, [
            'teamspeak_server' => 'required',
        ]);

        Setting::set('teamspeak_server', $request->teamspeak_server);

        return back()->with('success', 'Edited Successful');
    }
}
