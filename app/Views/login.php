<?= $this->extend('layouts_dev/master_login'); ?>
<?= $this->section('content'); ?>
<div class="card o-hidden border-0 shadow-lg" style="border-radius: 30px; width: 75%; margin-top:auto; margin-bottom:auto;">
  <!-- Nested Row within Card Body -->
  <?= $this->include('layouts_dev/flashdata') ?>
  <div class="row">
    <div class="col-lg-6 col-xl-6 col-md-7 col-sm-12 p-0">
      <div class="px-4 py-5">
        <div class="text-center pb-5">
          <div class="row p-0 m-0">
            <div class="col-6"><img src="<?= base_url('assets/gentelella/images/Logo_SD.png') ?>" alt="" style="width: 75%; height: auto;" /></div>
            <div class="col-6"><img src="<?= base_url('assets/gentelella/images/logo_sd.png') ?>" alt="" style="width: 75%; height: auto;" /></div>
          </div>
        </div>
        <?= view('Myth\Auth\Views\_message_block') ?>
        <form action="<?= base_url('login') ?>" class="user" method="post">
          <?= csrf_field() ?>
          <?php if ($config->validFields === ['email']) : ?>
            <div class="form-group">
              <input type="email" class="form-control form-control-user <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" id="email" name="login" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" />
              <div class="invalid-feedback">
                <?= session('errors.login') ?>
              </div>
            </div>
          <?php else : ?>
            <div class="form-group">
              <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
              <div class="invalid-feedback">
                <?= session('errors.login') ?>
              </div>
            </div>
          <?php endif; ?>
          <div class="form-group">
            <input type="password" class="form-control form-control-user <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" placeholder="<?= lang('Auth.password') ?>" />
            <div class="invalid-feedback">
              <?= session('errors.password') ?>
            </div>
          </div>
          <hr />
          <div class="form-group">
            <div class="row">
              <div class="col">
                <?php if ($config->allowRemembering) : ?>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
                      <?= lang('Auth.rememberMe') ?>
                    </label>
                  </div>
                <?php endif; ?>
              </div>
              <div class="col" style="text-align: right;">
                <div class="custom-control custom-checkbox">
                  <?php if ($config->activeResetter) : ?>
                    <p>
                      <a href="<?= route_to('forgot') ?>">
                        <?= lang('Auth.forgotYourPassword') ?>
                      </a>
                    </p>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <div class="col">
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block">
            <?= lang('Auth.loginAction') ?>
          </button>
        </form>
        <hr />
        <div class="text-center">
          <button type="button" class="border-0 bg-transparent" data-toggle="modal" data-target="#exampleModal">
            Create Account
          </button>
        </div>
        <div class="row">
          <div class="col-6" style="opacity: 0.5; overflow: hidden;">
            <img src="<?= base_url('assets/gentelella/images/character_girl.png') ?>" alt="" class="float-left" style="height: auto;width: 50%;" />
          </div>
          <div class="col-6" style="opacity: 0.5; overflow: hidden;">
            <img src="<?= base_url('assets/gentelella/images/character_boy.png') ?>" alt="" class="float-right" style="height: auto;width: 50%" />
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-5" style="background-image: url('<?= base_url('assets/gentelella/images/bg_login.png') ?>'); background-repeat: no-repeat; border-radius: 0px 30px 30px 0px; background-size: cover; background-position: center;">
      <!-- Button trigger modal -->
      <div class="text-center" style="position: absolute; bottom: 1em; width: 100%;">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#trialrequest">
          Trial Request
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Create Account-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header border-0">
        <!-- <h5 class="modal-title" id="exampleModalLabel"></h5> -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;
          </span>
        </button>
      </div>
      <div class="modal-body">
        <h3 style="text-align: center;" class="mb-4">Register Your Account
        </h3>
        <div class="row pb-3" style="height: 100%;">
          <div class="col my-auto">
            <h2>Get Your Annotation</h2>
            <form action="<?= base_url('BuyForm/getAnno') ?>" method="post">
              <div class="form-group">
                <label for="email_anno">Email address</label>
                <input type="email" class="form-control" id="email_anno" name='email_anno' aria-describedby="emailHelp">
              </div>
              <button type="submit" class="btn btn-primary float-right">Submit
              </button>
            </form>
          </div>
          <h6 class="my-auto">OR</h6>
          <div class="col">
            <h2>Get Your Login Info Here</h2>
            <form action="<?= base_url('BuyForm/inv_upload') ?>" enctype="multipart/form-data" method="post">
              <label for="id_cust">Input your annotation Token and Upload your payment</label>
              <input type="text" id="token" name="token" class="form-control" />
              <input type="file" name="invoice" />
              <button type="submit" class="btn btn-primary float-right">Submit</button>
            </form>
            <!-- <form action="form_upload.html" class="dropzone" style="border: 1px solid #28A8E0; border-radius: 50px;">
              <img class="my-4" src="<?= base_url('assets/gentelella_admin/images/file-image.png') ?>" alt="" style="display: block; margin-left: auto; margin-right: auto; width: 30%;">
            </form> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Crerate Account -->

