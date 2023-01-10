<table class="table table-bordered" id="table1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Ekstrakulikuler</th>
            <th>Nama Siswa</th>
            <th>Tahun Ajaran Aktif</th>
            <th>Nilai</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($siswa as $e)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $e->nama_ekskul }}</td>
                <td>{{ $e->nama_siswa }}</td>
                <td>{{ $e->tahun_ajaran }}</td>
                <td>
                    @if ($e->nilai_ekskul == null)
                        -
                    @else
                        {{ $e->nilai_ekskul }}
                    @endif
                </td>
                <td>
                    {{-- Nilai Ekskull --}}
                    <div class="modal-info me-1 mb-1 d-inline-block ">
                        <button type="button" class="btn btn-sm btn-success"
                            wire:click="showModal('{{ $e->kontrak_semester_id }}')">
                            <div data-bs-toggle="tooltip" data-bs-placement="top" title="Nilai">
                                <i class="bi bi-clipboard-check-fill"></i>
                            </div>
                        </button>
                    </div>
                    {{-- Delete Button --}}
                    <div class="modal-danger me-1 mb-1 d-inline-block">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                            data-bs-target="#delete{{ $e->id }}">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                    {{-- Delete Modal --}}
                    <div class="modal fade text-left" id="delete{{ $e->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel130" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-danger">
                                    <h5 class="modal-title white" id="myModalLabel130">
                                        Hapus Data Ekstrakulikuler Siswa
                                    </h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">Apakah yakin menghapus {{ $e->nama_siswa }} dari ekstrakurikuler
                                    {{ $e->nama_ekskul }} ?</div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Close</span>
                                    </button>
                                    <button class="btn btn-danger ml-1" data-bs-dismiss="modal"
                                        wire:click="deleteEkskulSiswa('{{ $e->id }}')">
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
