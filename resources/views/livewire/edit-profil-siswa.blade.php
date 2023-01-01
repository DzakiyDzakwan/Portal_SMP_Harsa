 <div class="row">
    <div class="col-12">
        <div class="pt-3 px-3">
            <form class="form form-horizontal" wire:submit.prevent="update">
                @csrf
                <div class="form-body ">
                    <div class="row">
                        <div class="col-md-3">
                            <label>Profile Picture</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input class="form-control" type="file" id="foto"
                             wire:model.defer="foto">
                        </div>
                        <div class="col-md-3">
                            <label>Email</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input type="text" id="email" wire:model.defer="email"
                                class="form-control" placeholder="Email">
                                @error('email')
                                <span class="help-block text-danger">
                                    {{ $message }}
                                </span>
                                @enderror
                        </div>
                        <div class="col-md-3">
                            <label>Nama</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input type="text" id="nama" class="form-control" wire:model.defer="nama"
                                 placeholder="Nama">
                                 @error('nama')
                                <span class="help-block text-danger">
                                    {{ $message }}
                                </span>
                                @enderror
                        </div>
                        <div class="col-md-3">
                            <label>Jenis Kelamin</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <select class="form-select" id="basicSelect" name="jenis_kelamin" wire:model.defer="jenis_kelamin">
                                <option value="{{ $jenis_kelamin }}">{{ $jenis_kelamin }}</option>
                                <option value="LK">LK</option>
                                <option value="PR">PR</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Tanggal Lahir</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input type="date" id="tgl_lahir" class="form-control"
                                wire:model.defer="tgl_lahir" placeholder="Tanggal Lahir">
                                @error('tgl_lahir')
                                <span class="help-block text-danger">
                                    {{ $message }}
                                </span>
                                @enderror
                        </div>
                        <div class="col-md-3">
                            <label>Tempat Lahir</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input type="text" id="tempat_lahir" class="form-control"
                                wire:model.defer="tempat_lahir" placeholder="Tempat Lahir">
                                @error('tempat_lahir')
                                <span class="help-block text-danger">
                                    {{ $message }}
                                </span>
                                @enderror
                        </div>
                        <div class="col-md-3">
                            <label>Alamat Tinggal</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input type="text" id="alamat_tinggal" class="form-control"
                                wire:model.defer="alamat_tinggal" placeholder="Alamat Tinggal">
                                @error('alamat_tinggal')
                                <span class="help-block text-danger">
                                    {{ $message }}
                                </span>
                                @enderror
                        </div>
                        <div class="col-md-3">
                            <label>Alamat Domisili</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input type="text" id="alamat_domisili" class="form-control"
                                wire:model.defer="alamat_domisili" placeholder="Alamat Domisili">
                                @error('alamat_domisili')
                                <span class="help-block text-danger">
                                    {{ $message }}
                                </span>
                                @enderror
                        </div>
                        <div class="col-md-3">
                            <label>Anak ke</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input type="text" id="anak_ke" class="form-control"
                                wire:model.defer="anak_ke" placeholder="anak-ke">
                                @error('anak_ke')
                                <span class="help-block text-danger">
                                    {{ $message }}
                                </span>
                                @enderror
                        </div>
                        <div class="col-md-3">
                            <label>Nama Ayah</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input type="text" id="nama_ayah" class="form-control" 
                                wire:model.defer="nama_ayah" placeholder="Nama Ayah">
                                @error('nama_ayah')
                                <span class="help-block text-danger">
                                    {{ $message }}
                                </span>
                                @enderror
                        </div>
                        <div class="col-md-3">
                            <label>Pekerjaan Ayah</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input type="text" id="pekerjaan_ayah" class="form-control"
                                wire:model.defer="pekerjaan_ayah" placeholder="Pekerjaan Ayah">
                                @error('pekerjaan_ayah')
                                <span class="help-block text-danger">
                                    {{ $message }}
                                </span>
                                @enderror
                        </div>
                        <div class="col-md-3">
                            <label>Nama Ibu</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input type="text" id="nama_ibu" class="form-control"
                                wire:model.defer="nama_ibu" placeholder="Nama Ibu">
                                @error('nama_ibu')
                                <span class="help-block text-danger">
                                    {{ $message }}
                                </span>
                                @enderror
                        </div>
                        <div class="col-md-3">
                            <label>Pekerjaan Ibu</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input type="text" id="pekerjaan_ibu" class="form-control"
                                wire:model.defer="pekerjaan_ibu" placeholder="Pekerjaan Ibu">
                                @error('pekerjaan_ibu')
                                <span class="help-block text-danger">
                                    {{ $message }}
                                </span>
                                @enderror
                        </div>
                        <div class="col-md-3">
                            <label>Alamat Orangtua</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input type="text" id="alamat_orangtua" class="form-control"
                                wire:model.defer="alamat_orangtua" placeholder="Alamat Orangtua">
                                @error('alamat_orangtua')
                                <span class="help-block text-danger">
                                    {{ $message }}
                                </span>
                                @enderror
                        </div>
                        <div class="col-md-3">
                            <label>Telepon Orangtua</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input type="text" id="telepon_orangtua" class="form-control"
                                wire:model.defer="telepon_orangtua" placeholder="Telepon Orangtua">
                                @error('telepon_orangtua')
                                <span class="help-block text-danger">
                                    {{ $message }}
                                </span>
                                @enderror
                        </div>
                        <div class="col-md-3">
                            <label>Nama Wali</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input type="text" id="alamat_wali" class="form-control"
                                wire:model.defer="nama_wali" placeholder="Nama Wali">
                        </div>
                        <div class="col-md-3">
                            <label>Pekerjaan Wali</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input type="text" id="pekerjaan_wali" class="form-control"
                                wire:model.defer="pekerjaan_wali" placeholder="Pekerjaan Wali">
                        </div>
                        <div class="col-md-3">
                            <label>Telepon Wali</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input type="text" id="telepon_wali" class="form-control"
                                wire:model.defer="telepon_wali" placeholder="Telepon Wali">
                        </div>
                        <div class="form-group  px-3 pt-2 modal-footer">
                            <a href="#" class="btn icon icon-left btn-danger m-3 px-3"><i
                                    data-feather="x"></i>
                                Cancel</a>
                            <button type="submit" class="btn icon icon-left btn-success px-3"><i
                                    data-feather="check-circle"></i>
                                Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> 

