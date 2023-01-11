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
        </tr>
    </thead>
    <tbody>
        @foreach ($sesi as $s)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    @if ($s->nama_sesi == 'uh1')
                        {{ 'Ulangan Harian 1' }}
                    @elseif ($s->nama_sesi == 'uh2')
                        {{ 'Ulangan Harian 2' }}
                    @elseif ($s->nama_sesi == 'uh3')
                        {{ 'Ulangan Harian 3' }}
                    @elseif ($s->nama_sesi == 'uts')
                        {{ 'Ujian Tengah Semester' }}
                    @else
                        {{ 'Ujian Akhir Semester' }}
                    @endif
                </td>
                <td>{{ $s->tahun_ajaran_aktif }}</td>
                <td>{{ $s->semester_aktif }}</td>
                <td>{{ $s->tanggal_mulai }}</td>
                <td>{{ $s->tanggal_berakhir }}</td>
                <td>{{ $s->jumlah_hari }} Hari</td>
                {{-- <td>{{ $s->status }}</td> --}}
                <td>
                    @if ($s->status == 'aktif')
                        <span class="badge bg-success">Aktif</span>
                    @elseif($s->status == 'selesai')
                        <span class="badge bg-danger">Selesai</span>
                    @else
                        <span class="badge bg-warning">Inaktif</span>
                    @endif
                </td>
                {{-- @if ($s->status !== 'selesai')
                    <td>
                        <div class="modal-warning me-1 mb-1 d-inline-block">
                            <button class="btn btn-sm btn-warning" wire:click="editSesi('{{ $s->id }}')">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Edit User">
                                    <i class="bi bi-pencil"></i></a>
                                </div>
                            </button>
                        </div>
                    </td>
                @endif --}}
            </tr>
        @endforeach
    </tbody>
</table>
