 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="{{ route('dashboard') }}" class="brand-link">
         <span class="brand-text font-weight-light ml-3">SITULAR PNS</span>
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

                 @canany([
                 'skpd-list',
                 'skpd-create',
                 'skpd-edit',
                 'skpd-delete',
                 'golongan-list',
                 'golongan-create',
                 'golongan-edit',
                 'golongan-delete',
                 'jenjang_pendidikan-list',
                 'jenjang_pendidikan-create',
                 'jenjang_pendidikan-edit',
                 'jenjang_pendidikan-delete'
                 ])
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
                 @endcanany

                 @canany([
                 'persyaratan_user-list',
                 'persyaratan_user-create',
                 'persyaratan_user-edit',
                 'persyaratan_user-delete',
                 'ujian-list',
                 'ujian-create',
                 'ujian-edit',
                 'ujian-delete',
                 'persyaratan-list',
                 'persyaratan-create',
                 'persyaratan-edit',
                 'persyaratan-delete',
                 'detail_user-list',
                 'detail_user-create',
                 'detail_user-edit',
                 'detail_user-delete'
                 ])
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon far fa-circle text-success"></i>
                         <p>
                             Layanan
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
                                     Kelengkapan Surat
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
                         @can('live_chat-list')
                         <li class="nav-item">
                             <a href="/chatify" class="nav-link">
                                 <i class="nav-icon far fa-circle text-success"></i>
                                 <p>
                                     Live chat
                                 </p>
                             </a>
                         </li>
                         @endcan
                     </ul>
                 </li>
                 @endcanany

                 @canany([
                 'role-list',
                 'role-create',
                 'role-edit',
                 'role-delete',
                 'user-list',
                 'user-create',
                 'user-edit',
                 'user-delete'
                 ])
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon far fa-circle text-success"></i>
                         <p>
                             Pengaturan
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">

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
                         @can('user-list')
                         <li class="nav-item">
                             <a href="{{ route('user.index') }}" class="nav-link">
                                 <i class="nav-icon fas fa-angle-right"></i>
                                 <p>
                                     User
                                 </p>
                             </a>
                         </li>
                         @endcan

                     </ul>
                 </li>
                 @endcanany

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