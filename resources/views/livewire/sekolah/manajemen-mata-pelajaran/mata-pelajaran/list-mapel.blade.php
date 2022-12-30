<table class="table table-bordered" id="table1">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Mapel</th>
            <th>Nama Mapel</th>
            <th>Kelompok Mapel</th>
            <th>KKM</th>
            <th>Kurikulum</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($mapel as $pel)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pel->mapel_id }}</td>
                <td>{{ $pel->nama_mapel }}</td>
                <td>
                    @if ($pel->kelompok_mapel == 'B')
                        {{ 'Peminatan' }}
                    @else
                        {{ 'Wajib' }}
                    @endif
                </td>
                <td>{{ $pel->kkm }}</td>
                <td>{{ $pel->kurikulum }}</td>
                <td>
                    {{-- Update Button --}}
                    <div class="modal-warning me-1 mb-1 d-inline-block">
                        <button type="button" data-bs-target="#createModal" class="btn btn-sm btn-warning"
                            wire:click="editMapel('{{ $pel->mapel_id }}')">
                            <i class="bi
                            bi-pencil"></i>
                        </button>
                    </div>
                    {{-- Delete Button --}}
                    <div class="modal-danger me-1 mb-1 d-inline-block">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                            data-bs-target="#delete{{ $pel->mapel_id }}">
                            <i class="bi bi-trash"></i></a>
                        </button>
                    </div>
                    {{-- Modal Delete --}}
                    <div class="modal fade text-left" id="delete{{ $pel->mapel_id }}" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel130" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header justify-content-center bg-danger">
                                    <h5 class="modal-title white" id="myModalLabel130">
                                        Nonaktifkan Mata Pelajaran {{ $pel->nama_mapel }}
                                    </h5>
                                </div>
                                <div class="modal-body">Apakah yakin menonaktifkan mata pelajaran ini?</div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Close</span>
                                    </button>
                                    <button class="btn btn-danger ml-1" data-bs-dismiss="modal"
                                        wire:click="inactiveMapel('{{ $pel->mapel_id }}')">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Hapus</span>
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
