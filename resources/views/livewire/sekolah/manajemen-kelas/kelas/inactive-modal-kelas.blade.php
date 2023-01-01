
{{-- Button Inactive Kelas --}}
<button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#inactiveModal">
    <i class="bi bi-person-workspace"></i> Inactive Kelas
</button>

<!--Modal Inactive Kelas -->
<div class="modal fade text-left modal-lg" id="inactiveModal" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel130" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger justify-content-center">
                <h4 class="modal-title white " id="myModalLabel33">Inactive Kelas</h4>
            </div>
            <div class="modal-body">
                @livewire('list-inactive-kelas')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-light-secondary" data-bs-dismiss="modal">
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
            <div class="modal-body">
                <form class="form form-vertical" wire:submit.prevent="restoreUser()">
                    @csrf
                    <div class="form-body modal-body">
                        <div class="row">
                            {{-- Wali kelas --}}
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="wali">Pilih Wali Kelas</label>
                                    <div class="position-relative">
                                        <select name="wali_kelas"
                                            class="form-select form-control @error('wali_kelas') is-invalid @enderror"
                                            id="basicSelect" wire:model.defer="wali_kelas">
                                            @if (!$gurus->isEmpty())
                                                @foreach ($gurus as $gr)
                                                    <option value="{{ $gr->NUPTK }}">{{ $gr->nama }}</option>
                                                @endforeach
                                            @else
                                                <option>Tidak ada guru yang tersedia</option>
                                            @endif
                                        </select>
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="button" class="btn btn-light-secondary me-1 mb-1" data-bs-dismiss="modal">
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
            <div class="modal-body">Apakah anda yakin ingin menghapus permanen {{ $kelas_id }}?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
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

@section('script')
<script>
    //Modal
    const createModal = new bootstrap.Modal('#createModal', {
        keyboard: false
    })
    const editModal = new bootstrap.Modal('#editModal', {
        keyboard: false
    })
    // const infoModal = new bootstrap.Modal('#infoModal', {
    //     keyboard: false
    // })
    const deleteModal = new bootstrap.Modal('#deleteModal', {
        keyboard: false
    }) 

    window.addEventListener('close-create-modal', event => {
        createModal.hide();
    });
    window.addEventListener('edit-modal', event => {
        editModal.toggle();
    });
    // window.addEventListener('info-modal', event => {
    //     infoModal.toggle();
    // })
    window.addEventListener('delete-modal', event => {
        deleteModal.toggle();
    })

    //Toast
    const insertToast = new bootstrap.Toast('#insertToast')
    const inactiveToast = new bootstrap.Toast('#inactiveToast')
    const nonInactiveToast = new bootstrap.Toast('#nonInactiveToast')
    const updateToast = new bootstrap.Toast('#updateToast')
    const restoreToast = new bootstrap.Toast('#restoreToast')
    const deleteToast = new bootstrap.Toast('#deleteToast')


    window.addEventListener('insert-alert', e => {
        insertToast.show()
    })

    window.addEventListener('inactive-alert', e => {
        inactiveToast.show()
    })

    window.addEventListener('nonInactive-alert', e => {
        nonInactiveToast.show()
    })

    window.addEventListener('update-alert', e => {
        updateToast.show()
    })

    window.addEventListener('restore-alert', e => {
        restoreToast.show()
    })

    window.addEventListener('delete-alert', e => {
        deleteToast.show()
    })
</script>

@livewireScripts
    <script src="{{asset('assets/extensions/simple-datatables/umd/simple-datatables.js')}}"></script>
    <script src="{{asset('assets/js/pages/simple-datatables.js')}}"></script>
@endsection