<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GNHS LMS</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="<?= base_url()?>/assets/gnhs_logo.png"/>
    <?= $this->include('assets/links') ?>
</head>
<body>
    
    <?= $this->renderSection('content') ?>
    
    <?= $this->include('assets/scripts') ?>
    <?php if(isset($_SESSION['success'])):?>
        <script>successToast('<?= $_SESSION['success'] ?>');</script>
    <?php endif ?>

    <?php if(isset($_SESSION['error'])): ?>
        <script>errorToast('<?= $_SESSION['error'] ?>');</script>
    <?php endif ?>

    <?php if(isset($_SESSION['warning'])): ?>
        <script>warningToast('<?= $_SESSION['warning'] ?>');</script>
    <?php endif ?>

    <?php if(isset($_SESSION['info'])): ?>
        <script>infoToast('<?= $_SESSION['info'] ?>');</script>
    <?php endif ?>
</body>
</html>