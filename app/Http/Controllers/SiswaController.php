<?php

namespace App\Http\Controllers;

use App\Models\UserProfiles;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = 'user';
        $subpages = 'siswa';
        return view('admin.siswa', compact('pages', 'subpages'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $validatedData = $request->validate([
            'nama' => 'required|min:5|max:255',
            'nisn' => 'required|min:10|max:10',
        ]);

        $password = Hash::make($validatedData['nisn']);

        DB::select('CALL add_siswa(?, ?, ?, ?, ?, ?, ?, ?)', [$validatedData["nama"], $validatedData["nisn"], $request->NIS, $password, $request->tanggal_masuk, $request->kelas_id, $request->jenis_kelamin, auth()->user()->uuid]);
        return back()->with('success', "Siswa berhasil dibuat");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $nisn)
    {
        DB::beginTransaction();
        try {
            Siswa::where('NISN', $nisn)->update([
                'NISN'=>$request->nisn,
                'nama' => $request->nama
            ]);
            DB::commit();
            return back()->with('success', "Berhasil mengubah data");
        } catch (\Throwable $th) {
            DB::rollback();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $user)
    {
        DB::select('CALL inactive_siswa(?, ?, ?)', [$user, $request->status, auth()->user()->uuid]);

        return back()->with('succes', 'Siswa berhasil di non-aktif kan');
    }
}
