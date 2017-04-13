<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Profile Page
     * @param  Request $request
     */
    public function index(Request $request)
    {
        return view('profile.index');
    }

    /**
     * Handle form
     * @param  Request $request
     */
    public function postIndex(Request $request)
    {
        $user = \Auth::user();

        $this->validate($request, [
            'name'     => 'required',
            'email'    => "required|email|unique:users,email,{$user->id}",
            'password' => 'sometimes|confirmed',
        ]);

        $user->update([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => $request->password ? \Hash::make($request->password) : $user->password,
        ]);

        return back()->with('success', 'User Updated Succesfull');
    }
}
