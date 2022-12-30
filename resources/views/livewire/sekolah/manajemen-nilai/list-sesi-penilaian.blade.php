<table class="table table-bordered" id="table1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Sesi</th>
            <th>Tahun Ajaran Aktif</th>
            <th>Semester Aktif</th>
            <th>Waktu Mulai</th>
            <th>Waktu Berakhir</th>
            <th>Durasi</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sesi as $s)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    @if ($s->nama_sesi == 'uh1')
                        {{ 'Ujian Harian 1' }}
                    @elseif ($s->nama_sesi == 'uh2')
                        {{ 'Ujian Harian 2' }}
                    @elseif ($s->nama_sesi == 'uh3')
                        {{ 'Ujian Harian 3' }}
                    @elseif ($s->nama_sesi == 'uts')
                        {{ 'Ujian Tengah Semester' }}
                    @else
                        {{ 'Ujian Akhir Semester' }}
                    @endif
                </td>
                <td>{{ $s->tahun_ajaran_aktif }}</td>
                <td>{{ $s->semester_aktif }}</td>
                <td>{{ $s->waktu_mulai }}</td>
                <td>{{ $s->waktu_selesai }}</td>
                <td>{{ $s->jumlah_hari }}</td>
                {{-- <td>{{ $s->status }}</td> --}}
                <td>
                    @if ($s->status == 'Inaktif')
                        <span class="badge bg-danger">Inaktif</span>
                    @else
                        <span class="badge bg-success">Aktif</span>
                    @endif
                </td>
                <td>
                    {{-- Update Button --}}
                    <div class="modal-warning me-1 mb-1 d-inline-block">
                        <button class="btn btn-sm btn-warning" wire:click="editSesi('{{ $s->sesi_id }}')">
                            <div data-bs-toggle="tooltip" data-bs-placement="top" title="Edit User">
                                <i class="bi bi-pencil"></i></a>
                            </div>
                        </button>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
