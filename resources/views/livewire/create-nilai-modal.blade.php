<!--Nilai Modal -->
<div>
    <div class="modal modal-lg fade text-left" id="modalNilai" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document"
            style="max-width: 100%; width:70%;">
            <div class="modal-content">
                <div class="modal-header bg-success justify-content-center">
                    <h4 class="modal-title white" id="myModalLabel33">
                        Nilai
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <h5>Form Nilai</h5>
                            <form class="form form-vertical" wire:submit.prevent="store">
                                @csrf
                                <div class="form-body modal-body">
                                    <div class="row">
                                        {{-- Sesi  --}}
                                        <div class="col-6">
                                            <div class="form-group has-icon-left">
                                                <label for="sesi">Sesi</label>
                                                <div class="position-relative">
                                                    {{-- <select name="sesi"
                                                    class="form-select form-control @error('sesi') is-invalid @enderror"
                                                    id="basicSelect" wire:model.defer="sesi" disabled>
                                                    <option value="">Tidak ada sesi yang tersedia</option>
                                                    <option value="">Pilih Sesi</option>
                                                    <option value="uh1">Ulangan Harian 1
                                                    </option>
                                                    <option value="uh2">Ulangan Harian 2
                                                    </option>
                                                    <option value="uh3">Ulangan Harian 3
                                                    </option>
                                                    <option value="uts">Ulangan Tengah
                                                        Semester</option>
                                                    <option value="uas">Ulangan Akhir
                                                        Semester</option>
                                                </select> --}}
                                                    <input name="sesi" type="text"
                                                        class="form-control @error('sesi')is-invalid @enderror"
                                                        placeholder="Tidak ada sesi yang tersedia" id="sesi"
                                                        wire:model="sesi" disabled />
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-clock"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- KKM  --}}
                                        <div class="col-6">
                                            <div class="form-group has-icon-left">
                                                <label for="kkm">Kriteria Ketuntasan
                                                    Minimum</label>
                                                <div class="position-relative">
                                                    <input name="kkm" type="number"
                                                        class="form-control @error('kkm') is-invalid @enderror"
                                                        placeholder="Masukkan Nilai KKM" id="kkm"
                                                        wire:model.defer="kkm" />
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-clock"></i>
                                                    </div>
                                                    @error('kkm')
                                                        <div class="invalid-feedback">
                                                            <i class="bx bx-radio-circle"></i>
                                                            {{ $message }}
                                                        </div>
                                                    @enderror

                                                </div>
                                            </div>
                                        </div>

                                        {{-- Nilai Pengetahuan --}}
                                        <div class="col-6">
                                            <div class="form-group has-icon-left">
                                                <label for="nilai_p">Nilai
                                                    Pengetahuan</label>
                                                <div class="position-relative">
                                                    <input name="nilai_p" type="number"
                                                        class="form-control @error('nilai_p') is-invalid @enderror"
                                                        placeholder="Masukkan Nilai Pengetahuan" id="nilai_p"
                                                        wire:model.defer="nilai_p" />
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-123"></i>
                                                    </div>
                                                    @error('nilai_p')
                                                        <div class="invalid-feedback">
                                                            <i class="bx bx-radio-circle"></i>
                                                            {{ $message }}
                                                        </div>
                                                    @enderror

                                                </div>
                                            </div>
                                        </div>

                                        {{-- Nilai Keterampilan --}}
                                        <div class="col-6">
                                            <div class="form-group has-icon-left">
                                                <label for="nilai_k">Nilai
                                                    Keterampilan</label>
                                                <div class="position-relative">
                                                    <input name="nilai_k" type="number"
                                                        class="form-control @error('nilai_k') is-invalid @enderror"
                                                        placeholder="Masukkan Nilai Keterampilan" id="nilai_k"
                                                        wire:model.defer="nilai_k" />
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-123"></i>
                                                    </div>
                                                    @error('nilai_k')
                                                        <div class="invalid-feedback">
                                                            <i class="bx bx-radio-circle"></i>
                                                            {{ $message }}
                                                        </div>
                                                    @enderror

                                                </div>
                                            </div>
                                        </div>

                                        {{-- Deskripsi Pengetahuan --}}
                                        <div class="col-6">
                                            <div class="form-group has-icon-left">
                                                <label for="deskripsi_p">Deskripsi Pengetahuan</label>
                                                <div class="position-relative">
                                                    <textarea class="form-control @error('deskripsi_p')is-invalid @enderror" placeholder="Masukkan Deskripsi Keterampilan"
                                                        id="floatingTextarea" wire:model.defer="deskripsi_p"></textarea>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-card-text"></i>
                                                    </div>
                                                    @error('deskripsi_p')
                                                        <div class="invalid-feedback">
                                                            <i class="bx bx-radio-circle"></i>
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Deskripsi Keterampilan --}}
                                        <div class="col-6">
                                            <div class="form-group has-icon-left">
                                                <label for="deskripsi_k">Deskripsi Keterampilan</label>
                                                <div class="position-relative">
                                                    <textarea class="form-control @error('deskripsi_k')is-invalid @enderror" placeholder="Masukkan Deskripsi Pengetahuan"
                                                        id="floatingTextarea" wire:model.defer="deskripsi_k"></textarea>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-card-text"></i>
                                                    </div>
                                                    @error('deskripsi_k')
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
                        {{-- Table --}}
                        <div class="col-12">
                            <h5>Nilai Siswa</h5>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nilai</th>
                                        <th>Nilai Pengetahuan</th>
                                        <th>Deskripsi Pengetahuan</th>
                                        <th>Nilai Keterampilan</th>
                                        <th>Deskripsi Keterampilan</th>
                                        <th>Status</th>
                                        <th>Admin</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($nilai->isEmpty())
                                        <tr>
                                            <td></td>
                                        </tr>
                                    @else
                                        @foreach ($nilai as $item)
                                            <tr>
                                                <td>{{ $item->jenis }}</td>
                                                <td>{{ $item->nilai_pengetahuan }}</td>
                                                <td>{{ $item->deskripsi_pengetahuan }}</td>
                                                <td>{{ $item->nilai_keterampilan }}</td>
                                                <td>{{ $item->deskripsi_keterampilan }}</td>
                                                <td>
                                                    @if ($item->status == 'pending')
                                                        <span class="badge bg-secondary">{{ $item->status }}</span>
                                                    @elseif ($item->status == 'confirmed')
                                                        <span class="badge bg-primary">{{ $item->status }}</span>
                                                    @else
                                                        <span class="badge bg-danger">{{ $item->status }}</span>
                                                    @endif
                                                </td>
                                                <td>{{ $item->admin }}</td>
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
