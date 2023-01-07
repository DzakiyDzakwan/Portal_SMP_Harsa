<div>
    {{-- Button Tambah --}}
    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#createModal">
        <i class="bi bi-plus-circle"></i> Tambah Kelas Aktif
    </button>
    {{-- Modal Tambah --}}
    <div wire:ignore.self class="modal fade text-left" id="createModal" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel130" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success justify-content-center">
                    <h4 class="modal-title white " id="myModalLabel33">Tambah Kelas Aktif</h4>
                </div>
                <form class="form form-vertical" wire:submit.prevent="store">
                    @csrf
                    <div class="form-body modal-body">
                        <div class="row">
                            {{-- ID Kelas Aktif --}}
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="kelas_aktif_id">ID Kelas Aktif</label>
                                    <div class="position-relative">
                                        <input name="kelas_aktif_id" type="text"
                                            class="form-control @error('kelas_aktif_id') is-invalid
                                        @enderror"
                                            placeholder="Masukkan ID Kelas Aktif" id="kelas_aktif_id"
                                            wire:model.defer="kelas_aktif_id" />
                                        <div class="form-control-icon">
                                            <i class="bi bi-gear-wide-connected"></i>
                                        </div>
                                        @error('kelas_aktif_id')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                             {{-- Nama Kelas --}}
                             <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="kelas">Nama Kelas</label>
                                    <div class="position-relative">
                                        <select name="kelas" 
                                        class="form-select form-control @error('kelas') is-invalid
                                        @enderror" id="basicSelect"
                                            wire:model.defer="kelas">
                                            <option>Pilih Kelas</option>
                                            @foreach ($kelasAktif as $k)
                                                <option value="{{ $k->kelas_id}}">{{ $k->nama_kelas }} - {{ $k->grade }}{{ $k->kelompok_kelas }}</option>
                                            @endforeach
                                        </select>
                                        <div class="form-control-icon">
                                            <i class="bi bi-book-fill"></i>
                                        </div>
                                        @error('kelas')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            {{-- Wali Kelas --}}
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="wali_kelas">Wali Kelas</label>
                                    <div class="position-relative">
                                        <select name="wali_kelas" class="form-select form-control @error('wali_kelas') is-invalid
                                        @enderror" id="basicSelect"
                                            wire:model.defer="wali_kelas">
                                            <option>Pilih Wali Kelas</option>
                                            @foreach ($gurus as $g)
                                                <option value="{{ $g->NUPTK }}">{{ $g->nama }}</option>
                                            @endforeach
                                        </select>
                                        <div class="form-control-icon">
                                            <i class="bi bi-book-fill"></i>
                                        </div>
                                        @error('wali_kelas')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            {{-- Tahun Ajaran --}}
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="tahun_ajaran_aktif">Tahun Ajaran</label>
                                    <div class="position-relative">
                                        <input name="tahun_ajaran_aktif" type="text"
                                            class="form-control @error('tahun_ajaran_aktif') is-invalid
                                        @enderror"
                                            placeholder="Masukkan ID Kelas Aktif" id="tahun_ajaran_aktif"
                                            wire:model.defer="tahun_ajaran_aktif" disabled/>
                                        <div class="form-control-icon">
                                            <i class="bi bi-calendar-week"></i>
                                        </div>
                                        @error('tahun_ajaran_aktif')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                             {{-- Nama Kelas --}}
                             {{-- <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="nama_kelas_aktif">Nama Kelas Aktif</label>
                                    <div class="position-relative">
                                        <input name="nama_kelas_aktif" type="text"
                                            class="form-control"
                                            id="nama_kelas_aktif"
                                            wire:model.defer="nama_kelas_aktif" disabled/>
                                        <div class="form-control-icon">
                                            <i class="bi bi-book-fill"></i>
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            This is invalid state.
                                        </div>
                                    </div>
                                </div>

                            </div> --}}

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

