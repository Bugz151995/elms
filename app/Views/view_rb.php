<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<header>
  <?= $this->include('components/topbar') ?>
  <?= $this->include('components/sidebar') ?>
</header>

<main id="content">
  <?= $this->include('components/breadcrumb') ?>

  <?= form_open('returned_books/delete') ?>
  <?= form_hidden('returned_book_id', $book['returned_book_id']) ?>
  <div class="row g-4 m-auto border p-3 bg-light" style="max-width: 700px">
    <div class="col-12 border-bottom"><h3><i class="fas fa fa-fw fa-eye"></i> View Returned Book</h3></div>
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
    <div class="col-12">
      <label for="borrowedAt" class="form-label">Returned @</label>
      <input type="text" min="0" class="form-control" id="borrowedAt" value="<?= $book['created_at'] ?>" name="borrowed_at" placeholder="Example input placeholder" disabled>
    </div>
    <div class="col-12">
      <label for="student_id" class="form-label">Borrower's Student ID</label>
      <input type="number" min="0" class="form-control" id="student_id" value="<?= $book['student_id'] ?>" name="student_id" placeholder="Example input placeholder" disabled>
    </div>
    <div class="d-flex justify-content-between pb-2">
      <a href="<?= base_url() ?>/returned_books" class="btn btn-secondary" style="max-width: 300px"><i class="fas fa-fw fa-times"></i> Cancel</a>
      
      <button type="submit" class="btn btn-primary" style="max-width: 300px"><i class="fas fa-fw fa-print"></i> Print</button>
    </div>
  </div>
  <?= form_close() ?>
</main>

<?= $this->endSection() ?>