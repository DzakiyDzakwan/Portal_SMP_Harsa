<div>
    <div wire:ignore.self class="modal fade text-left" id="infoModal" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel130" aria-hidden="true">
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
                    <img src="assets/images/test.jpg" class="mx-auto d-block w-50 my-3" alt="...">

                    {{-- Navigation --}}
                    <ul class="nav nav-tabs justify-content-center align-items-center my-3" id="myTab"
                        role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="profile-tab" data-bs-toggle="tab" href="#profile"
                                role="tab" aria-controls="profile" aria-selected="false">Profil</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="profilePribadi-tab" data-bs-toggle="tab" href="#profilePribadi"
                                role="tab" aria-controls="profilePribadi" aria-selected="false">Profil Pribadi</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="prestasi-tab" data-bs-toggle="tab" href="#prestasi" role="tab"
                                aria-controls="prestasi" aria-selected="false">Prestasi</a>
                        </li>
                    </ul>

                    {{-- Navigasi Content --}}
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="profile" role="tabpanel"
                            aria-labelledby="profile-tab">
                            <table class="table table-borderless mb-0">
                                <tbody>
                                    <tr>
                                        <td class="p-1">Nama</td>
                                        <td class="p-1">:</td>
                                        <td class="p-1">{{ $nama }}</td>
                                    </tr>
                                    <tr>
                                        <td class="p-1">NISN</td>
                                        <td class="p-1">:</td>
                                        <td class="p-1">{{ $nisn }}</td>
                                    </tr>
                                    <tr>
                                        <td class="p-1">NIS</td>
                                        <td class="p-1">:</td>
                                        <td class="p-1">{{ $nis }}</td>
                                    </tr>
                                    <tr>
                                        <td class="p-1">Jenis Kelamin</td>
                                        <td class="p-1">:</td>
                                        <td class="p-1">{{ $jk }}</td>
                                    </tr>
                                    <tr>
                                        <td class="p-1">Kelas Awal</td>
                                        <td class="p-1">:</td>
                                        <td class="p-1">{{ $kelas }}</td>
                                    </tr>
                                    <tr>
                                        <td class="p-1">Status Keaktifan</td>
                                        <td class="p-1">:</td>
                                        <td class="p-1">{{ $status }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="profilePribadi" role="tabpanel"
                            aria-labelledby="profilePribadi-tab">
                            <table class="table table-borderless mb-0">
                                <tbody>
                                    <tr>
                                        <td class="p-1">Nama</td>
                                        <td class="p-1">:</td>
                                        <td class="p-1">{{ $nama }}</td>
                                    </tr>
                                    <tr>
                                        <td class="p-1">Anak Ke</td>
                                        <td class="p-1">:</td>
                                        <td class="p-1">{{ $anak_ke }}</td>
                                    </tr>
                                    <tr>
                                        <td class="p-1">Nama Ayah</td>
                                        <td class="p-1">:</td>
                                        <td class="p-1">{{ $n_ayah }}
                                    <tr>
                                        <td class="p-1">Pekerjan Ayah</td>
                                        <td class="p-1">:</td>
                                        <td class="p-1">{{ $p_ayah }}</td>
                                    </tr>
                                    <tr>
                                        <td class="p-1">Nama Ibu</td>
                                        <td class="p-1">:</td>
                                        <td class="p-1">{{ $n_ibu }}</td>
                                    </tr>
                                    <tr>
                                        <td class="p-1">Pekerjaan Ibu</td>
                                        <td class="p-1">:</td>
                                        <td class="p-1">{{ $p_ibu }}</td>
                                    </tr>
                                    <tr>
                                        <td class="p-1">Alamat Orangtua</td>
                                        <td class="p-1">:</td>
                                        <td class="p-1">{{ $alamat_ortu }}</td>
                                    </tr>
                                    <tr>
                                        <td class="p-1">Telepon Orangtua</td>
                                        <td class="p-1">:</td>
                                        <td class="p-1">{{ $telp_ortu }}</td>
                                    </tr>
                                    <tr>
                                        <td class="p-1">Nama Wali</td>
                                        <td class="p-1">:</td>
                                        <td class="p-1">{{ $n_wali }}</td>
                                    </tr>
                                    <tr>
                                        <td class="p-1">Pekerjaan Wali</td>
                                        <td class="p-1">:</td>
                                        <td class="p-1">{{ $p_wali }}</td>
                                    </tr>
                                    <tr>
                                        <td class="p-1">Telepon Wali</td>
                                        <td class="p-1">:</td>
                                        <td class="p-1">{{ $telp_wali }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="prestasi" role="tabpanel" aria-labelledby="data-prestasis">
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
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
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
</div>
