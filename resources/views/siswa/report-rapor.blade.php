<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rapor Hasil Pembelajaran</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
        table.table {
        border: 1px solid #1C6EA4;
        background-color: #FFFFFF;
        width: 100%;
        text-align: left;
        border-collapse: collapse;
        }
        table.table td, table.table th {
        border: 1px solid #000000;
        padding: 3px 2px;
        }
        table.table tbody td {
        font-size: 10pt;
        color: #000000;
        }
        table.table thead {
            border-bottom: 2px solid #2F2F2F;
        }
        table.table thead th {
        font-size: 10pt;
        font-weight: normal;
        color: #000000;
        }
        table.table tfoot td {
        font-size: 10pt;
        }
        table.table tfoot .links {
        text-align: right;
        }
        table.table tfoot .links a{
        display: inline-block;
        background: #1C6EA4;
        color: #FFFFFF;
        padding: 2px 8px;
        border-radius: 5px;
        }
    </style>
</head>
<body>
    <h4 align="center">PENCAPAIAN KOMPETENSI PESERTA DIDIK</h4>
    <table class="table" style="font-size: 10pt; border:none;" >
        @foreach ($siswa as $item)
            @foreach ($kontrak as $value)
        <tr style="border:none;">
            <td style="border:none;" style="border:none;">Nama Sekolah</td>
            <td style="border:none;" style="border:none;">:</td>
            <td style="border:none;" style="border:none;">SMP Harapan 1 Medan</td>
            <td style="border:none;" style="border:none;"></td>
            <td style="border:none;" style="border:none;">Kelas</td>
            <td style="border:none;" style="border:none;">:</td>
            <td style="border:none;" style="border:none;">{{ $value->nama_kelas_aktif }}</td>
        </tr>
        <tr style="border:none;">
            <td style="border:none;" style="border:none;">Alamat</td>
            <td style="border:none;" style="border:none;">:</td>
            <td style="border:none;" style="border:none;">Jl. Imam Bonjol No. 35 Medan</td>
            <td style="border:none;" style="border:none;"></td>
            <td style="border:none;" style="border:none;">Semester</td>
            <td style="border:none;" style="border:none;">:</td>
            <td style="border:none;" style="border:none;">{{ $value->semester_aktif }}</td>
        </tr>
        <tr style="border:none;">
            <td style="border:none;" style="border:none;">Nama Peserta Didik</td>
            <td style="border:none;" style="border:none;">:</td>
            <td style="border:none;" style="border:none;">{{ $item->nama }}</td>
            <td style="border:none;" style="border:none;"></td>
            <td style="border:none;" style="border:none;">Tahun Pelajaran</td>
            <td style="border:none;" style="border:none;">:</td>
            <td style="border:none;" style="border:none;">{{ $value->tahun_ajaran_aktif }}</td>
        </tr>
        <tr style="border:none;">
            <td style="border:none;">Nomor Induk/NISN</td>
            <td style="border:none;">:</td>
            <td style="border:none;">{{ Auth::user()->siswas->NISN }}</td>
        </tr>
            @endforeach
        @endforeach
    </table>

    {{-- Nilai Pengetahuan --}}
    <h5>A. PENGETAHUAN</h5>
    {{-- Kelompok A --}}
    <table class="table">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="30%">Mata Pelajaran</th>
                <th width="5%" align="center">KKM</th>
                <th width="5%" align="center">Nilai</th>
                <th width="5%" align="center">Predikat</th>
                <th>Deskripsi</th>
            </tr>
            <tr>
                <th colspan="6"><b>Kelompok A</b></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengetahuanA as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_mapel }}</td>
                    <td align="center">{{ $item->kkm_aktif }}</td>
                    <td align="center">{{ $item->nilai_pengetahuan }}</td>
                    <td align="center">{{ $item->indeks }}</td>
                    <td>{{ $item->deskripsi_pengetahuan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    {{-- Kelompok B --}}
    <table class="table">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="30%">Mata Pelajaran</th>
                <th width="5%" align="center">KKM</th>
                <th width="5%" align="center">Nilai</th>
                <th width="5%" align="center">Predikat</th>
                <th>Deskripsi</th>
            </tr>
            <tr>
                <th colspan="6"><b>Kelompok B</b></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengetahuanB as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_mapel }}</td>
                    <td align="center" align="center">{{ $item->kkm_aktif }}</td>
                    <td align="center" align="center">{{ $item->nilai_pengetahuan }}</td>
                    <td align="center" align="center">{{ $item->indeks }}</td>
                    <td>{{ $item->deskripsi_pengetahuan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Nilai Keterampilan --}}
    <h5>B. KETERAMPILAN</h5>
    {{-- Kelompok A --}}
    <table class="table">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="30%">Mata Pelajaran</th>
                <th width="5%" align="center">KKM</th>
                <th width="5%" align="center">Nilai</th>
                <th width="5%" align="center">Predikat</th>
                <th>Deskripsi</th>
            </tr>
            <tr>
                <th colspan="6"><b>Kelompok A</b></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($keterampilanA as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_mapel }}</td>
                    <td align="center">{{ $item->kkm_aktif }}</td>
                    <td align="center">{{ $item->nilai_keterampilan }}</td>
                    <td align="center">{{ $item->indeks }}</td>
                    <td>{{ $item->deskripsi_keterampilan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    {{-- Kelompok B --}}
    <table class="table">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="30%">Mata Pelajaran</th>
                <th width="5%" align="center">KKM</th>
                <th width="5%" align="center">Nilai</th>
                <th width="5%" align="center">Predikat</th>
                <th>Deskripsi</th>
            </tr>
            <tr>
                <th colspan="6"><b>Kelompok B</b></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($keterampilanB as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_mapel }}</td>
                    <td align="center">{{ $item->kkm_aktif }}</td>
                    <td align="center">{{ $item->nilai_keterampilan }}</td>
                    <td align="center">{{ $item->indeks }}</td>
                    <td>{{ $item->deskripsi_keterampilan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>

    {{-- KKM --}}
    <table class="table">
        <thead>
            <tr>
                <th rowspan="2">KKM</th>
                <th colspan="4">Predikat</th>
            </tr>
            <tr>
                <th>Kurang (D)</th>
                <th>Cukup (C)</th>
                <th>Baik (B)</th>
                <th>Sangat Baik (A)</th>
            </tr>
        </thead>
        <tbody align="center">
            <tr>
                <td>81</td>
                <td>< 81</td>
                <td>81-86</td>
                <td>87-92</td>
                <td>93-100</td>
            </tr>
            <tr>
                <td>82</td>
                <td>< 82</td>
                <td>82-87</td>
                <td>88-93</td>
                <td>94-100</td>
            </tr>
            <tr>
                <td>83</td>
                <td>< 83</td>
                <td>83-88</td>
                <td>89-94</td>
                <td>95-100</td>
            </tr>
            <tr>
                <td>84</td>
                <td>< 84</td>
                <td>84-89</td>
                <td>90-95</td>
                <td>96-100</td>
            </tr>
        </tbody>
    </table>

    {{-- Nilai Ekskul --}}
    <h5>C. EKSTRAKURIKULER</h5>
    <table class="table">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th>Kegiatan Ekstrakurikuler</th>
                <th>Nilai</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
        </tbody>
    </table>

    {{-- Prestasi --}}
    <h5>D. PRESTASI</h5>
    <table class="table">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th>Jenis Prestasi</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>-</td>
                <td>-</td>
            </tr>
        </tbody>
    </table>

    {{-- Ketidakhadiran --}}
    <h5>E. KETIDAKHADIRAN</h5>
    <table class="table">
        <tbody>
            <tr>
                <td width="20%">Sakit</td>
                <td>- Hari</td>
            </tr>
            <tr>
                <td width="20%">Izin</td>
                <td>- Hari</td>
            </tr>
            <tr>
                <td width="20%">Tanpa Keterangan</td>
                <td>- Hari</td>
            </tr>
        </tbody>
    </table>

    {{-- Catatan Wali Kelas --}}
    <h5>F. CATATAN WALI KELAS</h5>
    <table class="table">
        <tbody>
            <tr>
                <td>Tingkatkan semangat dan motivasi belajar ananda.</td>
            </tr>
        </tbody>
    </table>

    {{-- Catatan Wali Kelas --}}
    <h5>G. TANGGAPAN ORANG TUA/WALI</h5>
    <table class="table">
        <tbody>
            <tr>
                <td height="70px"></td>
            </tr>
        </tbody>
    </table>
    <br>

    {{-- Tanda Tangan --}}
    <table class="table" style="font-size: 10pt; border: none;">
        <tbody style="border:none;">
            <tr style="border:none;">
                <td style="border:none;">Mengetahui:</td>
                <td style="border:none;" width="30%">Medan, </td>
            </tr>
            <tr style="border:none;">
                <td style="border:none;">Orang Tua/Wali</td>
                <td style="border:none;" width="30%">Wali Kelas</td>
            </tr>
            <tr style="border:none;">
                <td style="border:none;">
                    <br>
                </td>
            </tr>
            <tr>
                <td style="border:none;">
                    <br>
                </td>
            </tr>
            <tr style="border:none;">
                <td style="border:none;">
                    <br>
                </td>
            </tr>
            @foreach ($kontrak as $item)
                <tr style="border:none;">
                    <td style="border:none;"><u>.............................</u></td>
                    <td style="border:none;" width="30%">{{ $item->nama }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

