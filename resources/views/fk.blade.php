<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UBSI- Fakultas</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <!-- HEADER -->
  <header>
    <a href="/" class="logo">UBSI</a> 

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
        <button class="btn-nyala">Login</button>
    </div>
  </header>




  <script src="js/script.js"></script>
</body>
</html>