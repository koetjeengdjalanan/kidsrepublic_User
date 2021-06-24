<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?= base_url("favicon.ico") ?>" type="image/ico" />

    <title>Dashboard</title>

    <?= $this->include('layouts_dev/head_admin') ?>
  </head>

  <body class="nav-sm">
    <div class="container body">
      <div class="main_container">
        <?= $this->include('layouts_dev/sidebar_admin') ?>

        <!-- top navigation -->
        <?= $this->include('layouts_dev/header') ?>
        <!-- /top navigation -->

        <!-- page content -->
        <?= $this->renderSection('content') ?>
        <!-- /page content -->

        <!-- footer content -->
        <?= $this->include('layouts_dev/footer') ?>
        <!-- /footer content -->
      </div>
    </div>

    <?= $this->include('layouts_dev/foot_admin') ?>

  </body>
	
</html>
