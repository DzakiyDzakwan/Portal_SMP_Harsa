<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use PDF;

class ReportController extends Controller
{
    public function index(){
        $data = Siswa::join('users', 'users.uuid', '=', 'siswas.user')->join('user_profiles', 'user_profiles.user', '=', 'users.uuid')->get();

        $pdf = PDF::loadView('user.cetak-siswa', array('data' => $data))
        ->setPaper('a4', 'potrait');
        return $pdf->stream();

        //return view('user.cetak-siswa', compact('data'));
    }
}
