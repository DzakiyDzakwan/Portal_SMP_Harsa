<table class="table table-bordered" id="table1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($roles as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>
                    <!-- Role Button -->
                    <div class="modal-primary me-1 mb-1 d-inline-block">
                        <button class="btn btn-sm btn-primary" wire:click="permissionRole('{{ $item->id }}')">
                            <div data-bs-toggle="tooltip" data-bs-placement="top" title="Role User">
                                <i class="bi bi-person-bounding-box"></i>
                            </div>
                        </button>
                    </div>
                    <!-- Update Button -->
                    <div class="modal-warning me-1 mb-1 d-inline-block">
                        <button class="btn btn-sm btn-warning" wire:click="editRole('{{ $item->id }}')">
                            <div data-bs-toggle="tooltip" data-bs-placement="top" title="Edit User">
                                <i class="bi bi-pencil"></i></a>
                            </div>
                        </button>
                    </div>
                    <!--Delete Button-->
                    <div class="modal-danger me-1 mb-1 d-inline-block">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                            data-bs-target="#delete{{ $loop->iteration }}">
                            <div data-bs-toggle="tooltip" data-bs-placement="top" title="Non Aktif User">
                                <i class="bi bi-person-x-fill"></i>
                            </div>
                        </button>
                    </div>
                    {{-- Modal Delete --}}
                    <div class="modal fade text-left" id="delete{{ $loop->iteration }}" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel130" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-danger">
                                    <h5 class="modal-title white" id="myModalLabel130">
                                        Hapus {{ $item->name }}
                                    </h5>
                                </div>
                                <div class="modal-body">Apakah anda yakin ingin menghapus role {{ $item->name }}?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Close</span>
                                    </button>
                                    <button class="btn btn-danger ml-1" data-bs-dismiss="modal"
                                        wire:click="delete('{{ $item->id }}')">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Hapus</span>
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
