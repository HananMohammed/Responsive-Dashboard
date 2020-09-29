<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\PermissionStoreRequest;
use App\Http\Requests\Admin\PermissionUpdateRequest;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize("list");
        $permissions = Permission::paginate(10);

        return view('admin.permission.index' ,compact('permissions'));

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  PermissionStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store( PermissionStoreRequest $request)
    {
        $this->authorize("create");
        Permission::create([
            'name' => $request->input('permission') ,
            'guard_name' =>'web'
        ]);

        return redirect('admin/permissions');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $this->authorize("delete");
        $permission->delete();

        return redirect('admin/permissions');

    }
}
