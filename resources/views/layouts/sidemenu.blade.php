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
                {{ (strtoupper(substr(auth()->user()->nama, 0, 2))) }}
            </div>
        </li>
        <li class="{{ Request::routeIs('beranda') ? 'active' : '' }}">
            <a href="{{ route('beranda') }}"><span class="nav-label">Beranda</span></a>
        </li>
        <li class="{{ request()->is('informasi/*') ? 'active' : ''}}">
            <a href="#"><span class="nav-label">Informasi</span></a>
            <ul class="nav nav-second-level collapse">
                @auth('admin')
                    <li class="{{ request()->is('informasi/kurikulum*') ? 'active' : ''}}"><a href="/informasi/kurikulum">Kurikulum</a></li>
                    <li class="{{ request()->is('informasi/jadwal-mengajar*') ? 'active' : ''}}"><a href="#">Jadwal Mengajar</a></li>
                    <li class="{{ request()->is('informasi/jadwal-pelajaran*') ? 'active' : ''}}"><a href="#">Jadwal Pelajaran</a></li>
                @endauth
                @auth('guru')
                    <li class="{{ request()->is('informasi/kurikulum*') ? 'active' : ''}}"><a href="/informasi/kurikulum">Kurikulum</a></li>
                    <li class="{{ request()->is('informasi/jadwal-mengajar*') ? 'active' : ''}}"><a href="#">Jadwal Mengajar</a></li>
                @endauth
                @auth('siswa')
                    <li class="{{ request()->is('informasi/absensi-siswa*') ? 'active' : ''}}"><a href="#">Absensi Siswa</a></li>
                    <li class="{{ request()->is('informasi/nilai-siswa*') ? 'active' : ''}}"><a href="#">Nilai Siswa</a></li>
                    <li class="{{ request()->is('informasi/jadwal-pelajaran*') ? 'active' : ''}}"><a href="#">Jadwal Pelajaran</a></li>
                @endauth
            </ul>
        </li>
        <li class="{{ request()->is('pengaturan/*') ? 'active' : ''}}">
            <a href="#"><span class="nav-label">Pengaturan</span></a>
            <ul class="nav nav-second-level collapse">
                <li class="{{ request()->is('pengaturan/biodata*') ? 'active' : ''}}"><a href="/pengaturan/biodata">Biodata</a></li>
                <li class="{{ request()->is('pengaturan/ubah-password*') ? 'active' : ''}}"><a href="/pengaturan/ubah-password">Ubah Password</a></li>
            </ul>
        </li>
        <li class="{{ request()->is('layanan/*') ? 'active' : ''}}">
            <a href="#"><span class="nav-label">Layanan {{ ucwords(session()->get('role')) }}</span></a>
            <ul class="nav nav-second-level collapse">
                @auth('admin')
                    <li class="{{ request()->is('layanan/guru*') ? 'active' : ''}}"><a href="/layanan/guru">Data Guru</a></li>
                    <li class="{{ request()->is('layanan/siswa*') ? 'active' : ''}}"><a href="#">Data Siswa</a></li>
                    <li class="{{ request()->is('layanan/absensi-siswa*') ? 'active' : ''}}"><a href="#">Absensi Siswa</a></li>
                    <li class="{{ request()->is('layanan/nilai-siswa*') ? 'active' : ''}}"><a href="#">Nilai Siswa</a></li>
                @endauth
                @auth('guru')
                    <li class="{{ request()->is('layanan/absensi-siswa*') ? 'active' : ''}}"><a href="#">Absensi Siswa</a></li>
                    <li class="{{ request()->is('layanan/nilai-siswa*') ? 'active' : ''}}"><a href="#">Nilai Siswa</a></li>
                @endauth
                @auth('siswa')
                    <li class="{{ request()->is('layanan/pendaftaran*') ? 'active' : ''}}"><a href="#">Pendaftaran</a></li>
                    <li class="{{ request()->is('layanan/konsultasi*') ? 'active' : ''}}"><a href="#">Konsultasi</a></li>
                @endauth
            </ul>
        </li>
        <li>
            <a href="{{ route('logout')}}"><span class="nav-label">Keluar</span></a>
        </li>
    </ul>

</div>
