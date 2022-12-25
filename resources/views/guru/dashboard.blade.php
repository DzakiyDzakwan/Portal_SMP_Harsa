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
                    <div class="row my-2">
                        {{-- Info User --}}
                        <div class="col-6 col-lg-3 col-md-6">
                            <a href="/users">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center md-justify-content-start">
                                                <div class="stats-icon green mb-2">
                                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="User">
                                                        <i class="bi bi-people-fill"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center md-text-start">
                                                <h6 class="text-muted font-semibold">User</h6>
                                                <h6 class="font-extrabold mb-0">0</h6>
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
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center md-justify-content-start">
                                                <div class="stats-icon green mb-2">
                                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Siswa">
                                                        <i class="bi bi-people-fill"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center md-text-start">
                                                <h6 class="text-muted font-semibold">Siswa</h6>
                                                <h6 class="font-extrabold mb-0">0</h6>
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
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center md-justify-content-start">
                                                <div class="stats-icon green mb-2">
                                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Guru">
                                                        <i class="bi bi-people-fill"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center md-text-start">
                                                <h6 class="text-muted font-semibold">Guru</h6>
                                                <h6 class="font-extrabold mb-0">0</h6>
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
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center md-justify-content-start">
                                                <div class="stats-icon green mb-2">
                                                    <div data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Total Kelas">
                                                        <i class="bi bi-house-door-fill"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center md-text-start">
                                                <h6 class="text-muted font-semibold">Total Kelas</h6>
                                                <h6 class="font-extrabold mb-0">0</h6>
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
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center md-justify-content-start">
                                                <div class="stats-icon blue mb-2">
                                                    <div data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Mata Pelajaran">
                                                        <i class="bi bi-people-fill"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center md-text-start">
                                                <h6 class="text-muted font-semibold">Mata Pelajaran</h6>
                                                <h6 class="font-extrabold mb-0">0</h6>
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
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center md-justify-content-start">
                                                <div class="stats-icon blue mb-2">
                                                    <div data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Ekstrakulikuler">
                                                        <i class="bi bi-people-fill"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center md-text-start">
                                                <h6 class="text-muted font-semibold">Ekstrakulikuler</h6>
                                                <h6 class="font-extrabold mb-0">0</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="row my-2">
                        {{-- Profil Singkat --}}
                        <div class="col-lg-7 col-md-12">
                            <div class="card h-full">
                                <div class="card-body">
                                    <h4>Profil Singkat</h4>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-12">
                                            <div class="pt-3">
                                                @if (Auth::user()->profiles->foto == null)
                                                    <img src="{{ asset('assets/images/faces/2.jpg') }}"
                                                        class="rounded w-100 d-block" alt="...">
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
                                                            <td>Jenis Kelamin</td>
                                                            <td>:</td>
                                                            @if (Auth::user()->profiles->jenis_kelamin === 'LK')
                                                                <td>Laki Laki</td>
                                                            @else
                                                                <td>Perempuan</td>
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
                        <div class="col-lg-5 col-md-12">
                            <div class="card h-full">
                                <div class="card-header ">
                                    <h4>Kelas yang dimasuki</h4>
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
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row my-2">
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
                </div>
            </section>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>
@endsection
