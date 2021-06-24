<?= $this->extend('layouts_dev/master_user') ?>
<?= $this->section('content') ?>
<?php #dd($student_health_history_data);
?>
<div class="col-md-10 my-2 overflow-auto" style="background: white; border-radius: 19px; height:97%">
    <?= $this->include('layouts_dev/flashdata') ?>
    <form action="<?= base_url('user/savehealth') ?>" style="width: 100%;" method="POST">
        <?= csrf_field(); ?>
        <div id="wizard" class="form_wizard wizard_horizontal my-5">
            <ul class="wizard_steps" style="margin-left: -5%;">
                <li>
                    <a href="#step-1">
                        <span class="step_no">1</span>
                        <span class="step_descr">
                            <small>Child Particular’s <br> & Immunization Record</small>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#step-2">
                        <span class="step_no">2</span>
                        <span class="step_descr">
                            <small>Health History & <br> Allergies</small>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#step-3">
                        <span class="step_no">3</span>
                        <span class="step_descr">
                            <small>Pregnancy History <br> Record</small>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#step-4">
                        <span class="step_no">4</span>
                        <span class="step_descr">
                            <small>Description</small>
                        </span>
                    </a>
                </li>
            </ul>
            <form style="width: 100%;">
                <div id="step-1">
                    <input type="text" name="nis" id="nis" value="<?= ($student_details_data) ? $student_details_data['nis'] : NULL; ?>" hidden>
                    <div class="x_title">
                        <h2 style="width: 100%; text-align:center;">Chid Particular’s</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-3 col-form-label text-right">Full Name *</label>
                        <div class="col-md-5"><input type="text" class="form-control" id="colFormLabel" value="<?= ($student_details_data) ? $student_details_data['name'] : "" ?>" disabled /><small>As in birth certificate</small></div>
                        <div class="col-md-4">
                            <div id="gender" class="btn-group" data-toggle="buttons">
                                <label class="btn btn-primary border" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default"> <input type="radio" name="gender" value="male" class="join-btn" <?= ($student_details_data) ? (($student_details_data['gender'] == 'Male') ? "checked" : "") : "" ?> disabled /> &nbsp; Male &nbsp; </label>
                                <label class="btn btn-primary border" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default"> <input type="radio" name="gender" value="female" class="join-btn" <?= ($student_details_data) ? (($student_details_data['gender'] == 'Female') ? "checked" : "") : "" ?> disabled /> Female </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-3 col-form-label text-right">Place of Birth *</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" id="colFormLabel" value="<?= ($student_details_data) ? $student_details_data['pob'] : "" ?>" disabled />
                        </div>
                        <label class="col-form-label col-2 label-align">Date Of Birth <span class="required">*</span>
                        </label>
                        <div class="col-md-3">
                            <input id="birthday" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" value="<?= ($student_details_data) ? $student_details_data['dob'] : "" ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="weight" class="col-3 col-form-label text-right">Weight</label>
                        <div class="col-md-1">
                            <input type="text" class="form-control" id="weight" name="weight" value="<?= ($student_details_data) ? $student_details_data['weight'] : "" ?>" /><small>Kg</small>
                        </div>
                        <label for="height" class="col-2 col-form-label text-right">Height</label>
                        <div class="col-md-1">
                            <input type="text" class="form-control" id="height" name="height" value="<?= ($student_details_data) ? $student_details_data['height'] : "" ?>" /><small>Cm</small>
                        </div>
                        <label for="blood_type" class="col-2 col-form-label text-right">Blood Type</label>
                        <div class="col-md-1">
                            <input type="text" class="form-control" id="blood_type" name="blood_type" value="<?= ($student_details_data) ? $student_details_data['blood_type'] : "" ?>" />
                        </div>
                    </div>
                    <div class="x_title">
                        <h2 style="width: 100%; text-align:center;">Immunization Record</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div id="col_studentImmunization">
                        <?php if ($student_immunization_data) :
                            $total_studentImmunization = count($student_immunization_data); ?>
                            <input type="text" name="total_studentImmunization" id="total_studentImmunization" value="<?= $total_studentImmunization ?>" hidden>
                            <input type="text" name="count_studentImmunization" id="count_studentImmunization" value="<?= $total_studentImmunization ?>" hidden>
                            <?php
                            foreach ($student_immunization_data as $key => $value) :
                                $key += 1;
                                $student_immunization_id = $value['id'];
                                $student_immunization_type = $value['type'];
                                $student_immunization_year = $value['year'];
                            ?>
                                <input type="text" name="student_immunization_id_<?= $key ?>" id="student_immunization_id_<?= $key ?>" value="<?= $student_immunization_id ?>" hidden>
                                <div class="row" style="width: 100%;" id="new_type_immunization_row_<?= $key ?>"><label class="col-12 col-sm-12 col-md-2 offset-md-2">Type of Immunization</label>
                                    <div class="col-12 col-sm-12 col-md-5"><input type="text" id="new_type_immunization_<?= $key ?>" name="new_type_immunization_<?= $key ?>" class="form-control " value="<?= $student_immunization_type ?>"></div>
                                </div>
                                <div class="row" style="width: 100%;" id="new_year_immunization_row_<?= $key ?>"><label class="col-12 col-sm-12 col-md-2 offset-md-2">Year of Immunization</label>
                                    <div class="col-12 col-sm-12 col-md-5"><input type="text" id="new_year_immunization_<?= $key ?>" name="new_year_immunization_<?= $key ?>" class="form-control " value="<?= $student_immunization_year ?>"></div>
                                    <?php if ($key == '1') : ?>
                                        <button type="button" class="btn btn-primary" id="add_studentImmunization" style="display: block;"><i class="fa fa-plus"></i></button>
                                        <button type="button" class="btn btn-danger" id="remove_studentImmunization" style="display: none;"><i class="fa fa-minus"></i></button>

                                    <?php else : ?>
                                        <a href="<?= base_url("user/deletevehicle/$student_immunization_id") ?>">
                                            <button type="button" class="btn btn-warning"><i class="fa fa-trash"></i></button>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            <?php
                            endforeach;
                        else : ?>
                            <input type="text" name="total_studentImmunization" id="total_studentImmunization" value="1" hidden>
                            <input type="text" name="count_studentImmunization" id="count_studentImmunization" value="1" hidden>
                            <div class="row" style="width: 100%;" id="new_type_immunization_row_1"><label class="col-12 col-sm-12 col-md-2 offset-md-2">Type of Immunization</label>
                                <div class="col-12 col-sm-12 col-md-5"><input type="text" id="new_type_immunization_1" name="new_type_immunization_1" class="form-control "></div>
                            </div>
                            <div class="row" style="width: 100%;" id="new_year_immunization_row_1"><label class="col-12 col-sm-12 col-md-2 offset-md-2">Year of Immunization</label>
                                <div class="col-12 col-sm-12 col-md-5"><input type="text" id="new_year_immunization_1" name="new_year_immunization_1" class="form-control "></div>
                                <button type="button" class="btn btn-primary" id="add_studentImmunization" style="display: block;"><i class="fa fa-plus"></i></button>
                                <button type="button" class="btn btn-danger" id="remove_studentImmunization" style="display: none;"><i class="fa fa-minus"></i></button>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="row" style="width: 100%;">
                        <div class="col float-left">
                            <img src="<?= base_url('assets/gentelella/images/character_girl.png') ?>" alt="" class="float-left" style="opacity: 0.4; overflow: hidden;" />
                        </div>
                        <div class="col text-right">
                            <img src="<?= base_url('assets/gentelella/images/character_boy.png') ?>" alt="" style="opacity: 0.4; overflow: hidden;" />
                        </div>
                    </div>
                </div>
                <div id="step-2">
                    <div class="x_title">
                        <h2 style="width: 100%; text-align:center;">Health History/Physical or Mental Disorder</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div id="col_studentHealthHistory">
                        <?php if ($student_health_history_data) :
                            $total_studentHealthHistory = count($student_health_history_data);
                        ?>
                            <input type="text" id="total_studentHealthHistory" name="total_studentHealthHistory" value="<?= $total_studentHealthHistory ?>" hidden>
                            <input type="text" id="count_studentHealthHistory" name="count_studentHealthHistory" value="<?= $total_studentHealthHistory ?>" hidden>
                            <?php foreach ($student_health_history_data as $key => $value) :
                                $student_health_history_id = $value['id'];
                                $student_sickness = $value['sickness_disorder'];
                                $student_age = $value['age'];
                                $student_prevention = $value['prevention_medication'];
                                $key += 1; ?>

                                <input type="text" name="student_health_history_id_<?= $key ?>" id="student_health_history_id_<?= $key ?>" value="<?= $student_health_history_id ?>" hidden>
                                <div class="row" style="width: 100%;" id="new_sickness_history_row_<?= $key ?>"><label class="col-12 col-sm-12 col-md-2 offset-md-2">Sickness/Disorder</label>
                                    <div class="col-12 col-sm-12 col-md-5"><input type="text" id="new_sickness_history_<?= $key ?>" name="new_sickness_history_<?= $key ?>" class="form-control " value="<?= $student_sickness ?>"></div>
                                </div>
                                <div class="row" style="width: 100%;" id="new_age_history_row_<?= $key ?>"><label class="col-12 col-sm-12 col-md-2 offset-md-2">Age</label>
                                    <div class="col-12 col-sm-12 col-md-5"><input type="text" id="new_age_history_<?= $key ?>" name="new_age_history_<?= $key ?>" class="form-control " value="<?= $student_age ?>"></div>
                                </div>
                                <div class="row" style="width: 100%;" id="new_prevention_history_row_<?= $key ?>"><label class="col-12 col-sm-12 col-md-2 offset-md-2">Prevention/Medication</label>
                                    <div class="col-12 col-sm-12 col-md-5"><input type="text" id="new_prevention_history_<?= $key ?>" name="new_prevention_history_<?= $key ?>" class="form-control " value="<?= $student_prevention ?>"></div>
                                    <?php if ($key == '1') : ?>
                                        <button type="button" class="btn btn-primary" id="add_studentHealthHistory" style="display: block;"><i class="fa fa-plus"></i></button>
                                        <button type="button" class="btn btn-danger" id="remove_studentHealthHistory" style="display: none;"><i class="fa fa-minus"></i></button>
                                    <?php else : ?>
                                        <a href="<?= base_url("user/deleteHealth/$student_health_history_id") ?>">
                                            <button type="button" class="btn btn-warning"><i class="fa fa-trash"></i></button>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            <?php
                            endforeach;
                        else : ?>
                            <input type="text" id="total_studentHealthHistory" name="total_studentHealthHistory" value="1" hidden>
                            <input type="text" id="count_studentHealthHistory" name="count_studentHealthHistory" value="1" hidden>
                            <div class="row" style="width: 100%;" id="new_sickness_history_row_1"><label class="col-12 col-sm-12 col-md-2 offset-md-2">Sickness/Disorder</label>
                                <div class="col-12 col-sm-12 col-md-5"><input type="text" id="new_sickness_history_1" name="new_sickness_history_1" class="form-control "></div>
                            </div>
                            <div class="row" style="width: 100%;" id="new_age_history_row_1"><label class="col-12 col-sm-12 col-md-2 offset-md-2">Age</label>
                                <div class="col-12 col-sm-12 col-md-5"><input type="text" id="new_age_history_1" name="new_age_history_1" class="form-control "></div>
                            </div>
                            <div class="row" style="width: 100%;" id="new_prevention_history_row_1"><label class="col-12 col-sm-12 col-md-2 offset-md-2">Prevention/Medication</label>
                                <div class="col-12 col-sm-12 col-md-5"><input type="text" id="new_prevention_history_1" name="new_prevention_history_1" class="form-control "></div>
                                <button type="button" class="btn btn-primary" id="add_studentHealthHistory" style="display: block;"><i class="fa fa-plus"></i></button>
                                <button type="button" class="btn btn-danger" id="remove_studentHealthHistory" style="display: none;"><i class="fa fa-minus"></i></button>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="x_title">
                        <h2 style="width: 100%; text-align:center;">Allergies</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div id="col_studentAllergies">
                        <?php if ($student_allergies_data) :
                            $total_studentAllergies = count($student_allergies_data);
                        ?>
                            <input type="text" id="total_studentAllergies" name="total_studentAllergies" value="<?= $total_studentAllergies ?>" hidden>
                            <input type="text" id="count_studentAllergies" name="count_studentAllergies" value="<?= $total_studentAllergies ?>" hidden>
                            <?php foreach ($student_allergies_data as $key => $value) :
                                $key += 1;
                                $student_allergies_id = $value['id'];
                                $student_type = $value['type'];
                                $student_age = $value['age'];
                                $student_prevention = $value['prevention_medication'];
                            ?>
                                <input type="text" name="student_allergies_id_<?= $key ?>" id="student_allergies_id_<?= $key ?>" value="<?= $student_allergies_id ?>" hidden>
                                <div class="row" style="width: 100%;" id="new_allergies_row_<?= $key ?>"><label class="col-12 col-sm-12 col-md-2 offset-md-2">Type of Allergy</label>
                                    <div class="col-12 col-sm-12 col-md-5"><input type="text" id="new_allergies_<?= $key ?>" name="new_allergies_<?= $key ?>" class="form-control " value="<?= $student_type ?>"></div>
                                </div>
                                <div class="row" style="width: 100%;" id="new_age_allergies_row_<?= $key ?>"><label class="col-12 col-sm-12 col-md-2 offset-md-2">Age</label>
                                    <div class="col-12 col-sm-12 col-md-5"><input type="text" id="new_age_allergies_<?= $key ?>" name="new_age_allergies_<?= $key ?>" class="form-control " value="<?= $student_age ?>"></div>
                                </div>
                                <div class="row" style="width: 100%;" id="new_prevention_allergies_row_<?= $key ?>"><label class="col-12 col-sm-12 col-md-2 offset-md-2">Prevention/Medication</label>
                                    <div class="col-12 col-sm-12 col-md-5"><input type="text" id="new_prevention_allergies_<?= $key ?>" name="new_prevention_allergies_<?= $key ?>" class="form-control " value="<?= $student_prevention ?>"></div>
                                    <?php if ($key == '1') : ?>
                                        <button type="button" class="btn btn-primary" id="add_studentAllergies" style="display: block;"><i class="fa fa-plus"></i></button>
                                        <button type="button" class="btn btn-danger" id="remove_studentAllergies" style="display: none;"><i class="fa fa-minus"></i></button>
                                    <?php else : ?>
                                        <a href="<?= base_url("user/deleteAllergies/$student_allergies_id") ?>">
                                            <button type="button" class="btn btn-warning"><i class="fa fa-trash"></i></button>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            <?php
                            endforeach;
                        else : ?>
                            <input type="text" id="total_studentAllergies" name="total_studentAllergies" value="1" hidden>
                            <input type="text" id="count_studentAllergies" name="count_studentAllergies" value="1" hidden>
                            <div class="row" style="width: 100%;" id="new_allergies_row_1"><label class="col-12 col-sm-12 col-md-2 offset-md-2">Type of Allergy</label>
                                <div class="col-12 col-sm-12 col-md-5"><input type="text" id="new_allergies_1" name="new_allergies_1" class="form-control "></div>
                            </div>
                            <div class="row" style="width: 100%;" id="new_age_allergies_row_1"><label class="col-12 col-sm-12 col-md-2 offset-md-2">Age</label>
                                <div class="col-12 col-sm-12 col-md-5"><input type="text" id="new_age_allergies_1" name="new_age_allergies_1" class="form-control "></div>
                            </div>
                            <div class="row" style="width: 100%;" id="new_prevention_allergies_row_1"><label class="col-12 col-sm-12 col-md-2 offset-md-2">Prevention/Medication</label>
                                <div class="col-12 col-sm-12 col-md-5"><input type="text" id="new_prevention_allergies_1" name="new_prevention_allergies_1" class="form-control "></div>
                                <button type="button" class="btn btn-primary" id="add_studentAllergies" style="display: block;"><i class="fa fa-plus"></i></button>
                                <button type="button" class="btn btn-danger" id="remove_studentAllergies" style="display: none;"><i class="fa fa-minus"></i></button>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="row" style="width: 100%;">
                        <div class="col float-left">
                            <img src="<?= base_url('assets/gentelella/images/character_girl.png') ?>" alt="" class="float-left" style="opacity: 0.4; overflow: hidden;" />
                        </div>
                        <div class="col text-right">
                            <img src="<?= base_url('assets/gentelella/images/character_boy.png') ?>" alt="" style="opacity: 0.4; overflow: hidden;" />
                        </div>
                    </div>
                </div>
                <div id="step-3">
                    <input type="text" name="student_pregnancy_history_id" id="student_pregnancy_history_id" value="<?= ($student_pregnancy_history_data) ? $student_pregnancy_history_data['id'] : NULL; ?>" hidden>
                    <div class="x_title">
                        <h2 style="width: 100%; text-align:center;">Pregnancy History Record</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group row" style="width: 100%;">
                        <label for="colFormLabel" class="col-4 col-form-label text-right">Child condition during pregnancy</label>
                        <div class="col-2" style="margin: auto;">
                            <input type="radio" class="flat" name="health31" <?= ($student_pregnancy_history_data) ? (($student_pregnancy_history_data['during_pregnancy'] == 'Normal') ? "checked" : "") : "" ?> value="Normal" required /> Normal
                        </div>
                        <div class="col-5" style="margin: auto;">
                            <input type="radio" class="flat" name="health31" <?= ($student_pregnancy_history_data) ? (($student_pregnancy_history_data['during_pregnancy'] == 'No') ? "checked" : "") : "" ?> value="No" /> No, <input type="text" class="flat border-left-0 border-top-0 border-right-0" name="text_health31" id="text_health31" placeholder="Please specify" required value="<?= ($student_pregnancy_history_data) ? (($student_pregnancy_history_data['during_pregnancy'] == 'No') ? $student_pregnancy_history_data['text_during_pregnancy'] : "") : "" ?>" />
                        </div>
                    </div>
                    <div class="form-group row" style="width: 100%;">
                        <label for="colFormLabel" class="col-4 col-form-label text-right">Child condition during labour</label>
                        <div class="col-2" style="margin: auto;">
                            <input type="radio" class="flat" name="health32" <?= ($student_pregnancy_history_data) ? (($student_pregnancy_history_data['during_labour'] == 'Normal') ? "checked" : "") : "" ?> value="Normal" required /> Normal
                        </div>
                        <div class="col-5" style="margin: auto;">
                            <input type="radio" class="flat" name="health32" <?= ($student_pregnancy_history_data) ? (($student_pregnancy_history_data['during_labour'] == 'No') ? "checked" : "") : "" ?> value="No" /> No, <input type="text" class="flat border-left-0 border-top-0 border-right-0" name="text_health32" id="text_health32" placeholder="Please specify" required value="<?= ($student_pregnancy_history_data) ? (($student_pregnancy_history_data['during_labour'] == 'No') ? $student_pregnancy_history_data['text_during_labour'] : "") : "" ?>" />
                        </div>
                    </div>
                    <div class="form-group row" style="width: 100%;">
                        <label for="colFormLabel" class="col-4 col-form-label text-right">Child condition during the first year</label>
                        <div class="col-2" style="margin: auto;">
                            <input type="radio" class="flat" name="health33" <?= ($student_pregnancy_history_data) ? (($student_pregnancy_history_data['during_first_year'] == 'Normal') ? "checked" : "") : "" ?> value="Normal" required /> Normal
                        </div>
                        <div class="col-5" style="margin: auto;">
                            <input type="radio" class="flat" name="health33" <?= ($student_pregnancy_history_data) ? (($student_pregnancy_history_data['during_first_year'] == 'No') ? "checked" : "") : "" ?> value="No" /> No, <input type="text" class="flat border-left-0 border-top-0 border-right-0" name="text_health33" id="text_health33" placeholder="Please specify" required value="<?= ($student_pregnancy_history_data) ? (($student_pregnancy_history_data['during_first_year'] == 'No') ? $student_pregnancy_history_data['text_during_first_year'] : "") : "" ?>" />
                        </div>
                    </div>
                    <div class="form-group row" style="width: 100%;">
                        <label for="colFormLabel" class="col-4 col-form-label text-right">Child condition during the second - third year</label>
                        <div class="col-2" style="margin: auto;">
                            <input type="radio" class="flat" name="health34" <?= ($student_pregnancy_history_data) ? (($student_pregnancy_history_data['during_second_third_year'] == 'Normal') ? "checked" : "") : "" ?> value="Normal" required /> Normal
                        </div>
                        <div class="col-5" style="margin: auto;">
                            <input type="radio" class="flat" name="health34" <?= ($student_pregnancy_history_data) ? (($student_pregnancy_history_data['during_second_third_year'] == 'No') ? "checked" : "") : "" ?> value="No" /> No, <input type="text" class="flat border-left-0 border-top-0 border-right-0" name="text_health34" id="text_health34" placeholder="Please specify" required value="<?= ($student_pregnancy_history_data) ? (($student_pregnancy_history_data['during_second_third_year'] == 'No') ? $student_pregnancy_history_data['text_during_second_third_year'] : "") : "" ?>" />
                        </div>
                    </div>
                    <div class="form-group row" style="width: 100%;">
                        <label for="colFormLabel" class="col-4 col-form-label text-right">Mother physical health during pregnancy</label>
                        <div class="col-2" style="margin: auto;">
                            <input type="radio" class="flat" name="health35" <?= ($student_pregnancy_history_data) ? (($student_pregnancy_history_data['mother_physical'] == 'Normal') ? "checked" : "") : "" ?> value="Normal" required /> Normal
                        </div>
                        <div class="col-5" style="margin: auto;">
                            <input type="radio" class="flat" name="health35" <?= ($student_pregnancy_history_data) ? (($student_pregnancy_history_data['mother_physical'] == 'No') ? "checked" : "") : "" ?> value="No" /> No, <input type="text" class="flat border-left-0 border-top-0 border-right-0" name="text_health35" id="text_health35" placeholder="Please specify" required value="<?= ($student_pregnancy_history_data) ? (($student_pregnancy_history_data['mother_physical'] == 'No') ? $student_pregnancy_history_data['text_mother_physical'] : "") : "" ?>" />
                        </div>
                    </div>
                    <div class="form-group row" style="width: 100%;">
                        <label for="colFormLabel" class="col-4 col-form-label text-right">Mother mental health during pregnancy</label>
                        <div class="col-2" style="margin: auto;">
                            <input type="radio" class="flat" name="health36" <?= ($student_pregnancy_history_data) ? (($student_pregnancy_history_data['mother_mental'] == 'Normal') ? "checked" : "") : "" ?> value="Normal" required /> Normal
                        </div>
                        <div class="col-5" style="margin: auto;">
                            <input type="radio" class="flat" name="health36" <?= ($student_pregnancy_history_data) ? (($student_pregnancy_history_data['mother_mental'] == 'No') ? "checked" : "") : "" ?> value="No" /> No, <input type="text" class="flat border-left-0 border-top-0 border-right-0" name="text_health36" id="text_health36" placeholder="Please specify" required value="<?= ($student_pregnancy_history_data) ? (($student_pregnancy_history_data['mother_mental'] == 'No') ? $student_pregnancy_history_data['text_mother_mental'] : "") : "" ?>" />
                        </div>
                    </div>
                    <div class="form-group row" style="width: 100%;">
                        <label for="colFormLabel" class="col-4 col-form-label text-right">Birth Proses</label>
                        <div class="col-1" style="margin-left: 25px;">
                            <input type="radio" class="flat" name="health37" <?= ($student_pregnancy_history_data) ? (($student_pregnancy_history_data['birth_proses'] == 'Normal') ? "checked" : "") : "" ?> value="Normal" required /> Normal
                        </div>
                        <div class="col-1">
                            <input type="radio" class="flat" name="health37" <?= ($student_pregnancy_history_data) ? (($student_pregnancy_history_data['birth_proses'] == 'Caesar') ? "checked" : "") : "" ?> value="Caesar" /> Caesar
                        </div>
                        <div class="col-3">
                            <input type="radio" class="flat" name="health37" <?= ($student_pregnancy_history_data) ? (($student_pregnancy_history_data['birth_proses'] == 'No') ? "checked" : "") : "" ?> value="No" /> No, <input type="text" class="flat border-left-0 border-top-0 border-right-0" name="text_health37" id="text_health37" placeholder="Please specify" required value="<?= ($student_pregnancy_history_data) ? (($student_pregnancy_history_data['birth_proses'] == 'No') ? $student_pregnancy_history_data['text_birth_proses'] : "") : "" ?>" />
                        </div>
                    </div>
                    <div class="form-group row" style="width: 100%;">
                        <label for="colFormLabel" class="col-4 col-form-label text-right">Time of birth</label>
                        <div class="col-3">
                            <input type="text" class="flat border-left-0 border-top-0 border-right-0" name="health38" required value="<?= ($student_pregnancy_history_data) ? $student_pregnancy_history_data['time_of_birth'] : "" ?>" /> Weeks
                        </div>
                    </div>
                    <div class="form-group row" style="width: 100%;">
                        <label for="colFormLabel" class="col-4 col-form-label text-right">Baby nutritional intake</label>
                        <div class="col-2">
                            <input type="radio" class="flat" name="health39_bm" <?= ($student_pregnancy_history_data) ? (($student_pregnancy_history_data['baby_nutritional'] == 'Breastmilk') ? "checked" : "") : "" ?> value="Breastmilk" required /> Breastmilk, until age
                        </div>
                        <div class="col-2"><input type="text" class="flat border-left-0 border-top-0 border-right-0" name="text_health39_bm" placeholder="Please specify" required value="<?= ($student_pregnancy_history_data) ? (($student_pregnancy_history_data['baby_nutritional'] == 'Breastmilk') ? $student_pregnancy_history_data['text_baby_nutritional_breastmilk'] : "") : "" ?>" /></div>

                    </div>
                    <div class="form-group row" style="width: 100%;">
                        <label for="colFormLabel" class="col-4 col-form-label text-right"></label>
                        <div class="col-2">
                            <input type="radio" class="flat" name="health39_o" <?= ($student_pregnancy_history_data) ? (($student_pregnancy_history_data['baby_nutritional'] == 'Others') ? "checked" : "") : "" ?> value="Others" /> Others,
                        </div>
                        <div class="col-2">
                            <input type="text" class="flat border-left-0 border-top-0 border-right-0" name="text_health39_o" placeholder="Please specify" required value="<?= ($student_pregnancy_history_data) ? (($student_pregnancy_history_data['baby_nutritional'] == 'Others') ? $student_pregnancy_history_data['text_baby_nutritional_others'] : "") : "" ?>" />
                        </div>
                    </div>
                    <div class="form-group row" style="width: 100%;">
                        <label for="colFormLabel" class="col-4 col-form-label text-right">Birth height</label>
                        <div class="col-3">
                            <input type="text" class="flat border-left-0 border-top-0 border-right-0" name="birth_height" required value="<?= ($student_pregnancy_history_data) ? $student_pregnancy_history_data['birth_height'] : "" ?>" /> Cm
                        </div>
                    </div>
                    <div class="form-group row" style="width: 100%;">
                        <label for="colFormLabel" class="col-4 col-form-label text-right">Birth weight</label>
                        <div class="col-3">
                            <input type="text" class="flat border-left-0 border-top-0 border-right-0" name="birth_weight" required value="<?= ($student_pregnancy_history_data) ? $student_pregnancy_history_data['birth_weight'] : "" ?>" /> Kg
                        </div>
                    </div>

                    <div class="row" style="width: 100%;">
                        <div class="col float-left">
                            <img src="<?= base_url('assets/gentelella/images/character_girl.png') ?>" alt="" class="float-left" style="opacity: 0.4; overflow: hidden;" />
                        </div>
                        <div class="col text-right">
                            <img src="<?= base_url('assets/gentelella/images/character_boy.png') ?>" alt="" style="opacity: 0.4; overflow: hidden;" />
                        </div>
                    </div>
                </div>
                <div id="step-4">
                    <input type="text" name="student_health_description_id" id="student_health_description_id" value="<?= ($student_health_description) ? $student_health_description['id'] : NULL; ?>" hidden>
                    <div class="x_title">
                        <h2 style="width: 100%; text-align:center;">Description</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <div class="col">
                            <div class="row">
                                <label for="colFormLabel" class="col-3"></label>
                                <label for="colFormLabel" class="col-3" style="margin-left: -15px;">Does child have any present ilness?</label>
                                <div class="col-2" style="margin: auto;">
                                    <input type="radio" class="flat" name="health41" id="health41" <?= ($student_health_description) ? (($student_health_description['illness'] == 'No') ? "checked" : "") : "" ?> value="No" /> No
                                </div>
                                <div class="col-2" style="margin: auto;">
                                    <input type="radio" class="flat" name="health41" id="health41" <?= ($student_health_description) ? (($student_health_description['illness'] == 'Yes') ? "checked" : "") : "" ?> value="Yes" required /> Yes
                                </div>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-3"></label>
                                <label for="colFormLabel" class="col-2" style="margin-left: -15px;">If yes describe :</label>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-3"></label>
                                <textarea id="text_health41" required="required" class="col-6 form-control" name="text_health41"><?= ($student_health_description) ? $student_health_description['describe_illness'] : ""; ?></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <label for="colFormLabel" class="col-3"></label>
                                <label for="colFormLabel" class="col-3" style="margin-left: -15px;">Allergies (include drug allergies)</label>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-3"></label>
                                <label for="colFormLabel" class="col-6" style="margin-left: -15px;">Ever had a serious respiratory reaction to a food, bee sting or a drug?</label>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-3"></label>
                                <textarea id="text_health42" required="required" class="col-6 form-control" name="text_health42"><?= ($student_health_description) ? $student_health_description['respiratory_reaction'] : ""; ?></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <label for="colFormLabel" class="col-3"></label>
                                <label for="colFormLabel" class="col-6" style="margin-left: -15px;">Medication child is taking</label>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-3"></label>
                                <textarea id="text_health43" required="required" class="col-6 form-control" name="text_health43"><?= ($student_health_description) ? $student_health_description['medication'] : ""; ?></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <label for="colFormLabel" class="col-3"></label>
                                <label for="colFormLabel" class="col-6" style="margin-left: -15px;">Hospitalization, Serious injuries: Why? When?</label>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-3"></label>
                                <textarea id="text_health44" required="required" class="col-6 form-control" name="text_health44"><?= ($student_health_description) ? $student_health_description['serious_injuries'] : ""; ?></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <label for="colFormLabel" class="col-3"></label>
                                <label for="colFormLabel" class="col-3" style="margin-left: -15px;">Wear Glasses?</label>
                                <div class="col-2" style="margin: auto;">
                                    <input type="radio" class="flat" name="health45" id="health45" <?= ($student_health_description) ? (($student_health_description['wear_glasses'] == 'No') ? "checked" : "") : "" ?> value="No" /> No
                                </div>
                                <div class="col-2" style="margin: auto;">
                                    <input type="radio" class="flat" name="health45" id="health45" <?= ($student_health_description) ? (($student_health_description['wear_glasses'] == 'Yes') ? "checked" : "") : "" ?> value="Yes" required /> Yes
                                </div>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-3"></label>
                                <label for="colFormLabel" class="col-6" style="margin-left: -15px;">Eye or Vision Problems, describe:</label>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-3"></label>
                                <textarea id="text_health45" required="required" class="col-6 form-control" name="text_health45"><?= ($student_health_description) ? $student_health_description['vision_problem'] : ""; ?></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <label for="colFormLabel" class="col-3"></label>
                                <label for="colFormLabel" class="col-6" style="margin-left: -15px;">Hearing problem, multiple ear infection, describe:</label>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-3"></label>
                                <textarea id="text_health46" required="required" class="col-6 form-control" name="text_health46"><?= ($student_health_description) ? $student_health_description['hearing_problem'] : ""; ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="width: 100%;">
                        <div class="col float-left">
                            <img src="<?= base_url('assets/gentelella/images/character_girl.png') ?>" alt="" class="float-left" style="opacity: 0.4; overflow: hidden;" />
                        </div>
                        <div class="col text-right">
                            <img src="<?= base_url('assets/gentelella/images/character_boy.png') ?>" alt="" style="opacity: 0.4; overflow: hidden;" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </form>
</div>
<?= $this->endSection() ?>