<div>
    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#sesiModal">
        <i class="bi bi-clock"></i> sesi penilaian
    </button>

    <!--Modal Sesi Penilaian -->
    <div wire:ignore.self class="modal modal-lg fade text-left" id="sesiModal" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document"
            style="max-width: 100%; width:70%;">
            <div class="modal-content">
                <div class="modal-header bg-success justify-content-center">
                    <h4 class="modal-title white" id="myModalLabel33">
                        Sesi Penilaian
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <h5>Create Sesi Penilaian</h5>
                            <form class="form form-vertical" wire:submit.prevent="store">
                                @csrf
                                <div class="form-body modal-body">
                                    <div class="row">
                                        {{-- Sesi  --}}
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="nama_sesi">Sesi</label>
                                                <div class="position-relative">
                                                    <select name="nama_sesi"
                                                        class="form-select form-control @error('nama_sesi') is-invalid @enderror"
                                                        id="basicSelect" wire:model.defer="nama_sesi">
                                                        <option value="">Pilih Sesi</option>
                                                        <option value="uh1">Ulangan Harian 1</option>
                                                        <option value="uh2">Ulangan Harian 2</option>
                                                        <option value="uh3">Ulangan Harian 3</option>
                                                        <option value="uts">Ulangan Tengah Semester</option>
                                                        <option value="uas">Ulangan Akhir Semester</option>
                                                    </select>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-clock"></i>
                                                    </div>
                                                    @error('nama_sesi')
                                                        <div class="invalid-feedback">
                                                            <i class="bx bx-radio-circle"></i>
                                                            {{ $message }}
                                                        </div>
                                                    @enderror

                                                </div>
                                            </div>
                                        </div>

                                        {{-- Tahun --}}
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="tahun_ajaran">Tahun Ajaran</label>
                                                <div class="position-relative">
                                                    <input name="tahun_ajaran" type="text"
                                                        class="form-control @error('tahun_ajaran') is-invalid
                                                    @enderror"
                                                        placeholder="Masukkan Tahun Ajaran" id="tahun_ajaran"
                                                        wire:model.defer="tahun_ajaran" />
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-calendar-date"></i>
                                                    </div>
                                                    @error('tahun_ajaran')
                                                        <div class="invalid-feedback">
                                                            <i class="bx bx-radio-circle"></i>
                                                            {{ $message }}
                                                        </div>
                                                    @enderror

                                                </div>
                                            </div>
                                        </div>

                                        {{-- start --}}
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="start">Waktu Mulai</label>
                                                <div class="position-relative">
                                                    <input name="start" type="datetime-local"
                                                        class="form-control @error('start') is-invalid
                                                    @enderror"
                                                        placeholder="Waktu Mulai" id="start"
                                                        wire:model.defer="start" />
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-clock"></i>
                                                    </div>
                                                    @error('start')
                                                        <div class="invalid-feedback">
                                                            <i class="bx bx-radio-circle"></i>
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        {{-- end --}}
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="end">Waktu Akhir</label>
                                                <div class="position-relative">
                                                    <input name="end" type="datetime-local"
                                                        class="form-control @error('end') is-invalid
                                                    @enderror"
                                                        placeholder="Waktu Akhir" id="end"
                                                        wire:model.defer="end" />
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-clock"></i>
                                                    </div>
                                                    @error('end')
                                                        <div class="invalid-feedback">
                                                            <i class="bx bx-radio-circle"></i>
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-sm btn-success me-1 mb-1">
                                                Simpan
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-12">
                            <h5>List Sesi Penilaian</h5>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Sesi</th>
                                        <th>Tahun Ajaran</th>
                                        <th>Start</th>
                                        <th>End</th>
                                        <th>Total</th>
                                        <th>Admin</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($sesi->isEmpty())
                                        <tr>
                                            <td colspan="8">Tidak Ada List</td>
                                        </tr>
                                    @else
                                        @foreach ($sesi as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama_sesi }}</td>
                                                <td>{{ $item->tahun_ajaran }}</td>
                                                <td>{{ $item->waktu_mulai }}</td>
                                                <td>{{ $item->waktu_selesai }}</td>
                                                <td>{{ $item->jumlah_hari }}</td>
                                                <td>{{ $item->admin }}</td>
                                                @if ($item->status == 'Aktif')
                                                    <td>
                                                        <span class="badge bg-success">{{ $item->status }}</span>
                                                    </td>
                                                @else
                                                    <td>
                                                        <span class="badge bg-danger">{{ $item->status }}</span>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-light-secondary" data-bs-dismiss="modal">
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
