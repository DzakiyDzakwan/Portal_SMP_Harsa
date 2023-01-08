<table class="table table-bordered" id="table1">
    <thead>
        <tr>
            <th rowspan="2" class="text-center align-middle">No</th>
            <th rowspan="2" class="text-center align-middle">Nama Siswa</th>
            <th colspan="3" class="text-center">UH1</th>
            <th colspan="3" class="text-center">UH3</th>
            <th colspan="3" class="text-center">UH3</th>
            <th colspan="3" class="text-center">UTS</th>
            <th colspan="3" class="text-center">UAS</th>
            <th rowspan="2" class="text-center align-middle">Action</th>
        </tr>
        <tr>
            <th>Pengetahuan</th>
            <th>Keterampilan</th>
            <th>Status</th>
            <th>Pengetahuan</th>
            <th>Keterampilan</th>
            <th>Status</th>
            <th>Pengetahuan</th>
            <th>Keterampilan</th>
            <th>Status</th>
            <th>Pengetahuan</th>
            <th>Keterampilan</th>
            <th>Status</th>
            <th>Pengetahuan</th>
            <th>Keterampilan</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @if ($siswa->isEmpty())
        @else
            @foreach ($siswa as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    @php
                        $uh1 = DB::table('nilais')
                            ->where('kontrak_siswa', $item->kontrak_semester_id)
                            ->where('mapel', $mapel)
                            ->where('jenis', 'uh1')
                            ->first();
                        
                        $uh2 = DB::table('nilais')
                            ->where('kontrak_siswa', $item->kontrak_semester_id)
                            ->where('mapel', $mapel)
                            ->where('jenis', 'uh2')
                            ->first();
                        
                        $uh3 = DB::table('nilais')
                            ->where('kontrak_siswa', $item->kontrak_semester_id)
                            ->where('mapel', $mapel)
                            ->where('jenis', 'uh3')
                            ->first();
                        
                        $uts = DB::table('nilais')
                            ->where('kontrak_siswa', $item->kontrak_semester_id)
                            ->where('mapel', $mapel)
                            ->where('jenis', 'uts')
                            ->first();
                        
                        $uas = DB::table('nilais')
                            ->where('kontrak_siswa', $item->kontrak_semester_id)
                            ->where('mapel', $mapel)
                            ->where('jenis', 'uas')
                            ->first();
                        
                    @endphp
                    {{-- Ulangan Harian 1 --}}
                    <td class="text-center">
                        @if ($uh1 == null)
                            -
                        @else
                            {{ $uh1->nilai_pengetahuan }}
                        @endif
                    </td>
                    <td class="text-center">
                        @if ($uh1 == null)
                            -
                        @else
                            {{ $uh1->nilai_keterampilan }}
                        @endif
                    </td>
                    <td class="text-center">
                        @if ($uh1 == null)
                            -
                        @else
                            {{ $uh1->status }}
                        @endif
                    </td>

                    {{-- Ulangan Harian 2 --}}
                    <td class="text-center">
                        @if ($uh2 == null)
                            -
                        @else
                            {{ $uh2->nilai_pengetahuan }}
                        @endif
                    </td>
                    <td class="text-center">
                        @if ($uh2 == null)
                            -
                        @else
                            {{ $uh2->nilai_keterampilan }}
                        @endif
                    </td>
                    <td class="text-center">
                        @if ($uh2 == null)
                            -
                        @else
                            {{ $uh2->status }}
                        @endif
                    </td>

                    {{-- Ulangan Harian 3 --}}
                    <td class="text-center">
                        @if ($uh3 == null)
                            -
                        @else
                            {{ $uh3->nilai_pengetahuan }}
                        @endif
                    </td>
                    <td class="text-center">
                        @if ($uh3 == null)
                            -
                        @else
                            {{ $uh3->nilai_keterampilan }}
                        @endif
                    </td>
                    <td class="text-center">
                        @if ($uh3 == null)
                            -
                        @else
                            {{ $uh3->status }}
                        @endif
                    </td>

                    {{-- UJian Tengah Semester --}}
                    <td class="text-center">
                        @if ($uts == null)
                            -
                        @else
                            {{ $uts->nilai_pengetahuan }}
                        @endif
                    </td>
                    <td class="text-center">
                        @if ($uts == null)
                            -
                        @else
                            {{ $uts->nilai_keterampilan }}
                        @endif
                    </td>
                    <td class="text-center">
                        @if ($uts == null)
                            -
                        @else
                            {{ $uts->status }}
                        @endif
                    </td>

                    {{-- Ujian Akhir Semester --}}
                    <td class="text-center">
                        @if ($uas == null)
                            -
                        @else
                            {{ $uas->nilai_pengetahuan }}
                        @endif
                    </td>
                    <td class="text-center">
                        @if ($uas == null)
                            -
                        @else
                            {{ $uas->nilai_keterampilan }}
                        @endif
                    </td>
                    <td class="text-center">
                        @if ($uas == null)
                            -
                        @else
                            {{ $uas->status }}
                        @endif
                    </td>

                    <td>
                        <div class="modal-info me-1 mb-1 d-inline-block ">
                            <button type="button"
                                class="btn btn-sm btn-success @if ($sesi == null) disabled @endif"
                                wire:click="showModal('{{ $item->kontrak_semester_id }}')">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Nilai">
                                    <i class="bi bi-clipboard-check-fill"></i>
                                </div>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
