<table class="table table-bordered" id="table1">
    <thead>
        <tr>
            <th>No</th>
            <th>Mata Pelajaran</th>
            <th>Kelas</th>
            <th>Waktu Mulai</th>
            <th>Durasi</th>
            <th>Hari</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($roster as $r)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $r->mapel }}</td>
            <td>{{ $r->kelas }}</td>
            <td>{{ $r->waktu_mulai }}</td>
            <td>{{ $r->durasi }}</td>
            <td>{{ $r->hari }}</td>
            <td>
                {{-- Update Button --}}
                <div class="modal-warning me-1 mb-1 d-inline-block">
                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                        data-bs-target="#update" data-order=>
                        <i class="bi bi-pencil"></i>
                    </button>
                </div>
                {{-- Delete Button --}}
                <div class="modal-danger me-1 mb-1 d-inline-block">
                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                        data-bs-target="#delete">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
