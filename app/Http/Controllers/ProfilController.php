<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

use App\Models\Guru;
use Illuminate\Contracts\View\View;

class ProfilController extends Controller
{
    //Guru
    public function profilGuru()
    {
        $pages = 'profilGuru';
        $gurus = Guru::join('users', 'gurus.user', '=', 'users.uuid')->join('user_profiles', 'user_profiles.user', '=', 'users.uuid')->where('gurus.user', Auth::user()->uuid)->first();
        return view('guru.profile', [
            'pages' => $pages,
            'gurus' => $gurus
        ]);
    }

    public function editProfilGuru($id)
    {   
        $pages = 'profilGuru';
        // $dt = UserProfile::findorfail($id);
        $data = Guru::join('users', 'gurus.user', '=', 'users.uuid')->join('user_profiles', 'user_profiles.user', '=', 'users.uuid')->where('gurus.user', Auth::user()->uuid)->find($id);
        return view('guru.editprofile',compact('pages', 'data'));
    }

    public function updateProfilGuru(Request $request)
    {   
        $id = auth()->user()->uuid;
        // dd($request->all());

        $validatedData = $request->validate([
            'foto' => 'image|nullable|mimes:jpeg,png,jpg,gif,svg|max:3024',
            'username' => 'required|min:5',
            'password' => [
                'required',
                'min:5',             // must be at least 10 characters in length
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
            ],
            'email' => 'required|email',
            'nama' => 'required|max:100',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required',
            'tempat_lahir' => 'required|max:255',
            'alamat_tinggal' => 'required|max:255',
            'alamat_domisili' => 'required|max:255',
            'pendidikan' => 'required',
            'tahun_ijazah' => 'required',
            'status_perkawinan' => 'required'
        ]);

        $data = Guru::where('user', $id);
        $data->update([
            'pendidikan' => $validatedData['pendidikan'],
            'tahun_ijazah' => $validatedData['tahun_ijazah'],
            'status_perkawinan' => $validatedData['status_perkawinan'],
        ]);
        $data = User::where('uuid', $id);
        // dd($id);


        $data->update([
            'username' => $validatedData['username'],
            'password' => $validatedData['password']
        ]);


        // $data = UserProfile::where('user', $id);
        // dd($request->all());
        // $data->update([
            
            
            
            // $nm = $request->foto,
            // $namaFile = $nm->getClientOriginalName(),
            // $dtUpload = UserProfile::where('user', $id),
            // $dtUpload->foto = $namaFile,
            
            // $nm->move(public_path().'/editprofilguru', $namaFile)
            // $dtUpload->save(),
            
            $data = UserProfile::where('user',$id);

            
            
            if($request->hasFile('foto')) {
                // $fileNameWithExt = $request->file('foto')->getClientOriginalName();
                // $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                // $extension = $request->file('foto')->getClientOriginalExtension();
                // $filenameSimpan = $filename.'_'.time().'.'.$extension;
                // $fileNameNew        = uniqid('', true) . time() . '.' . $filenameSimpan;
                // $path = $request->file('foto')->store('editprofilguru2', $filenameSimpan);
                // $image = request()->file(key: 'foto')->getClientOriginalName();
                // request()->file(key: 'foto')->storeAs('editprofilguru2', $image, options:'');
                // $validatedData['foto'] = $request->file('foto')->store('/editprofilguru2');
                // $newAlamat = $request->file('foto')->store('/editprofilguru2');
                // $alamatbaru = $newAlamat;
                $fileNameWithExt = $request->file('foto')->getClientOriginalName();
                $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('foto')->getClientOriginalExtension();
                $filenameSimpan = $filename.'_'.time().'.'.$extension;
                // $validatedData['foto'] = $request->file('foto')->store('/editprofilguru2');
                // $newAlamat = $request->file('foto')->store('/editprofileguru2');
                $path = $request->file('foto')->store('fotoprofil','public');
                $newAlamat = $request->file('foto')->store('fotoprofil','public');
                // $request->foto='/storage/'.$path;
                
            }
            $data->update([
                'foto' => $validatedData['foto']=$newAlamat,
                'email' => $validatedData['email'],
                'nama' => $validatedData['nama'],
                'jenis_kelamin' => $validatedData['jenis_kelamin'],
                'tgl_lahir' => $validatedData['tgl_lahir'],
                'tempat_lahir' => $validatedData['tempat_lahir'],
                'alamat_tinggal' => $validatedData['alamat_tinggal'],
                'alamat_domisili' => $validatedData['alamat_domisili']
                ]);
        // ]);
            // if (session('success')) {
            //     Alert::success(session('success'));
            // }

        // return redirect()->back()->with('success', 'Created successfully!');
        return redirect('profil-guru');
    }

    //Siswa
    public function profilSiswa()
    {
        $pages = 'profilSiswa';
        return view('siswa.profil', [
            'pages' => $pages
        ]);
    }

    public function editProfilSiswa()
    {
        $pages = 'editProfilSiswa';
        return view('siswa.editProfil', [
            'pages' => $pages
        ]);
    }

    public function changePassword()
    {
        $pages = 'changePassword';
        return view('siswa.change-password', [
            'pages' => $pages
        ]);
    }

    public function updateProfilSiswa(Request $request)
    {   
        
    }

   /*  //     $fileNameWithExt    = $request->file('foto')->getClientOriginalName();
        //     $fileName           = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        //     $fileSize           = $request->file('foto')->getSize();
        //     $fileExt            = $request->file('foto')->getClientOriginalExtension();
        //     $fileNameNew        = uniqid('', true) . time() . '.' . $fileExt;

    // public function store(Request $request)
    // {
    //     $nm = $request->foto;
    //     $namaFile = $nm->getClientOriginalName();
    //         $dtUpload = new UserProfile;
    //         $dtUpload->foto = $namaFile;

    //         $nm->move(public_path().'/editprofilguru', $namaFile);
    //         $dtUpload->save();
        
    //     return redirect('profil-guru');
    // }

    // public function updateProfilGuru(Request $request, $nip)
    // {   
    //     DB::beginTransaction();
    //     try {
    //         Guru::where('NIP', $nip)->update([
    //             'NIP'=>$request->nip
    //         ]);
    //         DB::commit();
    //         return back()->with('success', "Berhasil mengubah data");
    //     } catch (\Throwable $th) {
    //         DB::rollback();
    //     }
        // DB::beginTransaction();
        // try {
        //     Guru::join('users', 'gurus.user', '=', 'users.uuid')->join('user_profiles', 'user_profiles.user', '=', 'users.uuid')->where('gurus.user', Auth::user()->uuid)->update([
        //         'NIP'=>$request->nip,
        //         'jabatan' => $request->jabatan
        //     ]);
        //     DB::commit();
        //     return back()->with('success', "Berhasil mengubah data");
        // } catch (\Throwable $th) {
        //     DB::rollback();
        // }
        // $gurus = Guru::join('users', 'gurus.user', '=', 'users.uuid')->join('user_profiles', 'user_profiles.user', '=', 'users.uuid')->where('gurus.user', Auth::user()->uuid)->first();
        // return view('guru.editprofile', [
        //     'pages' => $pages,
        // ]);
    // } */
    
}