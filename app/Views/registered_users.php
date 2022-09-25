<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<header>
  <?= $this->include('components/topbar') ?>
  <?= $this->include('components/sidebar') ?>
</header>

<main id="content">
  <div class="container-fluid ps-4 pe-4">
    <?= $this->include('components/breadcrumb') ?>

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
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editUserModal<?= $user['account_id'] ?>">
                  <i class="fas fa fa-fw fa-edit"></i>
                </button>

                <!-- Modal -->
                <div class="modal text-start fade" id="editUserModal<?= $user['account_id'] ?>" tabindex="-1" aria-labelledby="editUserModal<?= $user['account_id'] ?>Label" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header bg-primary text-light">
                        <div>&nbsp;</div>
                        <h5 class="modal-title" id="changePassModal<?= $user['account_id'] ?>Label">Edit User</h5>
                        <button type="button" class="btn btn-primary rounded-circle p-0" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-circle-xmark fa-xl"></i></button>
                      </div>
                      <?= form_open(
                        'registered_users/update',
                        ['class' => 'needs-validation', 'novalidate' => ''],
                        [
                          'student_id' => $user['student_id'],
                          'account_id' => $user['account_id']
                        ]
                      ) ?>
                      <div class="modal-body">
                        <div class="row g-4">
                          <div class="col-12">
                            <label for="fname" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="fname" name="fname" value="<?= $user['fname'] ?>" placeholder="Enter your First Name..." required>
                            <div class="invalid-feedback small">This field is required!</div>
                          </div>
                          <div class="col-12">
                            <label for="mname" class="form-label">Middle Name</label>
                            <input type="text" class="form-control" id="mname" name="mname" value="<?= $user['mname'] ?>" placeholder="Enter your Middle Name..." required>
                            <div class="invalid-feedback small">This field is required!</div>
                          </div>
                          <div class="col-12">
                            <label for="lname" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lname" name="lname" value="<?= $user['lname'] ?>" placeholder="Enter your Last Name..." required>
                            <div class="invalid-feedback small">This field is required!</div>
                          </div>
                          <div class="col-12">
                            <label for="class" class="form-label">Grade & Section</label>
                            <select id="class" class="form-select" name="class" aria-label="Default select a category" required>
                              <option value="">Select Grade & Section</option>
                              <?php foreach ($class as $key => $c) : ?>
                                <option value="<?= $c['class_id'] ?>" <?= $user['class_id'] === $c['class_id'] ? 'selected' : '' ?>><?= $c['grade_level'] . ' - ' . $c['section_name'] ?></option>
                              <?php endforeach ?>
                            </select>
                            <div class="invalid-feedback small">This field is required!</div>
                          </div>
                          <div class="col-12">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?= $user['username'] ?>" placeholder="Enter your desired Username..." required>
                            <div class="invalid-feedback small">This field is required!</div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer border-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-fw fa-circle-xmark"></i> Cancel</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-save"></i> Save</button>
                      </div>
                      <?= form_close() ?>
                    </div>
                  </div>
                </div>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#changePassModal<?= $user['account_id'] ?>">
                  <i class="fas fa fa-fw fa-unlock"></i>
                </button>

                <!-- Modal -->
                <div class="modal text-start fade" id="changePassModal<?= $user['account_id'] ?>" tabindex="-1" aria-labelledby="changePassModal<?= $user['account_id'] ?>Label" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header bg-warning text-dark">
                        <div>&nbsp;</div>
                        <h5 class="modal-title" id="changePassModal<?= $user['account_id'] ?>Label">Change Password</h5>
                        <button type="button" class="btn btn-warning rounded-circle p-0" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-circle-xmark fa-xl"></i></button>
                      </div>
                      <?= form_open(
                        'registered_users/change_password',
                        ['class' => 'needs-validation', 'novalidate' => ''],
                        ['account_id' => $user['account_id']]
                      ) ?>
                      <div class="modal-body">
                        <div class="row g-4">
                          <div class="col-12">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter new Password..." required>
                            <div class="invalid-feedback small">This field is required!</div>
                          </div>
                          <div class="col-12">
                            <label for="passwordConf" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="passwordConf" name="password_conf" placeholder="Confirm new Password..." required>
                            <div class="invalid-feedback small">This field is required!</div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer border-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-fw fa-circle-xmark"></i> Cancel</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-save"></i> Save</button>
                      </div>
                      <?= form_close() ?>
                    </div>
                  </div>
                </div>

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