<div id="breadcrumbContainer" class="mb-5">
  <?php $url = explode('/', $path); ?>

  <h1 id="pageTitle" class="me-auto text-capitalize">
    <?= is_numeric(end($url)) ?  str_replace('_', ' ', $url[count($url)-2]) : str_replace('_', ' ', end($url)) ?>
  </h1>

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb m-0">
      <?php foreach ($url as $p) : ?>
        <?php if (!is_numeric($p)) : ?>
          <?php if (end($url) !== $p && $url[count($url)-2] !== $p) : ?>
            <li class="breadcrumb-item text-capitalize"><a href="<?= base_url() ?>/<?= $p ?>" class="text-decoration-none"><?= str_replace('_', ' ', $p) ?></a></li>
          <?php else : ?>
            <li class="breadcrumb-item text-capitalize active" aria-current="page"><?= str_replace('_', ' ', $p) ?></li>
          <?php endif ?>
        <?php endif ?>
      <?php endforeach ?>
    </ol>
  </nav>
</div>