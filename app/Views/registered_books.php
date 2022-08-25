<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<header>
    <?= $this->include('components/topbar') ?>
    <?= $this->include('components/sidebar') ?>
</header>

<main id="content">
    <?= $this->include('components/breadcrumb') ?>

    <table id="table" class="table">
        <thead>
            <tr>
                <th>Book Name</th>
                <th>Author</th>
                <th>Publish Date</th>
                <th>Category</th>
                <th>Units</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($books as $book) : ?>
            <tr>
                <td class="text-capitalize"><?= $book['name'] ?></td>
                <td class="text-capitalize"><?= $book['author'] ?></td>
                <td class="text-capitalize"><?= $book['publish_date'] ?></td>
                <td class="text-capitalize"><?= $book['category'] ?></td>
                <td class="text-capitalize"><?= $book['units'] ?></td>
                <td class="text-capitalize">
                    <button class="btn btn-sm btn-primary"><i class="fas fa-fw fa-edit"></i></button>

                    <button class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash-alt"></i></button>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</main>

<?= $this->endSection() ?>