<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<header>
    <?= $this->include('components/topbar') ?>
    <?= $this->include('components/sidebar') ?>
</header>

<main id="content">
    <?= $this->include('components/breadcrumb') ?>

    <table id="table" class="table table-light table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Rank</th>
                <th>Student's Name</th>
                <th>Grade</th>
                <th>Section</th>
                <th>Username</th>
                <th>Registered @</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td class="text-center">&nbsp;</td>
            </tr>
        </tbody>
    </table>
</main>

<?= $this->endSection() ?>