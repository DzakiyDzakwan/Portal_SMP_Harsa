<table class="table table-bordered" id="table1">
    <thead>
        <tr>
            <th>No</th>
            <th>NUPTK</th>
            <th>Nama Guru</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($walis as $w)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $w->NUPTK }}</td>
                <td>{{ $w->nama }}</td>
                <td>
                    {{-- Delete Button --}}
                    <div class="modal-danger me-1 mb-1 d-inline-block">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                            data-bs-target="#delete{{ $w->user }}">
                            <i class="bi bi-trash"></i></a>
                        </button>
                    </div>
                    {{-- Modal Delete --}}
                    <div class="modal fade text-left" id="delete{{ $w->user }}" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel130" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header justify-content-center bg-danger">
                                    <h5 class="modal-title white" id="myModalLabel130">
                                        Hapus Wali Kelas
                                    </h5>
                                </div>
                                <div class="modal-body">Apakah yakin menghapus {{ $w->nama }} sebagai Wali Kelas?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Close</span>
                                    </button>
                                    <button class="btn btn-danger ml-1" data-bs-dismiss="modal"
                                        wire:click="delete('{{ $w->user }}')">
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
