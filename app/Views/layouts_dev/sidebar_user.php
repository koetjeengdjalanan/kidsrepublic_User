<div class="col-sm-0 col-md-2 menu_fixed">
  <div class="scroll-view">
    <div class="my-4 row justify-content-center">
      <img src="<?= base_url('assets/gentelella/images/Logo_SD-old.png') ?>" alt="" style="width: 115px; height: 103px;">
    </div>
    <!-- menu profile quick info -->
    <div class="profile clearfix quick-userinfo" width="auto">
      <div class="row align-items-center">
        <div class="profile_info" style="width: 20vh; margin-left: 8vh; width: 100%;">
          <div class="col">
            <div class="row" style="background-color: #F9CB13; border-radius: 0 50px 50px 0; height: 10vh;">
              <!-- Button trigger modal -->
              <?php if (user()->first_time == 1) : ?>
                <button type="button" class="border-0 bg-transparent" data-toggle="modal" data-target="#ModalFirstTime" style="margin-left: 6vh;">
                  <span class="text-white">Welcome,</span>
                  <h2 class="text-white"><?= user()->username; ?></h2>
                </button>
              <?php else : ?>
                <button type="button" class="border-0 bg-transparent" data-toggle="modal" data-target="#ModalReguler" style="margin-left: 6vh;">
                  <span class="text-white">Welcome,</span>
                  <h2 class="text-white"><?= user()->username; ?></h2>
                </button>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="profile_pic" style="position: absolute; z-index: 0;">
          <div class="col">
            <img src="<?= base_url('assets/upload/profile/' . $_SESSION['profile_pict'])
                      ?>" alt="..." class="img-circle profile_img" style="width: 11vh; height: 11vh;" />
          </div>
        </div>
      </div>
    </div>
    <!-- end menu profile quick info -->
    <!-- sidebar -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu my-4">
      <div class="menu_section">
        <ul class="nav side-menu">
          <li>
            <a href="<?= base_url('user') ?>" data-toggle="tooltip" data-placement="right" title="Your Dashboard!"><i class="fa fa-home"></i> Home </a>
          </li>
          <li>
            <a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="<?= base_url('user/applicationforadmission') ?>">Application for Admission</a></li>
              <li><a href="<?= base_url('user/healthexaminationrecord') ?>">Health Examination Record</a></li>
              <li><a href="<?= base_url('user/parentsquestionnaire') ?>">Parent's Questionnaire</a></li>
              <li><a href="<?= base_url('user/vehicleregistration') ?>">Vehicle Registration</a></li>
              <li><a href="<?= base_url('user/schoolrecommendation') ?>">School Recommendation</a></li>
            </ul>
          </li>
          <li>
            <a><i class="fa fa-money"></i> Payments <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="<?= base_url('user/payments') ?>">Payments Description</a></li>
              <li><a href="<?= base_url('user/invoice') ?>" data-toggle="tooltip" data-placement="right" title="Amount Billed!">Invoice</a></li>
              <li><a href="<?= base_url('user/receipt') ?>" data-toggle="tooltip" data-placement="right" title="Upload Your Payment Receipt!">Receipt</a></li>
            </ul>
          </li>
          <li>
            <a class="text-center" data-toggle="modal" data-target="#modalLogout"><i class="glyphicon glyphicon-log-out fa-1x"> Logout</i></a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- /sidebar menu -->
</div>

<!-- Modal -->
<input type="text" id="first_time" value="<?= user()->first_time; ?>" hidden>

<div class="modal fade" id="ModalFirstTime" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="ModalFirstTime">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header border-0 text-center">
        <h5 class="modal-title" id="ModalFirstTime">USER PROFILE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="mt-3" action="<?= base_url('user/setFirstTime/' . user_id()) ?>">
        <div class="modal-body">
          <div class="text-center">
            <img src="<?= base_url('assets/gentelella/images/default-profile-picture.jpg') #base_url('assets/upload/profile/' . $_SESSION['profile_pict']) 
                      ?>" width="50%" class="rounded" alt="...">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" class="form-control" id="username" value="<?= user()->username; ?>" disabled>
            <!-- <label for="exampleInputEmail1">Child Name</label>
            <input type="text" class="form-control" id="childname" value="<?= user()->username; ?>" disabled> -->
            <label for="exampleInputEmail1">Wanted Education Level</label>
            <select class="form-control" id="level" name="level">
              <option value="" hidden>Choose</option>
              <optgroup label="Preschool & Kindergarten">
                <option value="2">Mayor</option>
                <option value="3">Governor</option>
                <option value="4">Minister</option>
                <option value="5">President</option>
              </optgroup>
              <optgroup label="Primary">
                <option value="6">Grade - 1</option>
                <option value="7">Grade - 2</option>
              </optgroup>
            </select>
            <select class="form-control" id="mayor" name="mayor">
              <optgroup label="Preschool & Kindergarten">
                <option value="12">Mayor 2x Pertemuan</option>
                <option value="13">Mayor 3x Pertemuan</option>
                <option value="14">Mayor 5x Pertemuan</option>
                <option value="2">Mayor Package</option>
              </optgroup>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End Modal First Time -->
<!-- Modal Reguler-->
<div class="modal fade" id="ModalReguler" tabindex="-1" aria-labelledby="ModalReguler" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header border-0 text-center">
        <h5 class="modal-title" id="ModalReguler">USER PROFILE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <img src="<?= base_url('assets/upload/profile/' . $_SESSION['profile_pict'])
                    ?>" width="50%" class="rounded" alt="...">
        </div>
        <form class="mt-3">
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" class="form-control" id="username" value="<?= user()->username; ?>" disabled>
            <!-- <label for="exampleInputEmail1">Child Name</label>
            <input type="text" class="form-control" id="childname" value="<?= user()->username; ?>" disabled> -->
            <label for="exampleInputEmail1">Wanted Education Level</label>
            <input type="text" class="form-control" id="childname" value="Have Chosen" disabled>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->

<!-- Modal logout -->
<div tabindex="-1" class="modal bs-example-modal-sm" role="dialog" aria-hidden="true" id="modalLogout">
  <div class="modal-dialog modal-dialog-centered">
    <div class=" modal-content">
      <div class="modal-header">
        <h4>Logout <i class="fa fa-lock"></i></h4> <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"><i class="fa fa-question-circle"></i> Are you sure you want to log-off?</div>
      <div class="modal-footer"><a class="btn btn-primary btn-block" href="<?= base_url('logout') ?>">Logout</a></div>
    </div>
  </div>
</div>
<!-- End Modal Logout -->