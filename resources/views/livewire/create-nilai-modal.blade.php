<!--Nilai Modal -->
<div>
    <div class="modal modal-lg fade text-left" id="modalNilai" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
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
                    <div class="form-body modal-body">
                        <div class="row">
                            {{-- Siswa  --}}
                            <div class="col-6">
                                <div class="form-group has-icon-left">
                                    <label for="siswa">Siswa</label>
                                    <div class="position-relative">
                                        <input name="siswa" type="text"
                                            class="form-control @error('siswa')is-invalid @enderror"
                                            placeholder="Tidak ada siswa yang tersedia" id="siswa"
                                            wire:model="siswa" disabled />
                                        <div class="form-control-icon">
                                            <i class="bi bi-clock"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Sesi  --}}
                            <div class="col-6">
                                <div class="form-group has-icon-left">
                                    <label for="sesi">Sesi</label>
                                    <div class="position-relative">
                                        <input name="sesi" type="text"
                                            class="form-control @error('sesi')is-invalid @enderror"
                                            placeholder="Tidak ada sesi yang tersedia" id="sesi"
                                            wire:model="nama_sesi" disabled />
                                        <div class="form-control-icon">
                                            <i class="bi bi-clock"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Nilai Pengetahuan --}}
                            <div class="col-6">
                                <div class="form-group has-icon-left">
                                    <label for="nilai_p">Nilai
                                        Pengetahuan</label>
                                    <div class="position-relative">
                                        <input name="nilai_p" type="number"
                                            class="form-control @error('nilai_p') is-invalid @enderror"
                                            placeholder="Masukkan Nilai Pengetahuan" id="nilai_p"
                                            wire:model.defer="nilai_p" />
                                        <div class="form-control-icon">
                                            <i class="bi bi-123"></i>
                                        </div>
                                        @error('nilai_p')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror

                                    </div>
                                </div>
                            </div>

                            {{-- Nilai Keterampilan --}}
                            <div class="col-6">
                                <div class="form-group has-icon-left">
                                    <label for="nilai_k">Nilai
                                        Keterampilan</label>
                                    <div class="position-relative">
                                        <input name="nilai_k" type="number"
                                            class="form-control @error('nilai_k') is-invalid @enderror"
                                            placeholder="Masukkan Nilai Keterampilan" id="nilai_k"
                                            wire:model.defer="nilai_k" />
                                        <div class="form-control-icon">
                                            <i class="bi bi-123"></i>
                                        </div>
                                        @error('nilai_k')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror

                                    </div>
                                </div>
                            </div>

                            {{-- Deskripsi Pengetahuan --}}
                            <div class="col-6">
                                <div class="form-group has-icon-left">
                                    <label for="deskripsi_p">Deskripsi Pengetahuan</label>
                                    <div class="position-relative">
                                        <textarea class="form-control @error('deskripsi_p')is-invalid @enderror" placeholder="Masukkan Deskripsi Keterampilan"
                                            id="floatingTextarea" wire:model.defer="deskripsi_p"></textarea>
                                        <div class="form-control-icon">
                                            <i class="bi bi-card-text"></i>
                                        </div>
                                        @error('deskripsi_p')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- Deskripsi Keterampilan --}}
                            <div class="col-6">
                                <div class="form-group has-icon-left">
                                    <label for="deskripsi_k">Deskripsi Keterampilan</label>
                                    <div class="position-relative">
                                        <textarea class="form-control @error('deskripsi_k')is-invalid @enderror" placeholder="Masukkan Deskripsi Pengetahuan"
                                            id="floatingTextarea" wire:model.defer="deskripsi_k"></textarea>
                                        <div class="form-control-icon">
                                            <i class="bi bi-card-text"></i>
                                        </div>
                                        @error('deskripsi_k')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 d-flex justify-content-end">
                                <button type="button" class="btn btn-sm btn-light-secondary me-1 mb-1"
                                    data-bs-dismiss="modal">
                                    <span class="d-none d-sm-block">Close</span>
                                </button>
                                <button type="submit" class="btn btn-sm btn-success me-1 mb-1">
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
