<table class="table table-bordered" id="table1">
    <thead>
        <tr>
            <th>No</th>
            <th>Guru</th>
            <th>Mata Pelajaran</th>
            <th>Kelompok</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($mapelguru as $mg)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $mg->nama }}</td>
                <td>{{ $mg->nama_mapel }}
                <td>
                    @if ($mg->kelompok_mapel == 'B')
                        {{ $mg->kelompok_mapel }}( Peminatan )
                    @else
                        {{ $mg->kelompok_mapel }}( Wajib )
                    @endif
                </td>

                </td>
                <td>
                    {{-- Update Button --}}
                    {{-- <div class="modal-warning me-1 mb-1 d-inline-block">
                        <button type="button" data-bs-target="#createModal" class="btn btn-sm btn-warning"
                            wire:click="editMapelGuru('{{ $mg->mapel_guru_id }}')">
                            <i class="bi
                            bi-pencil"></i>
                        </button>
                    </div> --}}
                    {{-- Delete Button --}}
                    <div class="modal-danger me-1 mb-1 d-inline-block">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                            data-bs-target="#delete{{ $mg->mapel_guru_id }}">
                            <i class="bi bi-trash"></i></a>
                        </button>
                    </div>
                    {{-- Modal Delete --}}
                    <div class="modal fade text-left" id="delete{{ $mg->mapel_guru_id }}" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel130" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header justify-content-center bg-danger">
                                    <h5 class="modal-title white" id="myModalLabel130">
                                        Nonaktifkan Mata Pelajaran {{ $mg->nama_mapel }}-{{ $mg->nama }}
                                    </h5>
                                </div>
                                <div class="modal-body">Apakah yakin menonaktifkan mata pelajaran ini?</div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Close</span>
                                    </button>
                                    <button class="btn btn-danger ml-1" data-bs-dismiss="modal"
                                        wire:click="delete('{{ $mg->mapel_guru_id }}')">
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
