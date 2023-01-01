<div>
    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#createModal">
        <i class="bi bi-plus-circle"></i> Tambah Mata Pelajaran Guru
    </button>

    {{-- modal create mapel --}}
    <div wire:ignore.self class="modal fade text-left" id="createModal" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success justify-content-center">
                    <h4 class="modal-title white" id="myModalLabel33">
                        Tambah Mata Pelajaran Guru
                    </h4>
                </div>
                <form class="form form-vertical" wire:submit.prevent="store">
                    @csrf
                    <div class="modal-body">
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="guru">Guru</label>
                                <div class="position-relative">
                                    <select name="guru" class="form-select form-control" id="basicSelect"
                                        wire:model.defer="guru">
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
                        {{-- pilih mapel --}}
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="mapel">Mata Pelajaran</label>
                                <div class="position-relative">
                                    <select name="mapel" class="form-select form-control" id="basicSelect"
                                        wire:model.defer="mapel">
                                        <option>Pilih Mata Pelajaran</option>
                                        @foreach ($listMapel as $p)
                                            <option value="{{ $p->mapel_id }}">{{ $p->nama_mapel }}
                                                @if ($p->kelompok_mapel = 'A')
                                                    {{ 'Wajib' }}
                                                @else
                                                    {{ 'Peminatan' }}
                                                @endif
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="form-control-icon">
                                        <i class="bi bi-book-half"></i></i>
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
