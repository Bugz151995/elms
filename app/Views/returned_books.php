<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<header>
    <?= $this->include('components/topbar') ?>
    <?= $this->include('components/sidebar') ?>
</header>

<main id="content">
    <div class="container-fluid ps-4 pe-4">
        <?= $this->include('components/breadcrumb') ?>
        <?= $this->include('components/modal_scan_return') ?>

        <div class="table-responsive">
            <table id="table" class="table table-light table-striped small">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Book Name</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Borrower's Name</th>
                        <th>Returned @</th>
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
                            <td class="text-center">
                                <a href="<?= base_url() ?>/returned_books/view_returned_book/<?= $book['returned_book_id'] ?>" class="btn btn-sm btn-primary"><i class="fas fa-fw fa-eye"></i></a>

                                <a href="<?= base_url() ?>/returned_books/delete_returned_book/<?= $book['returned_book_id'] ?>" class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?= $this->endSection() ?>