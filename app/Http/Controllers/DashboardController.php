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
			$route = 'settings.stream';
		} else if (RBAC::isGuildMaster()) {
			$route = 'characters';
		}

		if (empty($route)) {
			throw new \Exception('Please define a home page.');
		}

		return redirect()->route($route);
	}
}
