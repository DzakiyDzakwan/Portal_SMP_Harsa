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
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        {{-- Kelas VII --}}
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                Kelas VII
                            </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    {{-- body --}}
                                    <p><a href="/pilih-rapor-ganjil-7" style="color: inherit;">Semester Ganjil</a></p>
                                    </p><a href="/pilih-rapor-genap-7" style="color: inherit;">Semester Genap</a></p>
                                </div>
                            </div>
                        </div>
                        {{-- Kelas VIII --}}
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                Kelas VIII
                            </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    {{-- body --}}
                                    <p><a href="" style="color: inherit;">Semester Ganjil</a></p>
                                    </p><a href="" style="color: inherit;">Semester Genap</a></p>
                                </div>
                            </div>
                        </div>
                        {{-- Kelas IX --}}
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                Kelas IX
                            </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    {{-- body --}}
                                    <p><a href="" style="color: inherit;">Semester Ganjil</a></p>
                                    </p><a href="" style="color: inherit;">Semester Genap</a></p>
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