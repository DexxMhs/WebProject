<nav class="navbar navbar-expand-sm navbar-default">
    <div id="main-menu" class="main-menu collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li class="menu-title">MENU</li>
            <!-- $title active ini untuk menyalakan menu ketika di klik -->
            <li class="@if (Request::segment(2) == 'home') active @endif">
                <!-- Menuju ke halaman DASHBOARD -->
                <a href="{{ route('dashboard.home') }}" class="dropdown-toggle"><i class="menu-icon fa fa-laptop">
                    </i>Beranda</a>
            </li>
            <li class="@if (Request::segment(2) == 'student-profile') active @endif">
                <!-- Belom gua isi ini bray halaman menuanya -->
                <a href="{{ route('dashboard.student-profile') }}" class="dropdown-toggle"><i
                        class="menu-icon fa fa-id-badge">
                    </i>Data Diri</a>
            </li>
            <!-- strpos($title, 'Data Registrasi') !== false adalah alternatif native PHP-nya. -->
            <li class="@if (Request::segment(2) == 'student-registration') active @endif">
                <!-- Menuju ke halaman DASHBOARD DAFTAR -->
                <a href="{{ route('dashboard.student-registration') }}" class="dropdown-toggle"><i
                        class="menu-icon fa fa fa-id-card-o">
                    </i>Data Registrasi</a>
            </li>

            <li class="@if (Request::segment(2) == 'degree-levels') active @endif">
                <a href="{{ route('dashboard.degree-levels.index') }}" class="dropdown-toggle"><i
                        class="menu-icon fa fa fa-id-card-o">
                    </i>Data Gelar</a>
            </li>

            <li class="@if (Request::segment(2) == 'faculties') active @endif">
                <a href="{{ route('dashboard.faculties.index') }}" class="dropdown-toggle"><i
                        class="menu-icon fa fa fa-id-card-o">
                    </i>Data Fakultas</a>
            </li>
        </ul>
    </div>
</nav>
