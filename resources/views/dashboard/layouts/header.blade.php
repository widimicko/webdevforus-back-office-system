<header id="header" class="header fixed-top d-flex align-items-center">
  <div class="d-flex align-items-center justify-content-between">
    <a href="{{ route('dashboard') }}" class="logo d-flex align-items-center">
    <span class="d-none d-lg-block">Back Office System</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div>
  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">
      <li class="nav-item dropdown pe-3">
        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <i class="bi bi-person"></i>
          <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->name }}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <h6>{{ auth()->user()->name }}</h6>
            <span>{{ auth()->user()->role }}</span>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li>
            <a class="dropdown-item d-flex align-items-center" href="{{ route('profile') }}">
            <i class="bi bi-person"></i>
            <span>My Profile</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li>
            <button type="button" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#logoutModal">
              <i class="bi bi-box-arrow-right"></i>
              <span>Logout</span>
            </button>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
</header>