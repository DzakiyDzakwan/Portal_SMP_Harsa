<table class="table table-bordered" id="table1">
    <thead>
        <tr>
            <th>No</th>
            <th>Mata Pelajaran</th>
            <th>Nama Guru</th>
            <th>Kelas</th>
            <th>Waktu Mulai</th>
            <th>Waktu Akhir</th>
            <th>Durasi</th>
            <th>Hari</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($roster as $r)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $r->nama_mapel }}</td>
                <td>{{ $r->nama }}</td>
                <td>{{ $r->nama_kelas_aktif }}</td>
                <td>{{ $r->waktu_mulai }}</td>
                <td>{{ $r->waktu_akhir }}</td>
                <td>{{ $r->durasi }}</td>
                <td>{{ $r->hari }}</td>
                <td>
                    {{-- Update Button --}}
                    <div class="modal-warning me-1 mb-1 d-inline-block">
                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                            data-bs-target="#update" wire:click="editRoster('{{ $r->id }}')">
                            <i class="bi bi-pencil"></i>
                        </button>
                    </div>
                    {{-- Delete Button --}}
                    <div class="modal-danger me-1 mb-1 d-inline-block">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                            data-bs-target="#delete{{ $loop->iteration }}">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>

                    {{-- Modal Delete --}}
                    <div class="modal fade text-left" id="delete{{ $loop->iteration }}" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel130" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-danger">
                                    <h5 class="modal-title white" id="myModalLabel130">
                                        Hapus Jadwal Mata Pelajaran
                                    </h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">Apakah yakin menghapus data ini?</div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Close</span>
                                    </button>
                                    <button class="btn btn-danger ml-1" data-bs-dismiss="modal"
                                        wire:click="delete('{{ $r->id }}')">
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
