@extends('siswa.master.main')

@section('title')
    <title>Profil Siswa</title>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/simple-datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/shared/iconly.css') }}">
@endsection

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Edit Profil Siswa</h3>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="pt-3 px-3">
                            <form class="form form-horizontal">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Profile Picture</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input class="form-control" type="file" id="formFile">
                                        </div>
                                        <div class="col-md-3">
                                            <label>Username</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="nama" class="form-control" name="username"
                                                value="talithasya11" placeholder="Username">
                                        </div>
                                        <div class="col-md-3">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input value="Talithasyafiyah@gmail.com" type="text" id="nama"
                                                class="form-control" name="email" placeholder="Email">
                                        </div>
                                        <div class="col-md-3">
                                            <label>Nama</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="nama" class="form-control" name="nama"
                                                value="Talitha Syafiyah" placeholder="Nama">
                                        </div>
                                        <div class="col-md-3">
                                            <label>NISN</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="number" id="nis-id" class="form-control" name="nisn"
                                                value="213211402018" placeholder="NISN" disabled>
                                        </div>
                                        <div class="col-md-3">
                                            <label>NIS</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="number" id="nis-id" class="form-control" name="nis"
                                                value="211402018" placeholder="NIS" disabled>
                                        </div>

                                        <div class="col-md-3">
                                            <label>Tanggal Lahir</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="date" id="ttl" class="form-control" name="tanggallahir"
                                                value="11/12/2003" placeholder="Tanggal Lahir">
                                        </div>
                                        <div class="col-md-3">
                                            <label>Tempat Lahir</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="tempat" class="form-control" name="tempatlahir"
                                                value="Medan" placeholder="Tempat Lahir">
                                        </div>
                                        <div class="col-md-3">
                                            <label>Jenis Kelamin</label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Laki-Laki
                                            </label>
                                        </div>
                                        <div class="col-md-5 form-group">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault2" checked>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Perempuan
                                            </label>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Alamat Tinggal</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="tempat" class="form-control" name="alamat"
                                                value="Jl. Imam Bonjol Medan" placeholder="Alamat Tinggal">
                                        </div>
                                        <div class="col-md-3">
                                            <label>Alamat Domisili</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="tempat" class="form-control" name="alamatdom"
                                                value="Jl. Imam Bonjol, Padangsidimpuan Selatan"
                                                placeholder="Alamat Domisili">
                                        </div>
                                        <div class="col-md-3">
                                            <label>Tanggal Masuk</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="tempat" class="form-control" name="tglmasuk"
                                                value="21 Juni 2018" placeholder="Tanggal Masuk" disabled>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Kelas Awal</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="tempat" class="form-control" name="klsawal"
                                                value="VII-A (Tujuh)" placeholder="Kelas Awal" disabled>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Semester</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="tempat" class="form-control" name="sem"
                                                value="1" placeholder="Semester" disabled>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Agama</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="tempat" class="form-control" name="agama"
                                                value="Islam" placeholder="Agama">
                                        </div>
                                        <div class="col-md-3">
                                            <label>Anak ke</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="tempat" class="form-control" name="anak"
                                                value="1" placeholder="Anak ke">
                                        </div>
                                        <div class="col-md-3">
                                            <label>Status dalam Keluarga</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="tempat" class="form-control" name="status"
                                                value="Kandung" placeholder="Status dalam Keluarga">
                                        </div>
                                        <div class="col-md-3">
                                            <label>Nama Ayah</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="tempat" class="form-control" name="namaayah"
                                                value="Budiman" placeholder="Nama Ayah">
                                        </div>
                                        <div class="col-md-3">
                                            <label>Pekerjaan Ayah</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="tempat" class="form-control"
                                                name="pekerjaanayah" value="Wiraswasta" placeholder="Pekerjaan Ayah">
                                        </div>
                                        <div class="col-md-3">
                                            <label>Nama Ibu</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="tempat" class="form-control" name="namaibu"
                                                value="Siti" placeholder="Nama Ibu">
                                        </div>
                                        <div class="col-md-3">
                                            <label>Pekerjaan Ibu</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="tempat" class="form-control"
                                                name="pekerjaanibu" value="Ibu Rumah Tangga" placeholder="Pekerjaan Ibu">
                                        </div>
                                        <div class="col-md-3">
                                            <label>Alamat Orangtua</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="tempat" class="form-control" name="alamat"
                                                value="Jalan Dr. T. Mansur No.9, Padang Bulan "
                                                placeholder="Alamat Orangtua">
                                        </div>
                                        <div class="col-md-3">
                                            <label>Telepon Orangtua</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="tempat" class="form-control" name="tempat"
                                                value="081273737889" placeholder="Telepon Orangtua">
                                        </div>
                                        <div class="col-md-3">
                                            <label>Nama Wali</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="tempat" class="form-control" name="tempat"
                                                value="-" placeholder="Nama Wali">
                                        </div>
                                        <div class="col-md-3">
                                            <label>Pekerjaan Wali</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="tempat" class="form-control" name="tempat"
                                                value="-" placeholder="Pekerjaan Wali">
                                        </div>
                                        <div class="col-md-3">
                                            <label>Telepon Wali</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="tempat" class="form-control" name="tempat"
                                                value="-" placeholder="Telepon Wali">
                                        </div>
                                        <div class="form-group  px-3 pt-2 modal-footer">
                                            <a href="#" class="btn icon icon-left btn-danger m-3 px-3"><i
                                                    data-feather="x"></i>
                                                Cancel</a>
                                            <a href="#" class="btn icon icon-left btn-success px-3"><i
                                                    data-feather="check-circle"></i>
                                                Submit</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/js/pages/simple-datatables.js') }}"></script>
@endsection
