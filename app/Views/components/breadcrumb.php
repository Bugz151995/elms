<div id="breadcrumbContainer" class="mb-5 bg-white mt-4 pt-2">
  <?php $url = explode('/', $path); ?>

  <h1 id="pageTitle" class="me-auto text-capitalize">
    <?= is_numeric(end($url)) ?  str_replace('_', ' ', $url[count($url) - 2]) : str_replace('_', ' ', end($url)) ?>
  </h1>

  <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '|';" >
    <ol class="breadcrumb m-0">
      <li class="breadcrumb-item text-capitalize">
        <a href="<?= base_url() ?>/home" class="text-decoration-none">
          <span class="fa-stack">
            <i class="fa-regular fa-circle fa-stack-2x"></i>
            <i class="fa-solid fa-house-chimney fa-stack-1x"></i>
          </span> Home
        </a>
      </li>
      <?php foreach ($url as $key => $p) : ?>
        <?php if (!is_numeric($p)) : ?>
          <?php if (end($url) !== $p && $url[count($url) - 2] !== $p) : ?>
            <li class="breadcrumb-item text-capitalize"><a href="<?= base_url() ?>/<?= $p ?>" class="text-decoration-none"><?= str_replace('_', ' ', $p) ?></a></li>
          <?php else : ?>
            <li class="breadcrumb-item text-capitalize active" aria-current="page"><?= str_replace('_', ' ', $p) ?></li>
          <?php endif ?>
        <?php endif ?>
      <?php endforeach ?>
    </ol>
  </nav>
</div>