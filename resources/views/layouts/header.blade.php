<div class="d-flex align-items-center justify-content-between">
    <i class="bi bi-list toggle-sidebar-btn"></i>
    <a href="/dashboard" class="logo d-flex align-items-center">
      <span class="d-none d-lg-block"> Makobat</span>
    </a>
</div><!-- End Logo -->

  @auth

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

      <li class="nav-item pe-3">

        <a href="/profile-admin" class="nav-link nav-profile d-flex align-items-center pe-0">
            <span class="d-none d-md-block ps-2" >Selamat datang, {{ auth()->user()->username }}!</span>
            <img src="{{ asset('public/ImageUser/'.auth()->user()->avatar) }}" alt="Profile" class="rounded-circle">
        </a><!-- End Profile Iamge Icon -->

      </li><!-- End Profile Nav -->

    </ul>
  </nav>
  @endauth
