@extends('siswa.master.main')

@section('title')
    <title>Tagihan SPP</title>
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
                    <h3>Tagihan SPP</h3>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-12">
            <div class="card bg-danger">
                <div class="card-body">
                    <div class="row">
                        <h4 class="alert-heading text-light">Total Tagihan SPP</h4>
                        <h6 class="alert-heading text-light">Rp 10.000.000</h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header d-flex gap-2 align-items-center justify-content-between">
                <h5>Daftar Tagihan SPP</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Bulan</th>
                            <th>Tahun</th>
                            <th>Nominal</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Agustus</td>
                            <td>2022</td>
                            <td>Rp. 5.000.000,-</td>
                            <td>Belum Dibayar</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>September</td>
                            <td>2022</td>
                            <td>Rp. 5.000.000,-</td>
                            <td>Belum Dibayar</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/js/pages/simple-datatables.js') }}"></script>
@endsection
