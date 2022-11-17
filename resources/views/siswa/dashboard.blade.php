@extends('siswa.master.main')

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
                <div class="row mb-3">
                    <div class="col-12 col-lg-12 col-md-12">
                        <div class="alert alert-danger">
                            <h4 class="alert-heading">Tagihan SPP</h4>
                            <h6 class="alert-heading mb-3">Rp 2.250.000</h6>
                            <div class="col-12">
                                <div class="">
                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#inlineForm">
                                        Konfirmasi SPP
                                    </button>
                                    {{-- Modal --}}
                                    <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel33" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-success">
                                                    <h4 class="modal-title white" id="myModalLabel33">Konfirmasi SPP</h4>
                                                    <button type="button" class="close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <form action="#">
                                                    <div class="modal-body">
                                                        <label>Metode: </label>
                                                        <div class="form-group">
                                                            <input type="text" placeholder="Mata Pelajaran"
                                                                class="form-control">
                                                        </div>
                                                        <label>Bukti Pembayaran: </label>
                                                        <div class="form-group">
                                                            <input type="text" placeholder="Kelas"
                                                                class="form-control">
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
                                    <button class="btn btn-primary btn-sm">Lihat Tagihan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <h4>Profil Singkat</h4>
                            <div class="col-lg-3 col-md-6">
                                <div class="pt-3">
                                    <img src="assets/images/Abby.jpg" class="rounded" alt="..." width="160">
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="pt-3">
                                    <form class="form form-horizontal">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label>Nama</label>
                                                </div>
                                                <div class="col-md-9 form-group">
                                                    <input type="text" id="nama" class="form-control" name="nama"
                                                        placeholder="Talitha Syafiyah" readonly>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>NIS</label>
                                                </div>
                                                <div class="col-md-9 form-group">
                                                    <input type="number" id="nis-id" class="form-control" name="nis-id"
                                                        placeholder="211402018" readonly>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Jenis Kelamin</label>
                                                </div>
                                                <div class="col-md-9 form-group">
                                                    <input type="text" id="jenis_kelamin" class="form-control" name="jenis_kelamin"
                                                        placeholder="Perempuan" readonly>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Tanggal Lahir</label>
                                                </div>
                                                <div class="col-md-9 form-group">
                                                    <input type="text" id="ttl" class="form-control" name="ttl"
                                                        placeholder="11/12/2003" readonly>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Tempat Lahir</label>
                                                </div>
                                                <div class="col-md-9 form-group">
                                                    <input type="text" id="tempat" class="form-control" name="tempat"
                                                        placeholder="Medan" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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
                                <h6>Kelas VII</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th>Hari</th>
                                                <th>Jam Ke-</th>
                                                <th>Mata Pelajaran</th>
                                                <th>Jam Masuk</th>
                                                <th>Jam Keluar</th>
                                                <th>Nama Guru</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td rowspan="8">Senin</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Kimia</td>
                                                <td>07.15</td>
                                                <td>08.00</td>
                                                <td>Ali Akbar Sikumbang</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Matematika</td>
                                                <td>08.15</td>
                                                <td>08.55</td>
                                                <td>Ali Akbar Sikumbang</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Fisika</td>
                                                <td>08.55</td>
                                                <td>09.35</td>
                                                <td>Ali Akbar Sikumbang</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Sejarah</td>
                                                <td>09.35</td>
                                                <td>10.15</td>
                                                <td>Ali Akbar Sikumbang</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Sosiologi</td>
                                                <td>10.15</td>
                                                <td>10.35</td>
                                                <td>Ali Akbar Sikumbang</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Seni Budaya</td>
                                                <td>10.35</td>
                                                <td>11.15</td>
                                                <td>Ali Akbar Sikumbang</td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>Ekonomi</td>
                                                <td>11.15</td>
                                                <td>11.55</td>
                                                <td>Ali Akbar Sikumbang</td>
                                            </tr>
                                            {{-- Selasa --}}
                                            <tr>
                                                <td rowspan="8">Selasa</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Kimia</td>
                                                <td>07.15</td>
                                                <td>08.00</td>
                                                <td>Ali Akbar Sikumbang</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Matematika</td>
                                                <td>08.15</td>
                                                <td>08.55</td>
                                                <td>Ali Akbar Sikumbang</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Fisika</td>
                                                <td>08.55</td>
                                                <td>09.35</td>
                                                <td>Ali Akbar Sikumbang</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Sejarah</td>
                                                <td>09.35</td>
                                                <td>10.15</td>
                                                <td>Ali Akbar Sikumbang</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Sosiologi</td>
                                                <td>10.15</td>
                                                <td>10.35</td>
                                                <td>Ali Akbar Sikumbang</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Seni Budaya</td>
                                                <td>10.35</td>
                                                <td>11.15</td>
                                                <td>Ali Akbar Sikumbang</td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>Ekonomi</td>
                                                <td>11.15</td>
                                                <td>11.55</td>
                                                <td>Ali Akbar Sikumbang</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12">
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
                                                <th>Prestasi</th>
                                                <th>Peringkat</th>
                                                <th>Tahun</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Olimpiade Matematika</td>
                                                <td>Medali Perak</td>
                                                <td>2020</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Olimpiade Fisika</td>
                                                <td>Medali Emas</td>
                                                <td>2021</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Olimpiade Kimia</td>
                                                <td>Medali Perunggu</td>
                                                <td>2021</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
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
                                                <th>Waktu Selesai</th>
                                                <th>Tempat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Ansamble</td>
                                                <td>Sabtu</td>
                                                <td>14.00</td>
                                                <td>16.00</td>
                                                <td>Yaspendhar</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Tahsin</td>
                                                <td>Jumat</td>
                                                <td>14.00</td>
                                                <td>16.00</td>
                                                <td>Yaspendhar</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Pramuka</td>
                                                <td>Sabtu</td>
                                                <td>14.00</td>
                                                <td>16.00</td>
                                                <td>Taman Ahmad Yani</td>
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
<script src="{{asset('assets/extensions/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/js/pages/dashboard.js')}}"></script>
@endsection