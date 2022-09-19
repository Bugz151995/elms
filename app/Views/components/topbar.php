<nav id="topbar" class="navbar navbar-light">
  <div class="container-fluid">
    <button class="btn" id="sidebarBtn"><i id="sidebarBtnIcon" class="fas fa-fw fa-bars"></i></button>
    <a class="navbar-brand" id="schoolName">
      <span class="d-none d-md-block">Goa National High School - Library Management System</span>
      <span class="d-block d-md-none">GNHS-LMS</span>
    </a>

    <div class="dropdown dropstart">
      <a href="#" class="d-flex align-items-center text-decoration-none text-dark" id="dropdownAdminBtn" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="<?= base_url() ?>/assets/default.png" alt="" width="32" height="32" class="rounded-circle border-3 border user-border me-2 p-1">
      </a>
      <ul id="dropdownAdmin" class="dropdown-menu text-small shadow p-3" aria-labelledby="dropdownAdminBtn">
        <li>
          <a class="dropdown-item d-flex align-items-center" href="#">
            <img src="<?= base_url() ?>/assets/default.png" alt="" width="50" class="rounded-circle border-3 border border-primary me-2 p-1">
            <p class="ps-2 m-0">
              <span class="d-block fs-5"><?= session()->get('fname').' '.substr(session()->get('mname'),0,1).'. '.session()->get('lname') ?></span>
              <span class="d-block small text-secondary">View Profile</span>
            </p>
          </a>
        </li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#"><i class="fas fa-fw fa-cog"></i> Settings</a></li>
        <li><a class="dropdown-item" href="#"><i class="fas fa-fw fa-user-circle"></i> Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="<?= base_url() ?>/signout"><i class="fas fa-fw fa-right-from-bracket"></i> Sign Out</a></li>
      </ul>
    </div>
  </div>
</nav>