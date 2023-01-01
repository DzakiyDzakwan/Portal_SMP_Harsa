<div>
    {{-- Modal Edit kelas --}}
    <div wire:ignore.self class="modal fade text-left" id="editModal" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h4 class="modal-title white" id="myModalLabel33">
                        Edit Mata Pelajaran
                    </h4>
                </div>
                <form class="form form-vertical" wire:submit.prevent="update">
                    @csrf
                    <div class="form-body modal-body">
                        <div class="row">
                            {{-- Id mapel --}}
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="mapel_id">ID Mata Pelajaran</label>
                                    <div class="position-relative">
                                        <input disabled name="mapel_id" type="text"
                                            class="form-control @error('mapel_id') is-invalid @enderror "
                                            placeholder="ID Mata Pelajaran" id="mapel_id"
                                            wire:model.defer="mapel_id" />
                                        <div class="form-control-icon">
                                            <i class="bi bi-journal-bookmark"></i>
                                        </div>
                                        @error('mapel_id')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            {{-- Nama mapel --}}
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="nama_mapel">Nama Mata Pelajaran</label>
                                    <div class="position-relative">
                                        <input name="nama_mapel" type="text"
                                            class="form-control @error('nama_mapel') is-invalid @enderror "
                                            placeholder="Nama Mata Pelajaran" id="nama_mapel"
                                            wire:model.defer="nama_mapel" />
                                        <div class="form-control-icon">
                                            <i class="bi bi-book-half"></i>
                                        </div>
                                        @error('nama_mapel')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            {{-- kelompok mapel --}}
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="kelompok_mapel">Kelompok Mata Pelajaran</label>
                                    <div class="position-relative">
                                        <select wire:model.defer="kelompok_mapel" name="kelompok_mapel"
                                            class="form-select form-control" id="basicSelect">
                                            <option value="">Pilih Kelompok Mata Pelajaran</option>
                                            <option value="A">Wajib</option>
                                            <option value="B">Peminatan</option>
                                        </select>
                                        <div class="form-control-icon">
                                            <i class="bi bi-grid"></i>
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            This is invalid state.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- kkm --}}
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="kkm">KKM</label>
                                    <div class="position-relative">
                                        <input name="kkm" type="number"
                                            class="form-control @error('kkm') is-invalid @enderror " id="kkm"
                                            wire:model.defer="kkm" />
                                        <div class="form-control-icon">
                                            <i class="bi bi-sort-down"></i>
                                        </div>
                                        @error('kkm')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            {{-- kurikulum --}}
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="kurikulum">Kurikulum</label>
                                    <div class="position-relative">
                                        <input disabled name="kurikulum" type="text"
                                            class="form-control @error('kurikulum') is-invalid @enderror "
                                            id="kurikulum" wire:model.defer="kurikulum" />
                                        <div class="form-control-icon">
                                            <i class="bi bi-layers"></i>
                                        </div>
                                        @error('kurikulum')
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
                                <button type="submit" class="btn btn-success me-1 mb-1" wire:click="update()">
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
