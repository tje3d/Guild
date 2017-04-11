<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Setting;

class RulesController extends Controller
{
	public function index(Request $request)
	{
		return view('settings.rules');
	}

	/**
	 * Handle Form
	 * @param  Request $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function postIndex(Request $request)
	{
		$this->validate($request, [
			'rules' => 'required',
		]);

		Setting::set('rules', $request->rules);

		return back()->with('success', 'Edited Successfull');
	}
}
