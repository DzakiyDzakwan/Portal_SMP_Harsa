@extends('master.main')

@section('title')
    <title>Log Permission</title>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/simple-datatables.css') }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Log Permissions</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Log-Permission
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
                        <th>Permission Id</th>
                        <th>Nama</th>
                        <th>Guard Name</th>
                        <th>Tanggal Kegiatan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logPermission as $item)
                        <tr>
                            <td>{{ $item->permission_id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->guard_name }}</td>
                            <td>{{ $item->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/js/pages/simple-datatables.js') }}"></script>
@endsection
