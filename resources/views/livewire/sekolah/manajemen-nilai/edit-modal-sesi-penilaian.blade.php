<div>
    <!--Modal Edit Admin -->
    <div wire:ignore.self class="modal fade text-left" id="editModal" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel130" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning justify-content-center">
                    <h4 class="modal-title white " id="myModalLabel33">Edit Admin</h4>
                </div>
                <form class="form form-vertical" wire:submit.prevent="update">
                    @csrf
                    <div class="modal-body">
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="nama_sesi">Nama Sesi Pelajaran</label>
                                <div class="position-relative">
                                    <select wire:model.defer="nama_sesi" name="nama_sesi"
                                        class="form-select form-control" id="basicSelect">
                                        <option value="">Pilih Nama Sesi</option>
                                        <option value="uh1">Ujian Harian 1</option>
                                        <option value="uh2">Ujian Harian 2</option>
                                        <option value="uh3">Ujian Harian 3</option>
                                        <option value="uts">Ujian Tengah Semestrer</option>
                                        <option value="uas">Ujian Akhir Semestrer</option>
                                    </select>
                                    <div class="form-control-icon">
                                        <i class="bi bi-tags-fill"></i>
                                    </div>
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        This is invalid state.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="tahun_ajaran_aktif">Tahun Ajaran</label>
                                <div class="position-relative">
                                    <input name="tahun_ajaran_aktif" type="text"
                                        class="form-control @error('tahun_ajaran_aktif') is-invalid @enderror "
                                        placeholder="Tahun Ajaran" id="tahun_ajaran_aktif"
                                        wire:model.defer="tahun_ajaran_aktif" />
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
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="semester_aktif">Semester</label>
                                <div class="position-relative">
                                    <select wire:model.defer="semester_aktif" name="semester_aktif"
                                        class="form-select form-control" id="basicSelect">
                                        <option value="">Pilih Semester</option>
                                        <option value="Ganjil">Ganjil</option>
                                        <option value="Genap">Genap</option>
                                    </select>
                                    <div class="form-control-icon">
                                        <i class="bi bi-diagram-2"></i>
                                    </div>
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        This is invalid state.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="tanggal_mulai">Waktu Mulai</label>
                                <div class="position-relative">
                                    <input name="tanggal_mulai" type="datetime-local"
                                        class="form-control @error('tanggal_mulai') is-invalid @enderror "
                                        placeholder="tanggal_mulai" id="tanggal_mulai"
                                        wire:model.defer="tanggal_mulai" />
                                    <div class="form-control-icon">
                                        <i class="bi bi-hourglass-top"></i>
                                    </div>
                                    @error('tanggal_mulai')
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
                                <label for="tanggal_berakhir">Waktu Akhir</label>
                                <div class="position-relative">
                                    <input name="tanggal_berakhir" type="datetime-local"
                                        class="form-control @error('tanggal_berakhir') is-invalid @enderror "
                                        placeholder="tanggal_berakhir" id="tanggal_berakhir"
                                        wire:model.defer="tanggal_berakhir" />
                                    <div class="form-control-icon">
                                        <i class="bi bi-hourglass-bottom"></i>
                                    </div>
                                    @error('tanggal_berakhir')
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
