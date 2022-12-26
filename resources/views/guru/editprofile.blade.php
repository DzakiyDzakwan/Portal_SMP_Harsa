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
                        <form class="form form-horizontal" action="{{URL('/edit-profil-guru/')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-body">
                                <div class="row">
                                    {{-- @if ($data->foto)
                                    <div class="col-md-3">
                                        <label>My Profil Now </label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <img src="{{ asset('storage/'. $data->foto) }}" class="rounded d-block" alt="..." width="160px">
                                    </div>
                                    @else
                                    <img class="rounded">
                                    @endif --}}
                                    <div class="col-md-3">
                                        <label>Profile Picture</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input class="form-control @error('foto') is-invalid @enderror" type="file" id="foto" name="foto" value="{{$data->foto}}" onchange="previewImage()">
                                    </div>
                                    <div class="col-md-3">
                                        <label>Username</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input type="text" id="nama" class="form-control" name="username"
                                            value="{{$data->username}}" placeholder="-">
                                    </div>
                                    <div class="col-md-3">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input value="{{$data->email}}" type="text" id="nama"
                                            class="form-control" name="email" placeholder="-">
                                    </div>
                                    <div class="col-md-3">
                                        <label>Password</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input value="{{$data->password}}" type="password" id="password"
                                            class="form-control" name="password" placeholder="-">
                                    </div>
                                    <div class="col-md-3">
                                        <label>Nama</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input type="text" id="nama" class="form-control" name="nama"
                                            value="{{$data->nama}}" placeholder="-">
                                    </div>
                                    <div class="col-md-3">
                                        <label>NUPTK</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input type="number" id="nip" class="form-control" name="nip"
                                            value="{{$data->NUPTK}}" placeholder="-" disabled>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Jenis Kelamin</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <fieldset class="form-group">
                                            <select class="form-select" id="basicSelect"  name="jenis_kelamin">
                                                <option value="LK" @if ($data->jenis_kelamin=="LK") selected     
                                                @endif>Laki-Laki</option>
                                                <option value="PR" @if ($data->jenis_kelamin=="PR") selected     
                                                @endif>Perempuan</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Tanggal Lahir</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input type="date" id="ttl" class="form-control" name="tgl_lahir"
                                            value="{{$data->tgl_lahir}}" placeholder="-">
                                    </div>
                                    <div class="col-md-3">
                                        <label>Tempat Lahir</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input type="text" id="tempat" class="form-control" name="tempat_lahir"
                                            value="{{$data->tempat_lahir}}" placeholder="-">
                                    </div>
                                    <div class="col-md-3">
                                        <label>Alamat Tinggal</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input type="text" id="alamat_tinggal" class="form-control" name="alamat_tinggal"
                                            value="{{$data->alamat_tinggal}}" placeholder="-">
                                    </div>
                                    <div class="col-md-3">
                                        <label>Alamat Domisili</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input type="text" id="alamat_domisili" class="form-control" name="alamat_domisili"
                                            value="{{$data->alamat_domisili}}" placeholder="-">
                                    </div>
                                    <div class="col-md-3">
                                        <label>Ijazah Tertinggi</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input type="text" id="pendidikan" class="form-control" name="pendidikan"
                                            value="{{$data->pendidikan}}" placeholder="-">
                                    </div>
                                    <div class="col-md-3">
                                        <label>Tahun Ijazah</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input type="year" id="tahun" class="form-control" name="tahun_ijazah"
                                            value="{{$data->tahun_ijazah}}" placeholder="-">
                                    </div>
                                    <div class="col-md-3">
                                        <label>Status</label>
                                    </div>
                                    <div class="col-md-9 mb-1 form-group">
                                        <fieldset class="form-group">
                                            <select class="form-select" id="basicSelect"  name="status_perkawinan">
                                                <option value="Kawin" @if ($data->status_perkawinan=="Kawin") selected     
                                                @endif>Menikah</option>
                                                <option value="Tidak Kawin" @if ($data->status_perkawinan=="Belum Kawin") selected     
                                                @endif>Belum Menikah</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Jabatan</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        @if ($data->jabatan == 'wks')
                                        <input type="text" id="jabatan" class="form-control" name="jabatan"
                                                value="Wakil Kepala Sekolah" placeholder="Jabatan" disabled>
                                        @elseif($data->jabatan == 'bk')
                                        <input type="text" id="jabatan" class="form-control" name="jabatan"
                                                value="Bimbingan Konseling" placeholder="Jabatan" disabled>
                                        @else
                                        <input type="text" id="jabatan" class="form-control" name="jabatan"
                                                value="Guru" placeholder="Jabatan" disabled>
                                        @endif
                                    </div>
                                    <div class="col-md-3">
                                        <label>Tanggal Masuk</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input type="text" id="tglmsk" class="form-control" name="tanggal_masuk"
                                            value="{{$data->tanggal_masuk}}" placeholder="-" disabled>
                                    </div>
                                    <div class="form-group  px-3 pt-2 modal-footer">
                                        <a href="/profil-guru" class="btn icon icon-left btn-danger m-3 px-3"><i
                                                data-feather="x"></i>
                                            Cancel</a>

                                        <button id="success" type="submit" class="btn icon icon-left btn-success px-3"><i
                                            data-feather="check-circle"></i>
                                            Update
                                        </button>
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
<script>
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
<script src="{{asset('assets/extensions/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/js/pages/dashboard.js')}}"></script>
@endsection