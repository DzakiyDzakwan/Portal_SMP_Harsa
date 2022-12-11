<table class="table table-bordered" id="table1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kelas</th>
            <th>Kelas</th>
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
                <td>{{ $k->grade }}{{ $k->kelompok_kelas }}</td>
                <td>{{ $k->Wali_Kelas }}</td>
                <td>{{ $k->Jumlah_Siswa }}</td>
                <td>
                    {{-- Update Button --}}
                    <div class="modal-warning me-1 mb-1 d-inline-block">
                        <button type="button" class="btn btn-sm btn-warning"
                            wire:click="editKelas('{{ $k->kelas_id }}')">
                            <i class="bi
                            bi-pencil"></i>
                        </button>
                    </div>
                    {{-- Delete Button --}}
                    <div class="modal-danger me-1 mb-1 d-inline-block">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                            data-bs-target="#delete{{ $k->kelas_id }}">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                    {{-- Modal Delete --}}
                    <div class="modal fade text-left" id="delete{{ $k->kelas_id }}" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel130" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header justify-content-center bg-danger">
                                    <h5 class="modal-title white" id="myModalLabel130">
                                        Nonaktifkan Kelas {{ $k->kelas_id }}
                                    </h5>
                                </div>
                                <div class="modal-body">Apakah yakin menonaktifkan kelas ini?</div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Close</span>
                                    </button>
                                    <button class="btn btn-danger ml-1" data-bs-dismiss="modal"
                                        wire:click="inactiveKelas('{{ $k->kelas_id }}')">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Yes</span>
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
