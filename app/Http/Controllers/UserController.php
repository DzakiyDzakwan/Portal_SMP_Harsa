<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\LogActivity;

class UserController extends Controller
{
    public function index() {
        $pages = 'user';
        $activeUser = User::count();
        $users = User::all();
        return view('admin.users', compact('pages', 'activeUser', 'users'));
    }

    public function store(Request $request) {

        $validatedData = $request->validate([
            'username' => 'required|min:5|max:255',
            'password' => 'required|min:5|max:255',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        DB::beginTransaction();

        try {
            User::create($validatedData);
            LogActivity::create([
                'user' => auth()->user()->uuid,
                'transaksi' => 'insert',
                'at' => 'users'
            ]);

            DB::commit();

            $message = "user" . $request->username . "berhasil ditambahkan";
            return back()->with('success', $message);
        } catch (\Throwable $e) {
            DB::rollback();
            return back()->with('error',$e->getMessage());
        }

       
    }

    public function delete($uuid) {
        User::where('uuid', $uuid)->delete();
        return back()->with('success', "user berhasil dihapus");
        /* DB::beginTransaction();

        try {
            
            LogActivity::create([
                'user' => auth()->user()->uuid,
                'transaksi' => 'delete',
                'at' => 'users'
            ]);
            
        } catch (/Throwable $th) {
            //throw $th;
            return back()->with('error',$e->getMessage());
        } */
    }
}
