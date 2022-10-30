 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="{{ route('dashboard') }}" class="brand-link">
         @if(auth()->user()->isAdmin())
         <span class="brand-text font-weight-light ml-3">BKPP</span>
         @else
         <span class="brand-text font-weight-light ml-3">Warkop Sipaten</span>
         @endif
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="info ml-2">
                 <a href="{{ route('user.edit', auth()->user()->id) }}" class="d-block">{{ auth()->user()->name ?? null }}<br /><span class="text-sm text-secondary">{{ auth()->user()->getRoleNames()[0] ?? null }}</span></a>
             </div>
         </div>
         @auth
         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 @if(auth()->user()->hasVerifiedEmail())

                 @endif

                 @if(auth()->user()->isAdmin())
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon far fa-circle text-success"></i>
                         <p>
                             Contact
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         @can('contact-list')
                         <li class="nav-item">
                             <a href="{{ route('contact.index') }}" class="nav-link">
                                 <i class="nav-icon fas fa-angle-right"></i>
                                 <p>
                                     Contact list
                                 </p>
                             </a>
                         </li>
                         @endcan
                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon far fa-circle text-success"></i>
                         <p>
                             Event
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         @can('event-list')
                         <li class="nav-item">
                             <a href="{{ route('event.index') }}" class="nav-link">
                                 <i class="nav-icon fas fa-angle-right"></i>
                                 <p>
                                     List event
                                 </p>
                             </a>
                         </li>
                         @endcan
                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon far fa-circle text-success"></i>
                         <p>
                             Berita
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         @can('news-list')
                         <li class="nav-item">
                             <a href="{{ route('news.index') }}" class="nav-link">
                                 <i class="nav-icon fas fa-angle-right"></i>
                                 <p>
                                     Berita
                                 </p>
                             </a>
                         </li>
                         @endcan
                         @can('category-list')
                         <li class="nav-item">
                             <a href="{{ route('category.index') }}" class="nav-link">
                                 <i class="nav-icon fas fa-angle-right"></i>
                                 <p>
                                     Kategori berita
                                 </p>
                             </a>
                         </li>
                         @endcan
                         @can('tag-list')
                         <li class="nav-item">
                             <a href="{{ route('tag.index') }}" class="nav-link">
                                 <i class="nav-icon fas fa-angle-right"></i>
                                 <p>
                                     Tag berita
                                 </p>
                             </a>
                         </li>
                         @endcan
                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon far fa-circle text-success"></i>
                         <p>
                             Referensi
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         @can('skpd-list')
                         <li class="nav-item">
                             <a href="{{ route('skpd.index') }}" class="nav-link">
                                 <i class="nav-icon fas fa-angle-right"></i>
                                 <p>
                                     SKPD
                                 </p>
                             </a>
                         </li>
                         @endcan
                         @can('golongan-list')
                         <li class="nav-item">
                             <a href="{{ route('golongan.index') }}" class="nav-link">
                                 <i class="nav-icon fas fa-angle-right"></i>
                                 <p>
                                     Golongan
                                 </p>
                             </a>
                         </li>
                         @endcan

                         @can('jenjang_pendidikan-list')
                         <li class="nav-item">
                             <a href="{{ route('jenjang_pendidikan.index') }}" class="nav-link">
                                 <i class="nav-icon fas fa-angle-right"></i>
                                 <p>
                                     Jenjang Pendidikan
                                 </p>
                             </a>
                         </li>
                         @endcan
                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon far fa-circle text-success"></i>
                         <p>
                             Pelayanan
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         @can('persyaratan_user-list')
                         <li class="nav-item">
                             <a href="{{ route('berkas.index') }}" class="nav-link">
                                 <i class="nav-icon fas fa-angle-right"></i>
                                 <p>
                                     Berkas Peserta
                                 </p>
                             </a>
                         </li>
                         @endcan
                         @can('ujian-list')
                         <li class="nav-item">
                             <a href="{{ route('ujian.index') }}" class="nav-link">
                                 <i class="nav-icon fas fa-angle-right"></i>
                                 <p>
                                     List Layanan
                                 </p>
                             </a>
                         </li>
                         @endcan
                         @can('persyaratan-list')
                         <li class="nav-item">
                             <a href="{{ route('persyaratan.index') }}" class="nav-link">
                                 <i class="nav-icon fas fa-angle-right"></i>
                                 <p>
                                     Persyaratan Layanan
                                 </p>
                             </a>
                         </li>
                         @endcan
                         @can('detail_user-list')
                         <li class="nav-item">
                             <a href="{{ route('registrasi.index') }}" class="nav-link">
                                 <i class="nav-icon fas fa-angle-right"></i>
                                 <p>
                                     Pendaftaran
                                 </p>
                             </a>
                         </li>
                         @endcan
                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon far fa-circle text-success"></i>
                         <p>
                             Pengaturan
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         @can('banner-list')
                         <li class="nav-item">
                             <a href="{{ route('banner.index') }}" class="nav-link">
                                 <i class="nav-icon fas fa-angle-right"></i>
                                 <p>
                                     Baner
                                 </p>
                             </a>
                         </li>
                         @endcan
                         @can('gallery-list')
                         <li class="nav-item">
                             <a href="{{ route('gallery.index') }}" class="nav-link">
                                 <i class="nav-icon fas fa-angle-right"></i>
                                 <p>
                                     Galeri
                                 </p>
                             </a>
                         </li>
                         @endcan
                         @can('page-list')
                         <li class="nav-item">
                             <a href="{{ route('page.index') }}" class="nav-link">
                                 <i class="nav-icon fas fa-angle-right"></i>
                                 <p>
                                     Halaman
                                 </p>
                             </a>
                         </li>
                         @endcan
                         @can('menu-list')
                         <li class="nav-item">
                             <a href="{{ route('menu.index') }}" class="nav-link">
                                 <i class="nav-icon fas fa-angle-right"></i>
                                 <p>
                                     Menu
                                 </p>
                             </a>
                         </li>
                         @endcan
                         @can('user-list')
                         <li class="nav-item">
                             <a href="{{ route('user.index') }}" class="nav-link">
                                 <i class="nav-icon fas fa-angle-right"></i>
                                 <p>
                                     Pengguna
                                 </p>
                             </a>
                         </li>
                         @endcan
                         @can('profile-list')
                         <li class="nav-item">
                             <a href="{{ route('profile.index') }}" class="nav-link">
                                 <i class="nav-icon fas fa-angle-right"></i>
                                 <p>
                                     Profil SKPD
                                 </p>
                             </a>
                         </li>
                         @endcan
                         @can('role-list')
                         <li class="nav-item">
                             <a href="{{ route('roles.index') }}" class="nav-link">
                                 <i class="nav-icon fas fa-angle-right"></i>
                                 <p>
                                     Roles
                                 </p>
                             </a>
                         </li>
                         @endcan
                         @can('slide-list')
                         <li class="nav-item">
                             <a href="{{ route('slide.index') }}" class="nav-link">
                                 <i class="nav-icon fas fa-angle-right"></i>
                                 <p>
                                     Slide
                                 </p>
                             </a>
                         </li>
                         @endcan
                     </ul>
                 </li>
                 @else
                 @can('persyaratan_user-list')
                 <li class="nav-item">
                     <a href="{{ route('berkas.index') }}" class="nav-link">
                         <i class="nav-icon far fa-circle text-success"></i>
                         <p>
                             Berkas
                         </p>
                     </a>
                 </li>
                 @endcan
                 @can('detail_user-list')
                 <li class="nav-item">
                     <a href="{{ route('registrasi.index') }}" class="nav-link">
                         <i class="nav-icon far fa-circle text-success"></i>
                         <p>
                             Pendaftaran
                         </p>
                     </a>
                 </li>
                 @endcan
                 @endif
                 <li class="nav-item">
                     <a href="/chatify" class="nav-link">
                         <i class="nav-icon far fa-circle text-success"></i>
                         <p>
                             Konsultasi live chat
                         </p>
                     </a>

                 </li>
                 <li class="nav-item">
                     <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                         <i class="nav-icon far fa-circle text-success"></i>
                         <p>
                             {{ __('Logout') }}
                         </p>
                     </a>

                 </li>
             </ul>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                 @csrf
             </form>
         </nav>
         <!-- /.sidebar-menu -->
         @endauth
     </div>
     <!-- /.sidebar -->
 </aside>