<?php

namespace App\Http\Controllers;

use App\Staff;
use Illuminate\Http\Request;

class StaffsController extends Controller
{
    public function index(Request $request)
    {
        $staffs = Staff::latest()->get();
        return view('staffs.index', compact('staffs'));
    }

    /**
     * Handle file upload
     */
    public function postCreate(Request $request)
    {
        $this->validate($request, [
            'name_create'        => 'required|unique:staffs,name',
            'title_create'       => 'required',
            'file_create'        => 'required|mimes:jpg,jpeg,png|image',
        ], [], [
            'name_create'        => 'name',
            'description_create' => 'description',
            'title_create'       => 'title',
            'file_create'        => 'file',
        ]);

        $staff = Staff::create([
            'name'        => $request->name_create,
            'title'       => $request->title_create,
            'description' => $request->description_create,
        ]);

        $staff->addMedia($request->file('file_create'))->toMediaCollection('images');

        return back()->with('success', 'Staff Created');
    }

    /**
     * Handle update
     */
    public function postUpdate($id, Request $request)
    {
        $staff = Staff::find($id);

        $this->validate($request, [
            'name'        => "required|unique:staffs,name,{$staff->id}",
            'title'       => 'required',
            'file'        => 'sometimes|mimes:jpg,jpeg,png|image',
        ]);

        $staff->update([
            'name'        => $request->name,
            'title'       => $request->title,
            'description' => $request->description,
        ]);

        if ($request->file('file')) {
            $staff->getFirstMedia('images')->delete();
            $staff->addMedia($request->file('file'))->toMediaCollection('images');
        }

        return back()->with('success', 'Staff Updated Succesfull');
    }

    /**
     * Delete
     */
    public function delete(Staff $staff)
    {
        $staff->delete();

        return back()->with('success', 'Staff Deleted Succesful');
    }
}
