<!-- Button trigger modal -->
<div class="mb-4 d-flex justify-content-end">
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBookModal">
    <i class="fas fa fa-fw fa-plus"></i> Add a Book
  </button>
</div>

<!-- Modal -->
<div class="modal fade" id="addBookModal" tabindex="-1" aria-labelledby="addBookModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addBookModalLabel">Add a Book</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <?= form_open('registered_books/create') ?>
      <div class="modal-body">
        <div class="mb-3">
          <label for="bookName" class="form-label">Book Name</label>
          <input type="text" class="form-control" id="bookName" name="name" placeholder="Example input placeholder">
        </div>
        <div class="mb-3">
          <label for="author" class="form-label">Author</label>
          <input type="text" class="form-control" id="author" name="author" placeholder="Another input placeholder">
        </div>
        <div class="mb-3">
          <label for="publishDate" class="form-label">Publish Date</label>
          <input type="date" class="form-control" id="publishDate" name="publish_date" placeholder="Example input placeholder">
        </div>
        <div class="mb-3">
          <label for="units" class="form-label">Units</label>
          <input type="number" min="0" class="form-control" id="units" name="units" placeholder="Example input placeholder">
        </div>
        <div class="mb-3">
          <label for="category" class="form-label">Category</label>
          <select id="category" class="form-select" name="category" aria-label="Default select a category">
            <option selected>Select a Category</option>
            <?php foreach($categories as $key => $category) : ?>
            <option value="<?= $category['category_id'] ?>"><?= $category['category'] ?></option>
            <?php endforeach ?>
          </select>
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