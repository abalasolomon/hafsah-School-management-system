<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

$adminRole = Role::firstOrCreate(['name' => 'admin']);

// Get all permissions
$allPermissions = Permission::all();

// Attach all permissions to the admin role
$adminRole->syncPermissions($allPermissions);

class PermissionController extends Controller
{
    public function index(){
        $permissions = Permission::all();
        return view('admin.permissions.index', compact('permissions'));
    }
    public function create(){
        return view('admin.permissions.create');
    }


    public function store(Request $request){
        $validated = $request->validate( ['name' => ['required','min:3']]);
        Permission::create($validated);

        return to_route('admin.permission.index')->with('message','Role Added Successfully');
    }

    public function edit (Permission $permission){
        $roles = Role::all();
        return view('admin.permission.edit', compact('permission','roles'));
    }

    public function update(Permission $permission, Request $request ){
        $validated = $request->validate( ['name' => ['required','min:3']]);
        $permission->update($validated);

        return to_route('admin.permission.index')->with('message','Role Updated Successfully');
    }
    public function destroy(Permission $Permission){
        $Permission->delete();
        return back()->with('message', 'Permission Deleted');
    }

    public function assignRole(Request $request, Permission $permission){
        if ($permission->hasRole($request->role)) {
            return back()->with('message','Role exists');
        }
        $permission->assignRole($request->role);
        return back()->with('message','Role assigned successfully');

    }

    public function removeRole(Permission $permission, Role $role){
        if ($permission->hasRole($role)) {
            $permission->removeRole($role);
            return back()->with('message','Role Removed');
        }
        return back()->with('message','Role doesnt exist');
    }
}
