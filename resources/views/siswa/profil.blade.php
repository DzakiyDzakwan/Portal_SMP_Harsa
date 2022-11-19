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
                    <h3>Profil Siswa</h3>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="pt-3 text-center">
                            <img src="assets/images/Abby.jpg" class="rounded" alt="..." width="220">
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
                                                value="talithasya11" placeholder="Username" readonly>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input value="Talithasyafiyah@gmail.com" type="text" id="nama"
                                                class="form-control" name="nama" placeholder="Email" readonly>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Nama</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="nama" class="form-control" name="nama"
                                                value="Talitha Syafiyah" placeholder="Nama" readonly>
                                        </div>
                                        <div class="col-md-3">
                                            <label>NISN</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="number" id="nis-id" class="form-control" name="nis-id"
                                                value="213211402018" placeholder="NISN" readonly>
                                        </div>
                                        <div class="col-md-3">
                                            <label>NIS</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="number" id="nis-id" class="form-control" name="nis-id"
                                                value="211402018" placeholder="NIS" readonly>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Jenis Kelamin</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="jenis_kelamin" class="form-control"
                                                name="jenis_kelamin" value="Perempuan" placeholder="Jenis Kelamin" readonly>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Tanggal Lahir</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="ttl" class="form-control" name="ttl"
                                                value="11/12/2003" placeholder="Tanggal Lahir" readonly>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Tempat Lahir</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="tempat" class="form-control" name="tempat"
                                                value="Medan" placeholder="Tempat Lahir" readonly>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Alamat Tinggal</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="tempat" class="form-control" name="tempat"
                                                value="Jl. Imam Bonjol Medan" placeholder="Alamat Tinggal" readonly>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Alamat Domisili</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="tempat" class="form-control" name="tempat"
                                                value="Jl. Imam Bonjol, Padangsidimpuan Selatan"
                                                placeholder="Alamat Domisili" readonly>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Tanggal Masuk</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="tempat" class="form-control" name="tempat"
                                                value="21 Juni 2018" placeholder="Tanggal Masuk" readonly>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Kelas Awal</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="tempat" class="form-control" name="tempat"
                                                value="VII-A (Tujuh)" placeholder="Kelas Awal" readonly>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Semester</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="tempat" class="form-control" name="tempat"
                                                value="1" placeholder="Semester" readonly>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Agama</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="tempat" class="form-control" name="tempat"
                                                value="Islam" placeholder="Agama" readonly>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Anak ke</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="tempat" class="form-control" name="tempat"
                                                value="1" placeholder="Anak ke" readonly>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Status dalam Keluarga</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="tempat" class="form-control" name="tempat"
                                                value="Kandung" placeholder="Status dalam Keluarga" readonly>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Nama Ayah</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="tempat" class="form-control" name="tempat"
                                                value="Budiman" placeholder="Nama Ayah" readonly>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Pekerjaan Ayah</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="tempat" class="form-control" name="tempat"
                                                value="Wiraswasta" placeholder="Pekerjaan Ayah" readonly>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Nama Ibu</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="tempat" class="form-control" name="tempat"
                                                value="Siti" placeholder="Nama Ibu" readonly>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Pekerjaan Ibu</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="tempat" class="form-control" name="tempat"
                                                value="Ibu Rumah Tangga" placeholder="Pekerjaan Ibu" readonly>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Alamat Orangtua</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="tempat" class="form-control" name="tempat"
                                                value="Jalan Dr. T. Mansur No.9, Padang Bulan "
                                                placeholder="Alamat Orangtua" readonly>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Telepon Orangtua</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="tempat" class="form-control" name="tempat"
                                                value="081273737889" placeholder="Telepon Orangtua" readonly>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Nama Wali</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="tempat" class="form-control" name="tempat"
                                                value="-" placeholder="Nama Wali" readonly>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Pekerjaan Wali</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="tempat" class="form-control" name="tempat"
                                                value="-" placeholder="Pekerjaan Wali" readonly>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Telepon Wali</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" id="tempat" class="form-control" name="tempat"
                                                value="-" placeholder="Telepon Wali" readonly>
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
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/js/pages/simple-datatables.js') }}"></script>
@endsection
