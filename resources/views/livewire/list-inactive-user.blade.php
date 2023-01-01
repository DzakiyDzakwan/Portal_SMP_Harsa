<div>
    <table class="table table-bordered text-center m-o" id="table2">
        <thead>
            <tr class="text-center">
                <th>No</th>
                <th>Username</th>
                <th>Name</th>
                {{-- <th>Roles</th> --}}
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($inactiveUser != null)
                @foreach ($inactiveUser as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->profiles->nama }}</td>{{-- 
                        <td>
                            @foreach ($item->getRoleNames() as $role)
                                <span class="badge bg-primary">{{ $role }}</span>
                            @endforeach
                        </td> --}}
                        <td>
                            <div class="modal-danger me-1 mb-1 d-inline-block">
                                <button type="button" class="btn btn-sm btn-danger"
                                    wire:click="getDeleteModal('{{ $item->uuid }}')">
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
