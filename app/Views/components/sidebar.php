<?php function isPageActive($path, $cur_path) { return ($path === $cur_path) ? 'active' : ''; } ?>

<div id="sidebar">
  <a href="/" class="d-flex justify-content-center align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none p-2 gap-2">    
    <img src="<?= base_url() ?>/gnhs_logo.png" id="logo" width="25px" alt="">
    <span id="brandName" class="fs-3">
      GNHS LMS
    </span>
  </a>

  <hr class="text-white mt-0">

  <ul class="nav nav-pills flex-column">
    <li class="nav-item">
      <a class="nav-link <?= isPageActive($path, 'home') ?>" href="<?= base_url() ?>/home"><i class="fas fa-fw fa-house-chimney"></i> Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url() ?>/registered_books"><i class="fas fa-fw fa-swatchbook"></i> Books</a>

      <ul class="nav flex-column ms-3">
        <li class="nav-item">
          <a class="nav-link <?= isPageActive($path, 'registered_books') ?>" href="<?= base_url() ?>/registered_books"><i class="fas fa-fw fa-book"></i> Registered Books</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= isPageActive($path, 'borrowed_books') ?>" href="<?= base_url() ?>/borrowed_books"><i class="fas fa-fw fa-book-open-reader"></i> Borrowed Books</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= isPageActive($path, 'returned_books') ?>" href="<?= base_url() ?>/returned_books"><i class="fas fa-fw fa-square-caret-left"></i> Returned Books</a>
        </li>
      </ul>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url() ?>/registered_users"><i class="fas fa-fw fa-user-group"></i> Accounts</a>

      <ul class="nav flex-column ms-3">
        <li class="nav-item">
          <a class="nav-link <?= isPageActive($path, 'registered_users') ?>" href="<?= base_url() ?>/registered_users"><i class="fas fa-fw fa-users"></i> Registered Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= isPageActive($path, 'user_rankings') ?>" href="<?= base_url() ?>/user_rankings"><i class="fas fa-fw fa-ranking-star"></i> User Rankings</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= isPageActive($path, 'user_fines') ?>" href="<?= base_url() ?>/user_fines"><i class="fas fa-fw fa-file-invoice-dollar"></i> User Fines</a>
        </li>
      </ul>
    </li>
  </ul>
</div>