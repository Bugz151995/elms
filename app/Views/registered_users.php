<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<header>
  <?= $this->include('components/topbar') ?>
  <?= $this->include('components/sidebar') ?>
</header>

<main id="content">
  <div class="container">
    <?= $this->include('components/breadcrumb') ?>
    <?= $this->include('components/modal_add_user') ?>

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

                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteUserModal">
                  <i class="fas fa fa-fw fa-trash-alt"></i>
                </button>

                <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header bg-danger text-light">
                        <div>&nbsp;</div>
                        <h5 class="modal-title" id="deleteUserModalLabel">Delete a User</h5>
                        <button type="button" class="btn btn-danger rounded-circle p-0" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-circle-xmark fa-xl"></i></button>
                      </div>
                      <?= form_open('registered_users/delete') ?>
                      <?= form_hidden('account_id', $user['account_id']) ?>
                      <div class="modal-body fs-6">
                        <p>Are you sure that you want to delete this user data?</p>
                      </div>
                      <div class="modal-footer border-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-fw fa-circle-xmark"></i> Cancel</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-circle-check fa-fw"></i> Confirm</button>
                      </div>
                      <?= form_close() ?>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?= $this->endSection() ?>