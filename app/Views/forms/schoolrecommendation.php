<?= $this->extend('layouts_dev/master_user') ?>
<?= $this->section('content') ?>
<div class="col-md-10 my-2 overflow-auto" style="background: white; border-radius: 19px; height:97%">
  <form action="<?= base_url('UserUpload/do_upload') ?>" method="POST" style="width: 100%;" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <div class="row my-3 mx-1">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title title">
            <h2>School Recommendation</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <!-- Smart Wizard -->
            <div id="wizard" class="form_wizard wizard_horizontal">
              <ul class="wizard_steps">
                <li>
                  <a href="#step-1" style="margin-left: -10px;">
                    <span class="step_no">1</span>
                    <span class="step_descr">
                      <small>Download</small>
                    </span>
                  </a>
                </li>
                <li>
                  <a href="#step-2">
                    <span class="step_no">2</span>
                    <span class="step_descr">
                      <small>Upload</small>
                    </span>
                  </a>
                </li>
              </ul>
              <form style="width: 100%;">
                <div id="step-1">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel" style="height: 50vh;">
                      <div class="x_content" style="height: 100%;">
                        <object data="<?= base_url() ?>/assets/Doc/SchoolRecomendationForm.pdf" type="application/pdf" style="width: 100%; height: 100%;">
                          <embed src="<?= base_url() ?>/assets/Doc/SchoolRecomendationForm.pdf" type="application/pdf" />
                        </object>
                        <br />
                        <br />
                      </div>
                    </div>
                    <p><strong>Instruction</strong>: Download, Print and fill document above upon your child last formal education / school.</p>
                  </div>
                </div>
                <div id="step-2">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel" style="height: 50vh;">
                      <div class="x_content" style="height: 100%;">
                        <?php if ($formfiles) : ?>
                          <input type="text" name="old_file" id="old_file" value="<?= $formfiles ?>" hidden>
                          <object data="<?= base_url() ?>/assets/upload/doc/<?= $formfiles ?>" type="application/pdf" style="width: 100%; height: 100%;">
                            <embed src="<?= base_url() ?>/assets/upload/doc/<?= $formfiles ?>" type="application/pdf" />
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
                    <p>If you'd upload your document it will show above. Else, you should upload with clicking area above! <?php if ($formfiles) : ?>
                    <div class="form-group">
                      <label for="formGroupExampleInput">Change</label>
                      <input type="file" name="userschool" class="userschool" id="file">
                    </div>
                  <?php endif; ?>

                  </p>
                  </div>
                </div>
              </form>
              <!-- End SmartWizard Content -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>


<?= $this->endSection() ?>