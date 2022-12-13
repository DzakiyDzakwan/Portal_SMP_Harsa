<div>
    {{-- button tambah --}}
    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#createModal">
        <i class="bi bi-plus-circle"></i> Tambah Siswa
    </button>

    {{-- modal tambah siswa --}}
    <div wire:ignore.self class="modal fade text-left" id="createModal" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel130" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success justify-content-center">
                    <h4 class="modal-title white " id="myModalLabel33">Tambah Siswa</h4>
                </div>
                <form class="form form-vertical" wire:submit.prevent="store">
                    @csrf
                    <div class="form-body modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="first-name-icon">Nama</label>
                                    <div class="position-relative">
                                        <input name="nama" type="text"
                                            class="form-control @error('nama') is-invalid @enderror " placeholder="Nama"
                                            id="first-name-icon" wire:model.defer="nama" />
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                        @error('nama')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="password-id-icon">NISN</label>
                                    <div class="position-relative">
                                        <input name="nisn" type="text"
                                            class="form-control @error('nisn') is-invalid @enderror " placeholder="NISN"
                                            id="password-id-icon" wire:model.defer="nisn" />
                                        <div class="form-control-icon">
                                            <i class="bi bi-file-earmark-person"></i>
                                        </div>
                                        @error('nisn')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="password-id-icon">NIS</label>
                                    <div class="position-relative">
                                        <input name="NIS" type="text"
                                            class="form-control @error('nis') is-invalid @enderror " placeholder="NIS"
                                            id="password-id-icon" wire:model.defer="nis" />
                                        <div class="form-control-icon">
                                            <i class="bi bi-file-earmark-person-fill"></i>
                                        </div>
                                        @error('nis')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="password-id-icon">Tanggal Masuk</label>
                                    <div class="position-relative">
                                        <input name="tanggal_masuk" type="date"
                                            class="form-control @error('tanggal_masuk') is-invalid @enderror "
                                            placeholder="Tanggal Masuk" id="tanggal_masuk"
                                            wire:model.defer="tanggal_masuk" />
                                        <div class="form-control-icon">
                                            <i class="bi bi-calendar"></i>
                                        </div>
                                        @error('tanggal_masuk')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="password-id-icon">Kelas</label>
                                    <div class="position-relative">
                                        <select name="kelas_id" class="form-select form-control" id="basicSelect"
                                            wire:model.defer="kelas_id">
                                            <option>Pilih Kelas</option>
                                            @foreach ($kelas as $k)
                                                <option value="{{ $k->kelas_id }}">{{ $k->nama_kelas }}</option>
                                            @endforeach
                                        </select>
                                        {{-- <input name="kelas_id" type="text" class="form-control @error('kelas_id') is-invalid @enderror "
                                            placeholder="Kelas" id="kelas_id" wire:model.defer="kelas_id" /> --}}
                                        <div class="form-control-icon">
                                            <i class="bi bi-person-video3"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="password-id-icon">Jenis Kelamin</label>
                                    <div class="position-relative">
                                        <select name="jenis_kelamin" class="form-select form-control" id="basicSelect"
                                            wire:model.defer="jenis_kelamin">
                                            <option>Pilih Jenis Kelamin</option>
                                            <option value="LK">Laki-Laki</option>
                                            <option value="PR">Perempuan</option>
                                        </select>
                                        {{-- <input name="jenis_kelamin" type="text" class="form-control @error('jenis_kelamin') is-invalid @enderror "
                                            placeholder="Jenis Kelamin" id="jenis_kelamin" wire:model.defer="jenis_kelamin" /> --}}
                                        <div class="form-control-icon">
                                            <i class="bi bi-people"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="button" class="btn btn-light-secondary me-1 mb-1"
                                    data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Close</span>
                                </button>
                                <button type="submit" class="btn btn-success me-1 mb-1" data-bs-dismiss="modal">
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
