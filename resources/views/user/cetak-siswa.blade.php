<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cetak Siswa</title>
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
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>NISN</th>
                <th>Nama</th>
                <th>Tanggal Masuk</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->NISN }}</td>
                    <td>{{ $item->NIS }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->tanggal_masuk }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
