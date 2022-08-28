<?= $this->extend('layout') ?>
<?php
  $borrowed_date = $time::parse($book['created_at']);
  $due_date = $time::parse($book['due_at']);
  $diff = $due_date->difference($time, 'Asia/Manila');
  $days_fine = $diff->getDays();
?>
<?= $this->section('content') ?>

<header>
  <?= $this->include('components/topbar') ?>
  <?= $this->include('components/sidebar') ?>
</header>

<main id="content">
  <?= $this->include('components/breadcrumb') ?>

  <?= form_open('borrowed_books/update') ?>
  <?= form_hidden('borrowed_book_id', $book['borrowed_book_id']) ?>
  <?= form_hidden('student_id', $book['student_id']) ?>
  <?= form_hidden('book_id', $book['book_id']) ?>
  <?= form_hidden('due_at', $book['due_at']) ?>
  <div class="row g-4 m-auto border p-3 bg-light" style="max-width: 700px">
    <div class="col-12 border-bottom"><h3><i class="fas fa fa-fw fa-square-caret-left"></i> Return Borrowed Book Form</h3></div>
    <div class="col-12 col-md-6">
      <label for="bookName" class="form-label">Book Name</label>
      <input type="text" class="form-control" id="bookName" value="<?= $book['name'] ?>" name="name" placeholder="Example input placeholder" disabled>
    </div>
    <div class="col-12 col-md-6">
      <label for="author" class="form-label">Author</label>
      <input type="text" class="form-control" id="author" value="<?= $book['author'] ?>" name="author" placeholder="Another input placeholder" disabled>
    </div>
    <div class="col-12 col-md-4">
      <label for="publishDate" class="form-label">Publish Date</label>
      <input type="date" class="form-control" id="publishDate" value="<?= $book['publish_date'] ?>" name="publish_date" placeholder="Example input placeholder" disabled>
    </div>
    <div class="col-12 col-md-4">
      <label for="units" class="form-label">Units</label>
      <input type="number" min="0" class="form-control" id="units" value="<?= $book['units'] ?>" name="units" placeholder="Example input placeholder" disabled>
    </div>
    <div class="col-12 col-md-4">
      <label for="category" class="form-label">Category</label>
      <select id="category" class="form-select" name="category" aria-label="Default select a category" disabled>
        <option>Select a Category</option>
        <?php foreach ($categories as $key => $category) : ?>
          <option value="<?= $category['category_id'] ?>" <?= $book['category_id'] === $category['category_id'] ? 'selected' : '' ?>><?= $category['category'] ?></option>
        <?php endforeach ?>
      </select>
    </div>    
    <div class="col-12 col-md-6">
      <label for="name" class="form-label">Borrower's Name</label>
      <input type="text" min="0" class="form-control" id="name" value="<?= $book['fname'].' '.substr($book['mname'],0,1).'. '.$book['lname'] ?>" name="name" placeholder="Example input placeholder" disabled>
    </div>
    <div class="col-12 col-md-6">
      <label for="class" class="form-label">Borrower's Class</label>
      <input type="text" min="0" class="form-control" id="class" value="<?= $book['grade_level'].' - '.$book['section_name'] ?>" name="class" placeholder="Example input placeholder" disabled>
    </div>
    <div class="col-12 col-md-6">
      <label for="borrowedAt" class="form-label">Borrowed @</label>
      <input type="text" min="0" class="form-control" id="borrowedAt" value="<?= $borrowed_date->toLocalizedString('MMM d, YYYY @ h:m a') ?>" name="borrowed_at" placeholder="Example input placeholder" disabled>
    </div>
    <div class="col-12 col-md-6">
      <label for="dueAt" class="form-label">Due @</label>
      <input type="text" min="0" class="form-control" id="dueAt" value="<?= $due_date->toLocalizedString('MMM d, YYYY @ h:m a') ?>" name="due_at" placeholder="Example input placeholder" disabled>
    </div>
    <div class="col-12">
      <label for="student_id" class="form-label">Borrower's Student ID</label>
      <input type="number" min="0" class="form-control" readonly id="student_id" value="<?= $book['student_id'] ?>" name="student_id" placeholder="Example input placeholder">
    </div>

    <?php if($days_fine > 0) : ?>
    <div class="col-12 col-md-6">
      <label for="fine" class="form-label">Fine</label>
      <input type="number" min="0" class="form-control" readonly id="fine" name="amount" value="<?= $days_fine * 10 ?>" placeholder="Example input placeholder">
    </div>
    <div class="col-12 col-md-6">
      <label for="orNo" class="form-label">OR Number</label>
      <input type="number" min="0" class="form-control" id="orNo" name="or_no" placeholder="Example input placeholder">
    </div>
    <?php endif ?>

    <div class="d-flex justify-content-between pb-2">
      <a href="<?= base_url() ?>/borrowed_books" class="btn btn-secondary" style="max-width: 300px"><i class="fas fa-fw fa-times"></i> Cancel</a>
      
      <button type="submit" class="btn btn-primary" style="max-width: 300px"><i class="fas fa-fw fa-save"></i> Save</button>
    </div>
  </div>
  <?= form_close() ?>
</main>

<?= $this->endSection() ?>