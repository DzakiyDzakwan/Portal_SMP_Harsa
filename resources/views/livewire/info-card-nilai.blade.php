<div class="row">
    <div class="col-12 col-lg-4 col-md-6">
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div
                        class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center md-justify-content-start">
                        <div class="stats-icon purple mb-2">
                            <div data-bs-toggle="tooltip" data-bs-placement="top" title="Total Kelas">
                                <i class="bi bi-clock-fill"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center md-text-start">
                        <h6 class="text-muted font-semibold">Sesi Aktif</h6>
                        @if ($sesi->isEmpty())
                            <h6 class="font-extrabold mb-0">Tidak ada Sesi</h6>
                        @else
                            <h6 class="font-extrabold mb-0">Ulangan Harian 1</h6>
                        @endif
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
                        <div class="stats-icon green mb-2">
                            <div data-bs-toggle="tooltip" data-bs-placement="top" title="Total Ruangan">
                                <i class="bi bi-calendar2-check"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center md-text-start">
                        <h6 class="text-muted font-semibold">Tanggal Mulai</h6>
                        @if ($sesi->isEmpty())
                            <h6 class="font-extrabold mb-0">-</h6>
                        @else
                            <h6 class="font-extrabold mb-0">14 Desember 2022, 00:00:00</h6>
                        @endif
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
                        @if ($sesi->isEmpty())
                            <h6 class="font-extrabold mb-0">-</h6>
                        @else
                            <h6 class="font-extrabold mb-0 ">21 Desember 2022, 23:59:00</h6>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
