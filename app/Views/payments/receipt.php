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
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel" style="height: 50vh;">
            <div class="x_content" style="height: 100%;">
                <?php if ($formfiles) : ?>
                    <object data="<?= base_url() ?>/assets/Doc/<?= $formfiles ?>" type="application/pdf" style="width: 100%; height: 100%;">
                        <embed src="<?= base_url() ?>/assets/Doc/<?= $formfiles ?>" type="application/pdf" />
                    </object>
                <?php else : ?>
                    <!-- <form action="<?= base_url('/UserUpload/do_upload') ?>" class="dropzone" name="userschool" id="userschool" enctype="multipart/form-data"> -->
                    <!-- <span class="glyphicon glyphicon-upload" aria-hidden="true" style="font-size: 50px; display:block; text-align: center; margin-top: 75px;"></span> -->
                    <!-- <button type="submit">Sumbit</button> -->
                    <!-- </form> -->
                    <div class="form-group">
                        <label for="formGroupExampleInput">Name</label>
                        <input type="file" name="userschool" class="userschool" id="file">
                    </div>
                    <!-- <div class="form-group">
                          <button type="submit" id="send_form" class="btn btn-success">Submit</button>
                        </div> -->
                <?php endif ?>
                <br />
                <br />
            </div>
        </div>
        <p>If you'd upload your document it will show above. Else, you should upload with clicking area above!</p>
    </div>
</div>
<?= $this->endSection() ?>