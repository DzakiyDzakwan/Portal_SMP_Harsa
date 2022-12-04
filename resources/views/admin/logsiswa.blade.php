@extends('admin.master.main')

@section('title')
    <title>Log Siswa</title>
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('assets/extensions/simple-datatables/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/pages/simple-datatables.css')}}">
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>History Log Siswa</h3>
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
                        Log-Siswa
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
                        <th>User_id</th>
                        <th>NIS</th>
                        <th>New_NISN</th>
                        <th>Old_NISN</th>
                        <th>New_Kelas</th>
                        <th>Old_Kelas</th>
                        <th>New_Semester</th>
                        <th>Old_Semester</th>
                        <th>New_Status</th>
                        <th>Old_Status</th>
                        <th>Keterangan</th>
                        <th>Created_at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logSiswa as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->user}}</td>
                            <td>{{$item->NIS}}</td>
                            <td>{{$item->n_nisn}}</td>
                            <td>{{$item->o_nisn}}</td>
                            <td>{{$item->n_kelas}}</td>
                            <td>{{$item->o_kelas}}</td>
                            <td>{{$item->n_semester}}</td>
                            <td>{{$item->o_semester}}</td>
                            <td>{{$item->n_status}}</td>
                            <td>{{$item->o_status}}</td>
                            <td>{{$item->Keterangan}}</td>
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
