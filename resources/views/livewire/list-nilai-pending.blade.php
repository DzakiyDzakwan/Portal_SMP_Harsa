<table class="table table-bordered" id="table1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Siswa</th>
            <th>Mata Pelajaran</th>
            <th>Nilai Pengetahuan</th>
            <th>Nilai Keterampilan</th>
            <th>Sesi</th>
            <th>Guru</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @if ($nilai_pending->isEmpty())
            <tr>
                <td class="text-center" colspan="9">List Pending Kosong</td>
            </tr>
        @else
            @foreach ($nilai_pending as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->siswa }}</td>
                    <td>{{ $item->nama_mapel }}</td>
                    <td>{{ $item->nilai_pengetahuan }}</td>
                    <td>{{ $item->nilai_keterampilan }}</td>
                    <td>
                        @if ($item->sesi == 'uh1')
                            {{ 'Ujian Harian 1' }}
                        @elseif ($item->sesi == 'uh2')
                            {{ 'Ujian Harian 2' }}
                        @elseif ($item->sesi == 'uh3')
                            {{ 'Ujian Harian 3' }}
                        @elseif ($item->sesi == 'uts')
                            {{ 'Ujian Tengah Semester' }}
                        @else
                            {{ 'Ujian Akhir Semester' }}
                        @endif
                    </td>
                    <td>{{ $item->guru }}</td>
                    <td>
                        <span class="badge bg-secondary">{{ $item->status }}</span>
                    </td>
                    <td>
                        {{-- Accept Button --}}
                        <div class="modal-info me-1 mb-1 d-inline-block">
                            <button type="button" class="btn btn-sm btn-success"
                                wire:click="accept('{{ $item->nilai_id }}')">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Accept">
                                    <i class="bi bi-check-lg"></i>
                                </div>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
