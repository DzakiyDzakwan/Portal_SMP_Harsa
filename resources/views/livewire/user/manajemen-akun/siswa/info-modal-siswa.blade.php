<div>
    <div wire:ignore.self class="modal modal-lg fade text-left" id="infoModal" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel130" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h5 class="modal-title" id="myModalLabel130">
                        Profil Siswa
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">

                    {{-- Image --}}
                    @if (!$foto == null)
                        <img src="{{ asset('storage/' . $foto) }}" class="mx-auto d-block w-25 my-3" alt="...">
                    @else
                        @if ($jk == 'LK')
                            <img src="{{ asset('assets/images/faces/2.jpg') }}" class="mx-auto d-block w-25 my-3"
                                alt="...">
                        @else
                            <img src="{{ asset('assets/images/faces/3.jpg') }}" class="mx-auto d-block w-25 my-3"
                                alt="...">
                        @endif
                    @endif

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
                        <div class="tab-pane mx-auto w-50 fade show active" id="profile" role="tabpanel"
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
                                        @if ($jk == 'LK')
                                            <td class="p-1">Laki-Laki</td>
                                        @else
                                            <td class="p-1">Perempuan</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td class="p-1">Kelas Awal</td>
                                        <td class="p-1">:</td>
                                        <td class="p-1">{{ $kelas }}</td>
                                    </tr>
                                    <tr>
                                        <td class="p-1">Status Keaktifan</td>
                                        <td class="p-1">:</td>
                                        <td class="p-1">
                                            @if ($status == 'aktif')
                                                <span class="badge bg-success">Aktif</span>
                                            @elseif($status == 'lulus')
                                                <span class="badge bg-primary">Lulus</span>
                                            @elseif($status == 'pindah')
                                                <span class="badge bg-warning">Pindah</span>
                                            @else
                                                <span class="badge bg-danger">Drop Out</span>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane mx-auto w-50 fade" id="profilePribadi" role="tabpanel"
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
                                        @if ($anak_ke != null)
                                            <td class="p-1">{{ $anak_ke }}</td>
                                        @endif
                                            <td class="p-1">Belum ada data</td>
                                        
                                    </tr>
                                    <tr>
                                        <td class="p-1">Nama Ayah</td>
                                        <td class="p-1">:</td>
                                        @if ($n_ayah != null)
                                            <td class="p-1">{{ $n_ayah }}</td>
                                        @endif
                                            <td class="p-1">Belum ada data</td>
                                    <tr>
                                        <td class="p-1">Pekerjan Ayah</td>
                                        <td class="p-1">:</td>
                                        @if ($n_ayah != null)
                                            <td class="p-1">{{ $p_ayah }}</td>
                                        @endif
                                            <td class="p-1">Belum ada data</td>
                                    </tr>
                                    <tr>
                                        <td class="p-1">Nama Ibu</td>
                                        <td class="p-1">:</td>
                                        @if ($n_ayah != null)
                                            <td class="p-1">{{ $n_ibu }}</td>
                                        @endif
                                            <td class="p-1">Belum ada data</td>
                                    </tr>
                                    <tr>
                                        <td class="p-1">Pekerjaan Ibu</td>
                                        <td class="p-1">:</td>
                                        @if ($n_ayah != null)
                                            <td class="p-1">{{ $p_ibu }}</td>
                                        @endif
                                            <td class="p-1">Belum ada data</td>
                                    </tr>
                                    <tr>
                                        <td class="p-1">Alamat Orangtua</td>
                                        <td class="p-1">:</td>
                                        @if ($n_ayah != null)
                                            <td class="p-1">{{ $alamat_ortu }}</td>
                                        @endif
                                            <td class="p-1">Belum ada data</td>
                                    </tr>
                                    <tr>
                                        <td class="p-1">Telepon Orangtua</td>
                                        <td class="p-1">:</td>
                                        @if ($n_ayah != null)
                                            <td class="p-1">{{ $telp_ortu }}</td>
                                        @endif
                                            <td class="p-1">Belum ada data</td>
                                    </tr>
                                    <tr>
                                        <td class="p-1">Nama Wali</td>
                                        <td class="p-1">:</td>
                                        @if ($n_ayah != null)
                                            <td class="p-1">{{ $n_wali }}</td>
                                        @endif
                                            <td class="p-1">Belum ada data</td>
                                    </tr>
                                    <tr>
                                        <td class="p-1">Pekerjaan Wali</td>
                                        <td class="p-1">:</td>
                                        @if ($n_ayah != null)
                                            <td class="p-1">{{ $p_wali }}</td>
                                        @endif
                                            <td class="p-1">Belum ada data</td>
                                    </tr>
                                    <tr>
                                        <td class="p-1">Telepon Wali</td>
                                        <td class="p-1">:</td>
                                        @if ($n_ayah != null)
                                            <td class="p-1">{{ $telp_wali }}</td>
                                        @endif
                                            <td class="p-1">Belum ada data</td>
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
                                        <th>Kelas</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($prestasi->isEmpty())
                                        <tr>
                                            <td colspan="6" class="text-center">Tidak ada data</td>
                                        </tr>
                                    @else
                                        @foreach ($prestasi as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->keterangan }}</td>
                                                <td>{{ $item->jenis_prestasi }}</td>
                                                <td>{{ $item->tanggal_prestasi }}</td>
                                                <td>{{ $item->nama_kelas_aktif }}</td>
                                                <td>
                                                    <div class="modal-danger me-1 mb-1 d-inline-block">
                                                        <button type="button" class="btn btn-sm btn-warning"
                                                            wire:click="getEditModal('{{ $item->prestasi_id }}')">
                                                            <div data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Edit">
                                                                <i
                                                                    class="bi
                                                                bi-pencil"></i>
                                                            </div>
                                                        </button>
                                                    </div>
                                                    <div class="modal-danger me-1 mb-1 d-inline-block">
                                                        <button type="button" class="btn btn-sm btn-danger"
                                                            wire:click="getDeleteModal('{{ $item->prestasi_id }}')">
                                                            <div data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Hapus">
                                                                <i class="bi bi-trash-fill"></i></i>
                                                            </div>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
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

    {{-- Modal Update Prestasi --}}
    <div class="modal fade text-left" id="editModalPrestasi" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel130" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title white" id="myModalLabel130">
                        Edit Prestasi
                    </h5>
                </div>
                <form class="form form-vertical" wire:submit.prevent="update()">
                    @csrf
                    <div class="form-body modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="siswa">NISN</label>
                                    <div class="position-relative">
                                        <input name="siswa" type="text"
                                            class="form-control @error('nisn') is-invalid @enderror "
                                            placeholder="Siswa" id="siswa" wire:model.defer="nisn" disabled />
                                        <div class="form-control-icon">
                                            <i class="bi bi-file-earmark-person"></i>
                                        </div>
                                        @error('nisn')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="jenis">Jenis Prestasi</label>
                                    <div class="position-relative">
                                        <select class="choices form-control" id="jenis" name="jenis"
                                            wire:model.defer="jenis">
                                            <option value="Akademik">Akademik</option>
                                            <option value="NonAkademik">Non Akademik</option>
                                        </select>
                                        <div class="form-control-icon">
                                            <i class="bi bi-award"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="keterangan">Keterangan</label>
                                    <div class="position-relative">
                                        <input name="keterangan" type="text"
                                            class="form-control @error('keterangan') is-invalid @enderror "
                                            placeholder="keterangan" id="keterangan" wire:model.defer="keterangan" />
                                        <div class="form-control-icon">
                                            <i class="bi bi-filter-square"></i>
                                        </div>
                                        @error('keterangan')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="tgl_prestasi">Tanggal Prestasi</label>
                                    <div class="position-relative">
                                        <input name="tgl_prestasi" type="date"
                                            class="form-control @error('tgl_prestasi') is-invalid @enderror "
                                            placeholder="Tanggal Prestasi" id="tgl_prestasi"
                                            wire:model.defer="tgl_prestasi" />
                                        <div class="form-control-icon">
                                            <i class="bi bi-calendar"></i>
                                        </div>
                                        @error('tgl_prestasi')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="button" class="btn btn-light-secondary me-1 mb-1"
                                    data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Close</span>
                                </button>
                                <button type="submit" class="btn btn-success me-1 mb-1">
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{-- Modal Delete Prestasu --}}
    <div class="modal fade text-left" id="deleteModalPrestasi" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel130" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title white" id="myModalLabel130">
                        Hapus Prestasi
                    </h5>
                </div>
                <div class="modal-body">Apakah Anda yakin ingin menghapus data prestasi ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" wire:click="closeDeleteModal()">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button class="btn btn-danger ml-1" wire:click="delete()">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Hapus</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
