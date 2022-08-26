<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<header>
  <?= $this->include('components/topbar') ?>
  <?= $this->include('components/sidebar') ?>
</header>

<main id="content">
  <?= $this->include('components/breadcrumb') ?>
  <?= $this->include('components/create_b') ?>

  <?= form_open('registered_books/update') ?>
  <div class="mb-3">
    <label for="bookName" class="form-label">Book Name</label>
    <input type="text" class="form-control" id="bookName" value="<?= $book['name'] ?>" name="name" placeholder="Example input placeholder">
  </div>
  <div class="mb-3">
    <label for="author" class="form-label">Author</label>
    <input type="text" class="form-control" id="author" value="<?= $book['author'] ?>" name="author" placeholder="Another input placeholder">
  </div>
  <div class="mb-3">
    <label for="publishDate" class="form-label">Publish Date</label>
    <input type="date" class="form-control" id="publishDate" value="<?= $book['publish_date'] ?>" name="publish_date" placeholder="Example input placeholder">
  </div>
  <div class="mb-3">
    <label for="units" class="form-label">Units</label>
    <input type="number" min="0" class="form-control" id="units" value="<?= $book['units'] ?>" name="units" placeholder="Example input placeholder">
  </div>
  <div class="mb-3">
    <label for="category" class="form-label">Category</label>
    <select id="category" class="form-select" name="category" aria-label="Default select a category">
      <option>Select a Category</option>
      <?php foreach ($categories as $key => $category) : ?>
        <option value="<?= $category['category_id'] ?>" <?= $book['category_id'] === $category['category_id'] ? 'selected' : '' ?>><?= $category['category'] ?></option>
      <?php endforeach ?>
    </select>
  </div>
  <?= form_close() ?>
</main>

<?= $this->endSection() ?>