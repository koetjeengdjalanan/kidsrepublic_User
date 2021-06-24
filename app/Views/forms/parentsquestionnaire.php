<?= $this->extend('layouts_dev/master_user') ?>
<?= $this->section('content') ?>
<div class="col-md-10 my-2 overflow-auto" style="background: white; border-radius: 19px; height:97%">
    <?= $this->include('layouts_dev/flashdata') ?>
    <form action="<?= base_url('user/saveparentsquest') ?>" style="width: 100%;" method="POST">
        <?= csrf_field(); ?>
        <div id="wizard" class="form_wizard wizard_horizontal my-5">
            <ul class="wizard_steps" style="margin-left: -4%;">
                <li>
                    <a href="#step-1">
                        <span class="step_no">1</span>
                        <span class="step_descr">
                            <small>Child Particular’s</small>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#step-2">
                        <span class="step_no">2</span>
                        <span class="step_descr">
                            <small>Child & Family <br> Information</small>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#step-3">
                        <span class="step_no">3</span>
                        <span class="step_descr">
                            <small>Foundations For <br> Assesment</small>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#step-4">
                        <span class="step_no">4</span>
                        <span class="step_descr">
                            <small>Previous Evaluations <br> & Current Service</small>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#step-5">
                        <span class="step_no">5</span>
                        <span class="step_descr">
                            <small>Developmental <br> Domains</small>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#step-6">
                        <span class="step_no">6</span>
                        <span class="step_descr">
                            <small>Parent’s Survey</small>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#step-7">
                        <span class="step_no">7</span>
                        <span class="step_descr">
                            <small>Finish</small>
                        </span>
                    </a>
                </li>
            </ul>
            <form style="width: 100%;">
                <input type="text" name="nis" id="nis" value="<?= ($student_details_data) ? $student_details_data['nis'] : NULL; ?>" hidden>
                <div id="step-1">
                    <input type="text" id="student_family_information_id" name="student_family_information_id" value="<?= ($student_family_information_data) ? $student_family_information_data['id'] : NULL ?>" hidden />
                    <div class="x_title">
                        <h2 style="width: 100%; text-align:center;">Chid Particular’s</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-3 col-form-label text-right">Name of Child</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="colFormLabel" value="<?= ($student_details_data) ? $student_details_data['name'] : "" ?>" disabled /><small>As in birth certificate</small>
                        </div>
                        <div class="col-md-4">
                            <div id="gender" class="btn-group" data-toggle="buttons">
                                <label class="btn btn-primary border" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default"> <input type="radio" name="gender" value="male" class="join-btn" <?= ($student_details_data) ? (($student_details_data['gender'] == 'Male') ? "checked" : "") : "" ?> disabled /> &nbsp; Male &nbsp; </label>
                                <label class="btn btn-primary border" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default"> <input type="radio" name="gender" value="female" class="join-btn" <?= ($student_details_data) ? (($student_details_data['gender'] == 'Female') ? "checked" : "") : "" ?> disabled /> Female </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-3 label-align">Date Of Birth <span class="required">*</span>
                        </label>
                        <div class="col-md-3">
                            <input id="birthday" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" value="<?= ($student_details_data) ? $student_details_data['dob'] : "" ?>" disabled />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-3 col-form-label text-right">Mother’s Name</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" id="colFormLabel" value="<?= ($mothers_particular_data) ? $mothers_particular_data['name'] : "" ?>" disabled />
                        </div>
                        <label for="colFormLabel" class="col-2 col-form-label text-right" />Father’s Name</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" id="colFormLabel" value="<?= ($fathers_particular_data) ? $fathers_particular_data['name'] : "" ?>" disabled />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-3 col-form-label text-right">Parent(s) Native Language</label>
                        <div class="col-md-8">
                            <input type="text" name="parents_language" class="form-control" id="colFormLabel" value="<?= ($student_family_information_data) ? $student_family_information_data['parents_language'] : "" ?>" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-3 col-form-label text-right">Child(s) Native Language</label>
                        <div class="col-md-8">
                            <input type="text" name="spoken_language" class="form-control" id="colFormLabel" value="<?= ($student_details_data) ? $student_details_data['language'] : "" ?>" disabled />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-3 col-form-label text-right">Person Completing this Form</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="colFormLabel" name="person_completing" value="<?= ($student_family_information_data) ? $student_family_information_data['person_completing'] : "" ?>" />
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
                <div id="step-2">
                    <div class="x_title">
                        <h2 style="width: 100%; text-align:center;">Child & Family Information</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <label for="colFormLabel" class="col-3"></label>
                            <label for="colFormLabel" class="col-3" style="margin-left: -15px;">Does child have any present ilness?</label>
                            <div class="col-2">
                                <input type="radio" class="flat" <?= ($student_health_description_data) ? (($student_health_description_data['illness'] == 'No') ? "checked" : "") : "" ?> disabled /> No
                            </div>
                            <div class="col-2">
                                <input type="radio" class="flat" <?= ($student_health_description_data) ? (($student_health_description_data['illness'] == 'Yes') ? "checked" : "") : "" ?> disabled /> Yes
                            </div>
                        </div>
                        <div class="row">
                            <label for="colFormLabel" class="col-3"></label>
                            <label for="colFormLabel" class="col-2" style="margin-left: -15px;">If yes describe :</label>
                        </div>
                        <div class="row">
                            <label for="colFormLabel" class="col-3"></label>
                            <textarea id="message" required="required" class="col-6 form-control" name="message" disabled><?= ($student_health_description_data) ? $student_health_description_data['describe_illness'] : ""; ?></textarea>
                        </div>
                    </div>
                    <div class="col" id="col_relationship_parentsQuest">
                        <div class="row">
                            <label for="colFormLabel" class="col-3"></label>
                            <label for="colFormLabel" class="col-6" style="margin-left: -15px;">Indicate sibling or any other individuals including nannies/caregivers living with your child :</label>
                        </div>
                        <?php if ($student_relationship_data) :
                            $total_relationship_parentQuest = count($student_relationship_data);
                        ?>
                            <input type="text" name="total_relationship_parentQuest" id="total_relationship_parentQuest" value="<?= $total_relationship_parentQuest ?>" hidden>
                            <input type="text" name="count_relationship_parentQuest" id="count_relationship_parentQuest" value="<?= $total_relationship_parentQuest ?>" hidden>
                            <?php foreach ($student_relationship_data as $key => $value) :
                                $key += 1;
                                $student_relationship_id = $value['id'];
                                $student_relationship_name = $value['name'];
                                $student_relationship_ages = $value['ages'];
                                $student_relationship_relationship = $value['relationship'];
                            ?>
                                <input type="text" id="student_relationship_id_<?= $key ?>" name="student_relationship_id_<?= $key ?>" value="<?= $student_relationship_id ?>" hidden>
                                <div class="row" style="width: 100%;" id="person_name_row_<?= $key ?>"><label class="col-12 col-sm-12 col-md-2 offset-md-2">Name</label><input type="text" id="person_name_<?= $key ?>" name="person_name_<?= $key ?>" class="col-12 col-sm-12 col-md-6 form-control " style="margin-right: 10px;" value="<?= $student_relationship_name ?>"></div>
                                <div class="row" style="width: 100%;" id="person_ages_row_<?= $key ?>"><label class="col-12 col-sm-12 col-md-2 offset-md-2">Ages</label><input type="text" id="person_ages_<?= $key ?>" name="person_ages_<?= $key ?>" class="col-12 col-sm-12 col-md-6 form-control " style="margin-right: 10px;" value="<?= $student_relationship_ages ?>"></div>
                                <div class="row" style="width: 100%;" id="person_relationship_row_<?= $key ?>"><label class="col-12 col-sm-12 col-md-2 offset-md-2">Relationship to Child</label><input type="text" id="person_relationship_<?= $key ?>" name="person_relationship_<?= $key ?>" class="col-12 col-sm-12 col-md-6 form-control " style="margin-right: 10px;" value="<?= $student_relationship_relationship ?>">
                                    <?php if ($key == '1') : ?>
                                        <button type="button" class="btn btn-primary" id="add_relationship_parentQuest" style="display: block;"><i class="fa fa-plus"></i></button>
                                        <button type="button" class="btn btn-danger" id="remove_relationship_parentQuest" style="display: none;"><i class="fa fa-minus"></i></button>
                                </div>
                            <?php else : ?>
                                <a href="<?= base_url("user/deleteRelationship/$student_relationship_id") ?>">
                                    <button type="button" class="btn btn-warning"><i class="fa fa-trash"></i></button>
                                </a>
                            <?php endif; ?>
                        <?php
                            endforeach;
                        else : ?>
                        <input type="text" name="total_relationship_parentQuest" id="total_relationship_parentQuest" value="1" hidden>
                        <input type="text" name="count_relationship_parentQuest" id="count_relationship_parentQuest" value="1" hidden>
                        <div class="row" style="width: 100%;" id="person_name_row_0"><label class="col-12 col-sm-12 col-md-2 offset-md-2">Name</label><input type="text" id="person_name_0" name="person_name_0" class="col-12 col-sm-12 col-md-6 form-control " style="margin-right: 10px;"></div>
                        <div class="row" style="width: 100%;" id="person_ages_row_0"><label class="col-12 col-sm-12 col-md-2 offset-md-2">Ages</label><input type="text" id="person_ages_0" name="person_ages_0" class="col-12 col-sm-12 col-md-6 form-control " style="margin-right: 10px;"></div>
                        <div class="row" style="width: 100%;" id="person_relationship_row_0"><label class="col-12 col-sm-12 col-md-2 offset-md-2">Relationship to Child</label><input type="text" id="person_relationship_0" name="person_relationship_0" class="col-12 col-sm-12 col-md-6 form-control " style="margin-right: 10px;"><button type="button" class="btn btn-primary" id="add_relationship_parentQuest" style="display: block;"><i class="fa fa-plus"></i></button><button type="button" class="btn btn-danger" id="remove_relationship_parentQuest" style="display: none;"><i class="fa fa-minus"></i></button></div>
                    <?php endif; ?>
                    </div>
                    <div class="col">
                        <div class="row">
                            <label for="colFormLabel" class="col-3"></label>
                            <label for="colFormLabel" class="col-6" style="margin-left: -15px;">With whom does your child stay during the day? (Name of person and relationship to child and/or name of cate center)</label>
                        </div>
                        <div class="row">
                            <label for="colFormLabel" class="col-3"></label>
                            <textarea id="message" required="required" class="col-6 form-control" name="text_parents23"><?= ($student_family_information_data) ? $student_family_information_data['whom_stay_during_day'] : "" ?></textarea>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <label for="colFormLabel" class="col-3"></label>
                            <label for="colFormLabel" class="col-6" style="margin-left: -15px;">Description any unique family circumstances that have a significant impact on your child’s development</label>
                        </div>
                        <div class="row">
                            <label for="colFormLabel" class="col-3"></label>
                            <textarea id="message" required="required" class="col-6 form-control" name="text_parents24"><?= ($student_family_information_data) ? $student_family_information_data['family_circumstances'] : "" ?></textarea>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <label for="colFormLabel" class="col-3"></label>
                            <label for="colFormLabel" class="col-6" style="margin-left: -15px;">What family values/principles do you implement at home?</label>
                        </div>
                        <div class="row">
                            <label for="colFormLabel" class="col-3"></label>
                            <textarea id="message" required="required" class="col-6 form-control" name="text_parents25"><?= ($student_family_information_data) ? $student_family_information_data['family_principles'] : "" ?></textarea>
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
                <div id="step-3">
                    <div class="x_title">
                        <h2 style="width: 100%; text-align:center;">Foundations For Assesment</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <label for="colFormLabel" class="col-3"></label>
                            <label for="colFormLabel" class="col-6" style="margin-left: -15px;">What is the most enjoyable time for you and your child?</label>
                        </div>
                        <div class="row">
                            <label for="colFormLabel" class="col-3"></label>
                            <textarea id="message" required="required" class="col-6 form-control" name="text_parents31"><?= ($student_family_information_data) ? $student_family_information_data['assessment_enjoyable_time'] : "" ?></textarea>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <label for="colFormLabel" class="col-3"></label>
                            <label for="colFormLabel" class="col-6" style="margin-left: -15px;">How would you describe or label any concerns you have about your child’s development, if any?</label>
                        </div>
                        <div class="row">
                            <label for="colFormLabel" class="col-3"></label>
                            <textarea id="message" required="required" class="col-6 form-control" name="text_parents32"><?= ($student_family_information_data) ? $student_family_information_data['assessment_development_concern'] : "" ?></textarea>
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
                    <input type="text" id="student_prev_eval_current_service_id" name="student_prev_eval_current_service_id" value="<?= ($student_prev_eval_current_service_data) ? $student_prev_eval_current_service_data['id'] : NULL; ?>" hidden>
                    <div class="x_title">
                        <h2 style="width: 100%; text-align:center;">Previous Evaluations and Current Service</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <div class="col">
                            <div class="row">
                                <label for="colFormLabel" class="col-3"></label>
                                <label for="colFormLabel" class="col-6" style="margin-left: -15px;">Has your child ever had any other development evaluations?</label> <br>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-3"></label>
                                <div class="col-2" style="margin-left: -15px;">
                                    <input type="radio" class="flat" name="parents41" id="parents41" value="No" <?= ($student_prev_eval_current_service_data) ? (($student_prev_eval_current_service_data['evaluations'] == 'No') ? "checked" : "") : "" ?> required /> No
                                </div>
                                <div class="col-2" style="margin-left: -15px;">
                                    <input type="radio" class="flat" name="parents41" id="parents41" value="Yes" <?= ($student_prev_eval_current_service_data) ? (($student_prev_eval_current_service_data['evaluations'] == 'Yes') ? "checked" : "") : "" ?> required /> Yes
                                </div>
                            </div> <br>
                            <div class="row">
                                <label for="colFormLabel" class="col-3"></label>
                                <label for="colFormLabel" class="col-6" style="margin-left: -15px;">If yes, when and where was the evaluation conducted? Please specify</label>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-3"></label>
                                <textarea id="message" required="required" class="col-6 form-control" name="text_parents42"><?= ($student_prev_eval_current_service_data) ? $student_prev_eval_current_service_data['text_evaluations'] : "" ?></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <label for="colFormLabel" class="col-3"></label>
                                <label for="colFormLabel" class="col-3" style="margin-left: -15px;">What were the results?</label>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-3"></label>
                                <textarea id="message" required="required" class="col-6 form-control" name="text_parents43"><?= ($student_prev_eval_current_service_data) ? $student_prev_eval_current_service_data['results_evaluations'] : "" ?></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <label for="colFormLabel" class="col-3"></label>
                                <label for="colFormLabel" class="col-6" style="margin-left: -15px;">Has your child ever been referred for any development service (Psychologist, Speech/Language)?</label> <br>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-3"></label>
                                <div class="col-2" style="margin-left: -15px;">
                                    <input type="radio" class="flat" name="parents44" id="parents44" value="No" <?= ($student_prev_eval_current_service_data) ? (($student_prev_eval_current_service_data['service'] == 'No') ? "checked" : "") : "" ?> required /> No
                                </div>
                                <div class="col-2" style="margin-left: -15px;">
                                    <input type="radio" class="flat" name="parents44" id="parents44" value="Yes" <?= ($student_prev_eval_current_service_data) ? (($student_prev_eval_current_service_data['service'] == 'Yes') ? "checked" : "") : "" ?> required /> Yes
                                </div>
                            </div> <br>
                            <div class="row">
                                <label for="colFormLabel" class="col-3"></label>
                                <label for="colFormLabel" class="col-6" style="margin-left: -15px;">What were the results?</label>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-3"></label>
                                <textarea id="message" required="required" class="col-6 form-control" name="text_parents45"><?= ($student_prev_eval_current_service_data) ? $student_prev_eval_current_service_data['results_service'] : "" ?></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <label for="colFormLabel" class="col-3"></label>
                                <label for="colFormLabel" class="col-6" style="margin-left: -15px;">Who provided the services? Please specify</label>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-3"></label>
                                <textarea id="message" required="required" class="col-6 form-control" name="text_parents46"><?= ($student_prev_eval_current_service_data) ? $student_prev_eval_current_service_data['provided_service'] : "" ?></textarea>
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
                <div id="step-5">
                    <input type="text" id="student_development_domains_id" name="student_development_domains_id" value="<?= ($student_development_domains_data) ? $student_development_domains_data['id'] : NULL; ?>" hidden>
                    <div class="x_title">
                        <h2 style="width: 100%; text-align:center;">Developmental Domains</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="colFormLabel" class="col-1"></label>
                            <label for="colFormLabel" class="col-5" style="margin-left: -15px;">Does your child eat and drink independently?</label>
                            <div class="col-2">
                                <input type="radio" class="flat" name="parents51" id="parents51" value="Always" <?= ($student_development_domains_data) ? (($student_development_domains_data['eat_drink'] == 'Always') ? "checked" : "") : "" ?> required /> Always
                            </div>
                            <div class="col-2">
                                <input type="radio" class="flat" name="parents51" id="parents51" value="Sometimes" <?= ($student_development_domains_data) ? (($student_development_domains_data['eat_drink'] == 'Sometimes') ? "checked" : "") : "" ?> required /> Sometimes
                            </div>
                            <div class="col-2">
                                <input type="radio" class="flat" name="parents51" id="parents51" value="Never" <?= ($student_development_domains_data) ? (($student_development_domains_data['eat_drink'] == 'Never') ? "checked" : "") : "" ?> required /> Never
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="colFormLabel" class="col-1"></label>
                            <label for="colFormLabel" class="col-5" style="margin-left: -15px;">Does your child dress himself/herself independently?</label>
                            <div class="col-2">
                                <input type="radio" class="flat" name="parents52" id="parents52" value="Always" <?= ($student_development_domains_data) ? (($student_development_domains_data['dress'] == 'Always') ? "checked" : "") : "" ?> required /> Always
                            </div>
                            <div class="col-2">
                                <input type="radio" class="flat" name="parents52" id="parents52" value="Sometimes" <?= ($student_development_domains_data) ? (($student_development_domains_data['dress'] == 'Sometimes') ? "checked" : "") : "" ?> required /> Sometimes
                            </div>
                            <div class="col-2">
                                <input type="radio" class="flat" name="parents52" id="parents52" value="Never" <?= ($student_development_domains_data) ? (($student_development_domains_data['dress'] == 'Never') ? "checked" : "") : "" ?> required /> Never
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="colFormLabel" class="col-1"></label>
                            <label for="colFormLabel" class="col-5" style="margin-left: -15px;">Can your child use the toilet independently?</label>
                            <div class="col-2">
                                <input type="radio" class="flat" name="parents53" id="parents53" value="Always" <?= ($student_development_domains_data) ? (($student_development_domains_data['use_toilet'] == 'Always') ? "checked" : "") : "" ?> required /> Always
                            </div>
                            <div class="col-2">
                                <input type="radio" class="flat" name="parents53" id="parents53" value="Sometimes" <?= ($student_development_domains_data) ? (($student_development_domains_data['use_toilet'] == 'Sometimes') ? "checked" : "") : "" ?> required /> Sometimes
                            </div>
                            <div class="col-2">
                                <input type="radio" class="flat" name="parents53" id="parents53" value="Never" <?= ($student_development_domains_data) ? (($student_development_domains_data['use_toilet'] == 'Never') ? "checked" : "") : "" ?> required /> Never
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="colFormLabel" class="col-1"></label>
                            <label for="colFormLabel" class="col-5" style="margin-left: -15px;">Does your child respond appropriately to adult requests?</label>
                            <div class="col-2">
                                <input type="radio" class="flat" name="parents54" id="parents54" value="Always" <?= ($student_development_domains_data) ? (($student_development_domains_data['respond_approiately'] == 'Always') ? "checked" : "") : "" ?> required /> Always
                            </div>
                            <div class="col-2">
                                <input type="radio" class="flat" name="parents54" id="parents54" value="Sometimes" <?= ($student_development_domains_data) ? (($student_development_domains_data['respond_approiately'] == 'Sometimes') ? "checked" : "") : "" ?> required /> Sometimes
                            </div>
                            <div class="col-2">
                                <input type="radio" class="flat" name="parents54" id="parents54" value="Never" <?= ($student_development_domains_data) ? (($student_development_domains_data['respond_approiately'] == 'Never') ? "checked" : "") : "" ?> required /> Never
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="colFormLabel" class="col-1"></label>
                            <label for="colFormLabel" class="col-5" style="margin-left: -15px;">Does your child seek out playing with other children?</label>
                            <div class="col-2">
                                <input type="radio" class="flat" name="parents55" id="parents55" value="Always" <?= ($student_development_domains_data) ? (($student_development_domains_data['seek_out_playing'] == 'Always') ? "checked" : "") : "" ?> required /> Always
                            </div>
                            <div class="col-2">
                                <input type="radio" class="flat" name="parents55" id="parents55" value="Sometimes" <?= ($student_development_domains_data) ? (($student_development_domains_data['seek_out_playing'] == 'Sometimes') ? "checked" : "") : "" ?> required /> Sometimes
                            </div>
                            <div class="col-2">
                                <input type="radio" class="flat" name="parents55" id="parents55" value="Never" <?= ($student_development_domains_data) ? (($student_development_domains_data['seek_out_playing'] == 'Never') ? "checked" : "") : "" ?> required /> Never
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="colFormLabel" class="col-1"></label>
                            <label for="colFormLabel" class="col-5" style="margin-left: -15px;">Does your child play cooperatively?</label>
                            <div class="col-2">
                                <input type="radio" class="flat" name="parents56" id="parents56" value="Always" <?= ($student_development_domains_data) ? (($student_development_domains_data['play_cooperatively'] == 'Always') ? "checked" : "") : "" ?> required /> Always
                            </div>
                            <div class="col-2">
                                <input type="radio" class="flat" name="parents56" id="parents56" value="Sometimes" <?= ($student_development_domains_data) ? (($student_development_domains_data['play_cooperatively'] == 'Sometimes') ? "checked" : "") : "" ?> required /> Sometimes
                            </div>
                            <div class="col-2">
                                <input type="radio" class="flat" name="parents56" id="parents56" value="Never" <?= ($student_development_domains_data) ? (($student_development_domains_data['play_cooperatively'] == 'Never') ? "checked" : "") : "" ?> required /> Never
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="colFormLabel" class="col-1"></label>
                            <label for="colFormLabel" class="col-5" style="margin-left: -15px;">Does your child speak in complete sentences?</label>
                            <div class="col-2">
                                <input type="radio" class="flat" name="parents57" id="parents57" value="Always" <?= ($student_development_domains_data) ? (($student_development_domains_data['speak'] == 'Always') ? "checked" : "") : "" ?> required /> Always
                            </div>
                            <div class="col-2">
                                <input type="radio" class="flat" name="parents57" id="parents57" value="Sometimes" <?= ($student_development_domains_data) ? (($student_development_domains_data['speak'] == 'Sometimes') ? "checked" : "") : "" ?> required /> Sometimes
                            </div>
                            <div class="col-2">
                                <input type="radio" class="flat" name="parents57" id="parents57" value="Never" <?= ($student_development_domains_data) ? (($student_development_domains_data['speak'] == 'Never') ? "checked" : "") : "" ?> required /> Never
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="colFormLabel" class="col-1"></label>
                            <label for="colFormLabel" class="col-5" style="margin-left: -15px;">Do people who are unfamiliar with your child have difficulty understanding him/her?</label>
                            <div class="col-2">
                                <input type="radio" class="flat" name="parents58" id="parents58" value="Always" <?= ($student_development_domains_data) ? (($student_development_domains_data['people_unfamiliar'] == 'Always') ? "checked" : "") : "" ?> required /> Always
                            </div>
                            <div class="col-2">
                                <input type="radio" class="flat" name="parents58" id="parents58" value="Sometimes" <?= ($student_development_domains_data) ? (($student_development_domains_data['people_unfamiliar'] == 'Sometimes') ? "checked" : "") : "" ?> required /> Sometimes
                            </div>
                            <div class="col-2">
                                <input type="radio" class="flat" name="parents58" id="parents58" value="Never" <?= ($student_development_domains_data) ? (($student_development_domains_data['people_unfamiliar'] == 'Never') ? "checked" : "") : "" ?> required /> Never
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="colFormLabel" class="col-1"></label>
                            <label for="colFormLabel" class="col-5" style="margin-left: -15px;">Does your child verbally express his/her wants and needs?</label>
                            <div class="col-2">
                                <input type="radio" class="flat" name="parents59" id="parents59" value="Always" <?= ($student_development_domains_data) ? (($student_development_domains_data['verbally'] == 'Always') ? "checked" : "") : "" ?> required /> Always
                            </div>
                            <div class="col-2">
                                <input type="radio" class="flat" name="parents59" id="parents59" value="Sometimes" <?= ($student_development_domains_data) ? (($student_development_domains_data['verbally'] == 'Sometimes') ? "checked" : "") : "" ?> required /> Sometimes
                            </div>
                            <div class="col-2">
                                <input type="radio" class="flat" name="parents59" id="parents59" value="Never" <?= ($student_development_domains_data) ? (($student_development_domains_data['verbally'] == 'Never') ? "checked" : "") : "" ?> required /> Never
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="colFormLabel" class="col-1"></label>
                            <label for="colFormLabel" class="col-5" style="margin-left: -15px;">Can your child write words or simple sentences?</label>
                            <div class="col-2">
                                <input type="radio" class="flat" name="parents510" id="parents510" value="Always" <?= ($student_development_domains_data) ? (($student_development_domains_data['write_words'] == 'Always') ? "checked" : "") : "" ?> required /> Always
                            </div>
                            <div class="col-2">
                                <input type="radio" class="flat" name="parents510" id="parents510" value="Sometimes" <?= ($student_development_domains_data) ? (($student_development_domains_data['write_words'] == 'Sometimes') ? "checked" : "") : "" ?> required /> Sometimes
                            </div>
                            <div class="col-2">
                                <input type="radio" class="flat" name="parents510" id="parents510" value="Never" <?= ($student_development_domains_data) ? (($student_development_domains_data['write_words'] == 'Never') ? "checked" : "") : "" ?> required /> Never
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label for="colFormLabel" class="col-1"></label>
                            <label for="colFormLabel" class="col-5" style="margin-left: -15px;">Can your child read?</label>
                            <div class="col-2">
                                <input type="radio" class="flat" name="parents511" id="parents511" value="Always" <?= ($student_development_domains_data) ? (($student_development_domains_data['can_read'] == 'Always') ? "checked" : "") : "" ?> required /> Always
                            </div>
                            <div class="col-2">
                                <input type="radio" class="flat" name="parents511" id="parents511" value="Sometimes" <?= ($student_development_domains_data) ? (($student_development_domains_data['can_read'] == 'Sometimes') ? "checked" : "") : "" ?> required /> Sometimes
                            </div>
                            <div class="col-2">
                                <input type="radio" class="flat" name="parents511" id="parents511" value="Never" <?= ($student_development_domains_data) ? (($student_development_domains_data['can_read'] == 'Never') ? "checked" : "") : "" ?> required /> Never
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
                <div id="step-6">
                    <input type="text" id="parents_survey_id" name="parents_survey_id" value="<?= ($parents_survey_data) ? $parents_survey_data['id'] : NULL; ?>" hidden>
                    <div class="x_title">
                        <h2 style="width: 100%; text-align:center;">Parent's Survey</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <div class="col">
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <label for="colFormLabel" class="col-6" style="margin-left: -15px;">Why do you choose Kids Republic for your child’s education?</label>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <textarea id="" required="required" class="col-8 form-control" name="text_parents61"><?= ($parents_survey_data) ? $parents_survey_data['why_choose'] : "" ?></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <label for="colFormLabel" class="col-6" style="margin-left: -15px;">What kind of education method you think Kids Republic offers?</label>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <textarea id="" required="required" class="col-8 form-control" name="text_parents62"><?= ($parents_survey_data) ? $parents_survey_data['method_think'] : "" ?></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <label for="colFormLabel" class="col-6" style="margin-left: -15px;">What is your hope for your child’s education at Kids Republic School?</label>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <textarea id="" required="required" class="col-8 form-control" name="text_parents63"><?= ($parents_survey_data) ? $parents_survey_data['hope'] : "" ?></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <label for="colFormLabel" class="col-6" style="margin-left: -15px;">Elaborate your opinion on education responsibilities for a child?</label>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <textarea id="" required="required" class="col-8 form-control" name="text_parents64"><?= ($parents_survey_data) ? $parents_survey_data['responsibilities_opinion'] : "" ?></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <label for="colFormLabel" class="col-6" style="margin-left: -15px;">What does your child want to become when he/she grow up?</label>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <textarea id="" required="required" class="col-8 form-control" name="text_parents65"><?= ($parents_survey_data) ? $parents_survey_data['want_to_become'] : "" ?></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <label for="colFormLabel" class="col-6" style="margin-left: -15px;">What do you wish for your child to become when he/she grow up?</label>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <textarea id="" required="required" class="col-8 form-control" name="text_parents66"><?= ($parents_survey_data) ? $parents_survey_data['wish'] : "" ?></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <label for="colFormLabel" class="col-6" style="margin-left: -15px;">What is an ideal curriculum method in your opinion?</label>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <textarea id="" required="required" class="col-8 form-control" name="text_parents67"><?= ($parents_survey_data) ? $parents_survey_data['ideal_curriculum'] : "" ?></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <label for="colFormLabel" class="col-6" style="margin-left: -15px;">What is your opinion on the National Exam (UN) / National Curriculum ?</label>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <textarea id="" required="required" class="col-8 form-control" name="text_parents68"><?= ($parents_survey_data) ? $parents_survey_data['un_opinion'] : "" ?></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <label for="colFormLabel" class="col-6" style="margin-left: -15px;">What is your opinion on International exams / curriculums, such as IB or Cambridge? Which do you prefer?</label>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <textarea id="" required="required" class="col-8 form-control" name="text_parents69"><?= ($parents_survey_data) ? $parents_survey_data['international_exam_opinion'] : "" ?></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <label for="colFormLabel" class="col-6" style="margin-left: -15px;">Which do you prefer using both National and International curriculum, or just one? Please specify</label>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <textarea id="" required="required" class="col-8 form-control" name="text_parents610"><?= ($parents_survey_data) ? $parents_survey_data['curriculum_prefer'] : "" ?></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <label for="colFormLabel" class="col-6" style="margin-left: -15px;">Your hope and expectations for your child in terms of the objectives:</label>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <label for="colFormLabel" class="col-6" style="margin-left: -15px;">Spiritual development target</label>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <textarea id="" required="required" class="col-8 form-control" name="text_parents611"><?= ($parents_survey_data) ? $parents_survey_data['spiritual_hope'] : "" ?></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <label for="colFormLabel" class="col-6" style="margin-left: -15px;">Academics Development target</label>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <textarea id="" required="required" class="col-8 form-control" name="text_parents612"><?= ($parents_survey_data) ? $parents_survey_data['academics_hope'] : "" ?></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <label for="colFormLabel" class="col-6" style="margin-left: -15px;">Global view development target</label>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <textarea id="" required="required" class="col-8 form-control" name="text_parents613"><?= ($parents_survey_data) ? $parents_survey_data['global_view_hope'] : "" ?></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <label for="colFormLabel" class="col-6" style="margin-left: -15px;">Nationality development target</label>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <textarea id="" required="required" class="col-8 form-control" name="text_parents614"><?= ($parents_survey_data) ? $parents_survey_data['nationality_hope'] : "" ?></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <label for="colFormLabel" class="col-6" style="margin-left: -15px;">Social emotional development target</label>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <textarea id="" required="required" class="col-8 form-control" name="text_parents615"><?= ($parents_survey_data) ? $parents_survey_data['social_emotional_hope'] : "" ?></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <label for="colFormLabel" class="col-6" style="margin-left: -15px;">What effort will you make to achieve the targets</label>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <label for="colFormLabel" class="col-6" style="margin-left: -15px;">Spiritual development target</label>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <textarea id="" required="required" class="col-8 form-control" name="text_parents616"><?= ($parents_survey_data) ? $parents_survey_data['spirit_effort'] : "" ?></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <label for="colFormLabel" class="col-6" style="margin-left: -15px;">Academics Development target</label>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <textarea id="" required="required" class="col-8 form-control" name="text_parents617"><?= ($parents_survey_data) ? $parents_survey_data['academics_effort'] : "" ?></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <label for="colFormLabel" class="col-6" style="margin-left: -15px;">Global view development target</label>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <textarea id="" required="required" class="col-8 form-control" name="text_parents618"><?= ($parents_survey_data) ? $parents_survey_data['global_view_effort'] : "" ?></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <label for="colFormLabel" class="col-6" style="margin-left: -15px;">Nationality development target</label>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <textarea id="" required="required" class="col-8 form-control" name="text_parents619"><?= ($parents_survey_data) ? $parents_survey_data['nationality_effort'] : "" ?></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <label for="colFormLabel" class="col-6" style="margin-left: -15px;">Social emotional development target</label>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <textarea id="" required="required" class="col-8 form-control" name="text_parents620"><?= ($parents_survey_data) ? $parents_survey_data['social_emotional_effort'] : "" ?></textarea>
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
                <div id="step-7">
                    <div class="x_title">
                        <h2 style="width: 100%; text-align:center;">Finish</h2>
                        <div class="clearfix"></div>
                    </div>

                    <div class="form-group">
                        <div class="col">
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <label for="colFormLabel" class="col-6" style="margin-left: -15px;">Write 5 words to describe your child</label>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <textarea id="" required="required" class="col-8 form-control" name="text_parents71"><?= ($parents_survey_data) ? $parents_survey_data['child_describe'] : "" ?></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <label for="colFormLabel" class="col-6" style="margin-left: -15px;">If you find your children in these situations, how do you choose to respond?</label>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <label for="colFormLabel" class="col-6" style="margin-left: -15px;">Demotivation</label>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <textarea id="" required="required" class="col-8 form-control" name="text_parents72"><?= ($parents_survey_data) ? $parents_survey_data['demotivation_respond'] : "" ?></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <label for="colFormLabel" class="col-6" style="margin-left: -15px;">Bullying</label>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <textarea id="" required="required" class="col-8 form-control" name="text_parents73"><?= ($parents_survey_data) ? $parents_survey_data['bullying_respond'] : "" ?></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <label for="colFormLabel" class="col-6" style="margin-left: -15px;">Cheating</label>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <textarea id="" required="required" class="col-8 form-control" name="text_parents74"><?= ($parents_survey_data) ? $parents_survey_data['cheating_respond'] : "" ?></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <label for="colFormLabel" class="col-6" style="margin-left: -15px;">Failure to complete homework / assignment</label>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <textarea id="" required="required" class="col-8 form-control" name="text_parents75"><?= ($parents_survey_data) ? $parents_survey_data['failure_respond'] : "" ?></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <label for="colFormLabel" class="col-6" style="margin-left: -15px;">Lateness to school</label>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <textarea id="" required="required" class="col-8 form-control" name="text_parents76"><?= ($parents_survey_data) ? $parents_survey_data['lateness_respond'] : "" ?></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <label for="colFormLabel" class="col-6" style="margin-left: -15px;">Who interacts most often with your child at home?</label>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <textarea id="" required="required" class="col-8 form-control" name="text_parents77"><?= ($parents_survey_data) ? $parents_survey_data['most_interacts'] : "" ?></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <label for="colFormLabel" class="col-6" style="margin-left: -15px;">How is your communication with your child at home? Please give examples</label>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <textarea id="" required="required" class="col-8 form-control" name="text_parents78"><?= ($parents_survey_data) ? $parents_survey_data['communication'] : "" ?></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <label for="colFormLabel" class="col-6" style="margin-left: -15px;">How is the ideas school - parents relationship in helping the child to excel</label>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <textarea id="" required="required" class="col-8 form-control" name="text_parents79"><?= ($parents_survey_data) ? $parents_survey_data['ideas'] : "" ?></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <label for="colFormLabel" class="col-6" style="margin-left: -15px;">As parents may be aware, Kids Republic school is a private school which the school fees are obligated to parent. If you deal with financing problem in the future what will you do to finance your child's education?</label>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <textarea id="" required="required" class="col-8 form-control" name="text_parents710"><?= ($parents_survey_data) ? $parents_survey_data['finance'] : "" ?></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <label for="colFormLabel" class="col-6" style="margin-left: -15px;">What is your opinion on student's independence?</label>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <textarea id="" required="required" class="col-8 form-control" name="text_parents711"><?= ($parents_survey_data) ? $parents_survey_data['student_independence'] : "" ?></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <label for="colFormLabel" class="col-6" style="margin-left: -15px;">What will you do to train your child's independence at home?</label>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <textarea id="" required="required" class="col-8 form-control" name="text_parents712"><?= ($parents_survey_data) ? $parents_survey_data['independence_train'] : "" ?></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <label for="colFormLabel" class="col-6" style="margin-left: -15px;">According to your opinion, are the student's belongings be the school or student's responsibilities? Please explain your answer.</label>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <textarea id="" required="required" class="col-8 form-control" name="text_parents713"><?= ($parents_survey_data) ? $parents_survey_data['parents_opinion'] : "" ?></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <label for="colFormLabel" class="col-6" style="margin-left: -15px;">Why do you thing are you eligible to be accepted at Kids Republic School</label>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <textarea id="" required="required" class="col-8 form-control" name="text_parents714"><?= ($parents_survey_data) ? $parents_survey_data['eligible'] : "" ?></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <label for="colFormLabel" class="col-6" style="margin-left: -15px;">What contribution will you make to the school, once you are accepted?</label>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <textarea id="" required="required" class="col-8 form-control" name="text_parents715"><?= ($parents_survey_data) ? $parents_survey_data['contribution'] : "" ?></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <label for="colFormLabel" class="col-6" style="margin-left: -15px;">Personal notes to the school</label>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <textarea id="" required="required" class="col-8 form-control" name="text_parents716"><?= ($parents_survey_data) ? $parents_survey_data['school_notes'] : "" ?></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <label for="colFormLabel" class="col-6" style="margin-left: -15px;">Personal notes to homeroom teachers</label>
                            </div>
                            <div class="row">
                                <label for="colFormLabel" class="col-2"></label>
                                <textarea id="" required="required" class="col-8 form-control" name="text_parents717"><?= ($parents_survey_data) ? $parents_survey_data['teacher_notes'] : "" ?></textarea>
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