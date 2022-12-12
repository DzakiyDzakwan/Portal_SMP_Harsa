<table class="table table-bordered" id="table1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Sakit</th>
            <th>Izin</th>
            <th>Alpa</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($siswa as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->sakit }} </td>
                <td>{{ $item->izin }}</td>
                <td>{{ $item->alpa }}</td>
                <td>
                    <div class="modal-info me-1 mb-1 d-inline-block">
                        <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                            data-bs-target="#info{{ $item->NISN }}">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                    <div class="modal-info me-1 mb-1 d-inline-block">
                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                            data-bs-target="#add{{ $item->NISN }}">
                            <i class="bi bi-trophy-fill"></i>
                        </button>
                    </div>
                    <div class="modal-info me-1 mb-1 d-inline-block">
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                            data-bs-target="#add{{ $item->NISN }}">
                            <i class="bi bi-journal-text"></i>
                        </button>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
