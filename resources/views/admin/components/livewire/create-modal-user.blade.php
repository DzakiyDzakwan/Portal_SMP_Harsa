<!--Modal Tambah Admin -->
<div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130"
aria-hidden="true">
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
                            <label for="first-name-icon">Username</label>
                            <div class="position-relative">
                                <input name="username" type="text" class="form-control"
                                    placeholder="Input with icon left" id="first-name-icon" wire:model.defer="username" />
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
                                    placeholder="Password" id="password-id-icon" wire:model.defer="password" />
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
</div>
