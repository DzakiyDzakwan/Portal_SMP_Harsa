<div class="row">
    <div class="col-12 col-lg-12 col-md-6">
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div class="col-md-12 flex-col text-left md-text-start">
                        <h5>Filter Rapor</h5>
                        <div class="row align-items-center">
                            <form class="form form-vertical" wire:submit.prevent="search">
                                @csrf
                                <div class="form-body modal-body">
                                    <div class="row">

                                        {{-- start --}}
                                        <div class="col-6">
                                            <div class="form-group has-icon-left">
                                                {{--  <label for="start">Waktu Mulai</label> --}}
                                                <div class="position-relative">
                                                    <select name="semester"
                                                        class="form-select form-control @error('semester') is-invalid @enderror"
                                                        id="basicSelect" wire:model="semester">
                                                        <option value="">Pilih Semester</option>
                                                        @foreach ($kontrak as $item)
                                                            <option value="{{ $item->kontrak_semester_id }}">
                                                                @if ($item->semester_aktif == 'ganjil')
                                                                    Ganjil
                                                                @else
                                                                    Genap
                                                                @endif
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-clipboard-data"></i>
                                                    </div>
                                                    @error('semester')
                                                        <div class="invalid-feedback">
                                                            <i class="bx bx-radio-circle"></i>
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        {{-- end --}}
                                        <div class="col-6">
                                            <div class="form-group has-icon-left">
                                                {{-- <label for="end">Waktu Akhir</label> --}}
                                                <div class="position-relative">
                                                    <select name="jenis"
                                                        class="form-select form-control @error('jenis') is-invalid @enderror"
                                                        id="basicSelect" wire:model="jenis">
                                                        <option value="">Jenis Rapor</option>
                                                        <option value="uh1">Ulangan Harian 1</option>
                                                        <option value="uh2">Ulangan Harian 2</option>
                                                        <option value="uh3">Ulangan Harian 3</option>
                                                        <option value="uts">Ulangan Tengah Semester</option>
                                                        <option value="uas">Ulangan Akhir Semester</option>
                                                    </select>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-clipboard-data"></i>
                                                    </div>
                                                    @error('end')
                                                        <div class="invalid-feedback">
                                                            <i class="bx bx-radio-circle"></i>
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        {{-- <div class="col-2 ">
                                            <button type="submit" class="btn btn-sm btn-primary me-1 w-full">
                                                cari
                                            </button>
                                        </div> --}}
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="col-6 col-lg-4 col-md-6">
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div
                        class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center md-justify-content-start">
                        <div class="stats-icon green mb-2">
                            <div data-bs-toggle="tooltip" data-bs-placement="top" title="Total Ruangan">
                                <i class="bi bi-calendar2-check"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center md-text-start">
                        <h6 class="text-muted font-semibold">Tanggal Mulai</h6>
                        <h6 class="font-extrabold mb-0">asdasdasds</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-4 col-md-6">
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div
                        class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center md-justify-content-start">
                        <div class="stats-icon red mb-2">
                            <div data-bs-toggle="tooltip" data-bs-placement="top" title="Wali Kelas">
                                <i class="bi bi-calendar-x-fill"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center md-text-start">
                        <h6 class="text-muted font-semibold">Tanggal Berakhir</h6>
                        <h6 class="font-extrabold mb-0 ">asdasdasd</h6>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</div>
