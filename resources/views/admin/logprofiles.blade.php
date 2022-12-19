@extends('admin.master.main')

@section('title')
    <title>Log Profile User</title>
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('assets/extensions/simple-datatables/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/pages/simple-datatables.css')}}">
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>History Log Profile User</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav
                aria-label="breadcrumb"
                class="breadcrumb-header float-start float-lg-end"
            >
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item Aktif" aria-current="page">
                        Log-Profile-User
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    {{-- Table --}}
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>uuid</th>
                        <th>Email</th>
                        <th>Nama</th>
                        <th>Alamat Tinggal</th>
                        <th>Alamat Domisili</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Kegiatan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logProfiles as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->user}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->nama}}</td>
                        <td>{{$item->alamat_tinggal}}</td>
                        <td>{{$item->alamat_domisili}}</td>
                        <td>{{$item->tempat_lahir}}</td>
                        <td>{{$item->tgl_lahir}}</td>
                        <td>{{$item->jenis_kelamin}}</td>
                        <td>{{$item->created_at}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('assets/extensions/simple-datatables/umd/simple-datatables.js')}}"></script>
    <script src="{{asset('assets/js/pages/simple-datatables.js')}}"></script>
@endsection
