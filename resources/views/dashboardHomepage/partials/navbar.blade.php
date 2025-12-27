 <!-- HEADER -->
 <header id="navbar">
     <a href="/" class="logo">
         <img src="{{ asset('image/logo.png') }}" alt="">
     </a>

     <!-- DAFTAR MENU -->
     <div class="group">
         <ul class="nav">
             <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a></li>
             <li><a
                     class="{{ request()->routeIs(['sabutan-rektor', 'visi', 'misi', 'web-buildings.index']) ? 'active' : '' }}">Profil
                     ⌵</a>

                 <!-- DROPDOWN MENU -->
                 <ul>
                     <li><a>Visi Misi<b>+</b></a>
                         <ul>
                             <li><a href="{{ route('misi') }}">Misi</a></li>
                             <li><a href="{{ route('visi') }}">Visi</a></li>
                         </ul>
                     </li>
                     <li><a href="{{ route('sabutan-rektor') }}">Sambutan Rektor</a></li>
                     <li><a href="{{ route('web-buildings.index') }}">Lokasi Kampus</a></li>
                 </ul>
             </li>
             <li><a href="{{ route('web-degree-levels.index') }}"
                     class="{{ request()->routeIs('web-degree-levels.index') ? 'active' : '' }}">Program</a></li>
             <li><a class="{{ request()->routeIs('web-study-program.show') ? 'active' : '' }}">Fakultas
                     ⌵</a>
                 <ul>
                     @foreach ($faculties as $faculty)
                         <li><a>{{ $faculty->name }}</a>
                             <ul>
                                 @foreach ($faculty->studyPrograms as $studyProgram)
                                     <li><a href="{{ route('web-study-program.show', $studyProgram->id) }}">{{ $studyProgram->name }}
                                             ({{ $studyProgram->code }})
                                         </a>
                                     </li>
                                 @endforeach
                             </ul>
                         </li>
                     @endforeach
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
