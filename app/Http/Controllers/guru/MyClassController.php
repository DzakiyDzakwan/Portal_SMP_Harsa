<?php

namespace App\Http\Controllers\guru;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Prestasi;
use App\Models\Siswa;
use App\Models\LogActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MyCLassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = 'waliKelas';
        $nip = Auth::user()->gurus->NIP;
        $kelas = Kelas::where('wali_kelas', $nip)->first();
        $totalSiswa = Siswa::where('kelas', $kelas->kelas_id)->count();
        /* $siswas = Siswa::join('user_profiles', 'user_profiles.user', '=', 'siswas.user')
        ->join('kelas', 'kelas.kelas_id', '=', 'siswas.kelas')
        ->join('gurus', 'gurus.NIP', '=', 'kelas.wali_kelas')
        ->where('gurus.user', '=', $id)
        ->get();
        $prestasis = Prestasi::join('siswas', 'prestasis.siswa', '=', 'siswas.NISN')
        ->get(); */
        return view('guru.myClass', compact('pages','kelas', 'totalSiswa'));
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
    public function store(Request $request, $id)
    {
        $validatedData = $request->validate([
            'keterangan' => 'required|min:5|max:255',
            'tanggal' => 'required',
        ]);

        DB::beginTransaction();

        try {
            Prestasi::create([
                'siswa' => $id,
                'jenis_prestasi'=> $request->jenis,
                'keterangan'=> $validatedData['keterangan'],
                'tanggal_prestasi'=> $validatedData['tanggal']
            ]);
    
            LogActivity::create([
                'actor' => Auth::user()->uuid,
                'transaksi' => 'insert',
                'at' => 'prestasi'
            ]);

            DB::commit();
    
            return back()->with('success', 'Data Berhasil di input');
        } catch (\Throwable $e) {
            return back()->with('error', 'Ada masalah');
            DB::rollback();
        }

        return redirect()->route('listKelas');
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
        DB::beginTransaction();
        try {
            Prestasi::where('prestasi_id', $id)->update([
                'jenis_prestasi' => $request->jenis,
                'keterangan' => $request->keterangan,
                'tanggal_prestasi' => $request->tanggal
            ]);
            DB::commit();
            return back()->with('success', "Berhasil mengubah data");
        } catch (\Throwable $th) {
            DB::rollback();
        }
        return redirect()->route('listKelas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Prestasi::where('prestasi_id', $id)->delete();
        return redirect()->route('listKelas');
    }
}
