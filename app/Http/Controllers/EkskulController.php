<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Ekstrakurikuler;
use App\Models\LogActivity;
use Illuminate\Support\Facades\DB;

class EkskulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = 'manajemenKelas';
        $totalEkskul = Ekstrakurikuler::count();
        $ekskuls = DB::table('table_ekskul')
        ->get();
        return view('admin.ekskul', compact('pages', 'totalEkskul','ekskuls'));
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
        $validateData = $request->validate([
            'ekskul_id' => 'required|min:3|max:3',
            'fullname' => 'required|min:5|max:255',
            'tempat' => 'required',
            'kelas' => 'required',
        ]);

        DB::beginTransaction();

        try {
            Ekstrakurikuler::create([
                'ekskul_id' => $validateData['ekskul_id'],
                'nama' => $validateData['fullname'],
                'hari' => $request->hari,
                'waktu_mulai' => $request->start,
                'waktu_akhir' => $request->end,
                'tempat' => $validateData['tempat'],
                'kelas' => $validateData['kelas']
            ]);
    
            LogActivity::create([
                'user' => auth()->user()->uuid,
                'transaksi' => 'insert',
                'at' => 'users'
            ]);

            DB::commit();
    
            return back()->with('success', 'Data Berhasil di input');
        } catch (\Throwable $e) {
            return back()->with('error', 'Ada masalah');
            DB::rollback();
        }


        /* $ekskul = new Ekskul;
        $ekskul->ekskul_id = Str::random(5);
        $ekskul->nama = $request->fullname;
        $ekskul->hari = $request->hari;
        $ekskul->waktu_mulai = $request->start;
        $ekskul->waktu_akhir = $request->end;
        $ekskul->tempat = $request->tempat;
        $ekskul->kelas = $request->kelas;
        $ekskul->save(); */

        return redirect()->route('ekskul');
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
        $eks = Ekstrakurikuler::where('ekskul_id', $id);
        $eks->update([
                'ekskul_id' => $request->ekskul_id,
                'nama' => $request->fullname,
                'hari' => $request->hari,
                'waktu_mulai' => $request->start,
                'waktu_akhir' => $request->end,
                'tempat' => $request->tempat,
                'kelas' => $request->kelas
        ]);
        
        return redirect()->route('ekskul');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ekstrakurikuler::where('ekskul_id', $id)->delete();
        return redirect()->route('ekskul');
    }
}
