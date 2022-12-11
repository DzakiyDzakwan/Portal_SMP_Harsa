<div>
    {{-- Button Inactive Admin --}}
    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#trashedUser">
        <i class="bi bi-person-x-fill"></i> Inactive Admin
    </button>

    <!--Modal Inactive Admin -->
    <div class="modal fade text-left" id="trashedUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document" style="max-width: 50%">
            <div class="modal-content">
                <div class="modal-header bg-danger justify-content-center">
                    <h4 class="modal-title white " id="myModalLabel33">Inactive Admin</h4>
                </div>
                <div class="modal-body">
                    @livewire('list-inactive-user')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Restore --}}
    <div class="modal fade text-left" id="restoreModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title white" id="myModalLabel130">
                        Restore
                    </h5>
                </div>
                <div class="modal-body">Apakah anda yakin ingin mengembalikan akun?</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" wire:click="closeRestoreModal()">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button class="btn btn-success ml-1" wire:click="restoreUser()">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Restore</span>
                    </button>
                </div>
            </div>
        </div>
    </div>


    {{-- Modal Delete permanen --}}
    <div class="modal fade text-left" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title white" id="myModalLabel130">
                        Hapus
                    </h5>
                </div>
                <div class="modal-body">Apakah anda yakin ingin menghapus permanen?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" wire:click="closeDeleteModal()">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button class="btn btn-danger ml-1" wire:click="deleteUser()">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Hapus</span>
                    </button>
                </div>
            </div>
        </div>
    </div>


</div>
