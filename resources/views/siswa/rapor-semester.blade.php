@extends('siswa.master.main')

@section('title')
    <title>Rapor Semester</title>
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
                    <li class="breadcrumb-item"><a href="/pilih-rapor-ganjil-7">Pilih-rapor</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Rapor-semester</li>
                </ol>
            </nav>
            <div
                class="col-12 col-lg-12 col-md-6 order-md-1 order-last"
            >
                <h3>Rapor Semester</h3>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section class="row mt-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Rapor Semester Ganjil</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            {{-- Kelompok A --}}
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Mata Pelajaran</th>
                                        <th>KKM</th>
                                        <th>Nilai</th>
                                        <th>Predikat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="5" class="text-center">Kelompok A</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Agama Islam</td>
                                        <td>81</td>
                                        <td>93</td>
                                        <td>A</td>
                                    </tr> 
                                    <tr>
                                        <td>2</td>
                                        <td>Agama Islam</td>
                                        <td>81</td>
                                        <td>93</td>
                                        <td>A</td>
                                    </tr> 
                                    <tr>
                                        <td>3</td>
                                        <td>Agama Islam</td>
                                        <td>81</td>
                                        <td>93</td>
                                        <td>A</td>
                                    </tr> 
                                    <tr>
                                        <td>4</td>
                                        <td>Agama Islam</td>
                                        <td>81</td>
                                        <td>93</td>
                                        <td>A</td>
                                    </tr> 
                                    <tr>
                                        <td>5</td>
                                        <td>Agama Islam</td>
                                        <td>81</td>
                                        <td>93</td>
                                        <td>A</td>
                                    </tr> 
                                    <tr>
                                        <td>6</td>
                                        <td>Agama Islam</td>
                                        <td>81</td>
                                        <td>93</td>
                                        <td>A</td>
                                    </tr> 
                                    <tr>
                                        <td>7</td>
                                        <td>Agama Islam</td>
                                        <td>81</td>
                                        <td>93</td>
                                        <td>A</td>
                                    </tr> 
                                </tbody>
                            </table>
                            {{-- Kelompok B --}}
                            <table class="table table-bordered mt-4">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Mata Pelajaran</th>
                                        <th>KKM</th>
                                        <th>Nilai</th>
                                        <th>Predikat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="5" class="text-center">Kelompok B</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Agama Islam</td>
                                        <td>81</td>
                                        <td>93</td>
                                        <td>A</td>
                                    </tr> 
                                    <tr>
                                        <td>2</td>
                                        <td>Agama Islam</td>
                                        <td>81</td>
                                        <td>93</td>
                                        <td>A</td>
                                    </tr> 
                                    <tr>
                                        <td>3</td>
                                        <td>Agama Islam</td>
                                        <td>81</td>
                                        <td>93</td>
                                        <td>A</td>
                                    </tr> 
                                    <tr>
                                        <td>4</td>
                                        <td>Agama Islam</td>
                                        <td>81</td>
                                        <td>93</td>
                                        <td>A</td>
                                    </tr> 
                                </tbody>
                            </table>
                        </div>
                        <button class="btn btn-success btn-sm mt-2"><i class="bi bi-printer-fill"></i> &nbspCetak</button>
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