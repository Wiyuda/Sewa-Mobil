<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
      <div class="sidebar-brand-icon">
        <i class="fas fa-fw fa-car"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Sewa Mobil</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
      <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
      </a>
  </li>

  <li class="nav-item active">
    <a class="nav-link" href="{{ route('user') }}">
      <i class="fas fa-fw fa-users"></i>
      <span>Pengguna</span>
    </a>
  </li>
  <li class="nav-item active">
    <a class="nav-link" href="{{ route('sewa') }}">
      <i class="fas fa-fw fa-car"></i>
      <span>Data Sewa</span>
    </a>
  </li>

  <li class="nav-item active">
    <a class="nav-link" href="{{ route('cars.index') }}">
      <i class="fas fa-fw fa-car"></i>
      <span>Data Mobil</span>
    </a>
</li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>