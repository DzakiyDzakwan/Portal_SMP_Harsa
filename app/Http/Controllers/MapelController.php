<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Mapel;
use App\Models\LogActivity;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $pages = 'mapel';
        $mapel = Mapel::all();
        return view('admin.mapel', compact('pages', 'mapel'));
    }
    // public function mapel()
    // {
    //     $pages = 'manajemenKelas';
    //     return  view('admin.mapel', [
    //         'pages' => $pages,
    //     ]);
    // }

    // public function index()
    // {
    //     $pages = 'mapel';
    //     $mapel = Mapel::all();
    //     return view('admin.mapel', compact('pages', 'mapel'));
    // }

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

        /* $mapel = new Mapel;
        $mapel->mapel_id = $request->mapel_id;
        $mapel->nama_mapel = $request->nama_mapel;
        $mapel->kelompok_mapel = $request->kelompok_mapel;
        $mapel->kurikulum = $request->kurikulum;
        $mapel->save(); */

        DB::select('CALL add_mapel(?, ?, ?, ?, ?)', [$request->mapel_id, $request->nama_mapel, $request->kelompok_mapel, $request->kurikulum, auth()->user()->uuid]);

        return redirect()->route('mapel');
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
        $mpl = Mapel::where('mapel_id', $id);
        $mpl->update([
            'mapel_id' => $request->mapel_id,
            'nama_mapel' => $request->nama_mapel,
            'kelompok_mapel' => $request->kelompok_mapel,
            'kurikulum' => $request->kurikulum
        ]);

        return back()->with('success', 'Berhasil update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($mapel_id)
    {
        Mapel::where('mapel_id', $mapel_id)->delete();
        return back()->with('success', "mapel berhasil dihapus");
    }
}
