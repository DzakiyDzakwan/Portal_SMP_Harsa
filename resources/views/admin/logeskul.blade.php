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
            <h3>History Log Ekstrakulikuler</h3>
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
                        Log-Ekskul
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
                        <th>Nama Ekskul</th>
                        <th>Penanggung Jawab</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                    
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Basket</td>
                        <td>Deni Sumargo</td>
                        <td>20/8/2010</td>
                        <td>
                            <span class="badge bg-success">Ditambahkan</span>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Futsal</td>
                        <td>Deni Putra</td>
                        <td>20/8/2010</td>
                        <td>
                            <span class="badge bg-warning">Update</span>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Futsal</td>
                        <td>Deni Putra</td>
                        <td>20/8/2010</td>
                        <td>
                            <span class="badge bg-danger">Dihapus</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('assets/extensions/simple-datatables/umd/simple-datatables.js')}}"></script>
    <script src="{{asset('assets/js/pages/simple-datatables.js')}}"></script>
@endsection
