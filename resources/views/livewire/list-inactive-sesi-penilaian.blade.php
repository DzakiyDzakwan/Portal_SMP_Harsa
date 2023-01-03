<div>
    <table class="table table-bordered m-o" id="table2">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Sesi</th>
                <th>Tahun ajaran</th>
                <th>Waktu Mulai</th>
                <th>Waktu Selesai</th>
                <th>Jumlah Hari</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @if ($inactivesesipenilaian != null)
                @foreach ($inactivesesipenilaian as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_sesi }}</td>
                        <td>{{ $item->tahun_ajaran_aktif }}</td>
                        <td> {{ $item->waktu_mulai }} </td>
                        <td> {{ $item->waktu_selesai }} </td>
                        <td> {{ $item->jumlah_hari }} </td>
                        <td> {{ $item->status }} </td>
                        <td>
                            <div class="modal-danger me-1 mb-1 d-inline-block">
                                <button type="button" class="btn btn-sm btn-success"
                                    wire:click="getRestoreModal('{{ $item->sesi_id }}')">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Restore">
                                        <i class="bi bi-arrow-repeat"></i></i>
                                    </div>
                                </button>
                            </div>
                            <div class="modal-danger me-1 mb-1 d-inline-block">
                                <button type="button" class="btn btn-sm btn-danger"
                                    wire:click="getDeleteModal('{{ $item->sesi_id }}')">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                                        <i class="bi bi-trash-fill"></i></i>
                                    </div>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif

        </tbody>
    </table>
</div>
