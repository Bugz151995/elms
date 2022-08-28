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
                <th>Student's Name</th>
                <th>Username</th>
                <th>Grade</th>
                <th>Section</th>
                <th>OR No.</th>
                <th>Amount</th>
                <th>Paid @</th>
                <th class="text-center">Action</th>
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
                <td>₱ <?= $fine['amount_paid'] ?></td>
                <td><?= $fine['created_at'] ?></td>
                <td class="text-center">
                    <a href="<?= base_url() ?>/user_fines/view_user_fine/<?= $fine['account_fine_id'] ?>" class="btn btn-sm btn-primary"><i class="fas fa-fw fa-eye"></i></a>

                    <a href="<?= base_url() ?>/user_fines/delete_user_fine/<?= $fine['account_fine_id'] ?>" class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash-alt"></i></a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</main>

<?= $this->endSection() ?>