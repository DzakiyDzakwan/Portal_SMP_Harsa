<div class="row">
    {{-- Tahun Ajaran Aktif --}}
    <div class="col-12 col-md-6">
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center">
                        <h6 class="text-muted font-semibold">Tahun Akademik Aktif</h6>
                        <h6 class="font-extrabold text-success mb-0">{{ $tahunAktif == null ? '-' : $tahunAktif }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Semester Aktif --}}
    <div class="col-12 col-md-6">
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center">
                        <h6 class="text-muted font-semibold">Semester Aktif</h6>
                        <h6 class="font-extrabold text-success mb-0">
                            {{ $semesterAktif == null ? '-' : strtoupper(substr($semesterAktif, 0, 1)) . substr($semesterAktif, 1) }}
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
