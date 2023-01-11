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
                                <option value="LK">Laki-Laki</option>
                                <option value="PR">Perempuan</option>
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
                            <label>Pendidikan</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input type="text" id="pendidikan" class="form-control"
                                wire:model.defer="pendidikan" placeholder="Pendidikan">
                                @error('pendidikan')
                                <span class="help-block text-danger">
                                    {{ $message }}
                                </span>
                                @enderror
                        </div>
                        <div class="col-md-3">
                            <label>Tahun Ijazah</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input type="text" id="tahun_ijazah" class="form-control" 
                                wire:model.defer="tahun_ijazah" placeholder="Tahun Ijazah">
                                @error('tahun_ijazah')
                                <span class="help-block text-danger">
                                    {{ $message }}
                                </span>
                                @enderror
                        </div>
                        <div class="col-md-3">
                            <label>Status Perkawinan</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <select class="form-select" id="basicSelect" name="status_perkawinan" wire:model.defer="status_perkawinan">
                                <option value="{{ $status_perkawinan }}">{{ $status_perkawinan }}</option>
                                <option value="kawin">Kawin</option>
                                <option value="tidak kawin">Tidak Kawin</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Tanggal Masuk</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input type="date" id="tanggal_masuk" class="form-control"
                                wire:model.defer="tanggal_masuk" placeholder="Tanggal Masuk">
                                @error('tanggal_masuk')
                                <span class="help-block text-danger">
                                    {{ $message }}
                                </span>
                                @enderror
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


