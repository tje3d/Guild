<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreate;
use App\User;
use Illuminate\Http\Request;
use \Datatables;
use \Hash;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        return view('users.index');
    }

    /**
     * Data for datatables
     * @return json
     */
    public function datatable()
    {
        return Datatables::eloquent(User::query())
            ->addColumn('action', function ($item) {
                $col = '<div class="btn-group">';
                $col .= '<a href="' . route('users.delete', [$item]) . '" class="btn btn-xs btn-warning" onclick="return confirm(\'You sure?\')"><i class="fa fa-trash"></i></a>';
                $col .= '<a href="' . route('users.edit', [$item]) . '" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>';
                $col .= '</div>';
                return $col;
            })
            ->make(true);
    }

    /**
     * Create page
     * @param  Request $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create(Request $request)
    {
        return view('users.create');
    }

    /**
     * Handle Create Request
     * @param  UserCreate $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postCreate(UserCreate $request)
    {
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.edit', $user)->with('success', 'Created Succesful');
    }

    /**
     * Edit page
     * @param  User $user
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Handle Edit Request
     * @param  User    $user
     * @param  UserCreate $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postEdit(User $user, Request $request)
    {
        $this->validate($request, [
            'name'     => 'required',
            'email'    => "required|email|unique:users,id,{$user->id}",
            'password' => 'sometimes|confirmed',
        ]);

        $user->update([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => $request->password != '' ? Hash::make($request->password) : $user->password,
        ]);

        return back()->with('success', 'Edited Succesfull');
    }

    /**
     * Delete
     * @param  User   $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(User $user)
    {
    	$user->delete();
    	
    	return back()->with('success', 'Deleted Successfull');
    }
}
