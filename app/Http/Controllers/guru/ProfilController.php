<?php

namespace App\Http\Controllers\guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Guru;
use Illuminate\Contracts\View\View;

class ProfilController extends Controller
{
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

    public function updateProfilGuru(Request $request, UserProfile $post)
    {   
        $id = auth()->user()->uuid;
        // dd($request->all());

        $data = Guru::where('user', $id);
        $data->update([
            'pendidikan' => $request->pendidikan,
            'tahun_ijazah' => $request->tahun_ijazah,
            'status_perkawinan' => $request->status_perkawinan,
        ]);
        $data = User::where('uuid', $id);
        // dd($id);


        $data->update([
            'username' => $request->username
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

            // $rules = [
            //     'foto' => 'image|file|max:255'
            // ];

            
            // $request->foto->move(public_path().'/editprofilguru');
            

            // if($request->slug != $id->slug){
            //     $rules['slug'] = 'required|unique:posts';
            // }
                        
            // $validatedData = $request->validate($rules);
            
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
                $fileName = $request->file('foto')->getClientOriginalName();
                $path = $request->file('foto')->storeAs('fotoprofil',   $fileName, 'public');
                $request->foto='/storage/'.$path;
                
            }
            $data->update([
                'foto' => $request->foto,
                'email' => $request->email,
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tgl_lahir' => $request->tgl_lahir,
                'tempat_lahir' => $request->tempat_lahir,
                ]);
        // ]);
        
        
        return redirect('profil-guru');
    }

    //     $fileNameWithExt    = $request->file('foto')->getClientOriginalName();
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
    // }
}