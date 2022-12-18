<div>
    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#historyModal">
        <i class="bi bi-clock-history me-1"></i>history penilaian
    </button>

    <!--Modal Sesi Penilaian -->
    <div wire:ignore.self class="modal modal-lg fade text-left" id="historyModal" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document"
            style="max-width: 100%;
            width:70%;">
            <div class="modal-content">
                <div class="modal-header bg-info justify-content-center">
                    <h4 class="modal-title white" id="myModalLabel33">
                        History Konfirmasi
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-bordered" id="table2">
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($nilai->isEmpty())
                                        <tr>
                                            <td class="text-center" colspan="8">History Kosong</td>
                                        </tr>
                                    @else
                                        @foreach ($nilai as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->siswa }}</td>
                                                <td>{{ $item->nama_mapel }}</td>
                                                <td>{{ $item->nilai_pengetahuan }}</td>
                                                <td>{{ $item->nilai_keterampilan }}</td>
                                                <td>{{ $item->sesi }}</td>
                                                <td>{{ $item->guru }}</td>
                                                @if ($item->status == 'confirmed')
                                                    <td>
                                                        <span class="badge bg-success">{{ $item->status }}</span>
                                                    </td>
                                                @else
                                                    <td>
                                                        <span class="badge bg-danger">{{ $item->status }}</span>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-light-secondary" data-bs-dismiss="modal">
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
