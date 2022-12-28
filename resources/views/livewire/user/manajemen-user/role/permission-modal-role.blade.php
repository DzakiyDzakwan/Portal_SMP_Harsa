<div>
    <!--Modal Permission Role -->
    <div wire:ignore.self class="modal modal-lg fade text-left" id="permissionModal" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel130" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary justify-content-center">
                    <h4 class="modal-title white " id="myModalLabel33">Permission Role</h4>
                </div>
                <form class="form form-vertical" wire:submit.prevent="update">
                    @csrf
                    <div class="form-body modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="name">Role</label>
                                    <div class="position-relative">
                                        <input name="name" type="text"
                                            class="form-control @error('name')is-invalid @enderror" placeholder="name"
                                            id="name" wire:model.defer="name" disabled />
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                        @error('name')
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
                                    <label for="edit-password">Roles</label>
                                    <div class="position-relative">
                                        @foreach ($permission as $item)
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="{{ $item->id }}"
                                                    value="{{ $item->name }}" wire:model="rolePermission">
                                                <label class="form-check-label"
                                                    for="{{ $item->id }}">{{ $item->name }}</label>
                                            </div>
                                        @endforeach
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
