<div>
    <table class="table table-bordered text-center m-o" id="table2">
        <thead>
            <tr class="text-center">
                <th>No</th>
                <th>uuid</th>
                <th>Username</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
                @foreach ($inactiveAdmin as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->uuid }}</td>
                        <td>{{ $item->username }}</td>
                        <td>
                            <div class="modal-success me-1 mb-1 d-inline-block">
                                <button type="button" class="btn btn-sm btn-success"
                                    wire:click="getRestoreModal('{{ $item->uuid }}')">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Restore">
                                        <i class="bi bi-arrow-repeat"></i>
                                    </div>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
        </tbody>
    </table>
</div>
