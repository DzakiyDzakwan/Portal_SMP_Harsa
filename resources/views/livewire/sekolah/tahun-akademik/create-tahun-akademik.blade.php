<div>
    {{-- Button tambah --}}
    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#createModal">
        <i class="bi bi-plus-circle"></i> Tambah Tahun Ajaran
    </button>

    <!--Modal tambah roster -->
    <div wire:ignore.self class="modal fade text-left" id="createModal" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel130" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success justify-content-center">
                    <h4 class="modal-title white " id="myModalLabel33">Tambah Roster Kelas</h4>
                </div>
                <form class="form form-vertical" wire:submit.prevent="store">
                    @csrf
                    <div class="form-body modal-body">
                        <div class="row">
                            {{-- Tahun --}}
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="tahun_akademik">Tahun Ajaran</label>
                                    <div class="position-relative">
                                        <input name="tahun_akademik" type="text"
                                            class="form-control @error('tahun_akademik') is-invalid
                                        @enderror"
                                            placeholder="Masukkan Tahun Ajaran" id="tahun_akademik"
                                            wire:model.defer="tahun_akademik" />
                                        <div class="form-control-icon">
                                            <i class="bi bi-calendar-date"></i>
                                        </div>
                                        @error('tahun_akademik')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror

                                    </div>
                                </div>
                            </div>

                            {{-- Semester --}}
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="semester">Semester</label>
                                    <div class="position-relative">
                                        <select name="semester"
                                            class="form-select form-control @error('semester') is-invalid @enderror"
                                            id="basicSelect" wire:model.defer="semester">
                                            <option value="">Pilih Sesi</option>
                                            <option value="ganjil">Ganjil</option>
                                            <option value="genap">Genap</option>
                                        </select>
                                        <div class="form-control-icon">
                                            <i class="bi bi-clock"></i>
                                        </div>
                                        @error('semester')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror

                                    </div>
                                </div>
                            </div>

                            {{-- start --}}
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="start">Waktu Mulai</label>
                                    <div class="position-relative">
                                        <input name="start" type="datetime-local"
                                            class="form-control @error('start') is-invalid
                                        @enderror"
                                            placeholder="Waktu Mulai" id="start" wire:model.defer="start" />
                                        <div class="form-control-icon">
                                            <i class="bi bi-clock"></i>
                                        </div>
                                        @error('start')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- end --}}
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="end">Waktu Akhir</label>
                                    <div class="position-relative">
                                        <input name="end" type="datetime-local"
                                            class="form-control @error('end') is-invalid
                                        @enderror"
                                            placeholder="Waktu Akhir" id="end" wire:model.defer="end" />
                                        <div class="form-control-icon">
                                            <i class="bi bi-clock"></i>
                                        </div>
                                        @error('end')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 d-flex justify-content-end">
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
