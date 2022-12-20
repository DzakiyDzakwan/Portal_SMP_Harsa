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
            <div
                class="col-12 col-md-6 order-md-1 order-last"
            >
                <h3>Laporan Hasil Pembelajaran</h3>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab"
                                    aria-controls="home" aria-selected="true">Ganjil</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab"
                                    aria-controls="profile" aria-selected="false">Genap</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row mt-4">
                                    <div class="col-11">
                                        <select class="form-select" id="basicSelect">
                                            @foreach ($kontrak as $item)
                                                <option>{{ $item->sesi }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-1">
                                        <button type="submit" class="btn btn-success me-1 mb-1" data-bs-dismiss="modal">
                                            Pilih
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row mt-4">
                                    <div class="col-11">
                                        <select class="form-select" id="basicSelect">
                                            <option>UH 1</option>

                                        </select>
                                    </div>
                                    <div class="col-1">
                                        <button type="submit" class="btn btn-success me-1 mb-1" data-bs-dismiss="modal">
                                            Pilih
                                        </button>
                                    </div>
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