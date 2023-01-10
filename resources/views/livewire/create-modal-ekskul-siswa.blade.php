<div>
    {{-- Button Tambah --}}
    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#createModal">
        <i class="bi bi-plus-circle"></i> Tambah Ekstrakurikuler Siswa
    </button>
    {{-- Modal Tambah --}}
    <div wire:ignore.self class="modal fade text-left" id="createModal" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel130" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success justify-content-center">
                    <h4 class="modal-title white " id="myModalLabel33">Tambah Ekstrakulikuler Siswa</h4>
                </div>
                <form class="form form-vertical" wire:submit.prevent="store">
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
                                    <label for="nama_ekstrakurikuler">Ekstrakurikuler</label>
                                    <div class="position-relative">
                                        <select name="nama_ekstrakurikuler"
                                            class="form-select form-control  @error('nama_ekstrakurikuler') is-invalid
                                            @enderror"
                                            id="basicSelect" wire:model.defer="nama_ekstrakurikuler" disabled>
                                            @if (!$ekstrakurikuler->isEmpty())
                                                @foreach ($ekstrakurikuler as $e)
                                                    <option value="{{ $e->ekstrakurikuler_id }}">{{ $e->nama }}
                                                    </option>
                                                @endforeach
                                            @else
                                                <option>Tidak ada ekskul yang tersedia</option>
                                            @endif
                                        </select>
                                        <div class="form-control-icon">
                                            <i class="bi bi-command"></i>
                                        </div>
                                        @error('nama_ekstrakurikuler')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            {{-- Nama Siswa --}}
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="wali">Siswa</label>
                                    <div class="position-relative">
                                        <select name="nama_siswa"
                                            class="form-select form-control @error('nama_siswa') is-invalid @enderror"
                                            id="basicSelect" wire:model.defer="nama_siswa">
                                            @if ($listSiswa != null)
                                                @foreach ($listSiswa as $sw)
                                                    <option value="{{ $sw['NISN'] }}">{{ $sw['nama'] }}</option>
                                                @endforeach
                                            @else
                                                <option>Tidak ada siswa yang tersedia</option>
                                            @endif
                                        </select>
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                        @error('nama_siswa')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror

                                    </div>
                                </div>
                            </div>

                            {{-- Semester --}}
                            {{-- <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="wali">Semester</label>
                                    <div class="position-relative">
                                        <select name="ta_semester"
                                            class="form-select form-control @error('ta_semester') is-invalid @enderror"
                                            id="basicSelect" wire:model.defer="ta_semester">
                                            @if (!$semester->isEmpty())
                                                @foreach ($semester as $s)
                                                    <option value="{{ $s->siswa }}">{{ $s->tahun_ajaran_aktif }}
                                                    </option>
                                                @endforeach
                                            @else
                                                <option>Tidak ada ekskul yang tersedia</option>
                                            @endif
                                        </select>
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                        @error('ta_semester')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror

                                    </div>
                                </div>
                            </div> --}}

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
