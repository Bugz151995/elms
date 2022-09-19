<?php function isPageActive($page, $cur_path)
{
  return ($page === $cur_path) ? 'active' : '';
} ?>

<div id="sidebar" class="d-flex flex-column">
  <a href="/" id="sidebarBrand" class="w-100 d-flex justify-content-center align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none p-2 gap-2">
    <img src="<?= base_url() ?>/gnhs_logo.png" id="logo" width="20px" alt="">
    <span id="brandName" class="navbar-brand">
      GNHS LMS
    </span>
  </a>

  <ul class="nav nav-pills flex-column ps-3 pe-3">
    <li class="nav-item mt-3">
      <a class="nav-link <?= isPageActive($page, 'home') ?>" href="<?= base_url() ?>/home"><i class="fas fa-fw fa-house-chimney"></i> Home</a>
    </li>
    <hr class="text-white border-2 border rounded rounded-3 m-3">
    <li class="nav-item">
      <div id="booksNavBtn" class="nav-link text-white"><span><i class="fas fa-fw fa-swatchbook"></i> Books</span> <i id="booksNavToggleIcon" class="fas fa-lg fa-angle-right float-end"></i></div>

      <ul id="booksNavGroup" class="nav nav-group flex-column ms-3 <?= ($page === 'registered_books' || $page === 'borrowed_books' || $page === 'returned_books') ? '' : 'closed' ?>">
        <li class="nav-item">
          <a class="nav-link <?= isPageActive($page, 'registered_books') ?>" href="<?= base_url() ?>/registered_books"><i class="fas fa-fw fa-book"></i> Registered Books</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= isPageActive($page, 'borrowed_books') ?>" href="<?= base_url() ?>/borrowed_books"><i class="fas fa-fw fa-book-open-reader"></i> Borrowed Books</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= isPageActive($page, 'returned_books') ?>" href="<?= base_url() ?>/returned_books"><i class="fas fa-fw fa-square-caret-left"></i> Returned Books</a>
        </li>
      </ul>
    </li>
    <hr class="text-white border-2 border rounded rounded-3 m-3">
    <li class="nav-item">
      <div id="accountsNavBtn" class="nav-link nav-link-btn-accounts text-white"><i class="fas fa-fw fa-user-group"></i> Accounts <i id="accountsNavToggleIcon" class="fas fa-lg fa-angle-right float-end"></i></div>

      <ul id="accountsNavGroup" class="nav nav-group flex-column nav-link-group-accounts ms-3 <?= ($page === 'registered_users' || $page === 'user_rankings' || $page === 'user_fines') ? '' : 'closed' ?>">
        <li class="nav-item">
          <a class="nav-link <?= isPageActive($page, 'registered_users') ?>" href="<?= base_url() ?>/registered_users"><i class="fas fa-fw fa-users"></i> Registered Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= isPageActive($page, 'user_rankings') ?>" href="<?= base_url() ?>/user_rankings"><i class="fas fa-fw fa-ranking-star"></i> User Rankings</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= isPageActive($page, 'user_fines') ?>" href="<?= base_url() ?>/user_fines"><i class="fas fa-fw fa-file-invoice-dollar"></i> User Fines</a>
        </li>
      </ul>
    </li>
    <hr class="text-white border-2 border rounded rounded-3 m-3">
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url() ?>/signout"><i class="fas fa-fw fa-right-from-bracket"></i> Sign Out</a>
    </li>
  </ul>

  <div class="mt-auto p-3">
    <hr class="text-white border-3 border rounded rounded-3">
    <a href="<?= base_url() ?>/" id="sidebarProfileLink" class="btn w-100 text-white d-flex align-items-center">
      <img src="<?= base_url() ?>/assets/default.png" alt="" width="50" class="rounded-circle border-3 border user-border me-2 p-1">
      <p class="m-0 ps-2 text-start">
        <span class="fs-6 d-block"><?= session()->get('fname').' '.substr(session()->get('mname'),0,1).'. '.session()->get('lname') ?></span>
        <span class="small d-block text-secondary">Administrator</span>
      </p>
    </a>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    $('#booksNavBtn').on('click', function() {
      if ($('#booksNavGroup').hasClass('closed')) {
        $('#booksNavGroup').removeClass('closed');
        $('#booksNavToggleIcon').css('transform', 'rotate(90deg)');
      } else {
        $('#booksNavGroup').addClass('closed');
        $('#booksNavToggleIcon').css('transform', 'rotate(0deg)');
      }
    });
    $('#accountsNavBtn').on('click', function() {
      if ($('#accountsNavGroup').hasClass('closed')) {
        $('#accountsNavGroup').removeClass('closed');
        $('#accountsNavToggleIcon').css('transform', 'rotate(90deg)');
      } else {
        $('#accountsNavGroup').addClass('closed');
        $('#accountsNavToggleIcon').css('transform', 'rotate(0deg)');
      }
    });
  });
</script>