@extends('guru.master.main')

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
                    <div class="row mb-3">
                        {{-- Profil Singkat --}}
                        <div class="col-lg-7 col-md-12">
                            <div class="card h-full">
                                <div class="card-body">
                                    <h4>Profil Singkat</h4>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-12">
                                            <div class="pt-3">
                                                <img src="{{ asset('storage/' . Auth::user()->user_profiles->foto) }}"
                                                    class="rounded d-block" alt="..." width="130">
                                            </div>
                                        </div>

                                        <div class="col-lg-8 col-md-12">
                                            <div class="pt-3">
                                                <table class="table mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <td>Nama</td>
                                                            <td>:</td>
                                                            <td>{{ Auth::user()->user_profiles->nama }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>NIP</td>
                                                            <td>:</td>
                                                            <td>{{ Auth::user()->gurus->NIP }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jenis Kelamin</td>
                                                            <td>:</td>
                                                            @if (Auth::user()->user_profiles->jenis_kelamin == 'LK')
                                                                <td>Laki-Laki</td>
                                                            @else
                                                                <td>Perempuan</td>
                                                            @endif

                                                        </tr>
                                                        <tr>
                                                            <td>Tempat/Tanggal Lahir</td>
                                                            <td>:</td>
                                                            @if (Auth::user()->user_profiles->tgl_lahir == null || Auth::user()->user_profiles->tempat_lahir == null)
                                                                <td>-</td>
                                                            @else
                                                                <td>
                                                                    {{ Auth::user()->user_profiles->tempat_lahir }}/{{ date('d M Y', strtotime(Auth::user()->user_profiles->tgl_lahir)) }}
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
                                                @if ($listKelas->isEmpty())
                                                @else
                                                    @foreach ($listKelas as $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $item->grade }}{{ $item->kelompok_kelas }}
                                                                {{ $item->nama_kelas }}</td>
                                                            <td>Bahasa Indonesia</td>
                                                            <td>
                                                                <div class="modal-danger me-1 mb-1 d-inline-block">
                                                                    <a class="btn btn-sm btn-primary"
                                                                        href="/kelas/{{ $item->kelas_id }}">
                                                                        <i class="bi bi-box-arrow-in-right"></i>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                </div>
            </section>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>
@endsection
