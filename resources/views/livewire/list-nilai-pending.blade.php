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
                    <td>{{ $item->sesi }}</td>
                    <td>{{ $item->guru }}</td>
                    <td>
                        <span class="badge bg-secondary">{{ $item->status }}</span>
                    </td>
                    {{-- <td> --}}
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
