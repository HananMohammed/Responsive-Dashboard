<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\RolesStoreRequest;
use App\Http\Requests\Admin\RolesUpdateRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize("list");
        $permissions = Permission::orderBy('name' ,'desc')->get();
        $roles = Role::all();

        return view('admin.roles.index' , compact('roles','permissions')) ;
    }
    /**
     * @param RolesStoreRequest $request
     * @return  \Illuminate\Http\RedirectResponse
     */
    public function store(RolesStoreRequest $request)
    {
        $this->authorize('create');
        $role = Role::create( [
            'name' => $request->role ,
             'guard_name' =>'web'
        ] );
        $permissions = $request->permission;
         $role->syncPermissions($permissions);
        return redirect()->route('admin.roles.index');
    }

    /**
     * @param RolesUpdateRequest $request
     * @param $id
     */
    public function update(RolesUpdateRequest $request, Role $role)
    {
        $this->authorize("update");
        $oldPermissions = $role->permissions()->get();
        $role->update(['name' => $request->role]);
        if( $oldPermissions )
        {
             $role->revokePermissionTo($oldPermissions) ;
        }
        $role->givePermissionTo($request->permission) ;

        return redirect() ->route('admin.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Role $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $this->authorize('delete');
        $role->delete();
        return redirect()->back();

    }

}
