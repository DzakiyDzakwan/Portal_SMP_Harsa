<div>
    <table class="table table-bordered m-o" id="table2">
        <thead>
            <tr>
                <th>No</th>
                <th>Kelas Id</th>
                <th>Nama Kelas</th>
                <th>Deleted_at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($inactiveKelas != null)
                @foreach ($inactiveKelas as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->kelas_id }}</td>
                        <td>{{ $item->nama_kelas }}</td>
                        <td> {{ $item->deleted_at }} </td>
                        <td>
                            <div class="modal-danger me-1 mb-1 d-inline-block">
                                <button type="button" class="btn btn-sm btn-success"
                                    wire:click="getRestoreModal('{{ $item->kelas_id }}')">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Restore">
                                        <i class="bi bi-arrow-repeat"></i></i>
                                    </div>
                                </button>
                            </div>
                            <div class="modal-danger me-1 mb-1 d-inline-block">
                                <button type="button" class="btn btn-sm btn-danger"
                                    wire:click="getDeleteModal('{{ $item->kelas_id }}')">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                                        <i class="bi bi-trash-fill"></i></i>
                                    </div>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif

        </tbody>
    </table>
</div>
