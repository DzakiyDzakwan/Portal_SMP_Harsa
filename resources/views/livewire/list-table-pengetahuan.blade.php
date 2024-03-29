{{-- Pengetahuan --}}
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h5 class="mb-3">Pengetahuan</h5>
            {{-- Table Kelompok A --}}
            <div>
                <h6>Kelompok A</h6>
                <table class="table table-bordered" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Mata Pelajaran</th>
                            <th>KKM</th>
                            <th>Nilai</th>
                            <th>Predikat</th>
                            <th>Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if ($kelompokA->isEmpty())
                            <tr>
                                <td class="text-center" colspan="6">Belum Ada Nilai</td>
                            </tr>
                        @else
                            @foreach ($kelompokA as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_mapel }}</td>
                                    <td>{{ $item->kkm_aktif }}</td>
                                    <td>{{ $item->nilai_pengetahuan }}</td>
                                    @if ($item->nilai_pengetahuan >= 0 && $item->nilai_pengetahuan < 81)
                                        <td>D</td>
                                    @elseif ($item->nilai_pengetahuan >= 81 && $item->nilai_pengetahuan <= 86)
                                        <td>C</td>
                                    @elseif ($item->nilai_pengetahuan > 86 && $item->nilai_pengetahuan <= 92)
                                        <td>B</td>
                                    @elseif ($item->nilai_pengetahuan > 92 && $item->nilai_pengetahuan <= 100)
                                        <td>A</td>
                                    @endif
                                    <td>{{ $item->deskripsi_pengetahuan }}</td>
                                </tr>
                            @endforeach
                        @endif

                    </tbody>
                </table>
            </div>

            {{-- Table Kelompok B --}}
            <div>
                <h6>Kelompok B</h6>
                <table class="table table-bordered" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Mata Pelajaran</th>
                            <th>KKM</th>
                            <th>Nilai</th>
                            <th>Predikat</th>
                            <th>Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if ($kelompokB->isEmpty())
                            <tr>
                                <td class="text-center" colspan="6">Belum Ada Nilai</td>
                            </tr>
                        @else
                            @foreach ($kelompokB as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_mapel }}</td>
                                    <td>{{ $item->kkm_aktif }}</td>
                                    <td>{{ $item->nilai_pengetahuan }}</td>
                                    @if ($item->nilai_pengetahuan >= 0 && $item->nilai_pengetahuan < 81)
                                        <td>D</td>
                                    @elseif ($item->nilai_pengetahuan >= 81 && $item->nilai_pengetahuan <= 86)
                                        <td>C</td>
                                    @elseif ($item->nilai_pengetahuan > 86 && $item->nilai_pengetahuan <= 92)
                                        <td>B</td>
                                    @elseif ($item->nilai_pengetahuan > 92 && $item->nilai_pengetahuan <= 100)
                                        <td>A</td>
                                    @endif
                                    <td>{{ $item->deskripsi_pengetahuan }}</td>
                                </tr>
                            @endforeach
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
