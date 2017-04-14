<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Setting;
use \RBAC;
use \Auth;

class RulesController extends Controller
{
	public function __construct()
	{
		$this->middleware(function($request, $next){
			if (!RBAC::isAdmin() && !Auth::user()->hasAnyPermission('settings.rules') ) {
				return redirect()->route('dashboard');
			}

			return $next($request);
		});
	}

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

		return back()->with('success', 'Edited Successful');
	}
}
