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
                                        <input type="text" id="nama" class="form-control" name="nama"
                                            value="mutiayam" placeholder="Username">
                                    </div>
                                    <div class="col-md-3">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input value="Mutiahaha@gmail.com" type="text" id="nama"
                                            class="form-control" name="nama" placeholder="Email">
                                    </div>
                                    <div class="col-md-3">
                                        <label>Nama</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input type="text" id="nama" class="form-control" name="nama"
                                            value="Mutia Rahmah" placeholder="Nama">
                                    </div>
                                    <div class="col-md-3">
                                        <label>NIP</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input type="number" id="nis-id" class="form-control" name="nis-id"
                                            value="181716111413" placeholder="NISN" disabled>
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
                                        <label>Tanggal Lahir</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input type="date" id="ttl" class="form-control" name="ttl"
                                            value="30/03/1993" placeholder="Tanggal Lahir">
                                    </div>
                                    <div class="col-md-3">
                                        <label>Tempat Lahir</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input type="text" id="tempat" class="form-control" name="tempat"
                                            value="Binjai" placeholder="Tempat Lahir">
                                    </div>
                                    <div class="col-md-3">
                                        <label>Ijazah Tertinggi</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input type="text" id="pendidikan" class="form-control" name="pendidikan"
                                            value="S1 Ilmu Gelap" placeholder="Pendidikan">
                                    </div>
                                    <div class="col-md-3">
                                        <label>Tahun Ijazah</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input type="number" id="tahun" class="form-control" name="tahun"
                                            value="2003" placeholder="Tahun Ijazah">
                                    </div>
                                    <div class="col-md-3">
                                        <label>Status</label>
                                    </div>
                                    <div class="col-md-9 mb-1 form-group">
                                        <fieldset class="form-group">
                                            <select class="form-select" id="basicSelect" value="Menikah">
                                              <option selected>Menikah</option>
                                              <option>Belum Menikah</option>
                                              <option>Cerai</option>
                                              <option>Cerai Mati</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Jabatan</label>
                                    </div>
                                    <div class="col-md-9 mb-1 form-group">
                                        <fieldset class="form-group">
                                            <select class="form-select" id="basicSelect">
                                              <option>Kepala Sekolah</option>
                                              <option selected>Wakil Kepala Sekolah</option>
                                              <option>Wali Kelas 7</option>
                                              <option>Wali Kelas 8</option>
                                              <option>Wali Kelas 9</option>
                                              <option>Guru</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Tanggal Masuk</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input type="text" id="tglmsk" class="form-control" name="tglmsk"
                                            value="18-07-2008" placeholder="Tanggal Masuk" disabled>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Mata Pelajaran yang Diajarkan</label>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <div class="checkbox">
                                            <input type="checkbox" id="checkbox1" class="form-check-input"/>
                                                <label for="checkbox1">Pendidikan Agama dan Budi Pekerti</label><br>
                                            <input type="checkbox" id="checkbox2" class="form-check-input"/>
                                                <label for="checkbox2">Pend.Pancasila & Kewarganegaraan</label><br>
                                            <input type="checkbox" id="checkbox3" class="form-check-input"/>
                                                <label for="checkbox3">Bahasa Indonesia</label><br>
                                            <input type="checkbox" id="checkbox4" class="form-check-input" checked/>
                                                <label for="checkbox4">Bahasa Inggris</label><br>
                                            <input type="checkbox" id="checkbox5" class="form-check-input"/>
                                                <label for="checkbox5">Ilmu Pengetahuan Alam</label><br>
                                            <input type="checkbox" id="checkbox6" class="form-check-input"/>
                                                <label for="checkbox6">Ilmu Pengetahuan Sosial</label><br>
                                          </div>
                                    </div>
                                    <div class="col-md-5 form-group">
                                        <div class="checkbox">
                                            <input type="checkbox" id="checkbox7" class="form-check-input"/>
                                                <label for="checkbox7">Matematika</label><br>
                                            <input type="checkbox" id="checkbox8" class="form-check-input"/>
                                                <label for="checkbox8">Seni Budaya</label><br>
                                            <input type="checkbox" id="checkbox9" class="form-check-input"/>
                                                <label for="checkbox9">Pendidikan Jasmani, Olahraga dan Kesehatan</label><br>
                                            <input type="checkbox" id="checkbox10" class="form-check-input"/>
                                                <label for="checkbox10">Prakarya</label><br>
                                            <input type="checkbox" id="checkbox11" class="form-check-input"/>
                                                <label for="checkbox11">TinKom</label><br>
                                            <input type="checkbox" id="checkbox12" class="form-check-input" checked/>
                                                <label for="checkbox12">Bimbingan Konseling</label><br>
                                          </div>
                                    </div>
                                    <div class="form-group  px-3 pt-2 modal-footer">
                                        <a href="/profil-guru" class="btn icon icon-left btn-danger m-3 px-3"><i
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
<script src="{{asset('assets/extensions/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/js/pages/dashboard.js')}}"></script>
@endsection