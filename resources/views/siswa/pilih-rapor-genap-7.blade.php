@extends('siswa.master.main')

@section('title')
    <title>Pilih Rapor</title>
@endsection

@section('style')
<link rel="stylesheet" href="{{asset('assets/css/shared/iconly.css')}}">  
@endsection

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-right">
                    <li class="breadcrumb-item"><a href="/rapor">Rapor</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pilih-rapor</li>
                </ol>
            </nav>
            <div
                class="col-12 col-md-6 order-md-1 order-last"
            >
                <h3>Rapor Semester Genap</h3>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section class="row mt-3">
            <div class="col-xl-4 col-md-6 col-sm-12">
                <a href="/rapor-bulanan" style="color: inherit">
                    <div class="card">
                        <div class="card-content">
                            <img src="assets/images/pattern1.jpg" class="card-img-top img-fluid"
                                alt="singleminded">
                            <div class="card-body">
                                <h5 class="card-title">Rapor Bulanan</h5>
                                <p class="card-text" style="text-decoration: none">
                                    Rapor bulanan semester genap.
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-4 col-md-6 col-sm-12">
                <a href="/rapor-semester" style="color: inherit">
                    <div class="card">
                        <div class="card-content">
                            <img src="assets/images/pattern2.jpg" class="card-img-top img-fluid"
                                alt="singleminded">
                            <div class="card-body">
                                <h5 class="card-title">Rapor Semester</h5>
                                <p class="card-text" style="text-decoration: none">
                                    Rapor akhir semester genap.
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </section>
    </div>
</div>
@endsection

@section('script')
<script src="{{asset('assets/extensions/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/js/pages/dashboard.js')}}"></script>
@endsection