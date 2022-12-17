<div>
    <table class="table table-bordered m-o" id="table2">
        <thead>
            <tr>
                <th>No</th>
                <th>Mata Pelajaran</th>
                <th>Guru</th>
                <th>Deleted_at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($inactiveMapelGuru != null)
                @foreach ($inactiveMapelGuru as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->mapel }}</td>
                        <td>{{ $item->guru }}</td>
                        <td> {{ $item->deleted_at }} </td>
                        <td>
                            <div class="modal-danger me-1 mb-1 d-inline-block">
                                <button type="button" class="btn btn-sm btn-success"
                                    wire:click="getRestoreModal('{{ $item->mapel_guru_id }}')">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Restore">
                                        <i class="bi bi-arrow-repeat"></i></i>
                                    </div>
                                </button>
                            </div>
                            <div class="modal-danger me-1 mb-1 d-inline-block">
                                <button type="button" class="btn btn-sm btn-danger"
                                    wire:click="getDeleteModal('{{ $item->mapel_guru_id }}')">
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
