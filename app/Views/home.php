<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<header>
    <?= $this->include('components/topbar') ?>
    <?= $this->include('components/sidebar') ?>
</header>
<main id="content">
    <?= $this->include('components/breadcrumb') ?>

    <div class="row row-cols-1 row-cols-sm-3 g-4 mb-5">
        <div class="col d-flex flex-column">
            <div class="btn btn-primary w-100 rounded-0 rounded-top p-3">
                <span class="float-start fs-1"><i class="fas fa-fw fa-users fa-lg"></i></span>
                <span class="float-end fs-4">##</span>
            </div>
            <a href="<?= base_url() ?>/registered_users" class="btn btn-primary rounded-0 rounded-bottom"><span class="float-start">Registered Users</span> <span class="float-end"><i class="fas fa-fw fa-angle-right"></i></span></a>
        </div>
        <div class="col d-flex flex-column">
            <div class="btn btn-warning w-100 rounded-0 rounded-top p-3">
                <span class="float-start fs-1"><i class="fas fa-fw fa-book fa-lg"></i></span>
                <span class="float-end fs-4">##</span>
            </div>
            <a href="<?= base_url() ?>/registered_books" class="btn btn-warning rounded-0 rounded-bottom"><span class="float-start">Registered Books</span> <span class="float-end"><i class="fas fa-fw fa-angle-right"></i></span></a>
        </div>
        <div class="col d-flex flex-column">
            <div class="btn btn-primary w-100 rounded-0 rounded-top p-3">
                <span class="float-start fs-1"><i class="fas fa-fw fa-book-open-reader fa-lg"></i></span>
                <span class="float-end fs-4">##</span>
            </div>
            <a href="<?= base_url() ?>/borrowed_books" class="btn btn-primary rounded-0 rounded-bottom"><span class="float-start">Borrowed Books</span> <span class="float-end"><i class="fas fa-fw fa-angle-right"></i></span></a>
        </div>
    </div>

    <h2 class="mb-3">Outstanding Students</h2>
    <table class="table table-light table-striped rounded rounded-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Grade Level & Section</th>
            </tr>
        </thead>
        <tbody>
            <tr class="dataTables_empty">
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</main>

<?= $this->endSection() ?>