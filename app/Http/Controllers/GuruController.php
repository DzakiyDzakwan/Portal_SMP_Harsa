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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = 'user';
        $totalGuru = Guru::count();
        $guruActive = Guru::where('status_keaktifan', 'Aktif')->count();
        $guruInactive = Guru::where('status_keaktifan', 'Tidak Aktif')->count();
        $gurus = Guru::all();
        return view('admin.guru', compact('pages', 'totalGuru', 'guruActive', 'guruInactive', 'gurus'));
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
        $validatedData = $request->validate([
            'fullname' => 'required|min:5|max:255',
            'nip' => 'required|min:18|max:18',
            'tanggal_masuk' => 'required'
        ]);

        $password = Hash::make($validatedData['nip']);

       /*  dd($password); */

        \DB::select('CALL registrasi_guru(?, ?, ?, ?, ?, ?, ?)', [$validatedData["fullname"], $validatedData["nip"], $request->jabatan, $password, $validatedData["tanggal_masuk"], $request->jenis_kelamin, auth()->user()->uuid]);
        return back()->with('success', "Guru berhasil dibuat");
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
    public function edit($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
