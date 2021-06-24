<?= $this->extend('layouts_dev/master_user') ?>
<?= $this->section('content') ?>
<div class="col-md-10 my-auto overflow-auto" style="background: white; border-radius: 19px; height: 92.5vh;">
    <?= $this->include('layouts_dev/flashdata') ?>
    <div class="row justify-content-center mt-4 mb-3 px-3 coba11">
        <div class="mx-1 card border-white mt-1 col-xl col-lg-6 col-md-6 col-sm-12 card-icon_home" style="height: auto; border-radius: 10px;">
            <img src="<?= base_url('assets/gentelella/images/icon1_user.png') ?>" class="icon-z-up" alt="" style="" />
            <h2><b>25 Feb</b></h2>
            <h6><b>Last Sign In</b></h6>
            <p>Lorem ipsum dolor sit amet,</p>
        </div>
        <div class="mx-1 card border-white mt-1 col-xl col-lg-6 col-md-6 col-sm-12 card-icon_home" style="height: auto; border-radius: 10px;">
            <img src="<?= base_url('assets/gentelella/images/icon2_user.png') ?>" class="icon-z-up" alt="" style="" />
            <h2><b>Lorem Ipsum</b></h2>
            <h6><b>Admission Procedure</b></h6>
            <p>STEP-REMAINDER</p>
        </div>
        <div class="mx-1 card border-white mt-1 col-xl col-lg-6 col-md-6 col-sm-12 card-icon_home" style="height: auto; border-radius: 10px;">
            <img src="<?= base_url('assets/gentelella/images/icon3_user.png') ?>" class="icon-z-up" alt="" style="" />
            <h2><b>25 Apr</b></h2>
            <h6><b>Payment Deadline</b></h6>
            <p>See payment details for mor information</p>
        </div>
        <div class="mx-1 card border-white mt-1 col-xl col-lg-6 col-md-6 col-sm-12 card-icon_home" style="height: auto; border-radius: 10px;">
            <img src="<?= base_url('assets/gentelella/images/icon4_user.png') ?>" class="icon-z-up" alt="" style="" />
            <h2><b>78 %</b></h2>
            <h6><b>Percent Complete</b></h6>
            <p>Just Halfway To Go</p>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="<?= base_url('assets/gentelella/images/banner_user.png') ?>" class="d-block w-100" alt="..." />
                    </div>
                    <div class="carousel-item">
                        <img src="<?= base_url('assets/gentelella/images/banner_user.png') ?>" class="d-block w-100" alt="..." />
                    </div>
                    <div class="carousel-item">
                        <img src="<?= base_url('assets/gentelella/images/banner_user.png') ?>" class="d-block w-100" alt="..." />
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    <div class="row mb-3 mt-2">
        <div class="col-md-8">
            <div class="accordion pb-2" id="accordionExample" style="background: #69ceed; border-radius: 20px;">
                <div class="card border-0" style="background: #f9cb13; border-radius: 20px 20px 0px 0px;">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0 text-center text-white">
                            PRIMARY SCHOOL REGISTRATION PROCESS
                        </h2>
                    </div>
                </div>
                <div class="card border-0 bg-transparent">
                    <div class="card-header" id="headingOne">
                        <h2 class="my-0 text-center text-white">
                            Registration Form
                        </h2>
                    </div>
                </div>
                <div class="card border-0 m-1 mx-3" style="border-radius: 20px;">
                    <div class="card-header bg-white" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="color: #69ceed;">
                                <b>Application For Admission</b>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <a href="<?= base_url('user/applicationforadmission') ?>">
                                        <h5 style="color: #6D6D6D;">
                                            <b>This form will be filled up by parents and it verifies important information about your child such as name, age, date of birth, and other informations needed.</b>
                                        </h5>
                                        <p style="color: #8C8C8C;">Date of Application 20/12/2021 (20th of December 2021) Application For Academic year of 2021 - 2022</p>
                                    </a>
                                </div>
                                <div class="col-3">
                                    <span class="chart" data-percent="100">
                                        <span class="percent"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-0 m-1 mx-3" style="border-radius: 20px;">
                    <div class="card-header bg-white" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="color: #69ceed;">
                                <b>Health Examination Records</b>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <a href="<?= base_url('user/healthexaminationrecord') ?>">
                                        <h5 style="color: #6D6D6D;">
                                            <b>This form will be filled up by parents and it verifies important information about your child current state of health.</b>
                                        </h5>
                                    </a>
                                    <p style="color: #8C8C8C;">Date of Application 20/12/2021 (20th of December 2021) Application For Academic year of 2021 - 2022</p>
                                </div>
                                <div class="col-3">
                                    <span class="chart" data-percent="100">
                                        <span class="percent"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-0 m-1 mx-3" style="border-radius: 20px;">
                    <div class="card-header bg-white" id="headingThree">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="color: #69ceed;">
                                <b>Parent’s Questionaire</b>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <a href="<?= base_url('user/parentsquestionnaire') ?>">
                                        <h5 style="color: #6D6D6D;">
                                            <b>This form will be filled up with the information about the vehicle that will be use to pick up your child. </b>
                                        </h5>
                                    </a>
                                    <p style="color: #8C8C8C;">Date of Application 20/12/2021 (20th of December 2021) Application For Academic year of 2021 - 2022</p>
                                </div>
                                <div class="col-3">
                                    <span class="chart" data-percent="50">
                                        <span class="percent"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-0 m-1 mx-3" style="border-radius: 20px;">
                    <div class="card-header bg-white" id="headingFour">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" style="color: #69ceed;">
                                <b>Vehicle Registration</b>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <a href="<?= base_url('user/vehicleregistration') ?>">
                                        <h5 style="color: #6D6D6D;">
                                            <b>
                                                Main info for database of your <br />
                                                and other basic information given.
                                            </b>
                                        </h5>
                                    </a>
                                    <p style="color: #8C8C8C;">Date of Application 20/12/2021 (20th of December 2021) Application For Academic year of 2021 - 2022</p>
                                </div>
                                <div class="col-3">
                                    <span class="chart" data-percent="50">
                                        <span class="percent"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-0 m-1 mx-3" style="border-radius: 20px;">
                    <div class="card-header bg-white" id="headingFive">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive" style="color: #69ceed;">
                                <b>School Recomendation</b>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <a href="<?= base_url('user/schoolrecommendation') ?>">
                                        <h5 style="color: #6D6D6D;">
                                            <b>
                                                Main info for database of your <br />
                                                and other basic information given.
                                            </b>
                                        </h5>
                                    </a>
                                    <p style="color: #8C8C8C;">Date of Application 20/12/2021 (20th of December 2021) Application For Academic year of 2021 - 2022</p>
                                </div>
                                <div class="col-3">
                                    <span class="chart" data-percent="50">
                                        <span class="percent"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-4">
            <div class="card" style="background: #69ceed; border-radius: 20px;">
                <div class="card-header" style="background: #f9cb13; border-radius: 20px;">
                    <div class="d-flex justify-content-center">
                        <div class="col">
                            <img src="<?= base_url('assets/gentelella/images/icon_news.png') ?>" alt="" class="icon-z-up" style="height: auto; margin-top: -30%; padding-top:5%" />
                        </div>
                        <div class="col">
                            <h2 class="my-0 text-center text-white" style="font-size: 2.35em;">News</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body bg-white mx-2 my-1 coba10" style="border-radius: 15px; height: 70%;">
                    <div class="row" style="margin-top: -13px;">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                            <img src="<?= base_url('assets/gentelella/images/user.png') ?>" class="rounded-circle" alt="..." style="width: 71px; height: 71px;" />
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 coba11" style="color: #69ceed;">
                            <span>
                                <h2><b>News 1</b></h2>
                                <p>Headline news lorem ipsum dolor sit amet.</p>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="card-body bg-white mx-2 my-1 coba10" style="border-radius: 15px; height: 70%;">
                    <div class="row" style="margin-top: -13px;">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                            <img src="<?= base_url('assets/gentelella/images/user.png') ?>" class="rounded-circle" alt="..." style="width: 71px; height: 71px;" />
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 coba11" style="color: #69ceed;">
                            <span>
                                <h2><b>News 2</b></h2>
                                <p>Headline news lorem ipsum dolor sit amet.</p>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="card-body bg-white mx-2 my-1 coba10" style="border-radius: 15px; height: 70%;">
                    <div class="row" style="margin-top: -13px;">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                            <img src="<?= base_url('assets/gentelella/images/user.png') ?>" class="rounded-circle" alt="..." style="width: 71px; height: 71px;" />
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 coba11" style="color: #69ceed;">
                            <span>
                                <h2><b>News 3</b></h2>
                                <p>Headline news lorem ipsum dolor sit amet.</p>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="card-body bg-white mx-2 my-1 coba10" style="border-radius: 15px; height: 70%;">
                    <div class="row" style="margin-top: -13px;">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                            <img src="<?= base_url('assets/gentelella/images/user.png') ?>" class="rounded-circle" alt="..." style="width: 71px; height: 71px;" />
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 coba11" style="color: #69ceed;">
                            <span>
                                <h2><b>News 4</b></h2>
                                <p>Headline news lorem ipsum dolor sit amet.</p>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>