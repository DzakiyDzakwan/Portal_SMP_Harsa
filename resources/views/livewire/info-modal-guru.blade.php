{{-- Modal Preview --}}
<div class="modal fade text-left" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel130">
                    Profil Siswa
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">


                {{-- Image --}}
                <img src="assets/images/test.jpg" class="mx-auto d-block w-25 my-3" alt="...">

                {{-- Navigation --}}
                <ul class="nav nav-tabs justify-content-center align-items-center my-3" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab"
                            aria-controls="profile" aria-selected="false">Profil</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="profilePribadi-tab" data-bs-toggle="tab" href="#profilePribadi"
                            role="tab" aria-controls="profilePribadi" aria-selected="false">Profil
                            Pribadi</a>
                    </li>
                </ul>

                {{-- Navigasi Content --}}
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <td class="p-1">Nama</td>
                                    <td class="p-1">:</td>
                                    <td class="p-1">{{ $nama }}</td>
                                </tr>
                                <tr>
                                    <td class="p-1">NIP</td>
                                    <td class="p-1">:</td>
                                    <td class="p-1">{{ $nip }}</td>
                                </tr>
                                <tr>
                                    <td class="p-1">Jabatan</td>
                                    <td class="p-1">:</td>
                                    @if ($jabatan == 'wks')
                                        <td class="p-1">Wakil Kepala Sekolah</td>
                                    @elseif($jabatan == 'bk')
                                        <td class="p-1">Bimbingan Konseling</td>
                                    @else
                                        <td class="p-1">Guru</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td class="p-1">Jenis Kelamin</td>
                                    <td class="p-1">:</td>
                                    @if ($jenis_kelamin == 'LK')
                                        <td class="p-1">Laki-Laki</td>
                                    @else
                                        <td class="p-1">Perempuan</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td class="p-1">Tanggal Masuk</td>
                                    <td class="p-1">:</td>
                                    <td class="p-1">{{ $tgl_masuk }}</td>
                                </tr>
                                <tr>
                                <tr>
                                    <td class="p-1">Status Keaktifan</td>
                                    <td class="p-1">:</td>
                                    <td class="p-1">{{ $status }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="profilePribadi" role="tabpanel" aria-labelledby="profilePribadi-tab">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <td class="p-1">Pendidikan</td>
                                    <td class="p-1">:</td>
                                    @if ($pendidikan == null)
                                        <td class="p-1">Belum ada data</td>
                                    @else
                                        <td class="p-1">{{ $pendidikan }}</td>
                                    @endif

                                </tr>
                                <tr>
                                    <td class="p-1">Tahun Ijazah</td>
                                    <td class="p-1">:</td>
                                    @if ($tahun_ijazah == null)
                                        <td class="p-1">Belum ada data</td>
                                    @else
                                        <td class="p-1">{{ $tahun_ijazah }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td class="p-1">Status Perkawinan</td>
                                    <td class="p-1">:</td>
                                    @if ($status_perkawinan == null)
                                        <td class="p-1">Belum ada data</td>
                                    @else
                                        <td class="p-1">{{ $status_perkawinan }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td class="p-1">Alamat Tinggal</td>
                                    <td class="p-1">:</td>
                                    @if ($alamat_tinggal == null)
                                        <td class="p-1">Belum ada data</td>
                                    @else
                                        <td class="p-1">{{ $alamat_tinggal }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td class="p-1">Alamat Domisili</td>
                                    <td class="p-1">:</td>
                                    @if ($alamat_domisili == null)
                                        <td class="p-1">Belum ada data</td>
                                    @else
                                        <td class="p-1">{{ $alamat_domisili }}</td>
                                        <td class="p-1">{{ $tahun_ijazah }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td class="p-1">Tempat Tanggal Lahir</td>
                                    <td class="p-1">:</td>
                                    @if ($tempat_lahir == null || $tgl_lahir == null)
                                        <td class="p-1">Belum ada data</td>
                                    @else
                                        <td class="p-1">{{ $tempat_lahir }}, {{ $tgl_lahir }}</td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
            </div>
        </div>
    </div>
</div>
