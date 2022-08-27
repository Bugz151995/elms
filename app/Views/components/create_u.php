<!-- Button trigger modal -->
<div class="mb-4 d-flex justify-content-end">
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addReturnedBookModal">
    <i class="fas fa fa-fw fa-plus"></i> Register a User
  </button>
</div>

<!-- Modal -->
<div class="modal fade" id="addReturnedBookModal" tabindex="-1" aria-labelledby="addReturnedBookModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addReturnedBookModalLabel">Register a User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <?= form_open('registered_users/create') ?>
      <div class="modal-body">
        <div class="mb-3">
          <label for="studentId" class="form-label">Student ID</label>
          <input type="text" class="form-control" id="studentId" name="student_id" placeholder="Example input placeholder">
        </div>
        <div class="mb-3">
          <label for="fname" class="form-label">First Name</label>
          <input type="text" class="form-control" id="fname" name="fname" placeholder="Example input placeholder">
        </div>
        <div class="mb-3">
          <label for="mname" class="form-label">Middle Name</label>
          <input type="text" class="form-control" id="mname" name="mname" placeholder="Example input placeholder">
        </div>
        <div class="mb-3">
          <label for="lname" class="form-label">Last Name</label>
          <input type="text" class="form-control" id="lname" name="lname" placeholder="Example input placeholder">
        </div>
        <div class="mb-3">
          <label for="class" class="form-label">Grade & Section</label>
          <select id="class" class="form-select" name="class" aria-label="Default select a category">
            <option selected>Select Grade & Section</option>
            <?php foreach($class as $key => $c) : ?>
            <option value="<?= $c['class_id'] ?>"><?= $c['grade_level'].' - '.$c['section_name'] ?></option>
            <?php endforeach ?>
          </select>
        </div>
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="Example input placeholder">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Example input placeholder">
        </div>
        <div class="mb-3">
          <label for="passwordConf" class="form-label">Confirm Password</label>
          <input type="password" class="form-control" id="passwordConf" name="password_conf" placeholder="Example input placeholder">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>