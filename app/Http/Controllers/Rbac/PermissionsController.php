<?php

namespace App\Http\Controllers\Rbac;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use \Datatables;
use \RBAC;
use \Auth;

class PermissionsController extends Controller
{
	public function __construct()
	{
		$this->middleware(function($request, $next){
			if (!RBAC::isAdmin() && !Auth::user()->hasAnyPermission('rbac') ) {
				return redirect()->route('dashboard');
			}

			return $next($request);
		});
	}

    public function index()
    {
        return view('rbac.permissions.index');
    }

    /**
     * Data for datatables
     * @return json
     */
    public function datatable()
    {
        return Datatables::eloquent(Permission::query())
            ->addColumn('action', function ($item) {
                $col = '<div class="btn-group">';
                $col .= '<a href="' . route('rbac.permissions.delete', [$item]) . '" class="btn btn-xs btn-warning" onclick="return confirm(\'You sure?\')"><i class="fa fa-trash"></i></a>';
                $col .= '<a href="' . route('rbac.permissions.edit', [$item]) . '" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>';
                $col .= '</div>';
                return $col;
            })
            ->make(true);
    }

    /**
     * Create page
     */
    public function create(Request $request)
    {
        return view('rbac.permissions.create');
    }

    /**
     * Handle Create Request
     */
    public function postCreate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:permissions,name',
        ]);

        $permission = Permission::create([
            'name' => $request->name,
        ]);

        return redirect()->route('rbac.permissions.edit', $permission)->with('success', 'Created Succesful');
    }

    /**
     * Edit page
     */
    public function edit(Permission $permission)
    {
        return view('rbac.permissions.edit', compact('permission'));
    }

    /**
     * Handle Edit Request
     */
    public function postEdit(Permission $permission, Request $request)
    {
        $this->validate($request, [
            'name' => "required|unique:permissions,name,{$permission->id}",
        ]);

        $permission->update([
            'name' => $request->name,
        ]);

        return back()->with('success', 'Edited Succesfull');
    }

    /**
     * Delete
     */
    public function delete(Permission $permission)
    {
        $permission->delete();

        return back()->with('success', 'Deleted Successful');
    }
}
