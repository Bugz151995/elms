<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<header>
  <?= $this->include('components/topbar') ?>
  <?= $this->include('components/sidebar') ?>
</header>

<main id="content">
  <?= $this->include('components/breadcrumb') ?>
  <?= $this->include('components/modal_scan_borrow') ?>

  <div class="table-responsive">
    <table id="table" class="table table-light table-striped small">
      <thead>
        <tr>
          <th class="text-nowrap">#</th>
          <th class="text-nowrap">Book Name</th>
          <th class="text-nowrap">Author</th>
          <th class="text-nowrap">Category</th>
          <th class="text-nowrap">Units Borrowed</th>
          <th class="text-nowrap">Borrower's Student ID</th>
          <th class="text-nowrap">Borrowed On</th>
          <th class="text-nowrap">Due On</th>
          <th class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($books as $key => $book) : ?>
          <tr>
            <td><?= ++$key ?></td>
            <td><?= $book['name'] ?></td>
            <td><?= $book['author'] ?></td>
            <td><?= $book['category'] ?></td>
            <td><?= $book['units_borrowed'] ?></td>
            <td><?= $book['student_id'] ?></td>
            <td><?= $book['created_at'] ?></td>
            <td><?= $book['due_at'] ?></td>
            <td class="text-center text-nowrap">
              <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editBorrowedBookModal">
                <i class="fas fa fa-fw fa-edit"></i>
              </button>

              <div class="modal fade" id="editBorrowedBookModal" tabindex="-1" aria-labelledby="editBorrowedBookModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header bg-primary text-light">
                      <div>&nbsp;</div>
                      <h5 class="modal-title" id="editBorrowedBookModalLabel">Edit Borrowed Book</h5>
                      <button type="button" class="btn btn-primary rounded-circle p-0" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-circle-xmark fa-xl"></i></button>
                    </div>
                    <?= form_open('borrowed_books/delete') ?>
                    <?= form_hidden('borrowed_book_id', $book['borrowed_book_id']) ?>
                    <div class="modal-body fs-6 text-start">
                      <div class="row g-4">
                        <div class="col-12">
                          <label for="bookName" class="form-label">Book Name</label>
                          <input type="text" class="form-control" id="bookName" value="<?= $book['name'] ?>" name="name" placeholder="Example input placeholder" disabled>
                        </div>
                        <div class="col-12">
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
                          <input type="text" min="0" class="form-control" id="category" value="<?= $book['category'] ?>" name="category" placeholder="Example input placeholder" disabled>
                        </div>
                        <div class="col-12 col-md-8">
                          <label for="name" class="form-label">Borrower's Name</label>
                          <input type="text" min="0" class="form-control" id="name" value="<?= $book['fname'] . ' ' . substr($book['mname'], 0, 1) . '. ' . $book['lname'] ?>" name="name" placeholder="Example input placeholder" disabled>
                        </div>
                        <div class="col-12 col-md-4">
                          <label for="borrowedAt" class="form-label">Borrowed @</label>
                          <input type="text" min="0" class="form-control" id="borrowedAt" value="<?= $book['created_at'] ?>" name="borrowed_at" placeholder="Example input placeholder" disabled>
                        </div>
                        <div class="col-12">
                          <label for="student_id" class="form-label d-block">Borrower's Student ID</label>
                          <input type="number" min="0" class="form-control" id="studentId" value="<?= $book['student_id'] ?>" name="student_id" placeholder="Example input placeholder">
                          <?= isset($_SESSION['validation']) ? $_SESSION['validation']->showError('student_id', 'single') : null ?>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer border-0">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-fw fa-circle-xmark"></i> Cancel</button>
                      <button type="submit" class="btn btn-primary"><i class="fas fa-save fa-fw"></i> Confirm</button>
                    </div>
                    <?= form_close() ?>
                  </div>
                </div>
              </div>

              <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteBorrowedBookModal">
                <i class="fas fa fa-fw fa-trash-alt"></i>
              </button>

              <div class="modal fade" id="deleteBorrowedBookModal" tabindex="-1" aria-labelledby="deleteBorrowedBookModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header bg-danger text-light">
                      <div>&nbsp;</div>
                      <h5 class="modal-title" id="deleteBorrowedBookModalLabel">Delete a Book</h5>
                      <button type="button" class="btn btn-danger rounded-circle p-0" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-circle-xmark fa-xl"></i></button>
                    </div>
                    <?= form_open('borrowed_books/delete') ?>
                    <?= form_hidden('borrowed_book_id', $book['borrowed_book_id']) ?>
                    <div class="modal-body fs-6">
                      <p>Are you sure that you want to delete this book data?</p>
                    </div>
                    <div class="modal-footer border-0">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-fw fa-circle-xmark"></i> Cancel</button>
                      <button type="submit" class="btn btn-primary"><i class="fas fa-save fa-fw"></i> Confirm</button>
                    </div>
                    <?= form_close() ?>
                  </div>
                </div>
              </div>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</main>

<script>
  // initialize autocomplete plugin
  document.addEventListener('DOMContentLoaded', function(){
    autocompleteInit('#studentId', 'Enter Student ID...', <?php foreach($students as $student){echo $student['student_id'].',';} ?>);
  });
</script>
<?= $this->endSection() ?>