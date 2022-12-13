<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Keterangan</th>
            <th>Jenis</th>
            <th>Tanggal</th>
            <th>Semester</th>
        </tr>
    </thead>
    <tbody>
        @if ($prestasi->isEmpty())
            <tr>
                <td colspan="5" class="text-center">Tidak ada data</td>
            </tr>
        @endif
    </tbody>
</table>
