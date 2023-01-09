@extends('master.main')

@section('title')
    <title>Ubah Password</title>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/simple-datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/shared/iconly.css') }}">
    @livewireStyles
@endsection

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Ubah Password</h3>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                @livewire('change-password-guru')
            </div>
        </div>
    </div>
    @livewire('alert-guru')
@endsection

@section('script')
<script>
    //Toast
    const passwordToast = new bootstrap.Toast('#passwordToast')

    window.addEventListener('password-alert', e => {
        passwordToast.show()
    })
</script>

@livewireScripts
    <script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/js/pages/simple-datatables.js') }}"></script>
@endsection
