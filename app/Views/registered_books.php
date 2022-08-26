<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<header>
  <?= $this->include('components/topbar') ?>
  <?= $this->include('components/sidebar') ?>
</header>

<main id="content">
  <?= $this->include('components/breadcrumb') ?>
  <?= $this->include('components/create_b') ?>

  <table id="table" class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Book Name</th>
        <th>Author</th>
        <th>Publish Date</th>
        <th>Category</th>
        <th>Units</th>
        <th>Action</th>
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
          <td class="text-capitalize">            
            <a href="<?= base_url() ?>/registered_books/edit_book/<?= $book['book_id'] ?>" class="btn btn-sm btn-primary"><i class="fas fa-fw fa-edit"></i></a>    

            <a href="<?= base_url() ?>/registered_books/borrow_book/<?= $book['book_id'] ?>" class="btn btn-sm btn-success"><i class="fas fa-fw fa-book-open-reader"></i></a>
            
            <a href="<?= base_url() ?>/registered_books/delete_book/<?= $book['book_id'] ?>" class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash-alt"></i></a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</main>

<?= $this->endSection() ?>