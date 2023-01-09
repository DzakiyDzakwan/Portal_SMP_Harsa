<form class="form form-horizontal" wire:submit.prevent="update">
    <div class="form-body">
        <div class="row">
            <div class="col-md-4">
                <label>Password</label>
            </div>
            <div class="col-md-8 form-group">
                <input type="password" id="password" class="form-control" wire:model.defer="password"
                    placeholder="Password">
                    @error('password')
                    <span class="help-block text-danger">
                        {{ $message }}
                    </span>
                    @enderror
            </div>
            <div class="col-md-4">
                <label>Konfirmasi Password</label>
            </div>
            <div class="col-md-8 form-group">
                <input type="password" id="password_confirmation" class="form-control" wire:model.defer="password_confirmation"
                    placeholder="Konfirmasi Password">
                    @error('password_confirmation')
                    <span class="help-block text-danger">
                        {{ $message }}
                    </span>
                    @enderror
            </div>
            <div class="col-sm-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
            </div>
        </div>
    </div>
</form>

