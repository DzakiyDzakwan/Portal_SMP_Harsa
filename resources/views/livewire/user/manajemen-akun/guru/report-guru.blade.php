<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Data Seluruh Guru</title>
    <style>
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
        font-size: 13px;
        color: #000000;
        }
        table.table thead {
            border-bottom: 2px solid #2F2F2F;
        }
        table.table thead th {
        font-size: 15px;
        font-weight: normal;
        color: #000000;
        }
        table.table tfoot td {
        font-size: 14px;
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
    <h3 align="center">DAFTAR NAMA GURU <br> SMP HARAPAN 1 MEDAN</h3>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>NUPTK</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tempat/Tanggal Lahir</th>
                <th>Ijazah Tertinggi</th>
                <th>Tahun Ijazah</th>
                <th>Status</th>
                <th>Jabatan</th>
                <th>Tanggal Masuk</th>
                <th>Mata Pelajaran </th>
                <th>Di Kelas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($guru as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->NUPTK }}</td>
                    <td>{{ $item->nama }}</td>
                    @if ( $item->jenis_kelamin  == 'PR')
                       <td>Perempuan</td>
                    @else
                        <td>Laki-Laki</td>
                    @endif
                    <td>{{ $item->tempat_lahir }}, {{ $item->tgl_lahir }}</td>
                    <td>{{ $item->pendidikan }}</td>
                    <td>{{ $item->tahun_ijazah }}</td>
                    <td>{{ $item->status_perkawinan }}</td>
                    @if ( $item->jabatan  == 'ks')
                       <td>Kepsek</td>
                    @elseif ($item->jabatan  == 'wks')
                        <td>Wakepsek</td>
                    @else
                        <td>Guru</td>
                    @endif
                    <td>{{ $item->tanggal_masuk }}</td>
                    <td></td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

