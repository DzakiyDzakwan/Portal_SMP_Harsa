<?php

namespace App\Http\Controllers;

use App\Models\UserProfiles;
use App\Models\Siswa;
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
        $totalSiswa = Siswa::count();
        $siswaActive = Siswa::where('status_keaktifan', 'Aktif')->count();
        $siswaLulus = Siswa::where('status_keaktifan', 'Lulus')->count();
        $siswaPindah = Siswa::where('status_keaktifan', 'Pindah')->count();
        $siswaDO = Siswa::where('status_keaktifan', 'Drop Out')->count();
        $siswaInactive = $siswaLulus + $siswaPindah + $siswaDO;
        // $siswas = DB::table('siswas')
        //             ->join('users', 'users.uuid', '=', 'siswas.user')
        //             ->join('user_profiles', 'user_profiles.user', '=', 'users.uuid')
        //             ->join('prestasis', 'prestasis.siswa', '=', 'siswas.NISN')
        //             ->get();
        $siswas = Siswa::join('users', 'siswas.user', '=', 'users.uuid')->join('user_profiles', 'users.uuid', '=', 'user_profiles.user')->orderBy('siswas.created_at', 'DESC')->get();
        return view('admin.siswa', compact('totalSiswa', 'pages', 'siswas', 'siswaActive', 'siswaInactive'));
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

        \DB::select('CALL registrasi_siswa(?, ?, ?, ?, ?, ?, ?, ?)', [$validatedData["nama"], $validatedData["nisn"], $request->NIS, $password, $request->tanggal_masuk, $request->kelas_id, $request->jenis_kelamin, auth()->user()->uuid]);
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
    public function delete(Request $request, $nisn)
    {
        Siswa::where('NISN', $nisn)->update([
            'status_keaktifan' => $request->status_keaktifan
        ]);

        return back()->with('succes', 'Siswa berhasil di non-aktif kan');
    }
}
