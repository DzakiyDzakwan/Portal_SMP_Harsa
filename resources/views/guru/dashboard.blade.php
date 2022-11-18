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
                <div class="row mb-3">
                    {{-- Profil Singkat --}}
                    <div class="col-lg-8 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4>Profil Singkat</h4>
                                <div class="row">
                                    <div class="col-lg-3 col-md-12">
                                        <div class="pt-3">
                                            <img src="assets/images/Abby.jpg" class="rounded mx-auto d-block" alt="..." width="130">
                                        </div>
                                    </div>

                                    <div class="col-lg-9 col-md-12">
                                        <div class="pt-3">
                                            <table class="table mb-0">
                                                <tbody>
                                                    <tr>
                                                        <td>Nama</td>
                                                        <td>:</td>
                                                        <td>Abby Syafiyah</td>
                                                    </tr>
                                                    <tr>
                                                        <td>NIS</td>
                                                        <td>:</td>
                                                        <td>211402018</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jenis Kelamin</td>
                                                        <td>:</td>
                                                        <td>Perempuan</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tanggal Lahir</td>
                                                        <td>:</td>
                                                        <td>11/12/2003</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tempat Lahir</td>
                                                        <td>:</td>
                                                        <td>Medan</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
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
                                                <th>Mata Pelajaran</th>
                                                <th>Kelas</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Olimpiade Matematika</td>
                                                <td>Medali Perak</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Olimpiade Fisika</td>
                                                <td>Medali Emas</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Olimpiade Kimia</td>
                                                <td>Medali Perunggu</td>
                                            </tr>
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
            </div>
        </section>
    </div>
</div>
@endsection

@section('script')
<script src="{{asset('assets/extensions/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/js/pages/dashboard.js')}}"></script>
@endsection