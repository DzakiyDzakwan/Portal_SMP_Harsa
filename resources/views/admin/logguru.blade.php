@extends('admin.master.main')

@section('title')
    <title>Log Guru</title>
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('assets/extensions/simple-datatables/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/pages/simple-datatables.css')}}">
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>History Log Guru</h3>
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
                        Log-Guru
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
                        <th>New_NIP</th>
                        <th>Old_NIP</th>
                        <th>New_Jabatan</th>
                        <th>Old_Jabatan</th>
                        <th>New_status</th>
                        <th>Old_status</th>
                        <th>New_WaliKelas</th>
                        <th>Old_WaliKelas</th>
                        <th>Keterangan</th>
                        <th>Created at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logGuru as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->user}}</td>
                            <td>{{$item->n_NIP}}</td>
                            <td>{{$item->o_NIP}}</td>
                            <td>{{$item->n_jabatan}}</td>
                            <td>{{$item->o_jabatan}}</td>
                            <td>{{$item->n_status_keaktifan}}</td>
                            <td>{{$item->o_status_keaktifan}}</td>
                            <td>{{$item->n_is_wali_kelas}}</td>
                            <td>{{$item->o_is_wali_kelas}}</td>
                            <td>{{$item->keterangan}}</td>
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
