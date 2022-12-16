{{-- Modal Prestasi --}}
<div wire:ignore.self class="modal fade text-left" id="createPrestasi" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel130" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-center bg-success">
                <h5 class="modal-title white" id="myModalLabel130">
                    Input Prestasi
                </h5>
            </div>
            <form class="form form-vertical" wire:submit.prevent="store()">
                @csrf
                <div class="form-body modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="siswa">NISN</label>
                                <div class="position-relative">
                                    <input name="siswa" type="text"
                                        class="form-control @error('siswa') is-invalid @enderror " placeholder="Siswa"
                                        id="siswa" wire:model.defer="siswa" disabled />
                                    <div class="form-control-icon">
                                        <i class="bi bi-file-earmark-person"></i>
                                    </div>
                                    @error('siswa')
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
                                <label for="jenis">Jenis Prestasi</label>
                                <div class="position-relative">
                                    <select class="choices form-control" id="jenis" name="jenis"
                                        wire:model.defer="jenis">
                                        <option value="Akademik">Akademik</option>
                                        <option value="NonAkademik">Non Akademik</option>
                                    </select>
                                    <div class="form-control-icon">
                                        <i class="bi bi-award"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="keterangan">Keterangan</label>
                                <div class="position-relative">
                                    <input name="keterangan" type="text"
                                        class="form-control @error('keterangan') is-invalid @enderror "
                                        placeholder="keterangan" id="keterangan" wire:model.defer="keterangan" />
                                    <div class="form-control-icon">
                                        <i class="bi bi-filter-square"></i>
                                    </div>
                                    @error('keterangan')
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
                                <label for="tgl_prestasi">Tanggal Prestasi</label>
                                <div class="position-relative">
                                    <input name="tgl_prestasi" type="date"
                                        class="form-control @error('tgl_prestasi') is-invalid @enderror "
                                        placeholder="Tanggal Prestasi" id="tgl_prestasi"
                                        wire:model.defer="tgl_prestasi" />
                                    <div class="form-control-icon">
                                        <i class="bi bi-calendar"></i>
                                    </div>
                                    @error('tgl_prestasi')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
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
