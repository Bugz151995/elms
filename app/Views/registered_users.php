<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<header>
  <?= $this->include('components/topbar') ?>
  <?= $this->include('components/sidebar') ?>
</header>

<main id="content">
  <?= $this->include('components/breadcrumb') ?>
  <?= $this->include('components/create_u') ?>

  <div class="table-responsive">
    <table id="table" class="table table-light table-striped small">
      <thead>
        <tr>
          <th>#</th>
          <th>Student's Name</th>
          <th>Username</th>
          <th>Grade</th>
          <th>Section</th>
          <th>Registered @</th>
          <th class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users as $key => $user) : ?>
          <tr>
            <td><?= ++$key ?></td>
            <td><?= $user['fname'] . ' ' . substr($user['mname'], 0, 1) . '. ' . $user['lname'] ?></td>
            <td><?= $user['username'] ?></td>
            <td><?= $user['grade_level'] ?></td>
            <td><?= $user['section_name'] ?></td>
            <td><?= $user['created_at'] ?></td>
            <td class="text-center">
              <a href="<?= base_url() ?>/registered_users/edit_user/<?= $user['account_id'] ?>" class="btn btn-sm btn-primary"><i class="fas fa-fw fa-edit"></i></a>

              <a href="<?= base_url() ?>/registered_users/delete_user/<?= $user['account_id'] ?>" class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash-alt"></i></a>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</main>

<?= $this->endSection() ?>