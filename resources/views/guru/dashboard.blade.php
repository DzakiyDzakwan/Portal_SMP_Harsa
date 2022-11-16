@extends('guru.master.main')

@section('title')
    <title>Dashboard</title>
@endsection

@section('style')
<link rel="stylesheet" href="{{asset('assets/css/shared/iconly.css')}}">  
@endsection

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div
                class="col-12 col-md-6 order-md-1 order-last"
            >
                <h3>Dashboard</h3>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <div class="row">
                    {{-- Info User --}}
                    <div class="col-6 col-lg-3 col-md-6">
                        <a href="/users">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div
                                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center md-justify-content-start"
                                        >
                                            <div class="stats-icon green mb-2">
                                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="User">
                                                    <i class="bi bi-people-fill"></i>
                                                </div>   
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center md-text-start">
                                            <h6 class="text-muted font-semibold">User</h6>
                                            <h6 class="font-extrabold mb-0">2</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    {{-- Info Siswa --}}
                    <div class="col-6 col-lg-3 col-md-6">
                        <a href="/siswa">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div
                                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center md-justify-content-start"
                                        >
                                            <div class="stats-icon green mb-2">
                                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Siswa">
                                                    <i class="bi bi-people-fill"></i>
                                                </div>   
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center md-text-start">
                                            <h6 class="text-muted font-semibold">Siswa</h6>
                                            <h6 class="font-extrabold mb-0">2</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    {{-- Info Guru --}}
                    <div class="col-6 col-lg-3 col-md-6">
                        <a href="/guru">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div
                                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center md-justify-content-start"
                                        >
                                            <div class="stats-icon green mb-2">
                                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Guru">
                                                    <i class="bi bi-people-fill"></i>
                                                </div>   
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center md-text-start">
                                            <h6 class="text-muted font-semibold">Guru</h6>
                                            <h6 class="font-extrabold mb-0">2</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    {{-- Info Kelas --}}
                    <div class="col-6 col-lg-3 col-md-6">
                        <a href="/kelas">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div
                                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center md-justify-content-start"
                                        >
                                            <div class="stats-icon green mb-2">
                                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Total Kelas">
                                                    <i class="bi bi-house-door-fill"></i>
                                                </div>   
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center md-text-start">
                                            <h6 class="text-muted font-semibold">Total Kelas</h6>
                                            <h6 class="font-extrabold mb-0">2</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    {{-- Info Mata Pelajaran --}}
                    <div class="col-6 col-lg-3 col-md-6">
                        <a href="/mapel">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div
                                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center md-justify-content-start"
                                        >
                                            <div class="stats-icon blue mb-2">
                                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Mata Pelajaran">
                                                    <i class="bi bi-people-fill"></i>
                                                </div>   
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center md-text-start">
                                            <h6 class="text-muted font-semibold">Mata Pelajaran</h6>
                                            <h6 class="font-extrabold mb-0">2</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    {{-- Info Ekstrakulikuler --}}
                    <div class="col-6 col-lg-3 col-md-6">
                        <a href="/ekskull">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div
                                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center md-justify-content-start"
                                        >
                                            <div class="stats-icon blue mb-2">
                                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Ekstrakulikuler">
                                                    <i class="bi bi-people-fill"></i>
                                                </div>   
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center md-text-start">
                                            <h6 class="text-muted font-semibold">Ekstrakulikuler</h6>
                                            <h6 class="font-extrabold mb-0">2</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Jumlah Siswa</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-profile-visit"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Detail Siswa</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Keterangan</th>
                                            <th>Laki-laki</th>
                                            <th>Perempuan</th>
                                            <th>Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Siswa Aktif</td>
                                            <td>19</td>
                                            <td>5</td>
                                            <td>24</td>
                                        </tr>
                                        <tr>
                                            <td>Alumni</td>
                                            <td>129</td>
                                            <td>50</td>
                                            <td>179</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Detail Guru</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Keterangan</th>
                                            <th>Laki-laki</th>
                                            <th>Perempuan</th>
                                            <th>Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Guru Aktif</td>
                                            <td>19</td>
                                            <td>5</td>
                                            <td>24</td>
                                        </tr>
                                        <tr>
                                            <td>Wali-Kelas</td>
                                            <td>129</td>
                                            <td>50</td>
                                            <td>179</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <div class="card-header">
                                <h4>Detail Kelas</h4>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Bar Chart</h4>
                            </div>
                            <div class="card-body">
                                <div id="bar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </section>
    </div>
</div>
@endsection

@section('script')
<script src="{{asset('assets/extensions/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/js/pages/dashboard.js')}}"></script>
@endsection