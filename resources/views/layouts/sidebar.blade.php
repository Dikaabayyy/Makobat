<ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-heading">Main Menu</li>
    <li class="nav-item">
      <a class="nav-link {{ Request::is('dashboard') ? '' : 'collapsed' }}" href="/dashboard">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a class="nav-link {{ Request::is('konsultasi') ? '' : 'collapsed' }}" href="{{ route('konsultasi') }}">
        <i class="bi bi-chat-left-dots"></i>
        <span>Konsultasi</span>
      </a>
    </li>

    <li class="nav-item">
      <a data-bs-toggle="modal" data-bs-target="#addData" class="nav-link collapsed">
        <i class="bi bi-person-plus"></i>
        <span>Tambah Data Pasien</span>
      </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ Request::is('stock-obat') ? '' : 'collapsed' }}" href="/stock-obat">
          <i class="bi bi-chat-left-dots"></i>
          <span>Stok Obat</span>
        </a>
      </li>
    <hr>


    <li class="nav-heading">Care Plan</li>

    <li class="nav-item">
      <a class="nav-link {{ Route::currentRouteName() == 'pasien' ? '' : 'collapsed' }}" href="/pasien">
        <i class="bi bi-person-video2"></i>
        <span>Pasien</span>
      </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ Route::currentRouteName() == 'set_obat' ? '' : 'collapsed' }}" href="/set-obat">
          <i class="bi bi-shield-x"></i>
          <span>Obat Habis</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ Route::currentRouteName() == 'keluhan-pasien' ? '' : 'collapsed' }}" href="/keluhan-pasien">
            <i class="bi bi-exclamation-circle"></i>
            <span>Keluhan Obat</span>
        </a>
    </li>

    <li class="nav-item">
      <a class="nav-link {{ Route::currentRouteName() == 'set-timer' ? '' : 'collapsed' }}" href="/set-timer">
        <i class="bi bi-stopwatch"></i>
        <span>Set Timer Minum Obat</span>
      </a>
    </li>


    <hr><li class="nav-heading">Profile</li>

    @auth
        @if (Auth::user()->role == 'Admin')

        <li class="nav-item">
            <a class="nav-link {{ Request::is('all-admin') ? '' : 'collapsed' }}" href="/all-admin">
                <i class="bi bi-person-check"></i>
                <span>Apoteker & Dokter</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::is('users') ? '' : 'collapsed' }}" href="/users">
                <i class="bi bi-people"></i>
                <span>Manage Patiens</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::is('settings') ? '' : 'collapsed' }}" href="/settings">
                <i class="bi bi-gear"></i>
                <span>Settings</span>
            </a>
        </li><!-- End Profile Page Nav -->
        @endif
    @endauth

    <li class="nav-item">
        <a class="nav-link {{ Request::is('profile') ? '' : 'collapsed' }}" href="/profile">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

    <li class="nav-item">
      <a data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="nav-link collapsed">
        <i class="bi bi-box-arrow-left"></i>
          <span> Logout </span>
      </a>
    </li><!-- End Login Page Nav -->

  </ul>

</aside><!-- End Sidebar-->
