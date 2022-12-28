<table class="table table-bordered" id="table1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($gurus as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama }}</td>
                @if ($item->jabatan == 'wks')
                    <td>Wakil Kepala sekolah</td>
                @elseif($item->jabatan == 'bk')
                    <td>Bimbingan Konseling</td>
                @else
                    <td>Guru</td>
                @endif
                @if ($item->status == 'aktif')
                    <td>
                        <span class="badge bg-success">Active</span>
                    </td>
                @else
                    <td>
                        <span class="badge bg-danger">Inactive</span>
                    </td>
                @endif
                <td>
                    {{-- Preview Button --}}
                    <div class="modal-info me-1 mb-1 d-inline-block">
                        <button type="button" class="btn btn-sm btn-info" wire:click="infoGuru('{{ $item->user }}')">
                            <div data-bs-toggle="tooltip" data-bs-placement="top" title="Preview">
                                <i class="bi bi-eye"></i>
                            </div>

                        </button>
                    </div>
                    @if ($item->status == 'aktif')
                        {{-- Update Button --}}
                        <div class="modal-success me-1 mb-1 d-inline-block">
                            <button type="button" class="btn btn-sm btn-warning"
                                wire:click="editGuru('{{ $item->NUPTK }}')">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Update">
                                    <i class="bi bi-pencil"></i>
                                </div>
                            </button>
                        </div>
                        {{-- NonAktif Button --}}
                        <div class="modal-danger me-1 mb-1 d-inline-block">
                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                data-bs-target="#delete{{ $item->user }}">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Non Aktif">
                                    <i class="bi  bi-person-x-fill"></i></a>
                                </div>

                            </button>
                        </div>
                        {{-- Modal Inactive --}}
                        <div class="modal fade text-left" id="delete{{ $item->user }}" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel130" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger">
                                        <h5 class="modal-title white" id="myModalLabel130">
                                            Non Aktifkan Guru
                                        </h5>
                                        <button type="button" class="close" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <i data-feather="x"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">Apakah yakin ingin menonaktifkan
                                        {{ $item->nama }}?</div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                            <i class="bx bx-x d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Close</span>
                                        </button>
                                        <button class="btn btn-danger ml-1" data-bs-dismiss="modal"
                                            wire:click="inactiveGuru('{{ $item->user }}')">
                                            <i class="bx bx-check d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Yes</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        {{-- Restore Button --}}
                        <div class="modal-success me-1 mb-1 d-inline-block">
                            <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                data-bs-target="#restoreModal{{ $item->user }}">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Restore">
                                    <i class="bi bi-arrow-repeat"></i></i>
                                </div>
                            </button>
                        </div>
                        <div class="modal fade text-left" id="restoreModal{{ $item->NIP }}" tabindex="-1"
                            role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center bg-success">
                                        <h5 class="modal-title white" id="myModalLabel130">
                                            Pulihkan Akun
                                        </h5>
                                    </div>
                                    <div class="modal-body">Apakah anda yakin ingin memulihkan akun
                                        <strong>{{ $item->nama }}</strong> ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <i class="bx bx-x d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Close</span>
                                        </button>
                                        <button class="btn btn-success ml-1"
                                            wire:click="restoreUser('{{ $item->NIP }}')">
                                            <i class="bx bx-check d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Pulihkan</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Delete Button --}}
                        <div class="modal-danger me-1 mb-1 d-inline-block">
                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $item->NIP }}">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                                    <i class="bi bi-trash-fill"></i></i>
                                </div>
                            </button>
                        </div>
                        <div class="modal fade text-left" id="deleteModal{{ $item->NIP }}" tabindex="-1"
                            role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center bg-danger">
                                        <h5 class="modal-title white" id="myModalLabel130">
                                            Hapus Akun
                                        </h5>
                                    </div>
                                    <div class="modal-body">Apakah anda yakin ingin menghapus permanen akun
                                        <strong>{{ $item->nama }}</strong>?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light-secondary"
                                            data-bs-dismiss="modal">
                                            <i class="bx bx-x d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Close</span>
                                        </button>
                                        <button class="btn btn-danger ml-1" data-bs-dismiss="modal"
                                            wire:click="deleteGuru('{{ $item->user }}')">
                                            <i class="bx bx-check d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Hapus</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
