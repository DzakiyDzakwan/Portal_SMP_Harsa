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
                        @if ($gurus->foto)
                        <img src="{{ asset('storage/'. $gurus->foto) }}" class="rounded" alt="..." width="220">
                        @else
                        <img class="rounded">
                        @endif
                    </div>
                </div>
                <div class="col-9">
                    <div class="pt-3">
                        <form class="form form-horizontal" action="/profil-guru">
                            <div class="form-body">
                                <div class="row" id="{{$gurus->user}}">
                                    <div class="col-md-3">
                                        <label>Username</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input type="text" id="nama" class="form-control" name="nama"
                                            value="{{$gurus->username}}" placeholder="-" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input value="{{$gurus->email}}" type="text" id="nama"
                                            class="form-control" name="nama" placeholder="-" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Nama</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input type="text" id="nama" class="form-control" name="nama"
                                            value="{{$gurus->nama}}" placeholder="-" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <label>NIP</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input type="number" id="nis-id" class="form-control" name="nis-id"
                                            value="{{$gurus->NIP}}" placeholder="-" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Jenis Kelamin</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        @if ($gurus->jenis_kelamin == 'LK')
                                        <input type="text" id="jenis_kelamin" class="form-control"
                                            name="jenis_kelamin" value="Laki-Laki" placeholder="Jenis Kelamin" readonly>
                                        @else
                                        <input type="text" id="jenis_kelamin" class="form-control"
                                            name="jenis_kelamin" value="Perempuan" placeholder="Jenis Kelamin" readonly>
                                        @endif
                                    </div>
                                    <div class="col-md-3">
                                        <label>Tanggal Lahir</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input type="text" id="ttl" class="form-control" name="ttl"
                                            value="{{$gurus->tgl_lahir}}" placeholder="-" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Tempat Lahir</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input type="text" id="tempat" class="form-control" name="tempat"
                                            value="{{$gurus->tempat_lahir}}" placeholder="-" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Ijazah Tertinggi</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input type="text" id="pendidikan" class="form-control" name="pendidikan"
                                            value="{{$gurus->pendidikan}}" placeholder="-" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Tahun Ijazah</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input type="text" id="tahun" class="form-control" name="tahun"
                                            value="{{$gurus->tahun_ijazah}}" placeholder="-" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Status</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        @if ($gurus->status_perkawinan == 'Kawin')
                                        <input type="text" id="status" class="form-control" name="status"
                                            value="Menikah" placeholder="-" readonly>
                                        @else
                                        <input type="text" id="status" class="form-control" name="status"
                                            value="Belum Menikah" placeholder="-" readonly>
                                        @endif
                                    </div>
                                    <div class="col-md-3">
                                        <label>Jabatan</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                    @if ($gurus->jabatan == 'wks')
                                    <input type="text" id="jabatan" class="form-control" name="jabatan"
                                            value="Wakil Kepala Sekolah" placeholder="Jabatan" readonly>
                                    @elseif($gurus->jabatan == 'bk')
                                    <input type="text" id="jabatan" class="form-control" name="jabatan"
                                            value="Bimbingan Konseling" placeholder="Jabatan" readonly>
                                    @else
                                    <input type="text" id="jabatan" class="form-control" name="jabatan"
                                            value="Guru" placeholder="Jabatan" readonly>
                                    @endif
                                    </div>
                                    <div class="col-md-3">
                                        <label>Tanggal Masuk</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input type="text" id="tglmsk" class="form-control" name="tglmsk"
                                            value="{{$gurus->tanggal_masuk}}" placeholder="-" readonly>
                                    </div>
                                    <div class="my-4 pt-2">
                                        <a href="{{URL('/edit-profil-guru/'.$gurus->NIP.'/edit')}}"
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