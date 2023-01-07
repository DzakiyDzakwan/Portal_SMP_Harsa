@extends('master.main')

@section('title')
    <title>Dashboard Siswa</title>
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
                    <div class="row">
                        {{-- <div class="col-lg-12 col-md-12">
                             <div class="card bg-danger">
                                <div class="card-body">
                                    <div class="row">
                                        <h4 class="alert-heading text-light">Tagihan SPP</h4>
                                        <h6 class="alert-heading mb-3 text-light">Rp 2.250.000</h6>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 mt-2">
                                            <a href="/tagihan-spp" class="btn btn-primary btn-sm"><i
                                                    class="bi bi-card-list"></i>
                                                &nbspDaftar Tagihan</a>
                                        </div>
                                        <div class="col-lg-6 col-md-12 mt-2">
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#inlineForm">
                                                <i class="bi bi-file-check"></i> &nbspKonfirmasi SPP
                                            </button>
                                            
                                            {{-- <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog"
                                                aria-labelledby="myModalLabel33" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                    role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary">
                                                            <h4 class="modal-title white" id="myModalLabel33">Konfirmasi SPP
                                                            </h4>
                                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                                aria-label="Close">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                        <form action="#">
                                                            <div class="modal-body">
                                                                <label>Metode Pembayaran: </label>
                                                                <div class="form-group">
                                                                    <input type="text" placeholder="Metode Pembayaran"
                                                                        class="form-control">
                                                                </div>
                                                                <label>Bukti Pembayaran: </label>
                                                                <div class="form-group">
                                                                    <input class="form-control" type="file"
                                                                        id="formFile">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light-secondary"
                                                                    data-bs-dismiss="modal">
                                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Tutup</span>
                                                                </button>
                                                                <button type="button" class="btn btn-success ml-1"
                                                                    data-bs-dismiss="modal">
                                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Simpan</span>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        {{-- Profil Singkat --}}
                        <div class=" col-lg-6 mb-4">
                            <div class="card h-full">
                                <div class="card-body">
                                    <h4>Profil Singkat</h4>
                                    <div class="row align-items-center">
                                        <div class="col-md-4">
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
                                                            <td>NISN</td>
                                                            <td>:</td>
                                                            <td>{{ Auth::user()->siswas->NISN }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>NIS</td>
                                                            <td>:</td>
                                                            <td>{{ Auth::user()->siswas->NIS }}</td>
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
                    </div>

                    {{-- Roster --}}
                    {{-- <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Roster Pelajaran</h4>
                                    <h6>Kelas VII</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Hari</th>
                                                    <th>Mata Pelajaran</th>
                                                    <th>Jam Masuk</th>
                                                    <th>Jam Keluar</th>
                                                    <th>Nama Guru</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($roster as $item)
                                                    <tr>
                                                        <td>{{ $item->hari }}</td>
                                                        <td>{{ $item->nama_mapel }}</td>
                                                        <td>{{ $item->waktu_mulai }}</td>
                                                        <td>{{ $item->waktu_akhir }}</td>
                                                        <td>{{ $item->nama }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    {{-- </div> --}}

                    {{-- Prestasi --}}
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Prestasi</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Keterangan</th>
                                                    <th>Jenis</th>
                                                    <th>Tanggal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($prestasi->isEmpty())
                                                    <tr>
                                                        <td class="text-center" colspan="4">Tidak Ada List</td>
                                                    </tr>
                                                @else
                                                    @foreach ($prestasi as $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $item->keterangan }}</td>
                                                            <td>{{ $item->jenis_prestasi }}</td>
                                                            <td>{{ date('d M Y'), strtotime($item->tanggal_prestasi) }}
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

                        {{-- <div class="col-lg-6 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Ekstrakurikuler</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Ekskul</th>
                                                    <th>Hari</th>
                                                    <th>Waktu Mulai</th>
                                                    <th>Durasi</th>
                                                    <th>Tempat</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($ekskul as $e)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $e->nama }}</td>
                                                    <td>{{ $e->hari }}</td>
                                                    <td>{{ $e->waktu_mulai }}</td>
                                                    <td>{{ $e->durasi }} menit</td>
                                                    <td>{{ $e->tempat }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
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
