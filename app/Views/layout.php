<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GNHS LMS</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="<?= base_url()?>/gnhs_logo.png"/>
    <?= $this->include('assets/links') ?>
</head>
<body>
    <?= $this->renderSection('content') ?>
    
    <?= $this->include('assets/scripts') ?>
</body>
</html>