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
          <th class="text-nowrap">Units</th>
          <th class="text-nowrap">Units at hand</th>
          <th class="text-nowrap">Publish Date</th>
          <th class="text-nowrap">Category</th>
          <th class="text-center">Action</th>
        </tr>
      </thead>

      <tbody>
        <?php foreach ($books as $key => $book) : ?>
          <tr>
            <td><?= ++$key ?></td>
            <td class="text-capitalize"><?= $book['name'] ?></td>
            <td class="text-capitalize"><?= $book['author'] ?></td>
            <td class="text-capitalize"><?= $book['units'] ?></td>
            <td class="text-capitalize"><?= $book['units_athand'] ?></td>
            <td class="text-capitalize"><?= $book['publish_date'] ?></td>
            <td class="text-capitalize"><?= $book['category'] ?></td>
            <td class="text-capitalize text-center text-nowrap">
              <a href="<?= base_url() ?>/registered_books/edit_book/<?= $book['book_id'] ?>" class="btn btn-sm btn-primary"><i class="fas fa-fw fa-edit"></i></a>

              <a href="<?= base_url() ?>/registered_books/delete_book/<?= $book['book_id'] ?>" class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash-alt"></i></a>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</main>

<?= $this->endSection() ?>