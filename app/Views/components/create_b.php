<!-- Button trigger modal -->
<div class="mb-4 d-flex justify-content-start">
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBookModal">
    <i class="fas fa fa-fw fa-circle-plus"></i> Register a Book
  </button>
</div>

<!-- Modal -->
<div class="modal fade" id="addBookModal" tabindex="-1" aria-labelledby="addBookModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-primary text-light">
        <div>&nbsp;</div>
        <h5 class="modal-title" id="addBookModalLabel">Register a Book</h5>
        <button type="button" class="btn btn-primary rounded-circle p-0" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-circle-xmark fa-xl"></i></button>
      </div>
      <?= form_open('registered_books/create') ?>
      <div class="modal-body">
        <div class="row g-4">
        <div class="col-12">
          <label for="bookName" class="form-label">Book Name</label>
          <input type="text" class="form-control form-control-sm" id="bookName" name="name" placeholder="Enter the name of the Book...">
        </div>
        <div class="col-12">
          <label for="author" class="form-label">Author</label>
          <input type="text" class="form-control form-control-sm" id="author" name="author" placeholder="Enter the name of the Author...">
        </div>
        <div class="col-12">
          <label for="category" class="form-label">Category</label>
          <select id="category" class="form-select form-select-sm" name="category" aria-label="Default select a category">
            <option selected>Select a Book Category</option>
            <?php foreach($categories as $key => $category) : ?>
            <option value="<?= $category['category_id'] ?>"><?= $category['category'] ?></option>
            <?php endforeach ?>
          </select>
        </div>
        <div class="col-12 col-sm-6">
          <label for="publishDate" class="form-label">Publish Date</label>
          <input type="date" class="form-control form-control-sm" id="publishDate" name="publish_date" placeholder="">
        </div>
        <div class="col-12 col-sm-6">
          <label for="units" class="form-label"># of Books</label>
          <input type="number" min="0" class="form-control form-control-sm" id="units" name="units" placeholder="Enter the number of Books...">
        </div>
        </div>
      </div>
      <div class="modal-footer border-0">
        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal"><i class="fas fa-fw fa-circle-xmark"></i> Cancel</button>
        <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save fa-fw"></i> Save</button>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>