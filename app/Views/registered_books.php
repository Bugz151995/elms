<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<header>
  <?= $this->include('components/topbar') ?>
  <?= $this->include('components/sidebar') ?>
</header>

<main id="content">

  <?= $this->include('components/breadcrumb') ?>
  <?= $this->include('components/create_b') ?>

  <div class="table-responsive">
    <table id="table" class="table table-light table-borderless table-striped rounded rounded-3 small">
      <thead>
        <tr>
          <th class="text-nowrap">#</th>
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
          <tr>
            <td><?= ++$key ?></td>
            <td class="text-capitalize"><?= $book['name'] ?></td>
            <td class="text-capitalize"><?= $book['author'] ?></td>
            <td class="text-capitalize"><?= $book['publish_date'] ?></td>
            <td class="text-capitalize"><?= $book['category'] ?></td>
            <td class="text-capitalize"><?= $book['units'] ?></td>
            <td class="text-capitalize"><?= $book['units_athand'] ?></td>
            <td class="text-capitalize text-center text-nowrap">
              <a href="<?= base_url() ?>/registered_books/edit_book/<?= $book['book_id'] ?>" class="btn btn-sm btn-primary"><i class="fas fa-fw fa-edit"></i></a>

              <!-- Button trigger modal -->
              <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteBookModal">
                <i class="fas fa fa-fw fa-trash-alt"></i>
              </button>

              <!-- Modal -->
              <div class="modal fade" id="deleteBookModal" tabindex="-1" aria-labelledby="deleteBookModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header bg-danger text-light">
                      <div>&nbsp;</div>
                      <h5 class="modal-title" id="deleteBookModalLabel">Delete a Book</h5>
                      <button type="button" class="btn btn-danger rounded-circle p-0" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-circle-xmark fa-xl"></i></button>
                    </div>
                    <?= form_open('registered_books/delete') ?>
                    <?= form_hidden('book_id', $book['book_id']) ?>
                    <div class="modal-body">
                      <p>Are you sure that you want to delete this book data?</p>
                    </div>
                    <div class="modal-footer border-0">
                      <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal"><i class="fas fa-fw fa-circle-xmark"></i> Cancel</button>
                      <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save fa-fw"></i> Confirm</button>
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

<?= $this->endSection() ?>