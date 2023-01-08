<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Data Ekstrakurikuler</title>
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
    <h3 align="center">JADWAL KEGIATAN EKSTRAKURIKULER <br> SMP HARAPAN 1 MEDAN  </h3>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Ekstrakurikuler</th>
                <th>Hari</th>
                <th>Waktu</th>
                <th>Kelas</th>
                <th>Tempat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ekskul as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->hari }}</td>
                    <td>{{ $item->waktu_mulai }} - {{ $item->waktu_akhir }}</td>
                    <td>{{ $item->kelas }}</td>
                    <td>{{ $item->tempat }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <table>
        <tr>
            <td width="350"></td>
            <td align="center">
                <?php
                    $date = date('d M Y');
                ?>
                <p>Medan, {{ $date }} M<br> Kepala SMP Harapan 1 Medan</p>
                <br>
                <br>
                <p><b>Drs. Idris Ginting</b></p>
            </td>
        </tr>
    </table>
</body>

