<div class="row">
    {{-- Tahun Ajaran Aktif --}}
    <div class="col-12 col-md-12">
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center">
                        <h6 class="text-muted font-semibold">Tahun Akademik</h6>
                        <select wire:model="tahun_ajaran_aktif" name="nama_sesi"
                            class="form-select form-control text-center text-success font-extrabold" id="basicSelect">
                            @foreach ($tahunAjaran as $item)
                                <option value="{{ $item->tahun_ajaran }}">{{ $item->tahun_ajaran }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
