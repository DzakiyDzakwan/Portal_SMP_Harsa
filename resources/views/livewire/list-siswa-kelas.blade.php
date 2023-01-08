<table class="table table-bordered" id="table1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Semester</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @if ($siswa->isEmpty())
        @else
            @foreach ($siswa as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->semester_aktif }}</td>
                    <td>
                        <div class="modal-info me-1 mb-1 d-inline-block">
                            <button type="button" class="btn btn-sm btn-success"
                                wire:click="showModal('{{ $item->kontrak_semester_id }}')">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Nilai">
                                    <i class="bi bi-clipboard-check-fill"></i>
                                </div>
                            </button>
                        </div>

                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
