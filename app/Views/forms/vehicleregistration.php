<?= $this->extend('layouts_dev/master_user') ?>
<?= $this->section('content') ?>
<?php #dd($fathers_particular_data);
?>
<div class="col-md-10 my-2 overflow-auto" style="background: white; border-radius: 19px; height:97%">
    <?= $this->include('layouts_dev/flashdata') ?>
    <form class="my-3" action="<?= base_url('user/saveVehicle') ?>" style="width: 100%;">
        <?= csrf_field(); ?>
        <input type="text" name="nis" id="nis" value="<?= ($student_details_data) ? $student_details_data['nis'] : "" ?>" hidden>
        <div class="row" style="width: 100%;">
            <label for="colFormLabel" class="col-12 col-sm-12 col-md-2 offset-md-2">Child's Name *</label>
            <input type="text" class="col-12 col-sm-12 col-md-6 form-control " value="<?= ($student_details_data) ? $student_details_data['name'] : "" ?>" disabled>
        </div>
        <div class="row" style="width: 100%;">
            <label for="colFormLabel" class="col-12 col-sm-12 col-md-2 offset-md-2">Father's Name *</label>
            <input type="text" class="col-12 col-sm-12 col-md-2 form-control " value="<?= ($fathers_particular_data) ? $fathers_particular_data['name'] : "" ?>" disabled>

            <label for="colFormLabel" class="col-12 col-sm-12 col-md-2">Mother's Name *</label>
            <input type="text" class="col-12 col-sm-12 col-md-2 form-control " value="<?= ($mothers_particular_data) ? $mothers_particular_data['name'] : "" ?>" disabled>
        </div>
        <div class="row" style="width: 100%;">
            <label for="colFormLabel" class="col-12 col-sm-12 col-md-2 offset-md-2">Father's Phone <br>Number *</label>
            <input type="text" class="col-12 col-sm-12 col-md-2 form-control " value="<?= ($fathers_particular_data) ? $fathers_particular_data['phone_number'] : "" ?>" disabled>
            <label for="colFormLabel" class="col-12 col-sm-12 col-md-2">Mother's Phone <br>Number *</label>
            <input type="text" class="col-12 col-sm-12 col-md-2 form-control " value="<?= ($mothers_particular_data) ? $mothers_particular_data['phone_number'] : "" ?>" disabled>
        </div>
        <div class="row" style="width: 100%;">
            <label for="colFormLabel" class="col-12 col-sm-12 col-md-2 offset-md-2">Address *</label>
            <input type="text" class="col-12 col-sm-12 col-md-6 form-control " value="<?= ($student_details_data) ? $student_details_data['address'] : "" ?>" disabled>
        </div>
        <?php if ($student_vehicle_data) :
            $total_vehicle = count($student_vehicle_data);
        ?>
            <input type="text" id="total_vehicle" name="total_vehicle" value="<?= $total_vehicle ?>" hidden>
            <div id="col_studentVehicle">
                <?php foreach ($student_vehicle_data as $key => $value) :
                    $vehicle_id = $value['id'];
                    $vehicle_no_plat = $value['no_plat'];
                    $vehicle_pickup_person = $value['pickup_person'];
                    $vehicle_pickup_person_phone = $value['pickup_person_phone'];
                ?>
                    <input type="text" id="student_vehicle_id_<?= $vehicle_id ?>" name="student_vehicle_id_<?= $key ?>" value="<?= $vehicle_id ?>" hidden>
                    <div class="row" style="width: 100%;" id="no_plat_row_<?= $key ?>">
                        <label for="colFormLabel" class="col-12 col-sm-12 col-md-2 offset-md-2">No Plat *</label>
                        <input type="text" name="no_plat_<?= $key ?>" id="no_plat_<?= $key ?>" class="col-12 col-sm-12 col-md-6 form-control " value="<?= $vehicle_no_plat ?>">

                    </div>
                    <div class="row" style="width: 100%;" id="pickup_name_row_<?= $key ?>">
                        <label for="colFormLabel" class="col-12 col-sm-12 col-md-2 offset-md-2">Pick Up Person Name *</label>
                        <input type="text" name="pickup_name_<?= $key ?>" id="pickup_name_<?= $key ?>" class="col-12 col-sm-12 col-md-6 form-control " value="<?= $vehicle_pickup_person ?>">
                    </div>
                    <div class="row" style="width: 100%;" id="pickup_number_row_<?= $key ?>">
                        <label for="colFormLabel" class="col-12 col-sm-12 col-md-2 offset-md-2">Pick Up Person Number*</label>
                        <input type="text" name="pickup_number_<?= $key ?>" id="pickup_number_<?= $key ?>" class="col-12 col-sm-12 col-md-6 form-control " value="<?= $vehicle_pickup_person_phone ?>">
                        <?php if ($total_vehicle == 2) : ?>
                            <a href="<?= base_url("user/deletevehicle/$vehicle_id") ?>">
                                <button type="button" class="btn btn-warning"><i class="fa fa-trash"></i></button>
                            </a>
                        <?php endif; ?>

                        <?php if (($key == '0') && ($total_vehicle < 2)) : ?>
                            <button type="button" class="btn btn-primary" id="add_vehicle" style="display: block;"><i class="fa fa-plus"></i></button>
                            <button type="button" class="btn btn-danger" id="remove_vehicle" style="display: none;"><i class="fa fa-minus"></i></button>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <input type="text" id="total_vehicle" name="total_vehicle" value="1" hidden>
            <div id="col_studentVehicle">
                <div class="row" style="width: 100%;" id="no_plat_row_0">
                    <label class="col-12 col-sm-12 col-md-2 offset-md-2">No Plat</label>
                    <input type="text" id="no_plat_0" name="no_plat_0" class="col-12 col-sm-12 col-md-6 form-control " style="margin-right: 10px;">
                </div>
                <div class="row" style="width: 100%;" id="pickup_name_row_0">
                    <label class="col-12 col-sm-12 col-md-2 offset-md-2">Pick Up Person Name</label>
                    <input type="text" id="pickup_name_0" name="pickup_name_0" class="col-12 col-sm-12 col-md-6 form-control " style="margin-right: 10px;">
                </div>
                <div class="row" style="width: 100%;" id="pickup_number_row_0">
                    <label class="col-12 col-sm-12 col-md-2 offset-md-2">Pick Up Person Number</label>
                    <input type="text" id="pickup_number_0" name="pickup_number_0" class="col-12 col-sm-12 col-md-6 form-control " style="margin-right: 10px;">
                    <button type="button" class="btn btn-primary" id="add_vehicle" style="display: block;"><i class="fa fa-plus"></i></button>
                    <button type="button" class="btn btn-danger" id="remove_vehicle" style="display: none;"><i class="fa fa-minus"></i></button>
                </div>
            </div>
        <?php endif; ?>
        <hr>
        <div class="row">
            <ul>
                <li>
                    Pick Up Person / Driver must be someone who held a driving license and above 18 years old
                </li>
                <li>
                    You can register maximum 2 vehicles number to get the school sticker and student name card
                </li>
                <li>
                    Copy in information must be informed to the school
                </li>
            </ul>
        </div>
        <div class="row mb-3" style="width: 100%;">
            <div class="col float-left">
                <img src="<?= base_url('assets/gentelella/images/character_girl.png') ?>" alt="" class="float-left" style="opacity: 0.4; overflow: hidden;" />
            </div>
            <div class="col text-right">
                <img src="<?= base_url('assets/gentelella/images/character_boy.png') ?>" alt="" style="opacity: 0.4; overflow: hidden;" />
            </div>
        </div>
        <hr>
        <div class="row mb-3 d-flex justify-content-end" style="width: 100%;">
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="submit" class="btn border text-white rounded" style="background-color: #69CEED;">Submit</button>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection() ?>