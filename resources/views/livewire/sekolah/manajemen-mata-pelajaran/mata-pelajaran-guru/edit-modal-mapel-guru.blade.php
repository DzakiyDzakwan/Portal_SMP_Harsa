<div>
    {{-- modal edit mapel guru --}}
    <div wire:ignore.self class="modal fade text-left" id="editModal" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning justify-content-center">
                    <h4 class="modal-title white" id="myModalLabel33">
                        Edit Mata Pelajaran Guru
                    </h4>
                </div>
                <form class="form form-vertical" wire:submit.prevent="update">
                    @csrf
                    <div class="modal-body">
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="guru">Guru</label>
                                <div class="position-relative">
                                    <select name="guru" class="form-select form-control" id="basicSelect"
                                        wire:model.defer="guru" disabled>
                                        <option>Pilih Guru</option>
                                        @foreach ($listGuru as $g)
                                            <option value="{{ $g->NUPTK }}">{{ $g->nama }}</option>
                                        @endforeach
                                    </select>
                                    <div class="form-control-icon">
                                        <i class="bi bi-person-video3"></i>
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
                                <label for="mapel">Mata Pelajaran</label>
                                <div class="position-relative">
                                    <select wire:model.defer="mapel" name="mapel" class="form-select form-control"
                                        id="basicSelect">
                                        <option>Pilih Mata Pelajaran</option>
                                        @foreach ($listMapel as $item)
                                            <option value="{{ $item->mapel_id }}">{{ $item->nama_mapel }}
                                                @if ($item->kelompok_mapel = 'A')
                                                    {{ 'Wajib' }}
                                                @else
                                                    {{ 'Peminatan' }}
                                                @endif
                                            </option>
                                        @endforeach
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
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <button type="button" class="btn btn-light-secondary me-1 mb-1" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="submit" class="btn btn-success me-1 mb-1" data-bs-dismiss="modal">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
