<table class="table table-bordered" id="table1">
    <thead>
        <tr>
            <th>No</th>
            <th>NISN</th>
            <th>Nama</th>
            <th>Tanggal Masuk</th>
            <th>Status Keaktifan</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($siswas as $siswa)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $siswa->NISN }}</td>
                <td>{{ $siswa->nama }}</td>
                <td>{{ $siswa->tanggal_masuk }}</td>
                <td>
                    @if ($siswa->status == 'Aktif')
                        <span class="badge bg-success">{{ $siswa->status }}</span>
                    @elseif ($siswa->status == 'Lulus')
                        <span class="badge bg-primary">{{ $siswa->status }}</span>
                    @elseif ($siswa->status == 'Pindah')
                        <span class="badge bg-warning">{{ $siswa->status }}</span>
                    @else
                        <span class="badge bg-danger">{{ $siswa->status }}</span>
                    @endif
                </td>
                <td>
                    {{-- Preview Button --}}
                    <div class="modal-info me-1 mb-1 d-inline-block">
                        <button type="button" class="btn btn-sm btn-info" wire:click="infoSiswa('{{ $siswa->user }}')">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                    {{-- Update Button --}}
                    @if ($siswa->status == 'Aktif')
                        <div class="modal-warning me-1 mb-1 d-inline-block">
                            <button type="button" class="btn btn-sm btn-warning"
                                wire:click="editSiswa('{{ $siswa->user }}')">
                                <i class="bi bi-pencil"></i>
                            </button>
                        </div>
                        {{-- Inactive Button --}}
                        <div class="modal-danger me-1 mb-1 d-inline-block">
                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                data-bs-target="#inactive{{ $loop->iteration }}">
                                <i class="bi bi-person-x"></i>
                            </button>
                        </div>
                    @else
                        {{-- Delete Button --}}
                        <div class="modal-danger me-1 mb-1 d-inline-block">
                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                data-bs-target="#delete{{ $loop->iteration }}">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    @endif
                    <div class="modal fade text-left" id="inactive{{ $loop->iteration }}" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel130" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-danger">
                                    <h5 class="modal-title white" id="myModalLabel130">
                                        Non-Aktifkan {{ $siswa->nama }}
                                    </h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <label>Opsi: </label>
                                    <div class="form-group">
                                        <select name="status" class="form-select form-control" id="basicSelect"
                                            wire:model.defer="status">
                                            <option>Pilih opsi</option>
                                            <option value="Lulus">Lulus</option>
                                            <option value="Pindah">Pindah</option>
                                            <option value="Drop Out">Drop Out</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Close</span>
                                    </button>
                                    <button class="btn btn-danger ml-1" data-bs-dismiss="modal"
                                        wire:click="inactive('{{ $siswa->user }}')">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Simpan</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Modal delete Permanen --}}
                    <div class="modal fade text-left" id="delete{{ $loop->iteration }}" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel130" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-danger">
                                    <h5 class="modal-title white" id="myModalLabel130">
                                        Hapus permanen {{ $siswa->nama }}
                                    </h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">Apakah yakin menghapus data ini?</div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Close</span>
                                    </button>
                                    <button class="btn btn-danger ml-1" data-bs-dismiss="modal"
                                        wire:click="delete('{{ $siswa->NISN }}')">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Simpan</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
