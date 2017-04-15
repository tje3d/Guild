<?php

namespace App\Http\Controllers;

use App\Addon;
use Illuminate\Http\Request;

class AddonsController extends Controller
{
    public function index(Request $request)
    {
        $addons = Addon::latest()->get();
        return view('addons.index', compact('addons'));
    }

    /**
     * Handle file upload
     */
    public function postCreate(Request $request)
    {
        $this->validate($request, [
            'name_create'        => 'required|unique:addons,name',
            'description_create' => 'required',
            'version_create'     => 'required',
            'file_create'        => 'required|mimes:zip,rar',
        ], [], [
        	'name_create' => 'name',
			'description_create' => 'description',
			'version_create' => 'version',
			'file_create' => 'file',
        ]);

        $addon = Addon::create([
            'name'        => $request->name_create,
            'version'     => $request->version_create,
            'description' => $request->description_create,
        ]);

        $addon->addMedia($request->file('file_create'))->toMediaCollection('files');

        return back()->with('success', 'Addon Created');
    }

    /**
     * Handle update
     */
    public function postUpdate($id, Request $request)
    {
    	$addon = Addon::find($id);

        $this->validate($request, [
            'name'        => "required|unique:addons,name,{$addon->id}",
            'description' => 'required',
            'version'     => 'required',
            'file'        => 'sometimes|mimes:zip,rar',
        ]);

        $addon->update([
            'name'        => $request->name,
            'version'     => $request->version,
            'description' => $request->description,
        ]);

        if ($request->file('file')) {
        	$addon->getFirstMedia('files')->delete();
	        $addon->addMedia($request->file('file'))->toMediaCollection('files');
        }


        return back()->with('success', 'Addon Updated Succesfull');
    }

    /**
     * Delete
     */
    public function delete(Addon $addon)
    {
        $addon->delete();

        return back()->with('success', 'Addon Deleted Succesful');
    }
}
