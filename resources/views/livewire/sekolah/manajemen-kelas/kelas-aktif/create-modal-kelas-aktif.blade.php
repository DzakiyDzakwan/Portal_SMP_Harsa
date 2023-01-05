<div>
    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#createModal">
        <i class="bi bi-plus-circle"></i> Tambah Kelas Aktif
    </button>

    <!--Modal tambah kelasl -->
    <div wire:ignore.self class="modal fade text-left" id="createModal" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success justify-content-center">
                    <h4 class="modal-title white" id="myModalLabel33">
                        Tambah Kelas Aktif
                    </h4>
                </div>
                <form class="form form-vertical" wire:submit.prevent="store">
                    @csrf
                    <div class="form-body modal-body">
                        <div class="row">
                            {{-- Id Kelas --}}
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="kelas_aktif_id">Id Kelas Aktif</label>
                                    <div class="position-relative">
                                        <input name="kelas_aktif_id" type="text"
                                            class="form-control @error('kelas_aktif_id') is-invalid @enderror "
                                            placeholder="kelas_aktif_id" id="kelas_aktif_id" wire:model.defer="kelas_aktif_id" />
                                        <div class="form-control-icon">
                                            <i class="bi bi-person-workspace"></i>
                                        </div>
                                        @error('kelas_aktif_id')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
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
                                            @if (!$gurus->isEmpty())
                                                @foreach ($gurus as $gr)
                                                    <option value="{{ $gr->NUPTK }}">{{ $gr->nama }}</option>
                                                @endforeach
                                            @else
                                                <option>Tidak ada guru yang tersedia</option>
                                            @endif
                                        </select>
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                        @error('wali_kelas')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror

                                    </div>
                                </div>
                            </div>
                            {{-- Tahun Ajaran --}}
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="TA">Tahun Ajaran</label>
                                    <div class="position-relative">
                                        <input name="tahunAktif" type="text"
                                            class="form-control @error('tahunAktif') is-invalid @enderror"
                                            placeholder="Tahun Ajaran" id="tahunAktif" wire:model.defer="tahunAktif" readonly/>
                                        <div class="form-control-icon">
                                            <i class="bi bi-person-workspace"></i>
                                        </div>
                                        @error('tahunAktif')
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
                                    <label for="sem">Semester</label>
                                    <div class="position-relative">
                                        <input name="semesterAktif" type="text"
                                            class="form-control @error('semesterAktif') is-invalid @enderror"
                                            placeholder="Tahun Ajaran" id="semesterAktif" wire:model.defer="semesterAktif" readonly/>
                                        <div class="form-control-icon">
                                            <i class="bi bi-person-workspace"></i>
                                        </div>
                                        @error('tahunAktif')
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
                                    <label for="kelas">Nama Kelas</label>
                                    <div class="position-relative">
                                        <select name="nama_kelas"
                                            class="form-select form-control @error('nama_kelas') is-invalid @enderror"
                                            id="basicSelect" wire:model.defer="nama_kelas">
                                            @if (!$kelas->isEmpty())
                                                @foreach ($kelas as $k)
                                                    <option value="{{ $k->nama_kelas }} - ({{ $k->grade }}{{ $k->kelompok_kelas }})">{{ $k->nama_kelas }} - ({{ $k->grade }}{{ $k->kelompok_kelas }})</option>
                                                @endforeach
                                            @else
                                                <option>Tidak ada kelas yang tersedia</option>
                                            @endif
                                        </select>
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
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

