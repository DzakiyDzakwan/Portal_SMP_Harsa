@extends('guru.master.main')

@section('title')
    <title>Profile Guru</title>
@endsection

@section('style')
<link rel="stylesheet" href="{{asset('assets/css/shared/iconly.css')}}">  
@endsection

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div
                class="col-12 col-md-6 order-md-1 order-last">
                <h3>My Profile</h3>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="pt-3 text-center">
                        <img src="assets/images/MingLee.jpg" class="rounded" alt="..." width="220">
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
                                            value="mutiayam666" placeholder="Username" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input value="Mutiahaha@gmail.com" type="text" id="nama"
                                            class="form-control" name="nama" placeholder="Email" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Nama</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input type="text" id="nama" class="form-control" name="nama"
                                            value="Mutia Rahmah" placeholder="Nama" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <label>NIP</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input type="number" id="nis-id" class="form-control" name="nis-id"
                                            value="181716111413" placeholder="NISN" readonly>
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
                                            value="30/03/1993" placeholder="Tanggal Lahir" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Tempat Lahir</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input type="text" id="tempat" class="form-control" name="tempat"
                                            value="Binjai" placeholder="Tempat Lahir" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Ijazah Tertinggi</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input type="text" id="pendidikan" class="form-control" name="pendidikan"
                                            value="S1 Ilmu Gelap" placeholder="Pendidikan" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Tahun Ijazah</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input type="text" id="tahun" class="form-control" name="tahun"
                                            value="2003" placeholder="Tahun Ijazah" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Status</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input type="text" id="status" class="form-control" name="status"
                                            value="Kawin" placeholder="Status Perkawinan" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Jabatan</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input type="text" id="jabatan" class="form-control" name="jabatan"
                                            value="Wakil Kepala Sekolah" placeholder="Jabatan" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Tanggal Masuk</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input type="text" id="tglmsk" class="form-control" name="tglmsk"
                                            value="18-07-2008" placeholder="Tanggal Masuk" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Mata Pelajaran yang Diajarkan</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input type="text" id="mapel" class="form-control" name="mapel"
                                            value="Bahasa Inggris, Bimbingan Konseling" placeholder="Mata Pelajaran" readonly>
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
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{asset('assets/extensions/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/js/pages/dashboard.js')}}"></script>
@endsection