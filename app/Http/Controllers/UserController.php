<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        $roles       = Role::all();

        return view('admin.user.create', compact('departments', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required|string|email|unique:users',
            'password'      => 'required|string',
            'department_id' => 'required',
            'designation'   => 'required',
            'role_id'       => 'required',
            'image'         => 'mimes:jpeg,jpg,png',
            'start_from'    => 'required|date',
        ]);

        $data = $request->all();

        if($request->hasFile('image')) {
            $image = $request->image->hashName();
            $request->image->move(public_path('profile'), $image);
        } else {
            $image = 'avatar.png';
        }
        $data['name']     = $request->first_name.' '.$request->last_name;
        $data['image']    = $image;
        $data['password'] = bcrypt($request->password);
        User::create($data);

        return redirect()->back()->with('message', 'User created successfully');
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
        $user = User::findOrFail($id);
        $department = $user->department;  // get department of the user
        $role = $user->role;  // get role of the user
        $allDepartments = Department::all();  // get all departments
        $allRoles = Role::all();  // get all roles

        return view('admin.user.edit', compact('user', 'department', 'role', 'allDepartments', 'allRoles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
