<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', ['users' => $users]);
    }

    public function show(User $user)
    {
        return view('admin.users.profile', ['user' => $user]);
    }

    public function update(User $user)
    {
        $inputs = request()->validate([
            'username' => ['required', 'string', 'max:255', 'alpha_dash'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'avatar' => ['file'],
            // 'password' => ['min:6', 'max:20', 'confirmed']
        ]);

        if (request('avatar')) {
            $inputs['avatar'] = request('avatar')->store('images');
        }

        $user->update($inputs);

        return back();
    }

    public function destroy(User $user)
    {
        $user->delete();

        session()->flash('user-deleted', 'User has been delete');

        return back();
    }
}