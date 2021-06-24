<?= $this->extend('layouts_dev/master_user') ?>
<?= $this->section('content') ?>
<div class="col-md-10 my-2 overflow-auto" style="background: white; border-radius: 19px; height:97%">
    <h1>404 - File Not Found</h1>

    <p>
        <?php if (!empty($message) && $message !== '(null)') : ?>
            <?= esc($message) ?>
        <?php else : ?>
            Sorry! Cannot seem to find the page you were looking for.
        <?php endif ?>
    </p>
</div>
<?= $this->endSection() ?>