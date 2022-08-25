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
                <th>Student's Name</th>
                <th>Username</th>
                <th>Grade</th>
                <th>Section</th>
                <th>OR No.</th>
                <th>Amount</th>
                <th>Paid @</th>
                <th>Action</th>
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
                <td>&nbsp;</td>
            </tr>
        </tbody>
    </table>
</main>

<?= $this->endSection() ?>