@extends('master.main')

@section('title')
    <title>Dashboard</title>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/shared/iconly.css') }}">
@endsection

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Dashboard</h3>
                </div>
            </div>
        </div>
        <div class="page-content">
            <section class="row">
                <div class="col-12">

                    {{-- TA dan Sesi Row --}}
                    <div class="row">
                        {{-- Tahun Ajaran Aktif --}}
                        <div class="col-6 col-lg-6 col-md-6">
                            <div class="card">
                                {{-- <div class="card-header py-1 px-2 d-flex justify-content-end">
                                    <button class="btn btn-success btn-sm">
                                        <i class="bi bi-box-arrow-in-down-right"></i>
                                    </button>
                                </div> --}}
                                <div class="card-body px-4 py-4-5">
                                    <div class="row justify-content-center">
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center">
                                            <h6 class="text-muted font-semibold">Tahun Ajaran Aktif</h6>
                                            <h6 class="font-extrabold mb-0">2022/2023</h6>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="card-footer py-1 px-2 text-end">
                                    <button class="btn btn-success btn-sm">
                                        <i class="bi bi-box-arrow-in-down-right"></i>
                                    </button>
                                </div> --}}
                            </div>
                        </div>
                        {{-- Sesi Penilaian Aktif --}}
                        <div class="col-6 col-lg-6 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row justify-content-center">
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center">
                                            <h6 class="text-muted font-semibold">Sesi Penilaian Aktif</h6>
                                            <h6 class="font-extrabold mb-0">Tidak Ada</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @hasanyrole('kepsek|wakepsek|admin')
                        {{-- Info Row --}}
                        <div class="row">
                            {{-- Total User --}}
                            <div class="col-6 col-lg-3 col-md-6">
                                <a href="/guru/user">
                                    <div class="card">
                                        <div class="card-body px-4 py-4-5">
                                            <div class="row">
                                                <div
                                                    class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center md-justify-content-start">
                                                    <div class="stats-icon red mb-2">
                                                        <div data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Total User">
                                                            <i class="bi bi-person-fill"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center md-text-start">
                                                    <h6 class="text-muted font-semibold">User</h6>
                                                    <h6 class="font-extrabold mb-0">{{ $jumlah['user'] }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            {{-- Total Admin --}}
                            <div class="col-6 col-lg-3 col-md-6">
                                <a href="/guru/admin">
                                    <div class="card">
                                        <div class="card-body px-4 py-4-5">
                                            <div class="row">
                                                <div
                                                    class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center md-justify-content-start">
                                                    <div class="stats-icon bg-warning mb-2">
                                                        <div data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Total Admin">
                                                            <i class="bi bi-person-fill"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center md-text-start">
                                                    <h6 class="text-muted font-semibold">Admin</h6>
                                                    <h6 class="font-extrabold mb-0">{{ $jumlah['admin'] }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            {{-- Total Guru --}}
                            <div class="col-6 col-lg-3 col-md-6">
                                <a href="/guru/guru">
                                    <div class="card">
                                        <div class="card-body px-4 py-4-5">
                                            <div class="row">
                                                <div
                                                    class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center md-justify-content-start">
                                                    <div class="stats-icon blue mb-2">
                                                        <div data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Total Guru">
                                                            <i class="bi bi-people-fill"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center md-text-start">
                                                    <h6 class="text-muted font-semibold">Guru</h6>
                                                    <h6 class="font-extrabold mb-0">{{ $jumlah['guru'] }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            {{-- Total Siswa --}}
                            <div class="col-6 col-lg-3 col-md-6">
                                <a href="/siswa">
                                    <div class="card">
                                        <div class="card-body px-4 py-4-5">
                                            <div class="row">
                                                <div
                                                    class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center md-justify-content-start">
                                                    <div class="stats-icon purple mb-2">
                                                        <div data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Total Siswa">
                                                            <i class="bi bi-people-fill"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center md-text-start">
                                                    <h6 class="text-muted font-semibold">Siswa</h6>
                                                    <h6 class="font-extrabold mb-0">{{ $jumlah['siswa'] }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            {{-- Total Role --}}
                            {{-- <div class="col-6 col-lg-3 col-md-6">
                                <a href="/guru/role">
                                    <div class="card">
                                        <div class="card-body px-4 py-4-5">
                                            <div class="row">
                                                <div
                                                    class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center md-justify-content-start">
                                                    <div class="stats-icon red mb-2">
                                                        <div data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Total Role">
                                                            <i class="bi bi-person-bounding-box"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center md-text-start">
                                                    <h6 class="text-muted font-semibold">Roles</h6>
                                                    <h6 class="font-extrabold mb-0">0</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div> --}}
                            {{-- Total Mata Pelajaran --}}
                            <div class="col-6 col-lg-3 col-md-6">
                                <a href="/guru/mata-pelajaran">
                                    <div class="card">
                                        <div class="card-body px-4 py-4-5">
                                            <div class="row">
                                                <div
                                                    class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center md-justify-content-start">
                                                    <div class="stats-icon red mb-2">
                                                        <div data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Total Mata Pelajaran">
                                                            <i class="bi bi-book-fill"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center md-text-start">
                                                    <h6 class="text-muted font-semibold">Mata Pelajaran</h6>
                                                    <h6 class="font-extrabold mb-0">{{ $jumlah['mapel'] }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            {{-- Total Kelas --}}
                            <div class="col-6 col-lg-3 col-md-6">
                                <a href="/guru/kelas">
                                    <div class="card">
                                        <div class="card-body px-4 py-4-5">
                                            <div class="row">
                                                <div
                                                    class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center md-justify-content-start">
                                                    <div class="stats-icon bg-warning mb-2">
                                                        <div data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Total Kelas">
                                                            <i class="bi bi-house-door-fill"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center md-text-start">
                                                    <h6 class="text-muted font-semibold">Kelas</h6>
                                                    <h6 class="font-extrabold mb-0">{{ $jumlah['kelas'] }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            {{-- Total Ekstrakulikuler --}}
                            <div class="col-6 col-lg-3 col-md-6">
                                <a href="/guru/ekstrakurikuler">
                                    <div class="card">
                                        <div class="card-body px-4 py-4-5">
                                            <div class="row">
                                                <div
                                                    class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center md-justify-content-start">
                                                    <div class="stats-icon blue mb-2">
                                                        <div data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Total Ekstrakulikuler">
                                                            <i class="bi bi-clipboard2-pulse-fill"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center md-text-start">
                                                    <h6 class="text-muted font-semibold">Ekstrakurikuler</h6>
                                                    <h6 class="font-extrabold mb-0">{{ $jumlah['ekskul'] }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endhasanyrole


                    {{-- Profil Row --}}
                    <div class="row">
                        {{-- Profil Singkat --}}
                        <div class="@hasrole('guru') col-lg-6 @endhasrole col-md-12 mb-4">
                            <div class="card h-full">
                                <div class="card-body">
                                    <h4>Profil Singkat</h4>
                                    <div class="row align-items-center">
                                        <div class="col-lg-3 col-md-12">
                                            <div class="pt-3">
                                                @if (Auth::user()->profiles->foto == null)
                                                    <img src="{{ asset('assets/images/faces/2.jpg') }}"
                                                        class="rounded @hasrole('guru') w-100 @else w-75 @endhasrole d-block"
                                                        alt="...">
                                                @else
                                                    <img src="{{ asset('storages/' . Auth::user()->profiles->foto) }}"
                                                        class="rounded w-100 d-block" alt="...">
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-lg-8 col-md-12">
                                            <div class="pt-3">
                                                <table class="table mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <td>Nama</td>
                                                            <td>:</td>
                                                            <td>{{ Auth::user()->profiles->nama }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>NUPTK</td>
                                                            <td>:</td>
                                                            <td>{{ Auth::user()->gurus->NUPTK }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jabatan</td>
                                                            <td>:</td>
                                                            @if (Auth::user()->gurus->jabatan === 'ks')
                                                                <td>Kepala Sekolah</td>
                                                            @elseif(Auth::user()->gurus->jabatan === 'wks')
                                                                <td>Wakil Kepala Sekolah</td>
                                                            @elseif(Auth::user()->gurus->jabatan === 'tu')
                                                                <td>Admin</td>
                                                            @else
                                                                <td>Guru</td>
                                                            @endif
                                                        </tr>
                                                        <tr>
                                                            <td>Tempat/Tanggal Lahir</td>
                                                            <td>:</td>
                                                            @if (Auth::user()->profiles->tgl_lahir == null || Auth::user()->profiles->tempat_lahir == null)
                                                                <td>-</td>
                                                            @else
                                                                <td>
                                                                    {{ Auth::user()->profiles->tempat_lahir }}/{{ date('d M Y', strtotime(Auth::user()->profiles->tgl_lahir)) }}
                                                                </td>
                                                            @endif
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @hasrole('guru')
                            {{-- Kelas yang dimasuki --}}
                            <div class="col-lg-6 col-md-12 mb-4">
                                <div class="card h-full">
                                    <div class="card-header ">
                                        <h4>Kelas Saya</h4>
                                    </div>
                                    <div class="card-body" style="max-height: 240px; overflow:auto;">
                                        <div class="table-responsive">
                                            <table class="table table-bordered mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Kelas</th>
                                                        <th>Mata Pelajaran</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td colspan="4" class="text-center">Tidak Ada kelas yang terdaftar
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endhasrole
                    </div>

                    @hasrole('guru')
                        {{-- Roster Row --}}
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Roster Pelajaran</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Hari</th>
                                                        <th>Kelas</th>
                                                        <th>Mata Pelajaran</th>
                                                        <th>Kelompok Mata Pelajaran</th>
                                                        <th>Jam Masuk</th>
                                                        <th>Jam Keluar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Senin</td>
                                                        <td>Ibnu Sina</td>
                                                        <td>Bahasa Indonesia</td>
                                                        <th>Wajib</th>
                                                        <td>13:00</td>
                                                        <td>15:00</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endhasrole

                </div>
            </section>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>
@endsection
