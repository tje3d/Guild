<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Sound;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use \Setting;

class SoundController extends Controller
{
    public function index(Request $request)
    {
        $sounds = Sound::get();
        $defaultSound = Setting::get('music');
        return view('settings.sound', compact('sounds', 'defaultSound'));
    }

    /**
     * Handle file upload
     */
    public function postIndex(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:sounds,name',
            'file' => 'required|file'
        ]);

        $messageBag = new MessageBag;
        $file       = $request->file('file');

        if ($file->getClientOriginalExtension() != "mp3") {
            $messageBag->add('file', 'Only mp3 format allowed.');
        }

        if ($messageBag->count() > 0) {
            return back()->withErrors($messageBag);
        }

        $sound = Sound::create([
            'name' => $request->name
        ]);

        $sound->addMedia($request->file('file'))->toMediaLibrary();

        return back()->with('success', 'Sound Created');
    }

    /**
     * Delete
     */
    public function delete(Sound $sound)
    {
        $sound->delete();

        return back()->with('success', 'Sound Deleted Succesful');
    }

    /**
     * Select as default music
     */
    public function select(Sound $sound)
    {
        Setting::set([
            'music' => $sound->id
        ]);

        return back()->with('success', 'Default music changed!');
    }
}
