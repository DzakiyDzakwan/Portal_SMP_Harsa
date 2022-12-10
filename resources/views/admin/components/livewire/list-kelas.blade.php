<table class="table table-bordered" id="table1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kelas</th>
            <th>Nomor Kelas</th>
            <th>Wali Kelas</th>
            <th>Jumlah Siswa</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($kelas as $k)
            <tr>
                <td>{{ $k->kelas_id }}</td>
                <td>{{ $k->nama_kelas }}</td>
                <td>{{ $k->grade }}-{{ $k->kelompok_kelas }}</td>
                <td>{{ $k->Wali_Kelas }}</td>
                <td>{{ $k->Jumlah_Siswa }}</td>
                <td>
                    {{-- Update Button --}}
                    <div class="modal-warning me-1 mb-1 d-inline-block">
                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                            data-bs-target="#update{{ $k->kelas_id }}" data-order=>
                            <i class="bi bi-pencil"></i>
                        </button>
                    </div>
                    {{-- Delete Button --}}
                    <div class="modal-danger me-1 mb-1 d-inline-block">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                            data-bs-target="#delete{{ $k->kelas_id }}">
                            <i class="bi bi-trash"></i>
                        </button>


                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
