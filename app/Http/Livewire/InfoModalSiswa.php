<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Prestasi;
use App\Models\LogActivity;
use Illuminate\Support\Facades\DB;

class InfoModalSiswa extends Component
{
    public $user, $nama, $nisn, $foto, $nis, $jk, $kelas, $status, $anak_ke, $n_ayah, $p_ayah, $n_ibu, $p_ibu, $alamat_ortu, $telp_ortu, $n_wali, $p_wali, $telp_wali, $prestasi, $prestasi_id, $jenis, $keterangan, $tgl_prestasi;

    protected $listeners = [
        'infoSiswa' => 'showSiswa'
    ];
    protected $rules = [
        'jenis' => 'required',
        'keterangan' => 'required|max:255' ,
        'tgl_prestasi' => 'required'
    ];

    public function updated($fields) {
        $this->validateOnly($fields);
    }

    public function render()
    {
        $this->prestasi = Prestasi::join('siswas', 'siswas.NISN', '=', 'prestasis.siswa')
        ->join('kontrak_semesters', 'kontrak_semesters.siswa', '=', 'siswas.NISN')
        ->join('kelas', 'kelas.kelas_id', '=', 'kontrak_semesters.kelas')
        ->where('siswas.NISN', $this->nisn)->get();

        return view('livewire.user.manajemen-akun.siswa.info-modal-siswa');
    }

    public function showSiswa($id)
    {
        $data = User::withTrashed()
        ->join('siswas', 'siswas.user', '=', 'users.uuid')
        ->join('user_profiles', 'user_profiles.user', '=', 'users.uuid')
        ->where('siswas.user', $id)->first();

        
        $data1 = Siswa::join('kontrak_semesters', 'kontrak_semesters.siswa', '=', 'siswas.NISN')
        ->join('kelas_aktifs', 'kelas_aktifs.kelas_aktif_id', '=', 'kontrak_semesters.kelas')
        ->where('siswas.user', $id)->first();

        //profil
        $this->user = $id;
        $this->nama = $data->nama;
        $this->nisn = $data->NISN;
        $this->nis = $data->NIS;
        $this->jk = $data->jenis_kelamin;
        $this->kelas = $data1->kelas_awal;
        $this->status = $data->status;

        //profil pribadi
        $this->anak_ke = $data->anak_ke;
        $this->foto = $data->foto;
        $this->n_ayah = $data->nama_ayah;
        $this->p_ayah = $data->pekerjaan_ayah;
        $this->n_ibu = $data->nama_ibu;
        $this->p_ibu = $data->pekerjaan_ibu;
        $this->alamat_ortu = $data->alamat_orangtua;
        $this->telp_ortu = $data->telepon_orangtua;
        $this->n_wali = $data->nama_wali;
        $this->p_wali = $data->pekerjaan_wali;
        $this->telp_wali = $data->telepon_wali;
        $this->dispatchBrowserEvent('info-modal');
    }

    public function getEditModal($id) {
        $data = $this->prestasi = Prestasi::where('prestasi_id', $id)->first();
        $this->prestasi_id = $data->prestasi_id;
        $this->jenis = $data->jenis_prestasi;
        $this->keterangan = $data->keterangan;
        $this->tgl_prestasi = $data->tanggal_prestasi;
        $this->dispatchBrowserEvent('info-modal');
        $this->dispatchBrowserEvent('edit-prestasi-modal');
    }

    public function update() {
        $this->validate([
            'jenis' => 'required',
            'keterangan' => 'required|max:255' ,
            'tgl_prestasi' => 'required'
        ]);

        DB::beginTransaction();
        try {
            Prestasi::where('prestasi_id', $this->prestasi_id)->update([
                'jenis_prestasi' => $this->jenis,
                'keterangan' => $this->keterangan,
                'tanggal_prestasi' => $this->tgl_prestasi
            ]);
    
            LogActivity::create([
                'actor' => auth()->user()->uuid,
                'action' => 'update',
                'at' => 'prestasis'
            ]);
            $this->dispatchBrowserEvent('update-prestasi-modal');
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
        }

        $this->dispatchBrowserEvent('edit-prestasi-modal');
        $this->dispatchBrowserEvent('info-modal');
    }

    public function closeEditModal() {
        $this->dispatchBrowserEvent('edit-prestasi-modal');
        $this->dispatchBrowserEvent('info-modal');
    }

    public function getDeleteModal($id) {
        $this->prestasi_id = $id;
        $this->dispatchBrowserEvent('info-modal');
        $this->dispatchBrowserEvent('delete-prestasi-modal');
    }

    public function delete() {
        Prestasi::where('prestasi_id', $this->prestasi_id)->delete();
        LogActivity::create([
            'actor' => auth()->user()->uuid,
            'action' => 'delete',
            'at' => 'prestasis'
        ]);
        $this->dispatchBrowserEvent('delete-prestasi-modal'); 
        $this->dispatchBrowserEvent('info-modal');
        $this->dispatchBrowserEvent('delete-prestasi-alert');
    }

    public function closeDeleteModal() {
        $this->dispatchBrowserEvent('delete-prestasi-modal'); 
        $this->dispatchBrowserEvent('info-modal');
    }


}
