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
                <th>#</th>
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
            <?php foreach($fines as $key => $fine) : ?>
            <tr>
                <td><?= ++$key ?></td>
                <td><?= $fine['fname'].' '.substr($fine['mname'], 0, 1).'. '.$fine['lname'] ?></td>
                <td><?= $fine['username'] ?></td>
                <td><?= $fine['grade_level'] ?></td>
                <td><?= $fine['section_name'] ?></td>
                <td><?= $fine['or_no'] ?></td>
                <td><?= $fine['amount'] ?></td>
                <td><?= $fine['created_at'] ?></td>
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