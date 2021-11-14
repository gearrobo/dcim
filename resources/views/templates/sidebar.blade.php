<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <!-- <a href="index3.html" class="brand-link">
      <img src="assets/dist/img/avatar.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Kontrol Sistem</span>
    </a> -->

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-2 pb-3 mb-3 d-flex">
      <div class="pull-left image mt-2">
        <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2 " alt="User Image">
      </div>
      <div class="pull-left info">
        <a href="#" class="d-block" style="font-size: 20px;">Admin 1</a>
        <a href="#"><i class="fas fa-power-off text-lightblue"> LogOut</i></a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
          <i class="nav-icon fas fa-digital-tachograph"></i>
            <p>
              Dashboard Utama
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('page.room') }}" class="nav-link {{ request()->routeIs('page.room') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Ruangan Server
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/rackserver" class="nav-link {{ request()->is('rackserver') ? 'active' : '' }}">
            <i class="nav-icon fas fa-server"></i>
            <p>
              Rack Server
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/electric" class="nav-link {{ request()->is('electric') ? 'active' : '' }}">
            <i class="nav-icon fas fa-bolt"></i>
            <p>
              Kelistrikan
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('generator.page')}}" class="nav-link {{ request()->routeIs('generator.page') ? 'active' : '' }}">
            <i class="nav-icon fas fa-solar-panel"></i>
            <p>
              Genset
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('ups.page') }}" class="nav-link {{ request()->routeIs('ups.page') ? 'active' : '' }}">
            <i class="nav-icon fas fa-plug"></i>
            <p>
              UPS
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/hvac" class="nav-link">
            <i class="nav-icon fab fa-empire"></i>
            <p>
              HVAC
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('lamp.index') }}" class="nav-link">
            <i class="nav-icon far fa-lightbulb"></i>
            <p>
              Kontrol Lampu
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('security.page') }}" class="nav-link">
            <i class="nav-icon fas fa-shield-alt"></i>
            <p>
              Keamanan
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('setting.page') }}" class="nav-link">
            <i class="nav-icon fas fa-cogs"></i>
            <p>
              Pengaturan
            </p>
          </a>
        </li>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>