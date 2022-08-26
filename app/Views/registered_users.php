<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<header>
    <?= $this->include('components/topbar') ?>
    <?= $this->include('components/sidebar') ?>
</header>

<main id="content">
    <?= $this->include('components/breadcrumb') ?>
    <?= $this->include('components/create_u') ?>

    <table id="table" class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Student's Name</th>
                <th>Username</th>
                <th>Grade</th>
                <th>Section</th>
                <th>Registered @</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $key => $user) : ?>
            <tr>
                <td><?= ++$key ?></td>
                <td><?= $user['fname'].' '.substr($user['mname'], 0,1).'. '.$user['lname'] ?></td>
                <td><?= $user['username'] ?></td>
                <td><?= $user['grade_level'] ?></td>
                <td><?= $user['section_name'] ?></td>
                <td><?= $user['created_at'] ?></td>
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