{{-- Modal Edit kelas --}}
<div wire:ignore.self class="modal fade text-left" id="editModal" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h4 class="modal-title white" id="myModalLabel33">
                    Edit Kelas
                </h4>
            </div>
            <form class="form form-vertical" wire:submit.prevent="update">
                @csrf
                <div class="form-body modal-body">
                    <div class="row">
                        {{-- Id Kelas --}}
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="kelas_id">Kelas ID</label>
                                <div class="position-relative">
                                    <input name="kelas_id" type="text"
                                        class="form-control @error('kelas_id') is-invalid @enderror "
                                        placeholder="kelas_id" id="kelas_id" wire:model.defer="kelas_id"
                                        disabled />
                                    <div class="form-control-icon">
                                        <i class="bi bi-person-workspace"></i>
                                    </div>
                                    @error('kelas_id')
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
                                <label for="nama_kelas">Nama Kelas</label>
                                <div class="position-relative">
                                    <input name="nama_kelas" type="text"
                                        class="form-control @error('nama_kelas') is-invalid @enderror"
                                        placeholder="Nama Kelas" id="nama_kelas" wire:model.defer="nama_kelas" />
                                    <div class="form-control-icon">
                                        <i class="bi bi-person-workspace"></i>
                                    </div>
                                    @error('nama_kelas')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        {{-- Grade --}}
                        {{-- <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="grade">Grade</label>
                                <div class="position-relative">
                                    <select name="grade" class="form-select form-control" disabled
                                        id="basicSelect" wire:model.defer="grade">
                                        <option value="7">7 - Tujuh</option>
                                        <option value="8" selected>8 - Delapan</option>
                                        <option value="9">9 - Sembilan</option>
                                    </select>
                                    <div class="form-control-icon">
                                        <i class="bi bi-person-bounding-box"></i>
                                    </div>
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        This is invalid state.
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        {{-- Kelompok --}}
                        {{-- <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="kelompok_kelas">Kelompok Kelas</label>
                                <div class="position-relative">
                                    <input name="kelompok_kelas" type="text"
                                        class="form-control @error('kelompok_kelas') is-invalid @enderror "
                                        placeholder="kelompok_kelas" id="kelompok_kelas"
                                        wire:model.defer="kelompok_kelas" disabled />
                                    <div class="form-control-icon">
                                        <i class="bi bi-person-workspace"></i>
                                    </div>
                                    @error('kelompok_kelas')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                        </div> --}}

                        {{-- Wali kelas --}}
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="wali">Wali Kelas</label>
                                <div class="position-relative">
                                    <select name="wali_kelas"
                                        class="form-select form-control @error('wali_kelas') is-invalid @enderror"
                                        id="basicSelect" wire:model.defer="wali_kelas">
                                        <option value="{{ $wali_kelas }}">{{ $nama_wali }}</option>
                                        @if (!$gurus->isEmpty())
                                            @foreach ($gurus as $gr)
                                                <option value="{{ $gr->NUPTK }}">{{ $gr->nama }}</option>
                                            @endforeach
                                        @endif
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
