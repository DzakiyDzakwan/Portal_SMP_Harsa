<table class="table table-bordered" id="table1">
    <thead>
        <tr>
            <th>No</th>
            <th>uuid</th>
            <th>Username</th>
            <th>Role</th>
            <th>Created_at</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($admin as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->uuid }}</td>
                <td>{{ $item->username }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->created_at }}</td>
                <td>
                    {{-- Preview Button --}}
                    {{-- <div class="modal-info me-1 mb-1 d-inline-block">
                        <button type="button" class="btn btn-sm btn-info" wire:click="">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div> --}}
                    {{-- Update Button --}}
                    <div class="modal-warning me-1 mb-1 d-inline-block">
                        <button type="button" class="btn btn-sm btn-warning"
                            wire:click="editAdmin('{{ $item->uuid }}')">
                            <i class="bi bi-pencil"></i>
                        </button>
                    </div>
                    {{-- Inactive Button --}}
                    {{-- <div class="modal-danger me-1 mb-1 d-inline-block">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                            data-bs-target="#inactive{{ $loop->iteration }}">
                            <i class="bi bi-person-x"></i>
                        </button>
                    </div> --}}
                    {{-- Delete Button --}}
                    <div class="modal-danger me-1 mb-1 d-inline-block">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                            data-bs-target="#delete{{ $loop->iteration }}">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>

                    {{-- <div class="modal fade text-left" id="" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel130" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-danger">
                                    <h5 class="modal-title white" id="myModalLabel130">
                                        Non-Aktifkan
                                    </h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Close</span>
                                    </button>
                                    <button class="btn btn-danger ml-1" data-bs-dismiss="modal"
                                        wire:click="">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Simpan</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    {{-- Modal delete Permanen --}}
                    <div class="modal fade text-left" id="delete{{ $loop->iteration }}" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel130" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-danger">
                                    <h5 class="modal-title white" id="myModalLabel130">
                                        Hapus permanen {{ $item->username }}
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
                                        wire:click="delete('{{ $item->uuid }}')">
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
