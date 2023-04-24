<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles=Role::where('guard_name','admin')->get();
        return view('back.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions=Permission::where('guard_name','admin')->get();
        return view('back.roles.create',compact("permissions"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request;
        $role = Role::create(['name' => $data['name'], 'guard_name' => 'admin']);
        if (isset($data['permissionArray'])) {
            foreach ($data['permissionArray'] as $permission => $value) {
                $role->givePermissionTo($permission);
            }
        }
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($role_id)
    {
        $role=Role::findOrFail($role_id);
        $permissions = Permission::where('guard_name', 'admin')->get();
        return view('back.roles.edit',compact(['role','permissions']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $role_id)
    {
        $data = $request->validate([
            'name' => 'required|unique:roles,name,'.$role_id,
            'permissionArray.*' => 'nullable',
        ]);
        $role = Role::findOrFail($role_id);
        $role->name = $data['name'];
        $role->save();
        if (isset($data['permissionArray'])) {
            $role->syncPermissions(array_keys($data['permissionArray']));
        } else {
            $role->permissions()->detach();
        }
        return back()->with(['success'=>'Updated Successfuly']);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($role_id)
    {
        // dd($role_id);
        $role=Role::findOrFail($role_id);
        $role->syncPermissions();
        $role->delete();
        return back()->with('delete','Deleted Successfuly');
    }
}