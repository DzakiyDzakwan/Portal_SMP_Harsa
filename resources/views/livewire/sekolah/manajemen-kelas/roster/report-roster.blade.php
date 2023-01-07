<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cetak Roster Pelajaran</title>
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
    <h3 align="center">DAFTAR NAMA SISWA SMP HARAPAM 1 MEDAN <br> TAHUN PELAJARAN 2022/2023</h3>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>NISN</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Tempat Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Masuk</th>
                <th>Alamat Tinggal</th>
                <th>Alamat Domisili</th>
                <th>Anak Ke</th>
                <th>Nama Ayah</th>
                <th>Pekerjaan Ayah</th>
                <th>Nama Ibu</th>
                <th>Pekerjaan Ibu</th>
                <th>Alamat Orangtua</th>
                <th>Telepon Orangtua</th>
                <th>Nama Wali</th>
                <th>Pekerjaan Wali</th>
                <th>Telepon Wali</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswa as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->NISN }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->tgl_lahir }}</td>
                    <td>{{ $item->tempat_lahir }}</td>
                    @if ( $item->jenis_kelamin  == 'PR')
                       <td>Perempuan</td>
                    @else
                        <td>Laki-Laki</td>
                    @endif
                    <td>{{ $item->tanggal_masuk }}</td>
                    <td>{{ $item->alamat_tinggal }}</td>
                    <td>{{ $item->alamat_domisili }}</td>
                    <td>{{ $item->anak_ke }}</td>
                    <td>{{ $item->nama_ayah }}</td>
                    <td>{{ $item->pekerjaan_ayah }}</td>
                    <td>{{ $item->nama_ibu }}</td>
                    <td>{{ $item->pekerjaan_ibu }}</td>
                    <td>{{ $item->alamat_orangtua }}</td>
                    <td>{{ $item->telepon_orantua }}</td>
                    <td>{{ $item->nama_wali }}</td>
                    <td>{{ $item->pekerjaan_wali }}</td>
                    <td>{{ $item->telepon_wali }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

