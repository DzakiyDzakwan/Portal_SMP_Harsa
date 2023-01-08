<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="pt-3 text-center">
            <img src="{{ asset('storage/fotoprofil/'. $siswa->foto) }}" class="rounded" alt="..." width="200">
        </div>
    </div>
    <div class="col-9">
        <div class="pt-3">
            <form class="form form-horizontal">
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-3">
                            <label>Username</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input type="text" id="nama" class="form-control" name="nama"
                                value="{{ $siswa->username }}" placeholder="Username" readonly>
                        </div>
                        <div class="col-md-3">
                            <label>Email</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input value="{{ $siswa->email }}" type="text" id="nama"
                                class="form-control" name="nama" placeholder="Email" readonly>
                        </div>
                        <div class="col-md-3">
                            <label>Nama</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input type="text" id="nama" class="form-control" name="nama"
                                value="{{ $siswa->nama }}" placeholder="Nama" readonly>
                        </div>
                        <div class="col-md-3">
                            <label>Kelas</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input type="text" id="kelas" class="form-control" name="kelas"
                                value="{{ $siswa->kelas }}" placeholder="kelas" readonly>
                        </div>
                        <div class="col-md-3">
                            <label>NISN</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input type="number" id="nis-id" class="form-control" name="nis-id"
                                value="{{ $siswa->NISN }}" placeholder="NISN" readonly>
                        </div>
                        <div class="col-md-3">
                            <label>NIS</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input type="number" id="nis-id" class="form-control" name="nis-id"
                                value="{{ $siswa->NIS }}" placeholder="NIS" readonly>
                        </div>
                        <div class="col-md-3">
                            <label>Jenis Kelamin</label>
                        </div>
                        <div class="col-md-9 form-group">
                            @if ($siswa->jenis_kelamin == "LK")
                                <input type="text" id="jenis_kelamin" class="form-control"
                                value="Laki - laki" name="jenis_kelamin" placeholder="Jenis Kelamin" readonly>
                            @else
                                <input type="text" id="jenis_kelamin" class="form-control"
                                value="Perempuan" name="jenis_kelamin" placeholder="Jenis Kelamin" readonly>
                            @endif
                        </div>
                        <div class="col-md-3">
                            <label>Tanggal Lahir</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input type="text" id="ttl" class="form-control" name="ttl"
                                value="{{ $siswa->tgl_lahir }}" placeholder="Tanggal Lahir" readonly>
                        </div>
                        <div class="col-md-3">
                            <label>Tempat Lahir</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input type="text" id="tempat" class="form-control" name="tempat"
                                value="{{ $siswa->tempat_lahir }}" placeholder="Tempat Lahir" readonly>
                        </div>
                        <div class="col-md-3">
                            <label>Alamat Tinggal</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input type="text" id="tempat" class="form-control" name="tempat"
                                value="{{ $siswa->alamat_tinggal }}" placeholder="Alamat Tinggal" readonly>
                        </div>
                        <div class="col-md-3">
                            <label>Alamat Domisili</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input type="text" id="tempat" class="form-control" name="tempat"
                                value="{{ $siswa->alamat_domisili }}"
                                placeholder="Alamat Domisili" readonly>
                        </div>
                        <div class="col-md-3">
                            <label>Tanggal Masuk</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input type="text" id="tempat" class="form-control" name="tempat"
                                value="{{ $siswa->tanggal_masuk }}" placeholder="Tanggal Masuk" readonly>
                        </div>
                        <div class="col-md-3">
                            <label>Kelas Awal</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input type="text" id="tempat" class="form-control" name="tempat"
                                value="{{ $siswa->kelas_awal }}" placeholder="Kelas Awal" readonly>
                        </div>
                        <div class="col-md-3">
                            <label>Anak ke</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input type="text" id="tempat" class="form-control" name="tempat"
                                value="{{ $siswa->anak_ke }}" placeholder="anak-ke" readonly>
                        </div>
                        <div class="col-md-3">
                            <label>Nama Ayah</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input type="text" id="tempat" class="form-control" name="tempat"
                                value="{{ $siswa->nama_ayah }}" placeholder="Nama Ayah" readonly>
                        </div>
                        <div class="col-md-3">
                            <label>Pekerjaan Ayah</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input type="text" id="tempat" class="form-control" name="tempat"
                                value="{{ $siswa->pekerjaan_ayah }}" placeholder="Pekerjaan Ayah" readonly>
                        </div>
                        <div class="col-md-3">
                            <label>Nama Ibu</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input type="text" id="tempat" class="form-control" name="tempat"
                                value="{{ $siswa->nama_ibu }}" placeholder="Nama Ibu" readonly>
                        </div>
                        <div class="col-md-3">
                            <label>Pekerjaan Ibu</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input type="text" id="tempat" class="form-control" name="tempat"
                                value="{{ $siswa->pekerjaan_ibu }}" placeholder="Pekerjaan Ibu" readonly>
                        </div>
                        <div class="col-md-3">
                            <label>Alamat Orangtua</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input type="text" id="tempat" class="form-control" name="tempat"
                                value="{{ $siswa->alamat_orangtua }}" placeholder="Alamat Orangtua" readonly>
                        </div>
                        <div class="col-md-3">
                            <label>Telepon Orangtua</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input type="text" id="tempat" class="form-control" name="tempat"
                                value="{{ $siswa->telepon_orangtua }}" placeholder="Telepon Orangtua" readonly>
                        </div>
                        <div class="col-md-3">
                            <label>Nama Wali</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input type="text" id="tempat" class="form-control" name="tempat"
                                value="{{ $siswa->nama_wali }}" placeholder="Nama Wali" readonly>
                        </div>
                        <div class="col-md-3">
                            <label>Pekerjaan Wali</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input type="text" id="tempat" class="form-control" name="tempat"
                                value="{{ $siswa->pekerjaan_wali }}" placeholder="Pekerjaan Wali" readonly>
                        </div>
                        <div class="col-md-3">
                            <label>Telepon Wali</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input type="text" id="tempat" class="form-control" name="tempat"
                                value="{{ $siswa->telepon_wali }}" placeholder="Telepon Wali" readonly>
                        </div>
                        
                        
                        <div class="my-4 pt-2">
                            <a href="/edit-profil-siswa"
                                class="btn icon icon-left btn-primary btn-lg btn-block"><i
                                    data-feather="edit"></i> Edit Profil</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>