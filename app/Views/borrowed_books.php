<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<header>
  <?= $this->include('components/topbar') ?>
  <?= $this->include('components/sidebar') ?>
</header>

<main id="content">
  <div class="container-fluid ps-4 pe-4">
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
            <th class="text-nowrap">Units</th>
            <th class="text-nowrap">Student ID</th>
            <th class="text-nowrap">Created at</th>
            <th class="text-nowrap">Due at</th>
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
                <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#detailsModal<?= $book['book_id'] ?>">
                  <i class="fas fa fa-fw fa-eye"></i>
                </button>

                <div class="modal fade" id="detailsModal<?= $book['book_id'] ?>" tabindex="-1" aria-labelledby="detailsModal<?= $book['book_id'] ?>Label" aria-hidden="true">
                  <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header bg-info">
                        <div>&nbsp;</div>
                        <h5 class="modal-title" id="detailsModal<?= $book['book_id'] ?>Label">Borrowed Book Details</h5>
                        <button type="button" class="btn btn-info rounded-circle p-0" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-circle-xmark fa-xl"></i></button>
                      </div>
                      <div class="modal-body fs-6 text-start">
                        <table class="table table-borderless">
                          <tbody>
                            <tr>
                              <th>Book Name:</th>
                              <td class="fst-italic"><?= $book['name'] ?></td>
                            </tr>
                            <tr>
                              <th>Author:</th>
                              <td class="fst-italic"><?= $book['author'] ?></td>
                            </tr>
                            <tr>
                              <th>Publish Date:</th>
                              <td class="fst-italic"><?= $book['publish_date'] ?></td>
                            </tr>
                            <tr>
                              <th>Units:</th>
                              <td class="fst-italic"><?= $book['units'] ?></td>
                            </tr>
                            <tr>
                              <th>Category:</th>
                              <td class="fst-italic"><?= $book['category'] ?></td>
                            </tr>
                            <tr>
                              <th>Borrowed By:</th>
                              <td class="fst-italic"><?= $book['fname'] . ' ' . substr($book['mname'], 0, 1) . '. ' . $book['lname'] ?></td>
                            </tr>
                            <tr>
                              <th>Student ID:</th>
                              <td class="fst-italic"><?= $book['student_id'] ?></td>
                            </tr>
                            <tr>
                              <th>Created at:</th>
                              <td class="fst-italic"><?= $book['created_at'] ?></td>
                            </tr>
                            <tr>
                              <th>Due at:</th>
                              <td class="fst-italic"><?= $book['due_at'] ?></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="modal-footer border-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-fw fa-circle-xmark"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-print fa-fw"></i> Print</button>
                      </div>
                    </div>
                  </div>
                </div>

                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $book['borrowed_book_id'] ?>">
                  <i class="fas fa fa-fw fa-trash-alt"></i>
                </button>

                <div class="modal fade" id="deleteModal<?= $book['borrowed_book_id'] ?>" tabindex="-1" aria-labelledby="deleteModal<?= $book['borrowed_book_id'] ?>Label" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header bg-danger text-light">
                        <div>&nbsp;</div>
                        <h5 class="modal-title" id="deleteModal<?= $book['borrowed_book_id'] ?>Label">Delete a Book</h5>
                        <button type="button" class="btn btn-danger rounded-circle p-0" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-circle-xmark fa-xl"></i></button>
                      </div>
                      <?= form_open('borrowed_books/delete') ?>
                      <?= form_hidden('borrowed_book_id', $book['borrowed_book_id']) ?>
                      <div class="modal-body fs-6">
                        <p>Are you sure that you want to delete this book data?</p>
                      </div>
                      <div class="modal-footer border-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-fw fa-circle-xmark"></i> Cancel</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-check-circle fa-fw"></i> Confirm</button>
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
  </div>
</main>

<?= $this->endSection() ?>