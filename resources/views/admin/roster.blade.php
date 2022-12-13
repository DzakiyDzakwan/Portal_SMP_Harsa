@extends('admin.master.main')

@section('title')
    <title>Roster Kelas</title>
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('assets/extensions/simple-datatables/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/pages/simple-datatables.css')}}">
    @livewireStyles
@endsection

@section('content')
<div class="row">
    <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Data Roster Kelas</h3>
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
                    Roster Kelas
                </li>
            </ol>
        </nav>
    </div>
</div>
{{-- Total Roster --}}
@livewire('info-card-roster')

{{-- List Roster --}}
<div class="card">
    <div class="card-header d-flex gap-2 align-items-center justify-content-between">
        <h5>List Jadwal Mata Pelajaran</h5>
        <div class="form-group">
            @livewire('create-modal-roster')
        </div>
    </div>
    <div class="card-body">
        @livewire('list-roster')
    </div>
</div>

@livewire('alert-roster')

{{-- @foreach ($ekskuls as $e) --}}
{{-- Modal Edit --}}
<div
    class="modal fade text-left"
    id="update"
    tabindex="-1"
    role="dialog"
    aria-labelledby="myModalLabel130"
    aria-hidden="true"
>
    <div
        class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
        role="document"
    >
        <div class="modal-content">
            <div class="modal-header bg-success justify-content-center">
                <h4 class="modal-title white " id="myModalLabel33">Tambah Roster Kelas</h4>
            </div>
            <form class="form form-vertical" action="" method="POST">
                @csrf
                <div class="form-body modal-body">
                    <div class="row">
                        {{-- ID Roster Kelas --}}
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="ekskul_id">ID Roster Kelas</label>
                                <div class="position-relative">
                                    <input
                                        name="ekskul_id"
                                        type="text"
                                        class="form-control"
                                        placeholder="Masukkan ID Roster Kelas"
                                        id="ekskul_id"
                                        value=""
                                    />
                                    <div class="form-control-icon">
                                        <i class="bi bi-gear-wide-connected"></i>
                                    </div>
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        This is invalid state.
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Nama Roster Kelas --}}
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="fullname">Nama Roster Kelas</label>
                                <div class="position-relative">
                                    <input
                                        name="fullname"
                                        type="text"
                                        class="form-control"
                                        placeholder="Masukkan Nama Roster Kelas"
                                        id="fullname"
                                        value=""
                                    />
                                    <div class="form-control-icon">
                                        <i class="bi bi-command"></i>
                                    </div>
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        This is invalid state.
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Jadwal Ekskul --}}
                        <label for="jadwal">Jadwal Roster Kelas</label>
                        <div class="col-4">
                            <div class="form-group has-icon-left">
                                <label for="hari">Hari</label>
                                <div class="position-relative">
                                    <select name="hari" class="form-select form-control" id="basicSelect">
                                        <option value="senin">Senin</option>
                                        <option value="selasa">Selasa</option>
                                        <option value="rabu">Rabu</option>
                                        <option value="kamis">Kamis</option>
                                        <option value="jumat">Jumat</option>
                                        <option value="sabtu">Sabtu</option>
                                    </select>
                                    <div class="form-control-icon">
                                        <i class="bi bi-calendar2-day"></i>
                                    </div>
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        This is invalid state.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group has-icon-left">
                            <label for="start">Waktu Mulai</label>
                            <div class="position-relative">
                                <input
                                name="start"
                                type="time"
                                class="form-control"
                                placeholder="MasukkaJam yang Sesuai"
                                id="start"
                                value=""
                                />
                                <div class="form-control-icon">
                                    <i class="bi bi-hourglass-top"></i>
                                </div>
                                <div class="invalid-feedback">
                                    <i class="bx bx-radio-circle"></i>
                                    This is invalid state.
                                </div>
                            </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group has-icon-left">
                            <label for="end">Waktu Akhir</label>
                            <div class="position-relative">
                                <input
                                name="end"
                                type="time"
                                class="form-control"
                                placeholder="MasukkaJam yang Sesuai"
                                id="end"
                                value=""   
                                />
                                <div class="form-control-icon">
                                    <i class="bi bi-hourglass-bottom"></i>
                                </div>
                                <div class="invalid-feedback">
                                    <i class="bx bx-radio-circle"></i>
                                    This is invalid state.
                                </div>
                            </div>
                            </div>
                        </div>

                        {{-- Tempat --}}
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="tempat">Tempat</label>
                                <div class="position-relative">
                                    <input
                                        name="tempat"
                                        type="text"
                                        class="form-control"
                                        placeholder="Masukkan Lokasi Ekskul"
                                        id="tempat"
                                        value=""
                                    />
                                    <div class="form-control-icon">
                                        <i class="bi bi-geo-alt"></i>
                                    </div>
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        This is invalid state.
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        {{-- Kelas --}}
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="kelas">Kelas</label>
                                <div class="position-relative">
                                    <select name="kelas" class="form-select form-control" id="basicSelect">
                                        <option value="7">7 - Tujuh</option>
                                        <option value="8">8 - Delapan</option>
                                        <option value="9">9 - Sembilan</option>
                                    </select>
                                <div class="form-control-icon">
                                    <i class="bi bi-person-bounding-box"></i>
                                </div>
                                <div class="invalid-feedback">
                                    <i class="bx bx-radio-circle"></i>
                                    This is invalid state.
                                </div>
                            </div>
                            </div>
                            
                        </div>
                        
                        <div class="col-12 d-flex justify-content-end">
                            <button type="button" class="btn btn-light-secondary me-1 mb-1" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Close</span>
                            </button>
                            <button type="submit" class="btn btn-success me-1 mb-1">
                                Simpan
                            </button>
                        </div>
                    </div>
                </div>
            </form>            
        </div>
    </div>
</div>

{{-- Modal Delete --}}
<div
    class="modal fade text-left"
    id="delete"
    tabindex="-1"
    role="dialog"
    aria-labelledby="myModalLabel130"
    aria-hidden="true"
>
    <div
        class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
        role="document"
    >
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title white" id="myModalLabel130">
                    Hapus Ekskul
                </h5>
                <button
                    type="button"
                    class="close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                >
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">Apakah yakin menghapus data ekrttakurikuler?</div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-light-secondary"
                    data-bs-dismiss="modal"
                >
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
                <form action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <button
                        class="btn btn-danger ml-1"
                        data-bs-dismiss="modal"
                    >
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Yes</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

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
        // const inactiveModal = new bootstrap.Modal('#inactiveModal', {
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
        // window.addEventListener('edit-modal', event => {
        //     editModal.toggle();
        // });
        // window.addEventListener('info-modal', event => {
        //     infoModal.toggle();
        // });
        /* window.addEventListener('inactive-modal', event => {
            inactiveModal.toggle();
        }); */
        // window.addEventListener('restore-modal', event => {
        //     restoreModal.toggle();
        // })
        // window.addEventListener('delete-modal', event => {
        //     deleteModal.toggle();
        // })

        //Toast
        const insertToast = new bootstrap.Toast('#insertToast')
        const inactiveToast = new bootstrap.Toast('#inactiveToast')
        const updateToast = new bootstrap.Toast('#updateToast')
        const restoreToast = new bootstrap.Toast('#restoreToast')
        const deleteToast = new bootstrap.Toast('#deleteToast')


        window.addEventListener('insert-alert', e => {
            insertToast.show()
        })

        window.addEventListener('inactive-alert', e => {
            inactiveToast.show()
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
