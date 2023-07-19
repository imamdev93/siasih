<div class="sidebar-collapse">
    <ul class="nav metismenu" id="side-menu">
        <li class="nav-header">
            <div class="dropdown profile-element">
                {{-- <img alt="image" class="rounded-circle" src="img/profile_small.jpg" /> --}}
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <h3 class="block m-t-xs font-bold">{{ auth()->user()->nama }}</h3>
                    {{-- <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> --}}
                </a>
            </div>
            <div class="logo-element">
                {{ strtoupper(substr(auth()->user()->nama, 0, 2)) }}
            </div>
        </li>
        <li class="{{ Request::routeIs('beranda') ? 'active' : '' }}">
            <a href="{{ route('beranda') }}"><span class="nav-label">Beranda</span></a>
        </li>
        @if (!auth()->user()->is_kepsek)
            <li class="{{ request()->is('informasi/*') ? 'active' : '' }}">
                <a href="#"><span class="nav-label">Informasi</span></a>
                <ul class="nav nav-second-level collapse">
                    @if (session()->get('role') == 'admin' && !auth()->user()->is_kepsek)
                        <li class="{{ request()->is('informasi/kurikulum*') ? 'active' : '' }}"><a
                                href="/informasi/kurikulum">Kurikulum</a></li>
                        <li class="{{ request()->is('informasi/jadwal-mengajar*') ? 'active' : '' }}"><a
                                href="/informasi/jadwal-mengajar">Jadwal Mengajar</a></li>
                        <li class="{{ request()->is('informasi/jadwal-pelajaran*') ? 'active' : '' }}"><a
                                href="/informasi/jadwal-pelajaran">Jadwal Pelajaran</a></li>
                    @endif
                    @auth('guru')
                        <li class="{{ request()->is('informasi/kurikulum*') ? 'active' : '' }}"><a
                                href="/informasi/kurikulum">Kurikulum</a></li>
                        <li class="{{ request()->is('informasi/jadwal-mengajar*') ? 'active' : '' }}"><a
                                href="/informasi/jadwal-mengajar">Jadwal Mengajar</a></li>
                    @endauth
                    @auth('siswa')
                        <li class="{{ request()->is('informasi/absensi*') ? 'active' : '' }}"><a
                                href="/informasi/absensi">Absensi Siswa</a></li>
                        <li class="{{ request()->is('informasi/nilai*') ? 'active' : '' }}"><a
                                href="/informasi/nilai">Nilai Siswa</a></li>
                        <li class="{{ request()->is('informasi/jadwal-pelajaran*') ? 'active' : '' }}"><a
                                href="/informasi/jadwal-pelajaran">Jadwal Pelajaran</a></li>
                    @endauth
                </ul>
            </li>
        @endif
        <li class="{{ request()->is('pengaturan/*') ? 'active' : '' }}">
            <a href="#"><span class="nav-label">Pengaturan</span></a>
            <ul class="nav nav-second-level collapse">
                <li class="{{ request()->is('pengaturan/biodata*') ? 'active' : '' }}"><a
                        href="/pengaturan/biodata">Biodata</a></li>
                <li class="{{ request()->is('pengaturan/ubah-password*') ? 'active' : '' }}"><a
                        href="/pengaturan/ubah-password">Ubah Password</a></li>
            </ul>
        </li>
        <li class="{{ request()->is('layanan/*') ? 'active' : '' }}">
            <a href="#"><span class="nav-label">Layanan
                    @if (session()->get('role') == 'admin' && auth()->user()->is_kepsek)
                        Kepala Sekolah
                    @else
                        {{ ucwords(session()->get('role')) }}
                    @endif
                </span></a>
            <ul class="nav nav-second-level collapse">
                @if (session()->get('role') == 'admin' && !auth()->user()->is_kepsek)
                    <li class="{{ request()->is('layanan/semester*') ? 'active' : '' }}"><a
                            href="/layanan/semester">Semester</a></li>
                @endif
                @if (session()->get('role') == 'admin' && auth()->user()->is_kepsek)
                    <li class="{{ request()->is('layanan/absensi*') ? 'active' : '' }}"><a
                            href="/layanan/absensi">Absensi Siswa</a></li>
                    <li class="{{ request()->is('layanan/raport*') ? 'active' : '' }}"><a href="/layanan/raport">Raport
                            Siswa</a></li>
                @endif
                @if (session()->get('role') == 'admin')
                    <li class="{{ request()->is('layanan/guru*') ? 'active' : '' }}"><a href="/layanan/guru">Data
                            Guru</a></li>
                    <li class="{{ request()->is('layanan/siswa*') ? 'active' : '' }}"><a href="/layanan/siswa">Data
                            Siswa</a></li>
                @endif
                @auth('guru')
                    <li class="{{ request()->is('layanan/absensi*') ? 'active' : '' }}"><a href="/layanan/absensi">Absensi
                            Siswa</a></li>
                    <li class="{{ request()->is('layanan/nilai*') ? 'active' : '' }}"><a href="/layanan/nilai">Nilai
                            Siswa</a></li>
                    <li class="{{ request()->is('layanan/konsultasi*') ? 'active' : '' }}"><a
                            href="/layanan/konsultasi">konsultasi Siswa</a></li>
                    <li class="{{ request()->is('layanan/raport*') ? 'active' : '' }}"><a href="/layanan/raport">Raport</a>
                    </li>
                @endauth
                @auth('siswa')
                    <li class="{{ request()->is('layanan/raport*') ? 'active' : '' }}"><a href="/layanan/raport">Raport</a>
                    </li>
                    <li class="{{ request()->is('layanan/konsultasi*') ? 'active' : '' }}"><a
                            href="/layanan/konsultasi">konsultasi</a></li>
                @endauth
            </ul>
        </li>
        @if ((session()->get('role') == 'admin' && !auth()->user()->is_kepsek) || session()->get('role') == 'guru')
            <li class="{{ request()->is('laporan/*') ? 'active' : '' }}">
                <a href="#"><span class="nav-label">Laporan Absensi
                    </span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="{{ request()->is('laporan/harian*') ? 'active' : '' }}"><a
                            href="/laporan/harian">Harian</a>
                    </li>
                    <li class="{{ request()->is('laporan/mingguan*') ? 'active' : '' }}"><a
                            href="/laporan/mingguan">Mingguan</a>
                    </li>
                    <li class="{{ request()->is('laporan/bulanan*') ? 'active' : '' }}"><a
                            href="/laporan/bulanan">Bulanan</a></li>
                    <li class="{{ request()->is('laporan/semesteran*') ? 'active' : '' }}"><a
                            href="/laporan/semesteran">Semesteran</a>
                    </li>
                </ul>
            </li>
        @endif
        <li>
            <a href="{{ route('logout') }}"><span class="nav-label">Keluar</span></a>
        </li>
    </ul>

</div>
