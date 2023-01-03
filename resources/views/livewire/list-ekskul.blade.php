    <table class="table table-bordered" id="table1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Ekstrakulikuler</th>
                <th>Hari</th>
                <th>Waktu Mulai</th>
                <th>Waktu Akhir</th>
                <th>Tempat</th>
                <th>Kelas</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ekskuls as $e)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $e->nama }}</td>
                <td>{{ $e->hari }}</td>
                <td>{{ $e->waktu_mulai }}</td>
                <td>{{ $e->waktu_akhir }}</td>
                <td>{{ $e->tempat }}</td>
                <td>{{ $e->kelas }}</td>
                <td>
                    {{-- Update Button --}}
                    <div class="modal-warning me-1 mb-1 d-inline-block">
                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                        wire:click="editEkskul('{{ $e->id }}')">
                        <div data-bs-toggle="tooltip" data-bs-placement="top" title="Update">
                            <i class="bi  bi-pencil"></i></a>
                        </div>
                        </button>
                    </div>
                    {{-- Delete Button --}}
                    <div class="modal-danger me-1 mb-1 d-inline-block">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                            data-bs-target="#delete{{ $e->id }}">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                    {{-- Delete Modal --}}
                    <div
                        class="modal fade text-left"
                        id="delete{{ $e->id }}"
                        tabindex="-1"
                        role="dialog"
                        aria-labelledby="myModalLabel130"
                        aria-hidden="true"
                    >
                        <div
                            class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                            role="document"
                        >
                            <div class="modal-content">
                                <div class="modal-header bg-danger">
                                    <h5 class="modal-title white" id="myModalLabel130">
                                        Hapus Ekskul
                                    </h5>
                                    <button
                                        type="button"
                                        class="close"
                                        data-bs-dismiss="modal"
                                        aria-label="Close"
                                    >
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">Apakah yakin menghapus ekstrakurikuler {{ $e->nama }}?</div>
                                <div class="modal-footer">
                                    <button
                                        type="button"
                                        class="btn btn-light-secondary"
                                        data-bs-dismiss="modal"
                                    >
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Close</span>
                                    </button>
                                    <button
                                        class="btn btn-danger ml-1"
                                        data-bs-dismiss="modal"
                                        wire:click="deleteEkskul('{{ $e->id }}')"
                                    >
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Yes</span>
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

