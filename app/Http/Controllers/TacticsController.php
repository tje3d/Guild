<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tactic;

class TacticsController extends Controller
{
	public function index(Request $request)
	{
		$tactics = Tactic::with('media')->latest()->get();
		return view('tactics.index', compact('tactics'));
	}

	/**
	 * Readmore page
	 */
	public function readmore(Tactic $tactic, Request $request)
	{
		return view('tactics.readmore', compact('tactic'));
	}
}
