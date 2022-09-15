<!-- Button trigger modal -->
<div class="mb-4 d-flex justify-content-start">
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addReturnedBookModal">
    <i class="fas fa fa-fw fa-circle-plus"></i> Register a User
  </button>
</div>

<!-- Modal -->
<div class="modal fade" id="addReturnedBookModal" tabindex="-1" aria-labelledby="addReturnedBookModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-primary text-light">
        <div>&nbsp;</div>
        <h5 class="modal-title" id="addReturnedBookModalLabel">Register a User</h5>
        <button type="button" class="btn btn-primary rounded-circle p-0" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-circle-xmark fa-xl"></i></button>
      </div>
      <?= form_open('registered_users/create') ?>
      <div class="modal-body">
        <div class="row g-4">
          <div class="col-12 col-sm-6">
            <label for="studentId" class="form-label">Student ID</label>
            <input type="text" class="form-control form-control-sm" id="studentId" name="student_id" placeholder="Enter the Student ID...">
          </div>
          <div class="col-12 col-sm-6">
            <label for="class" class="form-label">Grade & Section</label>
            <select id="class" class="form-select form-select-sm" name="class" aria-label="Default select a category">
              <option selected>Select Grade & Section</option>
              <?php foreach ($class as $key => $c) : ?>
                <option value="<?= $c['class_id'] ?>"><?= $c['grade_level'] . ' - ' . $c['section_name'] ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="col-12 col-sm-8">
            <label for="fname" class="form-label">First Name</label>
            <input type="text" class="form-control form-control-sm" id="fname" name="fname" placeholder="Enter your First Name...">
          </div>
          <div class="col-12 col-sm-8">
            <label for="mname" class="form-label">Middle Name</label>
            <input type="text" class="form-control form-control-sm" id="mname" name="mname" placeholder="Enter your Middle Name...">
          </div>
          <div class="col-12 col-sm-8">
            <label for="lname" class="form-label">Last Name</label>
            <input type="text" class="form-control form-control-sm" id="lname" name="lname" placeholder="Enter your Last Name...">
          </div>
        </div>
        <div class="bg-light rounded rounded-3 mt-4 mb-4 fst-italic text-center small">Create Username &amp; Password</div>
        <div class="row row-cols-1 row-cols-sm-2 g-4">
          <div class="col">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control form-control-sm" id="username" name="username" placeholder="Enter your desired Username...">
          </div>
          <div class="col">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control form-control-sm" id="password" name="password" placeholder="Enter your desired Password...">
          </div>
          <div class="col">
            <label for="passwordConf" class="form-label">Confirm Password</label>
            <input type="password" class="form-control form-control-sm" id="passwordConf" name="password_conf" placeholder="Please confirm your Password...">
          </div>
        </div>
      </div>
      <div class="modal-footer border-0">
        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal"><i class="fas fa-fw fa-circle-xmark"></i> Cancel</button>
        <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-fw fa-save"></i> Save</button>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>