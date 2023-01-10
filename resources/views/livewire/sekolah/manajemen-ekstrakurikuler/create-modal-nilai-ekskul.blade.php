{{-- modal create mapel --}}
<div class="modal fade text-left" id="modalNilai" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success justify-content-center">
                <h4 class="modal-title white" id="myModalLabel33">
                    Nilai
                </h4>
            </div>
            <form class="form form-vertical" wire:submit.prevent="store">
                @csrf
                <div class="modal-body">
                    <div class="col-12">
                        <div class="form-group has-icon-left">
                            <label for="siswa">Siswa</label>
                            <div class="position-relative">
                                <input name="siswa" type="text"
                                    class="form-control @error('siswa')is-invalid @enderror"
                                    placeholder="Tidak ada siswa yang tersedia" id="siswa" wire:model="siswa"
                                    disabled />
                                <div class="form-control-icon">
                                    <i class="bi bi-clock"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group has-icon-left">
                            <label for="nilai_e">Nilai Ekstrakurikuler</label>
                            <div class="position-relative">
                                <input name="nilai_e" type="number"
                                    class="form-control @error('nilai_e') is-invalid @enderror"
                                    placeholder="Masukkan Nilai " id="nilai_e" wire:model.defer="nilai_e" />
                                <div class="form-control-icon">
                                    <i class="bi bi-123"></i>
                                </div>
                                @error('nilai_e')
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
                            <label for="keterangan_e">Deskripsi</label>
                            <div class="position-relative">
                                <textarea class="form-control @error('keterangan_e')is-invalid @enderror" placeholder="Masukkan Deskripsi Keterampilan"
                                    id="floatingTextarea" wire:model.defer="keterangan_e"></textarea>
                                <div class="form-control-icon">
                                    <i class="bi bi-card-text"></i>
                                </div>
                                @error('keterangan_e')
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
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
            </form>
        </div>
    </div>
</div>
</div>
