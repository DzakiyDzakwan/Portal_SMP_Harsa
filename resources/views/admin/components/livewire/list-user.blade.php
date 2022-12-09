<table class="table table-bordered" id="table1">
    <thead>
        <tr>
            <th>No</th>
            <th>Uuid</th>
            <th>Username</th>
            <th>Role</th>
            <th>Created_at</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->uuid }}</td>
                <td>{{ $item->username }}</td>
                <td>{{ $item->role }}</td>
                <td>{{ $item->created_at }}</td>
                <td>
                    @if ($item->role == 'admin')
                    <!-- Update Button -->
                    <div class="modal-warning me-1 mb-1 d-inline-block">
                        {{-- <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                            data-bs-target="#update">
                            <div data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Admin">
                                <i class="bi bi-pencil"></i></a>
                            </div>
                        </button> --}}
                        <button class="btn btn-sm btn-warning" wire:click="editUser('{{$item->uuid}}')">
                            <div data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Admin">
                                <i class="bi bi-pencil"></i></a>
                            </div>
                        </button>
                    </div>
                    <!--Modal Edit Admin -->
                   {{--  <div class="modal fade text-left" id="update{{$loop->iteration}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130"
                    aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-warning justify-content-center">
                                    <h4 class="modal-title white " id="myModalLabel33">Edit Admin</h4>
                                </div>
                                <form wire:ignore.self class="form form-vertical" wire:submit.prevent="update">
                                    @csrf
                                    <div class="form-body modal-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group has-icon-left">
                                                    <label for="first-name-icon">Username</label>
                                                    <div class="position-relative">
                                                        <input name="username" type="text" class="form-control"
                                                            placeholder="Insert Username Here" id="first-name-icon" wire:model.defer="username"/>
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-person"></i>
                                                        </div>
                                                        <div class="invalid-feedback">
                                                            <i class="bx bx-radio-circle"></i>
                                                            This is invalid state.
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-12">
                                                <div class="form-group has-icon-left">
                                                    <label for="password-id-icon">Password</label>
                                                    <div class="position-relative">
                                                        <input name="password" type="password" class="form-control"
                                                            placeholder="New Password" id="password-id-icon" wire:model.defer="password" />
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-lock"></i>
                                                        </div>
                                                        <div class="invalid-feedback">
                                                            <i class="bx bx-radio-circle"></i>
                                                            This is invalid state.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="button" class="btn btn-light-secondary me-1 mb-1" data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Close</span>
                                                </button>
                                                <button type="submit" class="btn btn-success me-1 mb-1" data-bs-dismiss="modal">
                                                    Simpan
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> --}}
                    {{-- @livewire('edit-modal-user', ['uuid'=> $item->uuid, 'sequences'=>$loop->iteration]) --}}
                    <!--Delete Button-->
                    <div class="modal-danger me-1 mb-1 d-inline-block">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                            data-bs-target="#delete{{ $loop->iteration }}">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="NonAktif Admin">
                                    <i class="bi bi-person-x-fill"></i>
                                </div>
                        </button>
                    </div>
                    {{-- Modal Delete --}}
                    <div class="modal fade text-left" id="delete{{ $loop->iteration }}" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel130" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-danger">
                                    <h5 class="modal-title white" id="myModalLabel130">
                                        Nonaktifkan {{$item->username}}
                                    </h5>
                                </div>
                                <div class="modal-body">Apakah anda yakin ingin menonaktifkan {{$item->username}}?</div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Close</span>
                                    </button>
                                    <button class="btn btn-danger ml-1" data-bs-dismiss="modal" wire:click="inactive('{{$item->uuid}}')">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Hapus</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
