<table class="table table-bordered" id="table1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Sakit</th>
            <th>Izin</th>
            <th>Alpa</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($siswa as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama }}</td>
                <td>
                    <div class="d-flex justify-content-between align-items-center">
                        {{ $item->sakit }}
                        <div class="d-flex flex-column justify-content-between">
                            <span data-bs-toggle="tooltip" data-bs-placement="top" title="Increase">
                                <i class="bi bi-caret-up-fill text-success pointer" style="font-size: 12px"
                                    wire:click="sakitIncrease('{{ $item->NISN }}')"></i>
                            </span>
                            <span data-bs-toggle="tooltip" data-bs-placement="top" title="Decrease">
                                <i class="bi bi-caret-down-fill text-danger pointer" style="font-size: 12px"
                                    wire:click="sakitDecrease('{{ $item->NISN }}')"></i>
                            </span>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="d-flex
                                    justify-content-between align-items-center">
                        {{ $item->izin }}
                        <div class="d-flex flex-column justify-content-between">
                            <span data-bs-toggle="tooltip" data-bs-placement="top" title="Increase">
                                <i class="bi bi-caret-up-fill text-success pointer" style="font-size: 12px"
                                    wire:click="izinIncrease('{{ $item->NISN }}')"></i>
                            </span>
                            <span data-bs-toggle="tooltip" data-bs-placement="top" title="Decrease">
                                <i class="bi bi-caret-down-fill text-danger pointer" style="font-size: 12px"
                                    wire:click="izinDecrease('{{ $item->NISN }}')"></i>
                            </span>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="d-flex justify-content-between align-items-center">
                        {{ $item->alpa }}
                        <div class="d-flex flex-column justify-content-between">
                            <span data-bs-toggle="tooltip" data-bs-placement="top" title="Increase">
                                <i class="bi bi-caret-up-fill text-success pointer" style="font-size: 12px"
                                    wire:click="alpaIncrease('{{ $item->NISN }}')"></i>
                            </span>
                            <span data-bs-toggle="tooltip" data-bs-placement="top" title="Decrease">
                                <i class="bi bi-caret-down-fill text-danger pointer" style="font-size: 12px"
                                    wire:click="alpaDecrease('{{ $item->NISN }}')"></i>
                            </span>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="modal-info me-1 mb-1 d-inline-block">
                        <button type="button" class="btn btn-sm btn-info"
                            wire:click="infoSiswa('{{ $item->user }}')">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                    <div class="modal-info me-1 mb-1 d-inline-block">
                        <button type="button" class="btn btn-sm btn-warning"
                            wire:click="createPrestasi('{{ $item->NISN }}')">
                            <i class="bi bi-trophy-fill"></i>
                        </button>
                    </div>
                    {{-- <div class="modal-info me-1 mb-1 d-inline-block">
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                            data-bs-target="#add{{ $item->NISN }}">
                            <i class="bi bi-journal-text"></i>
                        </button>
                    </div> --}}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
