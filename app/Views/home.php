<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<header>
    <?= $this->include('components/topbar') ?>
    <?= $this->include('components/sidebar') ?>
</header>
<main>
    <?= $this->include('components/breadcrumb') ?>

</main>

<?= $this->endSection() ?>