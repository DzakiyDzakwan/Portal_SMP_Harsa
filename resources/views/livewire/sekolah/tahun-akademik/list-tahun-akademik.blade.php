<table class="table table-bordered" id="table1">
    <thead>
        <tr>
            <th>No</th>
            <th>Tahun Ajaran</th>
            <th>Semester</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Akhir</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @if (!$tahunAkademik->isEmpty())
            @foreach ($tahunAkademik as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->tahun_ajaran }}</td>
                    <td>{{ strtoupper(substr($item->semester, 0, 1)) . substr($item->semester, 1) }}</td>
                    <td>{{ $item->tanggal_mulai }}</td>
                    <td>{{ $item->tanggal_berakhir }}</td>
                    <td>
                        @if ($item->status === 'aktif')
                            <span class="badge bg-success">{{ $item->status }}</span>
                        @elseif($item->status === 'selesai')
                            <span class="badge bg-danger">{{ $item->status }}</span>
                        @else
                            <span class="badge bg-warning">{{ $item->status }}</span>
                        @endif
                    </td>
                    @if ($item->status === 'aktif' || $item->status === 'inaktif')
                        <td>
                            <!-- Update Button -->
                            <div class="modal-warning me-1 mb-1 d-inline-block">
                                <button class="btn btn-sm btn-warning" wire:click="editTahun('{{ $item->id }}')">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Role">
                                        <i class="bi bi-pencil"></i></a>
                                    </div>
                                </button>
                            </div>
                        </td>
                    @endif
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
