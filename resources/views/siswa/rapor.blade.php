@extends('master.main')

@section('title')
    <title>Laporan Hasil Pembelajaran</title>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/shared/iconly.css') }}">
    @livewireStyles
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Kelas 7</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Kelas
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Kelas 7
                    </li>
                </ol>
            </nav>
        </div>
    </div>


    {{-- Filter Card --}}
    @livewire('filter-card-rapot', ['grade' => $grade])

    <div class="row">
        @livewire('button-export-rapor')

        {{-- Pengetahuan --}}
        @livewire('list-table-pengetahuan', ['grade' => $grade])

        {{-- Keterampilan --}}
        @livewire('list-table-keterampilan', ['grade' => $grade])
    </div>
@endsection

@section('script')
    @livewireScripts
    <script src="{{ asset('assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>
@endsection
