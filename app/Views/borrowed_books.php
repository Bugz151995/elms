<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<header>
  <?= $this->include('components/topbar') ?>
  <?= $this->include('components/sidebar') ?>
</header>

<main id="content">
  <?= $this->include('components/breadcrumb') ?>
  <?= $this->include('components/create_bb') ?>

  <table id="table" class="table table-light table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Book Name</th>
        <th>Author</th>
        <th>Category</th>
        <th>Borrower's Name</th>
        <th>Borrowed @</th>
        <th>Due @</th>
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
          <td><?= $book['fname'] . ' ' . substr($book['mname'], 0, 1) . '. ' . $book['lname'] ?></td>
          <td><?= $book['created_at'] ?></td>
          <td><?= $book['due_at'] ?></td>
          <td class="text-center">
            <a href="<?= base_url() ?>/borrowed_books/edit_borrowed_book/<?= $book['borrowed_book_id'] ?>" class="btn btn-sm btn-primary"><i class="fas fa-fw fa-edit"></i></a>

            <a href="<?= base_url() ?>/borrowed_books/return_borrowed_book/<?= $book['borrowed_book_id'] ?>" class="btn btn-sm btn-warning"><i class="fas fa-fw fa-square-caret-left"></i></a>

            <a href="<?= base_url() ?>/borrowed_books/delete_borrowed_book/<?= $book['borrowed_book_id'] ?>" class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash-alt"></i></a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</main>

<?= $this->endSection() ?>