<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                <li class="menu-title">MENU</li>
                    <!-- $title active ini untuk menyalakan menu ketika di klik -->
                    <li class="{{ ($title == 'Beranda') ? 'active' : '' }}">
                        <!-- Menuju ke halaman DASHBOARD -->
                        <a href="{{ url('/dashboard') }}" class="dropdown-toggle"><i class="menu-icon fa fa-laptop">
                        </i>Beranda</a>
                    </li>
                    <li class="{{ ($title == 'Data Diri') ? 'active' : ''}}">
                        <!-- Belom gua isi ini bray halaman menuanya -->
                        <a href="#" class="dropdown-toggle"><i class="menu-icon fa fa-id-badge">
                        </i>Data Diri</a>
                    </li>
                    <!-- strpos($title, 'Data Registrasi') !== false adalah alternatif native PHP-nya. -->
                    <li class="{{ strpos($title, 'Data Registrasi') !== false ? 'active' : '' }}">
                        <!-- Menuju ke halaman DASHBOARD DAFTAR -->
                        <a href="{{ url('/dashboard-daftar') }}" class="dropdown-toggle"><i class="menu-icon fa fa fa-id-card-o">
                        </i>Data Registrasi</a>
                    </li>
                </ul>
            </div>
        </nav>
    </aside>