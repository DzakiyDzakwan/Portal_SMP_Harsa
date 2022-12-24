<div>
    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#createModal">
        <i class="bi bi-plus-circle"></i> Tambah Guru
    </button>

    <!--Modal tambah Guru -->
    <div wire:ignore.self class="modal fade text-left" id="createModal" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success justify-content-center">
                    <h4 class="modal-title white" id="myModalLabel33">
                        Tambah Guru
                    </h4>
                </div>
                <form class="form form-vertical" wire:submit.prevent="store">
                    @csrf
                    <div class="form-body modal-body">
                        <div class="row">
                            {{-- Nama Lengkap --}}
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="nama">Nama Lengkap</label>
                                    <div class="position-relative">
                                        <input name="nama" type="text"
                                            class="form-control @error('nama') is-invalid
                                        @enderror"
                                            placeholder="Masukkan nama lengkap" id="nama"
                                            wire:model.defer="nama" />
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

                            {{-- Jenis Kelamin --}}
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <div class="position-relative">
                                        <select name="jenis_kelamin"
                                            class="form-select form-control @error('jenis_kelamin') is-invalid
                                        @enderror"
                                            id="basicSelect" wire:model.defer="jenis_kelamin">
                                            <option value="LK">Laki-Laki</option>
                                            <option value="PR">Perempuan</option>
                                        </select>
                                        <div class="form-control-icon">
                                            <i class="bi bi-gender-ambiguous"></i>
                                        </div>
                                        @error('jenis_kelamin')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            {{-- NIP --}}
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="nip">NIP</label>
                                    <div class="position-relative">
                                        <input name="nip" type="text"
                                            class="form-control @error('nip') is-invalid
                                        @enderror"
                                            placeholder="Masukkan NIP guru" id="nip" wire:model.defer="nip" />
                                        <div class="form-control-icon">
                                            <i class="bi bi-card-text"></i>
                                        </div>
                                        @error('nip')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            {{-- Jabatan --}}
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="jabatan">Jabatan</label>
                                    <div class="position-relative">
                                        <select name="jabatan"
                                            class="form-select form-control @error('jabatan') is-invalid
                                        @enderror"
                                            id="basicSelect" wire:model.defer="jabatan">
                                            <option value="wks">Wakil Kepala Sekolah</option>
                                            <option value="bk">Bimbingan Konseling</option>
                                            <option value="guru">Guru</option>
                                        </select>
                                        <div class="form-control-icon">
                                            <i class="bi bi-person-workspace"></i>
                                        </div>
                                        @error('jabatan')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            {{-- Tanggal Masuk --}}
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="tgl_masuk">Tanggal Masuk</label>
                                    <div class="position-relative">
                                        <input name="tgl_masuk" type="date"
                                            class="form-control @error('tgl_masuk') is-invalid
                                        @enderror"
                                            placeholder="Tanggal Masuk" id="tgl_masuk" wire:model.defer="tgl_masuk" />
                                        <div class="form-control-icon">
                                            <i class="bi bi-calendar"></i>
                                        </div>
                                        @error('tgl_masuk')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 d-flex justify-content-end">
                                <button type="button" class="btn btn-light-secondary me-1 mb-1"
                                    data-bs-dismiss="modal">
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
</div>
