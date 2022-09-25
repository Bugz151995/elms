<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<header>
    <?= $this->include('components/topbar') ?>
    <?= $this->include('components/sidebar') ?>
</header>

<main id="content">
    <div class="container-fluid ps-4 pe-4">
        <?= $this->include('components/breadcrumb') ?>

        <div class="table-responsive">
            <table id="table" class="table table-light table-striped small">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Student's Name</th>
                        <th>Username</th>
                        <th>Grade</th>
                        <th>Section</th>
                        <th>Created @</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($students as $key => $student) : ?>
                    <tr>
                        <td><?= ++$key ?></td>
                        <td><?= $student['fname'].' '.$student['mname'].' '.$student['lname'] ?></td>
                        <td><?= $student['username'] ?></td>
                        <td><?= $student['grade_level'] ?></td>
                        <td><?= $student['section_name'] ?></td>
                        <td><?= $student['created_at'] ?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?= $this->endSection() ?>