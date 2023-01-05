{{-- Modal Edit kelas Aktif --}}
<div wire:ignore.self class="modal fade text-left" id="editModal" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h4 class="modal-title white" id="myModalLabel33">
                    Edit Kelas Aktif
                </h4>
            </div>
            <form class="form form-vertical" wire:submit.prevent="update">
                @csrf
                <div class="form-body modal-body">
                    <div class="row">
                        {{-- Id Kelas --}}
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="kelas_aktif_id">Kelas ID</label>
                                <div class="position-relative">
                                    <input name="kelas_aktif_id" type="text"
                                        class="form-control"
                                        placeholder="kelas_id" id="kelas_aktif_id" wire:model.defer="kelas_aktif_id"
                                        disabled />
                                    <div class="form-control-icon">
                                        <i class="bi bi-person-workspace"></i>
                                    </div>
                                </div>
                            </div>

                        </div>

                        {{-- Wali kelas --}}
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="wali">Wali Kelas</label>
                                <div class="position-relative">
                                    <select name="wali_kelas"
                                        class="form-select form-control @error('wali_kelas') is-invalid @enderror"
                                        id="basicSelect" wire:model.defer="wali_kelas">
                                        <option value="{{ $wali_kelas }}">{{ $nama_wali }}</option>
                                        @foreach ($gurus as $g)
                                            <option value="{{ $g->NUPTK }}">{{ $g->nama }}</option>
                                        @endforeach
                                    </select>
                                    <div class="form-control-icon">
                                        <i class="bi bi-person"></i>
                                    </div>
                                    @error('wali')
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
