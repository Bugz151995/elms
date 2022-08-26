<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<header>
    <?= $this->include('components/topbar') ?>
    <?= $this->include('components/sidebar') ?>
</header>

<main id="content">
    <?= $this->include('components/breadcrumb') ?>
  <?= $this->include('components/create_bb') ?>

    <table id="table" class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Book Name</th>
                <th>Author</th>
                <th>Category</th>
                <th>Borrower's Name</th>
                <th>Borrowed @</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($books as $key => $book) : ?>
            <tr>
                <td><?= ++$key ?></td>
                <td><?= $book['name'] ?></td>
                <td><?= $book['author'] ?></td>
                <td><?= $book['category'] ?></td>
                <td><?= $book['fname'].' '.substr($book['mname'], 0,1).'. '.$book['lname'] ?></td>
                <td><?= $book['created_at'] ?></td>
                <td>
                    <button class="btn btn-sm btn-primary"><i class="fas fa-fw fa-edit"></i></button>

                    <button class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash-alt"></i></button>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</main>

<?= $this->endSection() ?>