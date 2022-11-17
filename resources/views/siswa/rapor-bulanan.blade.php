@extends('siswa.master.main')

@section('title')
    <title>Rapor Bulanan</title>
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
                <h3>Rapor Bulanan</h3>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <p>Pilih rapor bulan berapa yang ingin dilihat.</p>
                        <fieldset class="form-group">
                            <select class="form-select" id="basicSelect">
                                <option>November</option>
                                <option>Oktober</option>
                                <option>September</option>
                                <option>Agustus</option>
                                <option>Juli</option>
                            </select>
                        </fieldset>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><h5>Rapor Bulan September</h5></div>
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