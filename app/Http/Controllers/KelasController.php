<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = 'manajemenKelas';
        $guru = Guru::join('users', 'users.uuid', '=', 'gurus.user')
        ->join('user_profiles', 'user_profiles.user', '=', 'users.uuid')
        ->get(['gurus.*', 'user_profiles.nama']);

        $kelas = DB::table('table_kelas')
        ->get();

        return  view('admin.kelas', [
            'pages' => $pages,
            'guru' => $guru,
            'kelas' => $kelas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kelas');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kelas = new Kelas;
        $kelas->kelas_id = Str::random(3);
        $kelas->kelompok_kelas = $request->nomor;
        $kelas->nama_kelas = $request->nama;
        $kelas->wali_kelas = $request->guru;
        $kelas->save();

        return redirect()->route('kelas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $k = DB::table('table_kelas')
        ->where('kelas.kelas_id', $id)
        ->get();

        return view('admin.kelas.#update', [
            'k' => $k
        ]);
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
