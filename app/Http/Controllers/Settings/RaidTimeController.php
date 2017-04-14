<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Setting;
use \RBAC;
use \Auth;

class RaidTimeController extends Controller
{
	public function __construct()
	{
		$this->middleware(function($request, $next){
			if (!RBAC::isAdmin() && !Auth::user()->hasAnyPermission('settings.raidtime') ) {
				return redirect()->route('dashboard');
			}

			return $next($request);
		});
	}

    public function index(Request $request)
    {
        return view('settings.raidtime');
    }

    /**
     * Handle Form
     * @param  Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postIndex(Request $request)
    {
        $this->validate($request, [
            'raidtime'     => 'required',
            'raidtime_day' => 'required',
        ]);

        Setting::set([
            'raidtime'     => $request->raidtime,
            'raidtime_day' => $request->raidtime_day,
        ]);

        return back()->with('success', 'Edited Successful');
    }
}
