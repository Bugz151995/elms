<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<header>
  <?= $this->include('components/topbar') ?>
  <?= $this->include('components/sidebar') ?>
</header>

<main id="content">
  <div class="container-fluid ps-4 pe-4">
    <?= $this->include('components/breadcrumb') ?>
    <?= $this->include('components/modal_add_book') ?>
    <div class="table-responsive">
      <table id="table" class="table table-light table-borderless table-striped rounded rounded-3 small">
        <thead>
          <tr>
            <th class="text-nowrap">#</th>
            <th class="text-nowrap">QR Code</th>
            <th class="text-nowrap">Book Name</th>
            <th class="text-nowrap">Author</th>
            <th class="text-nowrap">Publish Date</th>
            <th class="text-nowrap">Category</th>
            <th class="text-nowrap">Units</th>
            <th class="text-nowrap">Units at hand</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>

        <tbody>
          <?php foreach ($books as $key => $book) : ?>
            <tr class="align-middle">
              <td><?= ++$key ?></td>
              <td class="text-center">
                <div id="qrcode<?= $book['qrcode_id'] ?>"></div>
                <script type="text/javascript">
                  document.addEventListener('DOMContentLoaded', function() {generateQR(<?= $book['qrcode_id'] ?>, "<?= $book['qrcode'] ?>")});
                </script>
              </td>
              <td class="text-capitalize"><?= $book['name'] ?></td>
              <td class="text-capitalize"><?= $book['author'] ?></td>
              <td class="text-capitalize"><?= $book['publish_date'] ?></td>
              <td class="text-capitalize"><?= $book['category'] ?></td>
              <td class="text-capitalize"><?= $book['units'] ?></td>
              <td class="text-capitalize"><?= $book['units_athand'] ?></td>
              <td class="text-center text-nowrap">
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editModal<?= $book['book_id'] ?>">
                  <i class="fas fa fa-fw fa-edit"></i>
                </button>

                <div class="modal fade" id="editModal<?= $book['book_id'] ?>" tabindex="-1" aria-labelledby="editModal<?= $book['book_id'] ?>Label" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header bg-primary text-light">
                        <div>&nbsp;</div>
                        <h5 class="modal-title" id="editModal<?= $book['book_id'] ?>Label">Edit a Book</h5>
                        <button type="button" class="btn btn-primary rounded-circle p-0" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-circle-xmark fa-xl"></i></button>
                      </div>
                      <?= form_open('registered_books/update', ['class' => 'needs-validation', 'novalidate' => '']) ?>
                      <?= form_hidden('book_id', $book['book_id']) ?>
                      <div class="modal-body fs-6">
                        <div class="row g-4 text-start">
                          <div class="col-12">
                            <label for="bookName" class="form-label">Book Name</label>
                            <input type="text" class="form-control" id="bookName" value="<?= $book['name'] ?>" name="name" placeholder="" required>
                            <div class="invalid-feedback small">This field is required!</div>
                          </div>
                          <div class="col-12">
                            <label for="author" class="form-label">Author</label>
                            <input type="text" class="form-control" id="author" value="<?= $book['author'] ?>" name="author" placeholder="" required>
                            <div class="invalid-feedback small">This field is required!</div>
                          </div>
                          <div class="col-12 col-md-4">
                            <label for="publishDate" class="form-label">Publish Date</label>
                            <input type="date" class="form-control" id="publishDate" value="<?= $book['publish_date'] ?>" name="publish_date" placeholder="" required>
                            <div class="invalid-feedback small">This field is required!</div>
                          </div>
                          <div class="col-12 col-md-4">
                            <label for="units" class="form-label">Units</label>
                            <input type="number" min="0" class="form-control" id="units" value="<?= $book['units'] ?>" name="units" placeholder="" required>
                            <div class="invalid-feedback small">This field is required!</div>
                          </div>
                          <div class="col-12">
                            <label for="category" class="form-label">Category</label>
                            <select id="category" class="form-select" name="category" aria-label="Default select a category" required>
                              <option value="">Select a Category...</option>
                              <?php foreach ($categories as $key => $category) : ?>
                                <option value="<?= $category['category_id'] ?>" <?= $book['category_id'] === $category['category_id'] ? 'selected' : '' ?>><?= $category['category'] ?></option>
                              <?php endforeach ?>
                            </select>
                            <div class="invalid-feedback small">This field is required!</div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer border-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-fw fa-circle-xmark"></i> Cancel</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save fa-fw"></i> Save</button>
                      </div>
                      <?= form_close() ?>
                    </div>
                  </div>
                </div>

                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $book['book_id'] ?>">
                  <i class="fas fa fa-fw fa-trash-alt"></i>
                </button>

                <div class="modal fade" id="deleteModal<?= $book['book_id'] ?>" tabindex="-1" aria-labelledby="deleteModal<?= $book['book_id'] ?>Label" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header bg-danger text-light">
                        <div>&nbsp;</div>
                        <h5 class="modal-title" id="deleteModal<?= $book['book_id'] ?>Label">Delete a Book</h5>
                        <button type="button" class="btn btn-danger rounded-circle p-0" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-circle-xmark fa-xl"></i></button>
                      </div>
                      <?= form_open('registered_books/delete') ?>
                      <?= form_hidden('book_id', $book['book_id']) ?>
                      <div class="modal-body fs-6">
                        <p>Are you sure that you want to delete this book data?</p>
                      </div>
                      <div class="modal-footer border-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-fw fa-circle-xmark"></i> Cancel</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-circle-check fa-fw"></i> Confirm</button>
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