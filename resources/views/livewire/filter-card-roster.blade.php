<div class="row">
    {{-- Tahun Ajaran Aktif --}}
    <div class="col-12 col-md-4">
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
    {{-- Semester Aktif --}}
    <div class="col-12 col-md-4">
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center">
                        <h6 class="text-muted font-semibold">Semester</h6>
                        <select wire:model="semester_aktif" name="semester_aktif"
                            class="form-select form-control text-center text-success font-extrabold" id="basicSelect">
                            <option value="ganjil">Ganjil</option>
                            <option value="genap">Genap</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Kelas --}}
    <div class="col-12 col-md-4">
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center">
                        <h6 class="text-muted font-semibold">Kelas</h6>
                        <select wire:model="kelas_aktif" name="kelas"
                            class="form-select form-control text-center text-success font-extrabold" id="basicSelect">
                            @foreach ($kelas as $item)
                                <option value="{{ $item->kelas_aktif_id }}">
                                    {{ $item->grade }}-{{ $item->kelompok_kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
