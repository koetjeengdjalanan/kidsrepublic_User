<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- FavIcon -->
  <link rel="icon" href="<?= base_url("favicon.ico") ?>" type="image/ico" />
  <title><?= $title ?></title>

  <?= $this->include('layouts_dev/head') ?>
</head>

<body class="login dev-body">
  <div class="overflow-auto shadow-lg mx-3 my-3 pr-2 row dev-float_body">
    <!-- <div class="row overflow-auto shadow-lg px-2" style="background-color: pink; background-repeat: no-repeat; background-size: cover; height: 650px; border-radius: 20px;"> -->
    <?= $this->include('layouts_dev/sidebar_user') ?>
    <?= $this->renderSection('content') ?>
  </div>
  <?= $this->include('layouts_dev/foot') ?>
</body>

</html>