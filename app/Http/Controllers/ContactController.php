<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;
use \Mail;

class ContactController extends Controller
{
    /**
     * Index page
     */
    public function index()
    {
        return view('contact.index');
    }

    /**
     * Handle form
     */
    public function postIndex(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'name'    => 'required',
            'message' => 'required',
        ]);

        Mail::send(new Contact($request->all()));

        return back()->with('success', 'Thank you for contacting us - we will get back to you soon!');
    }
}
