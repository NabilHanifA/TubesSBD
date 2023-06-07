<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{\Request::route()->getName() != "admin" ? 'collapsed' : '' }}" href="{{url('admin')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      {{-- <li class="nav-item">
        <a class="nav-link {{\Request::route()->getName() != "admin" ? 'collapsed' : '' }}" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Components</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="components-alerts.html">
              <i class="bi bi-circle"></i><span>Alerts</span>
            </a>
          </li>
        </ul>
      </li> --}}

      <li class="nav-heading mt-4">Monitoring</li>
      <li class="nav-item">
        <a class="nav-link {{\Request::route()->getName() != "admin.pesanan" ? 'collapsed' : '' }}" href="{{route('admin.pesanan')}}">
          <i class="bi bi-chat-dots"></i>
          <span>Pesanan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{\Request::route()->getName() != "admin.messages" ? 'collapsed' : '' }}" href="{{route('admin.messages')}}">
          <i class="bi bi-chat-dots"></i>
          <span>Messages</span>
        </a>
      </li>

      <li class="nav-heading mt-4">Manajemen Content</li>
      <li class="nav-item">
        <a class="nav-link {{\Request::route()->getName() != "admin.galeri" ? 'collapsed' : '' }}" href="{{route('admin.galeri')}}">
          <i class="bi bi-image"></i>
          <span>Galeri</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{\Request::route()->getName() != "admin.klien" ? 'collapsed' : '' }}" href="{{route('admin.klien')}}">
          <i class="bi bi-people"></i>
          <span>Klien</span>
        </a>
      </li>

      <li class="nav-heading mt-4">Masterdata</li>
      <li class="nav-item">
        <a class="nav-link {{\Request::route()->getName() != "admin.provinsi" ? 'collapsed' : '' }}" href="{{route('admin.provinsi')}}">
          <i class="bi bi-database"></i>
          <span>Provinsi</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{\Request::route()->getName() != "admin.kota" ? 'collapsed' : '' }}" href="{{route('admin.kota')}}">
          <i class="bi bi-database"></i>
          <span>Kota</span>
        </a>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link {{\Request::route()->getName() != "admin.kendaraan" ? 'collapsed' : '' }}" href="{{route('admin.kendaraan')}}">
          <i class="bi bi-database"></i>
          <span>Kendaraan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{\Request::route()->getName() != "admin.baterai" ? 'collapsed' : '' }}" href="{{route('admin.baterai')}}">
          <i class="bi bi-database"></i>
          <span>Baterai</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{\Request::route()->getName() != "admin.merk" ? 'collapsed' : '' }}" href="{{route('admin.merk')}}">
          <i class="bi bi-database"></i>
          <span>Merk</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{\Request::route()->getName() != "admin.stasiun" ? 'collapsed' : '' }}" href="{{route('admin.stasiun')}}">
          <i class="bi bi-database"></i>
          <span>Stasiun</span>
        </a> --}}
      </li>
    </ul>

  </aside>