<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Requests\AdminRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AdminUpdateRequest;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // echo url('/');
        // dd();

        $admins=Admin::get(['id','name','email','photo']);
        return view('back.admins.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $roles=Role::where('guard_name','admin')->get(['id','name','guard_name']);

        return view('back.admins.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {
        
        $data=$request->validated();
        $data['password']=Hash::make($data['password']);

        $data['photo'] = request()->file('photo')->store('public/images'); //save in storage only 

        $admin=Admin::create($data);
        
        if (isset($data['role'])) {
            $admin->assignRole($data['role']);
        }
        //assignRole to assign role to admin 
        return back()->with('success','Added Successfuly');
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
    public function edit(string $id)
    {
        $roles = DB::table('roles')
        ->join('model_has_roles', 'roles.id', '=', 'model_has_roles.role_id')
        ->select('roles.*')
        ->get();  


        $admin=Admin::findOrFail($id);
        // dd($admin);
        return view('back.admins.edit',compact('admin','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminUpdateRequest $request, string $admin_id)
    {
        $admin = Admin::find($admin_id);
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            if (!empty($admin->photo) && Storage::exists($admin->photo)) {
                Storage::delete($admin->photo);
            }
            $data['photo'] = request()->file('photo')->store('public/images');
        }
        $data['password']=Hash::make($data['password']);
        $admin->update($data);
        return redirect(route('back.admins.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($admin_id)
    {
        $admin=Admin::findOrFail($admin_id);
        if (!empty($admin->photo) && Storage::exists($admin->photo)) {
            Storage::delete($admin->photo);
        }
        $admin->delete();
        return back()->with('delete','Deleted Successfuly');
    }

    public function checkExistPhoto($model){
        if (!empty($model->photo) && Storage::exists($model->photo)) {
            Storage::delete($model->photo);
        }
    }
}