<!-- Modal -->
<div class="modal fade" id="trialrequest" tabindex="-1" aria-labelledby="trialrequestLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="trialrequestLabel">Trial Request Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body overflow-auto">
        <div id="wizard" class="form_wizard wizard_horizontal">
          <ul class="wizard_steps">
            <li>
              <a href="#step-1">
                <span class="step_no">1</span>
                <span class="step_descr">
                  Step 1<br />
                  <small>Trial Procedure</small>
                </span>
              </a>
            </li>
            <li>
              <a href="#step-2">
                <span class="step_no">2</span>
                <span class="step_descr">
                  Step 2<br />
                  <small>Trial Request Form</small>
                </span>
              </a>
            </li>
          </ul>

          <div id="step-1">
            <ul style="list-style-type: none;">
              <li>1. Trial apply only one time</li>
              <li>2. Trial must be register and confirm by Kids Republic</li>
              <li>3. Make sure you are on time</li>
              <li>4. Changes in schedule is not allowed</li>
              <li>5. All rules & regulation following of term & condition Kids Republic should be signed :</li>
              <li><span style="margin-left: 2vh;">a. Req. to enroll in Kids Republic education program</span></li>
              <li><span style="margin-left: 2vh;">b. Max. 2 students per class</span></li>
              <li><span style="margin-left: 2vh;">c. Bellow 2 years old must be accompanied by adult</span></li>
              <li><span style="margin-left: 2vh;">d. Must come on time & until the class finish</span></li>
              <li><span style="margin-left: 2vh;">e. Bring lunch box, mineral & (in any case) extra change of clothes</span></li>
              <li><span style="margin-left: 2vh;">f. No photograph / video allowed during class time</span></li>
              <li><span style="margin-left: 2vh;">g. Bring socks, if trial took place during gymnastic time</span></li>
            </ul>
          </div>

          <div id="step-2">
            <form class="form-horizontal form-label-left">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="child_name">Child Name: </label>
                  <input type="text" class="form-control" id="child_name">
                </div>
                <div class="form-group col-md-6">
                  <label for="child_gender">Gender:</label>
                  <select id="child_gender" class="form-control" required>
                    <option value="">--Gender--</option>
                    <option value="child_female">Female</option>
                    <option value="child_male">Male</option>
                  </select>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Date of Birth: </label>
                  <input class="form-control" class='date' type="date" name="date" required='required'>
                </div>
                <div class="form-group col-md-6">
                  <label for="parents_name">Parents Name:</label>
                  <input type="text" class="form-control" id="parents_name">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="contact_number">Contact Number: </label>
                  <input type="text" class="form-control" id="contact_number">
                </div>
                <div class="form-group col-md-6">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control" id="email">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-12">
                  <label for="child_name">Address: </label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="contact_number">Info By: </label>
                  <input type="text" class="form-control" id="contact_number">
                </div>
                <div class="form-group col-md-6">
                  <label for="trial_package">Trial Package:</label>
                  <select id="trial_package" class="form-control" required>
                    <option value="">--Trial Package--</option>
                    <option value="child_female">Primary School</option>
                    <option value="child_male">Preschool & Kindergarten</option>
                    <option value="child_male">Gymnastic</option>
                    <option value="child_male">Fun Creative</option>
                    <option value="child_male">Training</option>
                  </select>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Trial Request -->

<?= $this->endSection(); ?>