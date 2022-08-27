<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<header>
  <?= $this->include('components/topbar') ?>
  <?= $this->include('components/sidebar') ?>
</header>

<main id="content">
  <?= $this->include('components/breadcrumb') ?>

  <?= form_open('registered_users/delete') ?>
  <?= form_hidden('account_id', $user['account_id']) ?>
  <div class="row g-4 m-auto border p-3" style="max-width: 700px">
    <div class="col-12">
      <label for="studentId" class="form-label">Student ID</label>
      <input type="text" class="form-control" id="studentId" name="student_id" value="<?= $user['student_id'] ?>" placeholder="Example input placeholder" disabled>
    </div>
    <div class="col-12 col-md-4">
      <label for="fname" class="form-label">First Name</label>
      <input type="text" class="form-control" id="fname" name="fname" value="<?= $user['fname'] ?>" placeholder="Example input placeholder" disabled>
    </div>
    <div class="col-12 col-md-4">
      <label for="mname" class="form-label">Middle Name</label>
      <input type="text" class="form-control" id="mname" name="mname" value="<?= $user['mname'] ?>" placeholder="Example input placeholder" disabled>
    </div>
    <div class="col-12 col-md-4">
      <label for="lname" class="form-label">Last Name</label>
      <input type="text" class="form-control" id="lname" name="lname" value="<?= $user['lname'] ?>" placeholder="Example input placeholder" disabled>
    </div>
    <div class="col-12">
      <label for="class" class="form-label">Grade & Section</label>
      <select id="class" class="form-select" name="class" aria-label="Default select a category" disabled>
        <option>Select Grade & Section</option>
        <?php foreach ($class as $key => $c) : ?>
          <option value="<?= $c['class_id'] ?>" <?= $c['class_id'] === $user['class_id'] ? 'selected' : '' ?>><?= $c['grade_level'] . ' - ' . $c['section_name'] ?></option>
        <?php endforeach ?>
      </select>
    </div>
    <div class="col-12">
      <label for="username" class="form-label">Username</label>
      <input type="text" class="form-control" id="username" name="username" value="<?= $user['username'] ?>" placeholder="Example input placeholder" disabled>
    </div>

    <div class="d-flex justify-content-between pb-2">
      <a href="<?= base_url() ?>/registered_users" class="btn btn-secondary" style="max-width: 300px"><i class="fas fa-fw fa-times"></i> Cancel</a>

      <button type="submit" class="btn btn-danger" style="max-width: 300px"><i class="fas fa-fw fa-trash-alt"></i> Delete</button>
    </div>
  </div>
  <?= form_close() ?>
</main>

<?= $this->endSection() ?>