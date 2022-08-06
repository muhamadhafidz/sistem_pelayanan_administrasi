<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('user.home') }}" class="brand-link text-center font-weight-bold">
      {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
      <span class="brand-text font-weight-normal">Navil Store Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="mt-3 pb-3 mb-3 d-flex">
        
      </div>
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Cari Halaman" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw nav-icon"></i>
            </button>
          </div>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item  {{ Request::is('admin/dashboard*') ? 'menu-open' : '' }}">
            
            <a class="nav-link" href="{{ route('admin.dashboard.index') }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.pengajuan') }}" class="nav-link {{ Request::is('admin/pengajuan*') ? 'active' : '' }}">
              <i class="fas fa-boxes nav-icon"></i>
              <p>Pengajuan Dokumen <span class="right badge badge-light">{{ App\Document_request::where('status', '!=', 'selesai')->count() }}</span></p>
            </a>
          </li>
          @if (Auth::user()->hak_akses == "kades")
          <li class="nav-item">
            <a href="{{ route('admin.arsip') }}" class="nav-link {{ Request::is('admin/arsip*') ? 'active' : '' }}">
              <i class="fas fa-boxes nav-icon"></i>
              <p>Arsip Dokumen <span class="right badge badge-light">{{ App\Document_request::where('status', 'selesai')->count() }}</span></p>
            </a>
          </li>
          @endif
          @if (Auth::user()->hak_akses == "admin")
          <li class="nav-item">
            <a href="{{ route('admin.pengguna.index') }}" class="nav-link {{ Request::is('admin/pengguna*') ? 'active' : '' }}">
              <i class="fas fa-boxes nav-icon"></i>
              <p>Pengguna</p>
            </a>
          </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>