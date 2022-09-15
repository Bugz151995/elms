<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<header>
  <?= $this->include('components/topbar') ?>
  <?= $this->include('components/sidebar') ?>
</header>

<main id="content">
  <?= $this->include('components/breadcrumb') ?>
  <?= $this->include('components/create_bb') ?>

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
              <a href="<?= base_url() ?>/borrowed_books/edit_borrowed_book/<?= $book['borrowed_book_id'] ?>" class="btn btn-sm btn-primary"><i class="fas fa-fw fa-edit"></i></a>

              <a href="<?= base_url() ?>/borrowed_books/delete_borrowed_book/<?= $book['borrowed_book_id'] ?>" class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash-alt"></i></a>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</main>

<?= $this->endSection() ?>