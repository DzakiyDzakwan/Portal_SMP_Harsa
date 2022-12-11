@extends('admin.master.main')

@section('title')
    <title>Siswa</title>
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('assets/extensions/simple-datatables/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/pages/simple-datatables.css')}}">
    @livewireStyles
@endsection

@section('content')
<div class="row">
    <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Data Siswa</h3>
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first">
        <nav
            aria-label="breadcrumb"
            class="breadcrumb-header float-start float-lg-end"
        >
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Siswa
                </li>
            </ol>
        </nav>
    </div>
</div>
{{-- Info Card Siswa --}}
@livewire('info-card-siswa')

<div class="card">
    <div class="card-header d-flex gap-2 align-items-center justify-content-between">
        <h5>List Siswa</h5>
        <div class="form-group">
            {{-- Button Tambah User --}}
            @livewire('create-modal-siswa')
        </div>
    </div>
    <div class="card-body">
        {{-- List siswa --}}
        @livewire('list-siswa')
    </div>
</div>


{{-- Modal Preview --}}
@foreach ($siswas as $siswa)
<div
    class="modal fade text-left"
    id="info{{$siswa->user}}"
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
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel130">
                    Profil Siswa
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
            <div class="modal-body">
                {{-- Navigation --}}
                <ul class="nav nav-tabs justify-content-center align-items-center my-3" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab"
                            aria-controls="profile" aria-selected="false">Profil</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="profilePribadi-tab" data-bs-toggle="tab" href="#profilePribadi" role="tab"
                            aria-controls="profilePribadi" aria-selected="false">Profil Pribadi</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="prestasi-tab" data-bs-toggle="tab" href="#prestasi" role="tab"
                            aria-controls="prestasi" aria-selected="false">Prestasi</a>
                    </li>
                </ul>

                {{-- Image --}}
                <img src="assets/images/test.jpg" class="mx-auto d-block w-50 my-3" alt="...">

                {{-- Navigasi Content --}}
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <td class="p-1">Nama</td>
                                    <td class="p-1">:</td>
                                    <td class="p-1">{{ $siswa->nama }}</td>
                                </tr>
                                <tr>
                                    <td class="p-1">NISN</td>
                                    <td class="p-1">:</td>
                                    <td class="p-1">{{ $siswa->NISN }}</td>
                                </tr>
                                <tr>
                                    <td class="p-1">NIS</td>
                                    <td class="p-1">:</td>
                                    <td class="p-1">{{ $siswa->NIS }}</td>
                                </tr>
                                <tr>
                                    <td class="p-1">Jenis Kelamin</td>
                                    <td class="p-1">:</td>
                                    <td class="p-1">{{ $siswa->jenis_kelamin }}</td>
                                </tr>
                                <tr>
                                    <td class="p-1">Kelas Awal</td>
                                    <td class="p-1">:</td>
                                    <td class="p-1">{{ $siswa->kelas_awal }}</td>
                                </tr>
                                <tr>
                                    <td class="p-1">Semester</td>
                                    <td class="p-1">:</td>
                                    <td class="p-1">{{ $siswa->semester }}</td>
                                </tr>
                                <tr>
                                    <td class="p-1">Status Keaktifan</td>
                                    <td class="p-1">:</td>
                                    <td class="p-1">{{ $siswa->status }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="profilePribadi" role="tabpanel" aria-labelledby="profilePribadi-tab">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <td class="p-1">Nama</td>
                                    <td class="p-1">:</td>
                                    <td class="p-1">{{ $siswa->nama }}</td>
                                </tr>
                                <tr>
                                    <td class="p-1">Anak Ke</td>
                                    <td class="p-1">:</td>
                                    <td class="p-1">{{ $siswa->anak_ke }}</td>
                                </tr>
                                <tr>
                                    <td class="p-1">Nama Ayah</td>
                                    <td class="p-1">:</td>
                                    <td class="p-1">{{ $siswa->nama_ayah }}</td>
                                </tr>
                                <tr>
                                    <td class="p-1">Pekerjan Ayah</td>
                                    <td class="p-1">:</td>
                                    <td class="p-1">{{ $siswa->nama_ayah }}</td>
                                </tr>
                                <tr>
                                    <td class="p-1">Nama Ibu</td>
                                    <td class="p-1">:</td>
                                    <td class="p-1">{{ $siswa->nama_ibu }}</td>
                                </tr>
                                <tr>
                                    <td class="p-1">Pekerjaan Ibu</td>
                                    <td class="p-1">:</td>
                                    <td class="p-1">{{ $siswa->pekerjaan_ibu }}</td>
                                </tr>
                                <tr>
                                    <td class="p-1">Alamat Orangtua</td>
                                    <td class="p-1">:</td>
                                    <td class="p-1">{{ $siswa->alamat_orangtua }}</td>
                                </tr>
                                <tr>
                                    <td class="p-1">Telepon Orangtua</td>
                                    <td class="p-1">:</td>
                                    <td class="p-1">{{ $siswa->telepon_orangtua }}</td>
                                </tr>
                                <tr>
                                    <td class="p-1">Nama Wali</td>
                                    <td class="p-1">:</td>
                                    <td class="p-1">{{ $siswa->nama_wali }}</td>
                                </tr>
                                <tr>
                                    <td class="p-1">Pekerjaan Wali</td>
                                    <td class="p-1">:</td>
                                    <td class="p-1">{{ $siswa->pekerjaan_wali }}</td>
                                </tr>
                                <tr>
                                    <td class="p-1">Telepon Wali</td>
                                    <td class="p-1">:</td>
                                    <td class="p-1">{{ $siswa->telepon_wali }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="prestasi" role="tabpanel" aria-labelledby="data-prestasis">
                       <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Keterangan</th>
                                <th>Jenis</th>
                                <th>Tanggal</th>
                                <th>Semester</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $siswa->keterangan }}</td>
                                <td>{{ $siswa->jenis_prestasi }}</td>
                                <td>{{ $siswa->tanggal_prestasi }}</td>
                                <td>{{ $siswa->semester }}</td>
                            </tr>
                        </tbody>
                       </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-light-secondary"
                    data-bs-dismiss="modal"
                >
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection

@section('script')
    <script>
        const createModal = new bootstrap.Modal('#createModal', {
            keyboard: false
        })
        const updateModal = new bootstrap.Modal('#editModal', {
            keyboard: false
        })
        const inactiveModal = new bootstrap.Modal('#trashedUser', {
            keyboard: false
        })
        const restoreModal = new bootstrap.Modal('#restoreModal', {
            keyboard: false
        })
        const deleteModal = new bootstrap.Modal('#deleteModal', {
            keyboard: false
        })

        window.addEventListener('close-create-modal', event => {
            createModal.hide();
        });
        window.addEventListener('update-modal', event => {
            updateModal.toggle();
        })
        window.addEventListener('restore-modal', event => {
            restoreModal.toggle();
        })
        window.addEventListener('delete-modal', event => {
            deleteModal.toggle();
        })
        window.addEventListener('inactive-modal', event => {
            inactiveModal.toggle();
        })
    </script>
    @livewireScripts
    <script src="{{asset('assets/extensions/simple-datatables/umd/simple-datatables.js')}}"></script>
    <script src="{{asset('assets/js/pages/simple-datatables.js')}}"></script>
@endsection
