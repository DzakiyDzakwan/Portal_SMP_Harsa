<div>
    {{-- Button tambah --}}
    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#createModal">
        <i class="bi bi-plus-circle"></i> Tambah Jadwal
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
                            {{-- Mapel --}}
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="kelas">Mata Pelajaran</label>
                                    <div class="position-relative">
                                        <select name="mapel" class="form-select form-control" id="basicSelect"
                                            wire:model.defer="mapel">
                                            <option>Pilih mata pelajaran</option>
                                            @foreach ($mapels as $m)
                                                <option value="{{ $m->mapel_guru_id }}">{{ $m->nama_mapel }} -
                                                    {{ $m->nama }}</option>
                                            @endforeach
                                        </select>
                                        <div class="form-control-icon">
                                            <i class="bi bi-book-fill"></i>
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            This is invalid state.
                                        </div>
                                    </div>
                                </div>

                            </div>
                            {{-- Kelas --}}
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="kelas">Kelas</label>
                                    <div class="position-relative">
                                        <select name="kelas" class="form-select form-control" id="basicSelect"
                                            wire:model.defer="kelas">
                                            <option>Pilih kelas</option>
                                            @foreach ($kelass as $k)
                                                <option value="{{ $k->kelas_id }}">{{ $k->nama_kelas }}</option>
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
                            {{-- Tahun Ajaran --}}
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="kelas">Tahun Ajaran</label>
                                    <div class="position-relative">
                                        <input name="tahun_ajaran" type="text"
                                            class="form-control"
                                            id="tahun_ajaran" placeholder="{{ $tahunAktif }}" wire:model.defer="tahun_ajaran" disabled />
                                        <div class="form-control-icon">
                                            <i class="bi bi-calendar-week"></i>
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            This is invalid state.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Semester --}}
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="semester">Semester</label>
                                    <div class="position-relative">
                                        <input name="semester" type="text"
                                            class="form-control"
                                            id="semester" 
                                            @if ($semesterAktif == 'ganjil')
                                                placeholder="Ganjil"
                                            @else 
                                                placeholder="Genap"
                                            @endif
                                             wire:model.defer="semester" disabled />
                                        <div class="form-control-icon">
                                            <i class="bi bi-collection"></i>
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
                                    <label for="start">Waktu Mulai</label>
                                    <div class="position-relative">
                                        <input name="waktu_mulai" type="time" class="form-control"
                                            placeholder="Waktu Mulai" id="start" wire:model.defer="waktu_mulai" />
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
                                    <label for="start">Waktu Akhir</label>
                                    <div class="position-relative">
                                        <input name="waktu_akhir" type="time" class="form-control"
                                            placeholder="Waktu Akhir" id="end" wire:model.defer="waktu_akhir" />
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
                            {{-- Jadwal Ekskul --}}
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="hari">Hari</label>
                                    <div class="position-relative">
                                        <select name="hari" class="form-select form-control" id="basicSelect"
                                            wire:model.defer="hari">
                                            <option value="">Pilih Hari</option>
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
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            This is invalid state.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 d-flex justify-content-end">
                                <button type="button" class="btn btn-light-secondary me-1 mb-1"
                                    data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Close</span>
                                </button>
                                <button type="submit" class="btn btn-success me-1 mb-1" data-bs-dismiss="modal">
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
