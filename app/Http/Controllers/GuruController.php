<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Models\Guru;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\LogActivity;

class GuruController extends Controller
{

    public function index()
    {
        $pages = 'user';
        $subpages = 'guru';
        return view('admin.guru', compact('pages', 'subpages'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fullname' => 'required|min:5|max:255',
            'nip' => 'required|min:18|max:18',
            'tanggal_masuk' => 'required'
        ]);

        $password = Hash::make($validatedData['nip']);

        DB::select('CALL add_guru(?, ?, ?, ?, ?, ?, ?)', [$validatedData["fullname"], $validatedData["nip"], $request->jabatan, $password, $validatedData["tanggal_masuk"], $request->jenis_kelamin, auth()->user()->uuid]);
        return back()->with('success', "Guru berhasil dibuat");
    }

    public function edit(Request $request, $nip)
    {
        DB::beginTransaction();
        try {
            Guru::where('NIP', $nip)->update([
                'NIP'=>$request->nip,
                'jabatan' => $request->jabatan
            ]);
            DB::commit();
            return back()->with('success', "Berhasil mengubah data");
        } catch (\Throwable $th) {
            DB::rollback();
        }
    }

    public function delete($nip) {

        DB::select('CALL inactive_guru(?, ?)',[$nip, auth()->user()->uuid]);
        return back()->with('succes', 'dosen berhasil di non-aktif kan');
    }
}
