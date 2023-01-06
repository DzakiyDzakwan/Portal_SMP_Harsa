<div>
    {{-- Button Tambah --}}
    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#createModal">
        <i class="bi bi-plus-circle"></i> Tambah Pembina Ekstrakurikuler
    </button>
    {{-- Modal Tambah --}}
    <div wire:ignore.self class="modal fade text-left" id="createModal" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel130" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success justify-content-center">
                    <h4 class="modal-title white " id="myModalLabel33">Tambah Ekstrakulikuler</h4>
                </div>
                <form class="form form-vertical" wire:submit.prevent="update">
                    @csrf
                    <div class="form-body modal-body">
                        <div class="row">
                            {{-- ID Ekstrakulikuler --}}
                                        {{-- <input name="id" type="hidden"
                                            class="form-control @error('id') is-invalid @enderror "
                                            placeholder="id" id="id" wire:model.defer="id" />
                                        @error('id')
                                                {{ $message }}
                                        @enderror
                                    </div>
                                </div>

                            </div> --}}
                            {{-- Nama Ekstrakulikuler --}}
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="nama_ekskul">Nama Ekstrakurikuler</label>
                                    <div class="position-relative">
                                        <select name="nama_ekskul"
                                            class="form-select form-control  @error('nama_ekskul') is-invalid
                                    @enderror"
                                            id="basicSelect" wire:model.defer="nama_ekskul">
                                            @if (!$ekstrakurikuler->isEmpty())
                                                @foreach ($ekstrakurikuler as $e)
                                                    <option value="{{ $e->ekstrakurikuler_id }}">{{ $e->nama }}</option>
                                                @endforeach
                                            @else
                                                <option>Tidak ada ekskul yang tersedia</option>
                                            @endif
                                        </select>
                                        <div class="form-control-icon">
                                            <i class="bi bi-command"></i>
                                        </div>
                                        @error('nama_ekskul')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            {{-- Nama Guru --}}
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="wali">Wali Kelas</label>
                                    <div class="position-relative">
                                        <select name="nama_guru"
                                            class="form-select form-control @error('nama_guru') is-invalid @enderror"
                                            id="basicSelect" wire:model.defer="nama_guru">
                                            @if (!$guru->isEmpty())
                                                @foreach ($guru as $gr)
                                                    <option value="{{ $gr->NUPTK }}">{{ $gr->nama }}</option>
                                                @endforeach
                                            @else
                                                <option>Tidak ada guru yang tersedia</option>
                                            @endif
                                        </select>
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                        @error('nama_guru')
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
