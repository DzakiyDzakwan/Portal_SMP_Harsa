<?php

namespace App\Http\Controllers\siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\KontrakSemester;

class RaporController extends Controller
{
    public function index($grade)
    {
        $kontrak = KontrakSemester::where('grade', $grade)->where('siswa', Auth::user()->siswas->NISN)->get();
        /* $kontrak = DB::table('kontrak_semesters')
            ->join('siswas', 'siswas.NISN', '=', 'kontrak_semesters.siswa')
            ->join('nilais', 'nilais.kontrak_siswa', '=', 'kontrak_semesters.kontrak_semester_id')
            ->join('sesi_penilaians', 'sesi_penilaians.sesi_id', '=', 'nilais.sesi')
            ->join('mapels', 'mapels.mapel_id', '=', 'nilais.mapel')
            ->where('siswas.user', Auth::user()->uuid)
            ->get(); */
        // dd($kontrak);
        $pages = 'rapor';
        return view('siswa.rapor', compact('pages', 'kontrak', 'grade'));
    }
}
