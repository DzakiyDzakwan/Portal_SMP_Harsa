<div>
    {{-- Modal Edit Ekstrakurikuler --}}
    <div wire:ignore.self class="modal fade text-left" id="editModal" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel130" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning justify-content-center">
                    <h4 class="modal-title white " id="myModalLabel33">Edit Ekstrakulikuler</h4>
                </div>
                <form class="form form-vertical" wire:submit.prevent="update">
                    @csrf
                    <div class="form-body modal-body">
                        <div class="row">
                            {{-- ID Ekstrakulikuler --}}
                            {{-- <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="ekskul_id">ID Ekstrakulikuler</label>
                                <div class="position-relative">
                                    <input
                                        name="ekskul_id"
                                        type="text"
                                        class="form-control"
                                        placeholder="Masukkan ID Ekstrakulikuler"
                                        id="ekskul_id"
                                        value=""
                                    />
                                    <div class="form-control-icon">
                                        <i class="bi bi-gear-wide-connected"></i>
                                    </div>
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        This is invalid state.
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                            {{-- Nama Ekstrakulikuler --}}
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="fullname">Nama Ekstrakulikuler</label>
                                    <div class="position-relative">
                                        <input name="fullname" type="text"
                                            class="form-control  @error('nama') is-invalid
                                        @enderror"
                                            placeholder="Masukkan Nama Ekstrakulikuler" id="fullname"
                                            wire:model.defer="nama" />
                                        <div class="form-control-icon">
                                            <i class="bi bi-command"></i>
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

                            {{-- Jadwal Ekskul --}}
                            <label for="jadwal">Jadwal Ekstrakulikuler</label>
                            <div class="col-4">
                                <div class="form-group has-icon-left">
                                    <label for="hari">Hari</label>
                                    <div class="position-relative">
                                        <select name="hari"
                                            class="form-select form-control  @error('hari') is-invalid
                                    @enderror"
                                            id="basicSelect" wire:model.defer="hari">
                                            <option value="{{ $hari }}">{{ $hari }}</option>
                                            <option value="senin">Senin</option>
                                            <option value="selasa">Selasa</option>
                                            <option value="rabu">Rabu</option>
                                            <option value="kamis">Kamis</option>
                                            <option value="jumat">Jumat</option>
                                            <option value="sabtu">Sabtu</option>
                                        </select>
                                        <div class="form-control-icon">
                                            <i class="bi bi-calendar2-day"></i>
                                        </div>
                                        @error('hari')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group has-icon-left">
                                    <label for="start">Waktu Mulai</label>
                                    <div class="position-relative">
                                        <input name="start" type="time"
                                            class="form-control  @error('waktu_mulai') is-invalid
                                @enderror"
                                            placeholder="MasukkaJam yang Sesuai" id="start"
                                            wire:model.defer="waktu_mulai" />
                                        <div class="form-control-icon">
                                            <i class="bi bi-hourglass-top"></i>
                                        </div>
                                        @error('waktu_mulai')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group has-icon-left">
                                    <label for="end">Durasi (Menit)</label>
                                    <div class="position-relative">
                                        <input name="durasi" type="text"
                                            class="form-control  @error('durasi') is-invalid
                                @enderror"
                                            placeholder="Durasi" id="end" wire:model.defer="durasi" />
                                        <div class="form-control-icon">
                                            <i class="bi bi-hourglass-bottom"></i>
                                        </div>
                                        @error('durasi')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- Tempat --}}
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="tempat">Tempat</label>
                                    <div class="position-relative">
                                        <input name="tempat" type="text"
                                            class="form-control  @error('tempat') is-invalid
                                        @enderror"
                                            placeholder="Masukkan Lokasi Ekskul" id="tempat"
                                            wire:model.defer="tempat" />
                                        <div class="form-control-icon">
                                            <i class="bi bi-geo-alt"></i>
                                        </div>
                                        @error('tempat')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            {{-- Kelas --}}
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="kelas">Kelas</label>
                                    <div class="position-relative">
                                        <select name="kelas"
                                            class="form-select form-control  @error('kelas') is-invalid
                                    @enderror"
                                            id="basicSelect" wire:model.defer="kelas">
                                            <option value="7">7 - Tujuh</option>
                                            <option value="8">8 - Delapan</option>
                                            <option value="9">9 - Sembilan</option>
                                        </select>
                                        <div class="form-control-icon">
                                            <i class="bi bi-person-bounding-box"></i>
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
