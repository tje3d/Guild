<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsefullAddonsController extends Controller
{
	public function __invoke(Request $request)
	{
		return view('usefulladdons.index');
	}
}
