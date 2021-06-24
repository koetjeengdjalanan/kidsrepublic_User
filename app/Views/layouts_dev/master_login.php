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
    <title>Welcome</title>

    <?= $this->include('layouts_dev/head') ?>
</head>

<body class="login overflow-hidden dev-body">

    <div class="container ">
        <div class="row justify-content-center vh-100">
            <?= $this->renderSection('content') ?>
        </div>
    </div>

    <?= $this->include('layouts_dev/foot') ?>
</body>

</html>