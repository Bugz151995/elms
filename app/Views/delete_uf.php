<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<header>
  <?= $this->include('components/topbar') ?>
  <?= $this->include('components/sidebar') ?>
</header>

<main id="content">
  <?= $this->include('components/breadcrumb') ?>

  <?= form_open('user_fines/delete') ?>
  <?= form_hidden('account_fine_id', $fine['account_fine_id']) ?>
  <div class="row g-4 m-auto border p-3 bg-light" style="max-width: 700px">
    <div class="col-12 border-bottom"><h3><i class="fas fa fa-fw fa-trash-alt"></i> Delete User Fine Form</h3></div>
    <div class="col-12 col-md-6">
      <label for="studentName" class="form-label">Student Name</label>
      <input type="text" class="form-control" id="studentName" value="<?= $fine['fname'].' '.substr($fine['fname'],0,1).'. '.$fine['lname'] ?>" name="name" placeholder="Example input placeholder" disabled>
    </div>
    <div class="col-12 col-md-6">
      <label for="username" class="form-label">Username</label>
      <input type="text" class="form-control" id="username" value="<?= $fine['username'] ?>" name="username" placeholder="Another input placeholder" disabled>
    </div>
    <div class="col-12">
      <label for="class" class="form-label">Grade & Section</label>
      <select id="class" class="form-select" name="class" aria-label="Default select a category" disabled>
        <option>Select Grade & Section</option>
        <?php foreach ($class as $key => $c) : ?>
          <option value="<?= $c['class_id'] ?>" <?= $c['class_id'] === $fine['class_id'] ? 'selected' : '' ?>><?= $c['grade_level'] . ' - ' . $c['section_name'] ?></option>
        <?php endforeach ?>
      </select>
    </div>
    <div class="col-12 col-md-6">
      <label for="orNo" class="form-label">OR Number</label>
      <input type="text" class="form-control" id="orNo" value="<?= $fine['or_no'] ?>" name="username" placeholder="Another input placeholder" disabled>
    </div>
    <div class="col-12 col-md-6">
      <label for="amountPaid" class="form-label">Amount Paid</label>
      <input type="text" class="form-control" id="amountPaid" value="<?= $fine['amount_paid'] ?>" name="username" placeholder="Another input placeholder" disabled>
    </div>
    <div class="col-12">
      <label for="createdAt" class="form-label">Paid @</label>
      <input type="text" class="form-control" id="createdAt" value="<?= $fine['created_at'] ?>" name="username" placeholder="Another input placeholder" disabled>
    </div>
    <div class="d-flex justify-content-between pb-2">
      <a href="<?= base_url() ?>/user_fines" class="btn btn-secondary" style="max-width: 300px"><i class="fas fa-fw fa-times"></i> Cancel</a>
      
      <button type="submit" class="btn btn-danger" style="max-width: 300px"><i class="fas fa-fw fa-trash-alt"></i> Delete</button>
    </div>
  </div>
  <?= form_close() ?>
</main>

<?= $this->endSection() ?>