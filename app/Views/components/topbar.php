<nav id="topbar" class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <button class="btn" id="sidebarBtn"><i id="sidebarBtnIcon" class="fas fa-fw fa-bars"></i></button>
    <a class="navbar-brand" id="schoolName">Goa National High School</a>

    <div class="dropdown dropstart">
      <a href="#" class="d-flex align-items-center text-decoration-none text-dark" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="<?= base_url() ?>/default.png" alt="" width="32" height="32" class="rounded-circle me-2 p-1">
      </a>
      <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser1">
        <li><a class="dropdown-item" href="#"><i class="fas fa-fw fa-cog"></i> Settings</a></li>
        <li><a class="dropdown-item" href="#"><i class="fas fa-fw fa-user-circle"></i> Profile</a></li>
        <li>
          <hr class="dropdown-divider">
        </li>
        <li><a class="dropdown-item" href="<?= base_url() ?>/signout"><i class="fas fa-fw fa-right-from-bracket"></i> Sign out</a></li>
      </ul>
    </div>
  </div>
</nav>