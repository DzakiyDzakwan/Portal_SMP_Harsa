<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Data Roster Pelajaran</title>
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
    @foreach ($kelas as $item)
    <h3 align="center">JADWAL MATA PELAJARAN KELAS <span style="text-transform:uppercase;">{{ $kelas->nama_kelas_aktif }}</span> <br> SMP HARAPAN 1 MEDAN <br> TAHUN PELAJARAN {{ $ta }}</h3>
    @endforeach
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Hari</th>
                <th>Mata Pelajaran</th>
                <th>Waktu</th>
                <th>Durasi</th>
                <th>Nama Guru</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roster as $item)
                <tr>
                    <td align="center">{{ $loop->iteration }}</td>
                    <td align="center">{{ $item->hari }}</td>
                    <td>{{ $item->nama_mapel }}</td>
                    <td align="center">{{ $item->waktu_mulai }} - {{ $item->waktu_akhir }}</td>
                    <td align="center">{{ $item->durasi }} menit</td>
                    <td>{{ $item->nama }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

