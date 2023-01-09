<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="d-flex flex-column align-items-center">
                <div class="logo">
                    <a href="/dashboard-siswa"><img src="/assets/images/logo/logo-harapan.png" alt="Logo"
                            srcset="" /></a>
                </div>
                <div class="theme-toggle d-flex gap-2 align-items-center mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20"
                        height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                        <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path
                                d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                                opacity=".3"></path>
                            <g transform="translate(-210 -1)">
                                <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                <circle cx="220.5" cy="11.5" r="4"></circle>
                                <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"></path>
                            </g>
                        </g>
                    </svg>
                    <div class="form-check form-switch fs-6">
                        <input class="form-check-input me-0" type="checkbox" id="toggle-dark" />
                        <label class="form-check-label"></label>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20"
                        preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                        </path>
                    </svg>
                </div>
                <div class="sidebar-toggler x">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                {{-- Dashboard --}}
                <li class="sidebar-item @if ($menu === 'dashboard') active @endif">
                    <a href="/guru/dashboard" class="sidebar-link">
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                @hasanyrole('kepsek|wakepsek|admin')
                    <li class="sidebar-title">User</li>

                    {{-- Manajemen User --}}
                    @hasanyrole('kepsek|wakepsek')
                        <li class="sidebar-item has-sub @if ($menu === 'manajemenuser') active @endif">
                            <a href="#" class="sidebar-link">
                                <i class="bi bi-people-fill"></i>
                                <span>Manajemen User</span>
                            </a>
                            <ul class="submenu @if ($menu === 'manajemenuser') active @endif">
                                <li class="submenu-item">
                                    <a href="/guru/user">User</a>
                                </li>
                                <li class="submenu-item">
                                    <a href="/guru/role">Role</a>
                                </li>
                                <li class="submenu-item">
                                    <a href="/guru/permission">Permission</a>
                                </li>
                            </ul>
                        </li>
                    @endhasanyrole

                    {{-- Manajemen Akun --}}
                    <li class="sidebar-item has-sub @if ($menu === 'akun') active @endif">
                        <a href="#" class="sidebar-link">
                            <i class="bi bi-people-fill"></i>
                            <span>Manajemen Akun</span>
                        </a>
                        <ul class="submenu @if ($menu === 'akun') active @endif">
                            @hasanyrole('kepsek|wakepsek')
                                <li class="submenu-item">
                                    <a href="/guru/admin">Admin</a>
                                </li>
                            @endhasanyrole
                            <li class="submenu-item">
                                <a href="/guru/guru">Guru</a>
                            </li>
                            <li class="submenu-item">
                                <a href="/guru/siswa">Siswa</a>
                            </li>
                        </ul>
                    </li>
                @endhasanyrole

                <li class="sidebar-title">Sekolah</li>

                {{-- Direktori --}}
                {{-- <li class="sidebar-item @if ($menu === 'direktoriGuru') active @endif">
                    <a href="/direktori-guru" class="sidebar-link">
                        <i class="bi bi-person-rolodex"></i>
                        <span>Direktori</span>
                    </a>
                </li> --}}

                {{-- Tahun Akademik --}}
                @hasanyrole('kepsek|wakepsek|admin')
                    <li class="sidebar-item @if ($menu === 'tahunakademik') active @endif">
                        <a href="/guru/tahun-akademik" class="sidebar-link">
                            <i class="bi bi-calendar-date-fill"></i>
                            <span>Tahun Akademik</span>
                        </a>
                    </li>
                @endhasanyrole

                {{-- Kelas Saya --}}
                @hasrole('wali')
                    <li class="sidebar-item @if ($menu === 'walikelas') active @endif">
                        <a href="/guru/kelas-saya" class="sidebar-link">
                            <i class="bi bi-person-workspace"></i>
                            <span>Kelas Saya</span>
                        </a>
                    </li>
                @endhasrole


                {{--  Mata Pelajaran & Kelas --}}
                @hasanyrole('kepsek|wakepsek|admin')
                    {{-- Manajemen Mata Pelajaran --}}
                    <li class="sidebar-item has-sub @if ($menu === 'mapel') active @endif">
                        <a href="#" class="sidebar-link">
                            <i class="bi bi-book-fill"></i>
                            <span>Manajemen Mata Pelajaran</span>
                        </a>
                        <ul class="submenu @if ($menu === 'mapel') active @endif">
                            <li class="submenu-item">
                                <a href="/guru/mata-pelajaran">Mata Pelajaran</a>
                            </li>
                            <li class="submenu-item">
                                <a href="/guru/mata-pelajaran-guru">Mata Pelajaran Guru</a>
                            </li>
                        </ul>
                    </li>

                    {{-- Manajemen Kelas --}}
                    <li class="sidebar-item has-sub @if ($menu === 'kelas') active @endif">
                        <a href="#" class="sidebar-link">
                            <i class="bi bi-house-door-fill"></i>
                            <span>Manajemen Kelas</span>
                        </a>
                        <ul class="submenu @if ($menu === 'kelas') active @endif">
                            <li class="submenu-item">
                                <a href="/guru/wali-kelas">Wali Kelas</a>
                            </li>
                            <li class="submenu-item">
                                <a href="/guru/kelas">Kelas</a>
                            </li>
                            <li class="submenu-item">
                                <a href="/guru/kelas-aktif">Kelas Aktif</a>
                            </li>
                            <li class="submenu-item">
                                <a href="/guru/roster">Roster</a>
                            </li>
                        </ul>
                    </li>
                @endhasanyrole

                {{-- Manajemen Nilai --}}
                <li class="sidebar-item has-sub @if ($menu === 'nilai') active @endif">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-clipboard-plus-fill"></i>
                        <span>Manajemen Nilai</span>
                    </a>
                    <ul class="submenu @if ($menu === 'user') active @endif">
                        @hasanyrole('kepsek|wakepsek|admin')
                            <li class="submenu-item">
                                <a href="/guru/sesi-penilaian">Sesi Penilaian</a>
                            </li>
                            <li class="submenu-item">
                                <a href="/guru/konfirmasi-nilai">Konfirmasi Nilai</a>
                            </li>
                        @endhasanyrole
                        {{-- @hasanyrole('kepsek|wakepsek')
                            <li class="submenu-item">
                                <a href="/guru/nilai/uh1">Ulangan Harian 1</a>
                            </li>
                            <li class="submenu-item">
                                <a href="/guru/nilai/uh2">Ulangan Harian 2</a>
                            </li>
                            <li class="submenu-item">
                                <a href="/guru/nilai/uh3">Ulangan Harian 3</a>
                            </li>
                            <li class="submenu-item">
                                <a href="/guru/nilai/uts">Ujian Tengah Semester</a>
                            </li>
                            <li class="submenu-item">
                                <a href="/guru/nilai/uas">Ujian Akhir Semester</a>
                            </li>
                        @endhasanyrole --}}
                        @hasrole('guru')
                            @php
                                $kelasGuru = DB::table('list_kelas_guru')
                                    ->where('guru', Auth::user()->gurus->NUPTK)
                                    ->get();
                            @endphp
                            @foreach ($kelasGuru as $item)
                                <li class="submenu-item">
                                    <a href="/guru/kelas/{{ $item->kelas }}">{{ $item->grade }}{{ $item->kelompok_kelas }}
                                        {{ $item->nama_mapel }}</a>
                                </li>
                            @endforeach
                        @endhasrole
                    </ul>
                </li>

                {{-- Manajemen Ekstrakurikuler --}}
                @hasanyrole('kepsek|wakepsek|admin|pembina')
                    <li class="sidebar-item has-sub @if ($menu === 'ekskul') active @endif">
                        <a href="#" class="sidebar-link">
                            <i class="bi bi-clipboard2-pulse-fill"></i>
                            <span>Manajemen Ekstrakurikuler</span>
                        </a>
                        <ul class="submenu @if ($menu === 'ekskul') active @endif">
                            @hasanyrole('kepsek|wakepsek|admin')
                                <li class="submenu-item">
                                    <a href="/guru/pembina-ekstrakurikuler">Pembina Ekstrakurikuler</a>
                                </li>
                                <li class="submenu-item">
                                    <a href="/guru/ekstrakurikuler">Ekstrakurikuler</a>
                                </li>
                                <li class="submenu-item">
                                    <a href="/guru/ekstrakurikuler-siswa-admin">Ekstrakurikuler Siswa</a>
                                </li>
                            @endhasanyrole
                            @hasrole('pembina')
                                <li class="submenu-item">
                                    <a href="/guru/ekstrakurikuler-siswa-pembina">Ekstrakurikuler Siswa</a>
                                </li>
                            @endhasrole
                            <li class="submenu-item">
                                <a href="/guru/nilai-ekstrakurikuler">Nilai Ekstrakurikuler</a>
                            </li>
                        </ul>
                    </li>
                @endhasanyrole

                {{-- Audit Section --}}
                @hasrole('kepsek')
                    <li class="sidebar-title">Audit</li>

                    {{-- History Log --}}
                    <li class="sidebar-item has-sub @if ($menu == 'history') active @endif">
                        <a href="#" class="sidebar-link">
                            <i class="bi bi-clock-history"></i>
                            <span>History Log</span>
                        </a>
                        <ul class="submenu @if ($menu == 'history') active @endif">
                            <li class="submenu-item">
                                <a href="/guru/log-activities">Log Aktivitas</a>
                            </li>
                            <li class="submenu-item">
                                <a href="/guru/log-roles">Log Role</a>
                            </li>
                            <li class="submenu-item">
                                <a href="/guru/log-permissions">Log Permission</a>
                            </li>
                            <li class="submenu-item">
                                <a href="/guru/log-users">Log User</a>
                            </li>
                            <li class="submenu-item">
                                <a href="/guru/log-profiles">Log Profile</a>
                            </li>
                            <li class="submenu-item">
                                <a href="/guru/log-guru">Log Guru</a>
                            </li>
                            <li class="submenu-item">
                                <a href="/guru/log-siswa">Log Siswa</a>
                            </li>
                            <li class="submenu-item">
                                <a href="/guru/log-mapel">Log Mata-Pelajaran</a>
                            </li>
                            <li class="submenu-item">
                                <a href="/guru/log-kelas">Log Kelas</a>
                            </li>
                            <li class="submenu-item">
                                <a href="/guru/log-roster">Log Roster</a>
                            </li>
                            <li class="submenu-item">
                                <a href="/guru/log-kontrak">Log Kontrak Siswa</a>
                            </li>
                            <li class="submenu-item">
                                <a href="/guru/log-nilai">Log Nilai</a>
                            </li>
                            <li class="submenu-item">
                                <a href="/guru/log-prestasi">Log Prestasi</a>
                            </li>
                            <li class="submenu-item">
                                <a href="/guru/log-ekstrakulikuler">Log Ekstrakulikuler</a>
                            </li>
                            <li class="submenu-item">
                                <a href="/guru/log-ekstrakurikuler-siswa">Log Ekstrakulikuler Siswa</a>
                            </li>
                        </ul>
                    </li>
                @endhasrole


            </ul>
        </div>
    </div>
</div>
