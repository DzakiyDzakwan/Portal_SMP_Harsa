<div>
    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#createModal">
        <i class="bi bi-plus-circle"></i>&nbsp Tambah Admin
    </button>

    <!--Modal Tambah Admin -->
    <div wire:ignore.self class="modal fade text-left" id="createModal" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel130" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success justify-content-center">
                    <h4 class="modal-title white " id="myModalLabel33">Tambah Admin</h4>
                </div>
                <form class="form form-vertical" wire:submit.prevent="store">
                    @csrf
                    <div class="form-body modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="username">NUPTK</label>
                                    <div class="position-relative">
                                        <input name="NUPTK" type="number"
                                            class="form-control @error('NUPTK') is-invalid @enderror "
                                            placeholder="NUPTK" id="NUPTK" wire:model.defer="NUPTK" />
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                        @error('NUPTK')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="password">Password</label>
                                    <div class="position-relative">
                                        <input name="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Password" id="password" wire:model.defer="password" />
                                        <div class="form-control-icon">
                                            <i class="bi bi-lock"></i>
                                        </div>
                                        @error('password')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="password">Tanggal Masuk</label>
                                    <div class="position-relative">
                                        <input name="tanggal_masuk" type="date"
                                            class="form-control @error('tanggal_masuk') is-invalid @enderror"
                                            placeholder="Tanggal Masuk" id="tanggal_masuk" wire:model.defer="tanggal_masuk" />
                                        <div class="form-control-icon">
                                            <i class="bi bi-lock"></i>
                                        </div>
                                        @error('tanggal_masuk')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="button" class="btn btn-light-secondary me-1 mb-1"
                                    data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Close</span>
                                </button>
                                <button type="submit" class="btn btn-success me-1 mb-1">
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
