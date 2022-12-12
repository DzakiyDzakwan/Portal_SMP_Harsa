<table class="table table-bordered" id="table1">
    <thead>
        <tr>
            <th>Name</th>
            <th>Kelas</th>
            <th>Jenis Kelamin</th>
            <th>Status</th>
            <th>Prestasi</th>
        </tr>
    </thead>
    <tbody>
        {{-- @foreach ($siswas as $siswa)
            <tr>
                <td>{{ $siswa->nama }}</td>
                <td>{{ $siswa->grade }}-{{ $siswa->kelompok_kelas }}</td>
                <td>{{ $siswa->jenis_kelamin }}</td>
                <td>
                    <span class="badge bg-success">Active</span>
                </td>
                <td>
                    <div class="modal-info me-1 mb-1 d-inline-block">
                        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                            data-bs-target="#add{{ $siswa->NISN }}">
                            <i class="bi bi-plus-circle"></i>
                        </button>
                    </div>
                    <div class="modal-info me-1 mb-1 d-inline-block">
                        <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                            data-bs-target="#info{{ $siswa->NISN }}">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                </td>
            </tr>
        @endforeach --}}
    </tbody>
</table>
