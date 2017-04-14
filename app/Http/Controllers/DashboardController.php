<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \RBAC;

class DashboardController extends Controller
{
	public function index()
	{
		$route = '';

		if (RBAC::isAdmin()) {
			$route = 'users';
		} else if (RBAC::isOfficer()) {
			$route = 'settings.rules';
		}

		return redirect()->route($route);
	}
}
