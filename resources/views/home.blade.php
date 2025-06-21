<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UBSI</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <!-- HEADER -->
  <header id="navbar">
    <a href="/" class="logo">
      <img src="image/logo.png" alt="">
    </a> 

    <!-- DAFTAR MENU -->
    <div class="group">
      <ul class="nav">
        <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">@lang('id.menu.home')</a></li>
        <li><a href="#" class="{{ request()->routeIs('pf') ? 'active' : '' }}">@lang('id.menu.pf') @lang('id.icon.icn1')</a>

          <!-- DROPDOWN MENU -->
          <ul>
            <li><a href="#">@lang('id.dd_pf.pf1') <b>@lang('id.icon.icn2')</b></a>
              <ul>
                <li><a href="#">@lang('id.dd_pf.pf4')</a></li>
                <li><a href="#">@lang('id.dd_pf.pf5')</a></li>
              </ul>
            </li>
            <li><a href="#">@lang('id.dd_pf.pf2')</a></li>
            <li><a href="#">@lang('id.dd_pf.pf3')</a></li>
          </ul>
        </li>
        <li><a href="{{ route('prg') }}" class="{{ request()->routeIs('prg') ? 'active' : '' }}">@lang('id.menu.prg')</a></li>
        <li><a href="{{ route('fk') }}" class="{{ request()->routeIs('fk') ? 'active' : '' }}">@lang('id.menu.fk') @lang('id.icon.icn1')</a>
          <ul>
            <li><a href="#">@lang('id.dd_fk.fk1')</a></li>
            <li><a href="#">@lang('id.dd_fk.fk2')</a></li>
            <li><a href="#">@lang('id.dd_fk.fk3')</a></li>
            <li><a href="#">@lang('id.dd_fk.fk4')</a></li>
            <li><a href="#">@lang('id.dd_fk.fk5')</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <div class="btn-login">
        <button class="btn-nyala">@lang('id.tombol.login')</button>
    </div>
  </header>

  <!-- BANNER -->
  <section class="banner">
    <div class="anu">
      <h3>@lang('id.banner.dsk')</h3>
      <h1>@lang('id.banner.jdl1') <span>@lang('id.banner.jdl2')</span></h1>
    </div>
  </section>

  <!-- AWARDS -->
  <section class="awards">
    <h1>@lang('id.aw.jdl')</h1>
      <div class="aw_itm" id="rotatingContainer">
        <div class="aw_card1"><img src="image/awrds2.png" alt="Gambar 1"></div>
        <div class="aw_card2"><img src="image/awrds1.jpg" alt="Gambar 2"></div>
        <div class="aw_card3"><img src="image/awrds3.png" alt="Gambar 3"></div>
      </div>
  </section>

  <!-- WHY USBI -->
  <section class="whybsi">
    <div class="txtbx">
      <h1>Mengapa UBSI?</h1>
      <div class="p">
        <p>Memiliki 30 cabang di berbagai daerah <br>dengan harga terjangkau, serta memiliki <br>kelas malam.</p>
        <li>
          <a href="/">Lihat Profil Universitas</a>
        </li>
        <button class="daftar">Daftar</button>
      </div>
    </div>
    <div class="imgbx">
      <img src="image/Picsart_25-05-18_16-18-14-311.png" alt="">
    </div>
    <div class="vctr">
      <img src="image/Vector_7.png" alt="">
      <img src="image/Vector_8.png" alt="">
    </div>
  </section>

  <!-- COUNT & IKLAN -->
  <div class="container">
    <!-- COUNT -->
    <section class="statistik-container">
      <div class="item">
        <img src="image/teacher-at-the-blackboard.png" alt="Dosen">
        <p><strong class="counter" data-target="50">0</strong><br>DOSEN</p>
      </div>
      <div class="item">
        <img src="image/student (1).png" alt="Mahasiswa">
        <p><strong class="counter" data-target="50">0</strong><br>MAHASISWA</p>
      </div>
      <div class="item">
        <img src="image/education.png" alt="Alumni">
        <p><strong class="counter" data-target="50">0</strong><br>ALUMNI</p>
      </div>
      <div class="item">
        <img src="image/open-book.png" alt="Program Studi">
        <p><strong class="counter" data-target="50">0</strong><br>PROGRAM STUDI</p>
      </div>
    </section>
    <!-- IKLAN -->
    <section class="iklan-section">
      <div class="iklan-video">
          <img src="image/bsi-convention-center-3-768x432.jpg" alt="Iklan Video" class="iklan-bg">

          <a href="https://youtube.com" target="blank" class="play-button">
              <img src="image/logo-ubsi-142.png" class="logo-ubsi">
              <img src="image/youtube (1).png" class="icon-youtube">
          </a>
      </div>

      <div class="iklan-caption">
          Kenali UBSI lebih baik...
      </div>
      <img src="image/grid (1).png" class="grid-decoration grid-left" alt="grid">
      <img src="image/grid (1).png" class="grid-decoration grid-right" alt="grid">
    </section>
  </div>

  <!-- FASILITAS -->
  <section class="fasilitas-section">
    <h2 class="fasilitas-title">FASILITAS UBSI</h2>

    <div class="fasilitas-container">
      <!-- Gambar Kiri -->
      <div class="fasilitas-box fasilitas-left" data-position="left">
          <div class="fasilitas-img-wrapper">
              <img src="image/auditorium.jpg" alt="3">
              <div class="fasilitas-info">
                  <h3>Perpustakaan</h3>
                  <a href="#">Lihat Detail</a>
              </div>
          </div>
      </div>

      <!-- Gambar Tengah -->
      <div class="fasilitas-box fasilitas-center" data-position="center">
          <div class="fasilitas-img-wrapper">
              <img src="image/auditorium.jpg" alt="3">
              <div class="fasilitas-info">
                  <h3>Auditorium</h3>
                  <a href="#">Lihat Detail</a>
              </div>
          </div>
      </div>

      <!-- Gambar Kanan -->
      <div class="fasilitas-box fasilitas-right" data-position="right">
          <div class="fasilitas-img-wrapper">
              <img src="image/auditorium.jpg" alt="3">
              <div class="fasilitas-info">
                  <h3>Lab Komputer</h3>
                  <a href="#">Lihat Detail</a>
              </div>
          </div>
      </div>
    </div>
  </section>




  <script src="js/script.js"></script>
</body>
</html>