@extends('master.main')

@section('title')
    <title>Ekstrakulikuler Siswa</title>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/simple-datatables.css') }}">
    @livewireStyles
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>{{ Auth::user()->gurus->ekstrakurikulers->nama }}</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">

                    <a href="/">Dashboard </a>
                    </li>

                    <li class="breadcrumb-item active" aria-current="page">

                    </li>

                    <li class="breadcrumb-item active" aria-current="page">
                        Ekstrakulikuler Siswa
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    {{-- Info Card --}}
    @livewire('info-card-ekskul-siswa')

    <div class="card">
        <div class="card-header d-flex gap-2 align-items-center justify-content-between">
            <h5>List Ekstrakulikuler Siswa</h5>
            <div class="form-group">
                @livewire('create-modal-ekskul-siswa')
            </div>
        </div>
        <div class="card-body">
            @livewire('list-ekskul-siswa')
        </div>
    </div>

    @livewire('alert-ekskul-siswa')


    {{-- Modal Edit --}}
    {{-- @livewire('edit-modal-ekskul') --}}
@endsection

@section('script')
    <script>
        //Modal
        const createModal = new bootstrap.Modal('#createModal', {
            keyboard: false
        })
        // const editModal = new bootstrap.Modal('#editModal', {
        //     keyboard: false
        // })
        // const infoModal = new bootstrap.Modal('#infoModal', {
        //     keyboard: false
        // })
        // const deleteModal = new bootstrap.Modal('#deleteModal', {
        //     keyboard: false
        // }) 

        window.addEventListener('close-create-modal', event => {
            createModal.hide();
        });
        // window.addEventListener('edit-modal', event => {
        //     editModal.toggle();
        // });
        // window.addEventListener('info-modal', event => {
        //     infoModal.toggle();
        // })
        // window.addEventListener('delete-modal', event => {
        //     deleteModal.toggle();
        // })

        //Toast
        const insertToast = new bootstrap.Toast('#insertToast')
        const deleteToast = new bootstrap.Toast('#deleteToast')


        window.addEventListener('insert-alert', e => {
            insertToast.show()
        })

        window.addEventListener('delete-alert', e => {
            deleteToast.show()
        })
    </script>

    @livewireScripts
    <script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/js/pages/simple-datatables.js') }}"></script>
@endsection
