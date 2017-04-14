<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Setting;

class StreamController extends Controller
{
    public function index(Request $request)
    {
        return view('settings.stream');
    }

    /**
     * Handle Form
     * @param  Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postIndex(Request $request)
    {
        $this->validate($request, [
            'stream_enable'  => 'required|in:yes,no',
            'stream_channel' => 'required',
        ]);

        Setting::set([
            'stream_enable'  => $request->stream_enable,
            'stream_channel' => $request->stream_channel,
        ]);

        return back()->with('success', 'Edited Successful');
    }
}
