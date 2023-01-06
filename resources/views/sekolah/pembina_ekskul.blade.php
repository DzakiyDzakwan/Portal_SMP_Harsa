@extends('master.main')

@section('title')
    <title>Pembina Ekstrakulikuler</title>
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('assets/extensions/simple-datatables/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/pages/simple-datatables.css')}}">
    @livewireStyles
@endsection

@section('content')
<div class="row">
    <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Data Pembina Ekstrakulikuler</h3>
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first">
        <nav
            aria-label="breadcrumb"
            class="breadcrumb-header float-start float-lg-end"
        >
            <ol class="breadcrumb">

                    <a href="/">Dashboard </a>
                </li>
                
                <li class="breadcrumb-item active" aria-current="page">
                    
                </li>

                <li class="breadcrumb-item active" aria-current="page">
                    Pembina Ekstrakulikuler
                </li>
            </ol>
        </nav>
    </div>
</div>
{{-- Info Card --}}
@livewire('info-card-pembina-ekskul')

<div class="card">
    <div class="card-header d-flex gap-2 align-items-center justify-content-between">
        <h5>List Pembina Ekstrakulikuler</h5>
        <div class="form-group">
            @livewire('create-modal-pembina-ekskul') 
        </div>
    </div>
    <div class="card-body">
        @livewire('list-pembina-ekskul')
    </div>
</div>

@livewire('alert-pembina-ekskul')


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
    // const restoreModal = new bootstrap.Modal('#restoreModal', {
    //     keyboard: false
    // })
    // const deleteModal = new bootstrap.Modal('#deleteModal', {
    //     keyboard: false
    // }) 

    window.addEventListener('close-create-modal', event => {
        createModal.hide();
    });
    // window.addEventListener('restore-modal', event => {
    //     restoreModal.toggle();
    // })
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
    const inactiveToast = new bootstrap.Toast('#inactiveToast')
    const nonInactiveToast = new bootstrap.Toast('#nonInactiveToast')
    const updateToast = new bootstrap.Toast('#updateToast')
    const restoreToast = new bootstrap.Toast('#restoreToast')
    const deleteToast = new bootstrap.Toast('#deleteToast')


    window.addEventListener('insert-alert', e => {
        insertToast.show()
    })

    window.addEventListener('inactive-alert', e => {
        inactiveToast.show()
    })

    window.addEventListener('nonInactive-alert', e => {
        nonInactiveToast.show()
    })

    window.addEventListener('update-alert', e => {
        updateToast.show()
    })

    window.addEventListener('restore-alert', e => {
        restoreToast.show()
    })

    window.addEventListener('delete-alert', e => {
        deleteToast.show()
    })
</script>

@livewireScripts
    <script src="{{asset('assets/extensions/simple-datatables/umd/simple-datatables.js')}}"></script>
    <script src="{{asset('assets/js/pages/simple-datatables.js')}}"></script>
@endsection
