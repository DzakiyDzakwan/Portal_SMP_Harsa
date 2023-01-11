<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="pt-3 text-center">
            <img src="{{ asset('storage/fotoprofil/'. $guru->foto) }}" class="rounded" alt="..." width="200">
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
                                value="{{ $guru->username }}" placeholder="Username" readonly>
                        </div>
                        <div class="col-md-3">
                            <label>Email</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input value="{{ $guru->email }}" type="text" id="nama"
                                class="form-control" name="nama" placeholder="Email" readonly>
                        </div>
                        <div class="col-md-3">
                            <label>Nama</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input type="text" id="nama" class="form-control" name="nama"
                                value="{{ $guru->nama }}" placeholder="Nama" readonly>
                        </div>
                        <div class="col-md-3">
                            <label>Jabatan</label>
                        </div>
                        <div class="col-md-9 form-group">
                            @if ($guru->jabatan == "ks")
                                <input type="text" id="jabatan" class="form-control" name="jabatan"
                                value="Kepala Sekolah" placeholder="kelas" readonly>
                            @elseif ($guru->jabatan == "wks")
                                <input type="text" id="jabatan" class="form-control" name="jabatan"
                                value="Wakil Kepala Sekolah" placeholder="kelas" readonly>
                            @else
                                <input type="text" id="jabatan" class="form-control" name="jabatan"
                                value="Guru" placeholder="kelas" readonly>   
                            @endif
                        </div>
                        <div class="col-md-3">
                            <label>NUPTK</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input type="number" id="NUPTK" class="form-control" name="NUPTK"
                                value="{{ $guru->NUPTK }}" placeholder="NUPTK" readonly>
                        </div>
                        <div class="col-md-3">
                            <label>Jenis Kelamin</label>
                        </div>
                        <div class="col-md-9 form-group">
                            @if ($guru->jenis_kelamin == "LK")
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
                                value="{{ $guru->tgl_lahir }}" placeholder="Tanggal Lahir" readonly>
                        </div>
                        <div class="col-md-3">
                            <label>Tempat Lahir</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input type="text" id="tempat" class="form-control" name="tempat"
                                value="{{ $guru->tempat_lahir }}" placeholder="Tempat Lahir" readonly>
                        </div>
                        <div class="col-md-3">
                            <label>Alamat Tinggal</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input type="text" id="tempat" class="form-control" name="tempat"
                                value="{{ $guru->alamat_tinggal }}" placeholder="Alamat Tinggal" readonly>
                        </div>
                        <div class="col-md-3">
                            <label>Alamat Domisili</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input type="text" id="tempat" class="form-control" name="tempat"
                                value="{{ $guru->alamat_domisili }}"
                                placeholder="Alamat Domisili" readonly>
                        </div>
                        <div class="col-md-3">
                            <label>Pendidikan</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input type="text" id="pendidikan" class="form-control" name="pendidikan"
                                value="{{ $guru->pendidikan }}" placeholder="Pendidikan" readonly>
                        </div>
                        <div class="col-md-3">
                            <label>Tahun Ijazah</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input type="text" id="tahun_ijazah" class="form-control" name="tahun_ijazah"
                                value="{{ $guru->tahun_ijazah }}" placeholder="Tahun Ijazah" readonly>
                        </div>
                        <div class="col-md-3">
                            <label>Status Perkawinan</label>
                        </div>
                        <div class="col-md-9 form-group">
                        @if ($guru->status_perkawinan == "kawin")
                            <input type="text" id="status" class="form-control"
                            value="Menikah" name="status" placeholder="status" readonly>
                        @else
                            <input type="text" id="status" class="form-control"
                            value="Belum Menikah" name="status" placeholder="status" readonly>
                        @endif
                        </div>
                        <div class="col-md-3">
                            <label>Tanggal Masuk</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input type="text" id="tempat" class="form-control" name="tempat"
                                value="{{ $guru->tanggal_masuk }}" placeholder="Tanggal Masuk" readonly>
                        </div>
                        <div class="my-4 pt-2">
                            <a href="/edit-profil-guru"
                                class="btn icon icon-left btn-primary btn-lg btn-block"><i
                                    data-feather="edit"></i> Edit Profil</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
