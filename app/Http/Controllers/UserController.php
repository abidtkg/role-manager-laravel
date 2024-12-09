<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:user list'])->only('index');
    }

    public function index()
    {
        $users = User::with('roles')->latest()->paginate(10);
        return view('admin.users', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.createuser', compact('roles'));
    }

    public function create_user(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6',
                'roles' => 'required'
            ]
        );

        $roles = [];
        foreach($request->roles as $role){
            array_push($roles, intval($role));
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->syncRoles($roles);
        return back()->with('success', 'Created!');
    }
}
