<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<header>
  <?= $this->include('components/topbar') ?>
  <?= $this->include('components/sidebar') ?>
</header>

<main id="content">
  <?= $this->include('components/breadcrumb') ?>

  <?= form_open('registered_books/borrow') ?>
  <?= form_hidden('book_id', $book['book_id']) ?>
  <div class="row g-4 m-auto border p-3 bg-light" style="max-width: 700px">
    <div class="col-12 border-bottom">
      <h3><i class="fas fa fa-fw fa-book-open-reader"></i> Borrow Book Form</h3>
    </div>
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
    <div class="col-12">
      <label for="studentId" class="form-label">Borrower's Student ID</label><br>
      <input type="text" name="student_id" id="studentId" class="form-control" placeholder="Enter Student ID...">
    </div>
    <div class="d-flex justify-content-between pb-2">
      <a href="<?= base_url() ?>/registered_books" class="btn btn-secondary" style="max-width: 300px"><i class="fas fa-fw fa-times"></i> Cancel</a>

      <button type="submit" class="btn btn-primary" style="max-width: 300px"><i class="fas fa-fw fa-save"></i> Save</button>
    </div>
  </div>
  <?= form_close() ?>
</main>

<script>
  // initialize autocomplete plugin
  document.addEventListener('DOMContentLoaded', function(){
    autocompleteInit('#studentId', 'Enter Student ID...', <?php foreach($students as $student){echo $student['student_id'].',';} ?>);
  });
</script>
<?= $this->endSection() ?>