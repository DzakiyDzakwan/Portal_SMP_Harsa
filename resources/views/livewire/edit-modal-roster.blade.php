<div>
    <div
        wire:ignore.self
        class="modal fade text-left"
        id="editModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="myModalLabel130"
        aria-hidden="true"
    >
        <div
            class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
            role="document"
        >
            <div class="modal-content">
                <div class="modal-header bg-warning justify-content-center">
                    <h4 class="modal-title white " id="myModalLabel33">Tambah Roster Kelas</h4>
                </div>
                <form class="form form-vertical" wire:submit.prevent="update">
                    @csrf
                    <div class="form-body modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group has-icon-left">
                                <label for="start">Waktu Mulai</label>
                                <div class="position-relative">
                                    <input
                                    name="waktu_mulai"
                                    type="time"
                                    class="form-control"
                                    id="waktu_mulai"
                                    wire:model.defer="waktu_mulai"
                                    />
                                    <div class="form-control-icon">
                                        <i class="bi bi-clock-fill"></i>
                                    </div>
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        This is invalid state.
                                    </div>
                                </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group has-icon-left">
                                <label for="end">Durasi</label>
                                <div class="position-relative">
                                    <input
                                    name="durasi"
                                    type="number"
                                    class="form-control"
                                    id="durasi"
                                    wire:model.defer="durasi"
                                    />
                                    <div class="form-control-icon">
                                        <i class="bi bi-hourglass-bottom"></i>
                                    </div>
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        This is invalid state.
                                    </div>
                                </div>
                                </div>
                            </div>
                            {{-- Jadwal Ekskul --}}
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="hari">Hari</label>
                                    <div class="position-relative">
                                            <select name="hari" class="form-select form-control" id="hari" wire:model.defer="hari">
                                                <option value="{{ $hari }}">{{ $hari }}</option>
                                                <option value="senin">Senin</option>
                                                <option value="selasa">Selasa</option>
                                                <option value="rabu">Rabu</option>
                                                <option value="kamis">Kamis</option>
                                                <option value="jumat">Jumat</option>
                                                <option value="sabtu">Sabtu</option>
                                            </select>
                                            {{-- <input
                                                name="hari"
                                                type="text"
                                                class="form-control"
                                                id="hari"
                                                wire:model.defer="hari"
                                            /> --}}
                                        <div class="form-control-icon">
                                            <i class="bi bi-calendar2-day"></i>
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            This is invalid state.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12 d-flex justify-content-end">
                                <button type="button" class="btn btn-light-secondary me-1 mb-1" data-bs-dismiss="modal">
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
