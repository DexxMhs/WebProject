 <!-- HEADER -->
 <header id="navbar">
    <a href="/" class="logo">
      <img src="image/logo.png" alt="">
    </a> 

    <!-- DAFTAR MENU -->
    <div class="group">
      <ul class="nav">
        <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a></li>
        <li><a href="#" class="{{ request()->routeIs('pf') ? 'active' : '' }}">Profil ⌵</a>

          <!-- DROPDOWN MENU -->
          <ul>
            <li><a href="#">Visi Misi<b>+</b></a>
              <ul>
                <li><a href="/misi">Misi</a></li>
                <li><a href="#">Visi</a></li>
              </ul>
            </li>
            <li><a href="/sambutanrektor">Sambutan Rektor</a></li>
            <li><a href="#">Lokasi Kampus</a></li>
          </ul>
        </li>
        <li><a href="{{ route('prg') }}" class="{{ request()->routeIs('prg') ? 'active' : '' }}">Program</a></li>
        <li><a href="{{ route('fk') }}" class="{{ request()->routeIs('fk') ? 'active' : '' }}">Fakultas ⌵</a>
          <ul>
            <li><a href="/teknikinformatika">Teknik Informatika</a></li>
            <li><a href="/ekonomibisnis">Ekonomi & Bisnis</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <div class="btn-login">
      <a href="/login">
        <button class="btn-nyala">Masuk</button>
      </a>
    </div>
  </header>
