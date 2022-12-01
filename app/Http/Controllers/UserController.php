<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index() {
        $pages = 'user';
        $activeUser = User::count();
        $users = User::all();
        return view('admin.users', compact('pages', 'activeUser', 'users'));
    }

    public function store($request) {
        $validatedData = $request->validate([
            'username' => 'required|min:5|max:255',
            'password' => 'required|min:5|max:255',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
        $message = "user" . $request->username . "berhasil ditambahkan";

        return back()->with('success', $message);
    }

    public function delete($id) {

    }
}
