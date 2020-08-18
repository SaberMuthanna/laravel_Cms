<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\users\updateProfileRequest;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index')->with('users', User::all());
    }
    public function makeAdmin(User $user)
    {
        $user->role = 'admin';

        $user->save();
        session()->flash('success', 'user made admin successfully.');
        return redirect(route('users.index'));
    }
    public function edit()
    {
        return view('users.edit')->with('user', auth()->user());
    }
    public function update(updateProfileRequest $request)
    {
        $user = auth()->user();
        $user->update([
            'name' => $request->name,
            'about' => $request->about
        ]);

        session()->flash('success', 'user Update successfully.');
        return redirect()->back();
    }
}
