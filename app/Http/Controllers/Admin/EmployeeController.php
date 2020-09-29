<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\EmployeeStoreRequest;
use App\Http\Requests\Admin\EmployeesUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('list');
        $employees = User::all();
        return view('admin.employee.index' , compact('employees'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create');
        $roles = Role::all();
        $employee = new User();
        return view('admin.employee.create' , compact('roles' , 'employee'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EmployeeStoreRequest $request
     * @return RedirectResponse
     */
    public function store(EmployeeStoreRequest $request)
    {
        $this->authorize('create');
        $employee = new User();
        $addedEmployee= $employee->create([
            "name" => $request->get('name') ,
            "email" => $request->get('email') ,
            "password" => Hash::make($request->get('password')),
            "profile_photo_path" =>upload_image($request->file('profile_photo_path')),
        ]);
        foreach ($request->input('role')as  $role) {

            $addedEmployee = $addedEmployee->assignRole($role);
        }
        $employeePermissions = $addedEmployee->getPermissionsViaRoles();
        foreach ($employeePermissions as $employeePermission)
        {
            $addedEmployee->givePermissionTo($employeePermission->name);
        }

        return redirect() -> route('admin.employees.index');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('edit');
        $employee = User::find($id);
        $roles = Role::all();
        $employeeRoles = $employee->getRoleNames()->toArray();
        return view('admin.employee.edit' ,compact('employee' , 'roles' ,'employeeRoles'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EmployeesUpdateRequest $request
     * @param User $employee
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeesUpdateRequest $request, User $employee )
    {
        $this->authorize('update');
        $employee->update([
            'name' => $request-> get('name'),
            'email' => $request->get('email'),
            'password'=> Hash::make( $request->get('password') ),
            "profile_photo_path" => ($request->has('profile_photo_path')) ?
                                     upload_image($request->file('profile_photo_path')):
                                       $employee->profile_photo_path


        ]);

        DB::table('model_has_roles')->where('model_id' , $employee->id)->delete();

        DB::table('model_has_permissions')->where('model_id' , $employee->id)->delete();

        $employee->assignRole($request->get('role'));

        $employeePermissions = $employee->getPermissionsViaRoles();

        foreach ($employeePermissions as $employeePermission)
        {
            $employee->givePermissionTo($employeePermission->name);
        }

        return redirect() -> route('admin.employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $employee
     * @return ResponseRedirectback
     */
    public function destroy(User $employee)
    {
        $this->authorize('delete');
        $employee->delete();
        return redirect()->back();

    }
}
