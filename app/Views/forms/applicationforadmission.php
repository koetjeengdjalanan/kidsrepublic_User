<?= $this->extend('layouts_dev/master_user') ?>
<?= $this->section('content') ?>
<?php #dd($form_file_data) 
?>
<div class="col-md-10 my-2 overflow-auto" style="background: white; border-radius: 19px; height:92.5vh">
    <?= $this->include('layouts_dev/flashdata') ?>
    <form action="<?= base_url('user/saveAdmission') ?>" style="width: 100%;" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div id="wizard" class="form_wizard wizard_horizontal my-5">
            <ul class="wizard_steps">
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
                            <small>Parent Particular’s</small>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#step-3">
                        <span class="step_no">3</span>
                        <span class="step_descr">
                            <small>Child Interest <br> & Background </small>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#step-4">
                        <span class="step_no">4</span>
                        <span class="step_descr">
                            <small>Information & Declaration</small>
                        </span>
                    </a>
                </li>
            </ul>
            <form style="width: 100%;">
                <div id="step-1">
                    <input type="text" id="nis" name="nis" value="<?= ($student_details_data) ? $student_details_data['nis'] : NULL ?>" hidden>
                    <div class="form-group row">
                        <label for="name" class="col-3 col-form-label text-right">Full Name *</label>
                        <div class="col-md-5"><input name="name" type="text" class="form-control" id="name" value="<?= ($student_details_data) ? $student_details_data['name'] : "" ?>" /><small>As in birth certificate</small></div>
                        <div class="col-md-4">
                            <div id="gender" class="btn-group" data-toggle="buttons">
                                <label class="btn btn-primary border" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default"> <input type="radio" name="gender" value="male" class="join-btn" <?= ($student_details_data) ? (($student_details_data['gender'] == 'Male') ? "checked" : "") : "" ?> /> &nbsp; Male &nbsp; </label>
                                <label class="btn btn-primary border" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default"> <input type="radio" name="gender" value="female" class="join-btn" <?= ($student_details_data) ? (($student_details_data['gender'] == 'Female') ? "checked" : "") : "" ?> /> Female </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="place_of_birth" class="col-3 col-form-label text-right">Place of Birth *</label>
                        <div class="col-md-3">
                            <input name="place_of_birth" type="text" class="form-control" id="place_of_birth" name="place_of_birth" value="<?= ($student_details_data) ? $student_details_data['pob'] : "" ?>" />
                        </div>
                        <label class="col-form-label col-2 label-align">Date Of Birth <span class="required">*</span>
                        </label>
                        <div class="col-md-2">
                            <input name="birthday" id="birthday" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" value="<?= ($student_details_data) ? $student_details_data['dob'] : "" ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nationality" class="col-3 col-form-label text-right">Nationality *</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" id="nationality" name="nationality" value="<?= ($student_details_data) ? $student_details_data['nationality'] : "" ?>" />
                        </div>
                        <label for="religion" class="col-2 col-form-label text-right">Religion *</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" id="religion" name="religion" value="<?= ($student_details_data) ? $student_details_data['religion'] : "" ?>" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="birth_order" class="col-3 col-form-label text-right">Birth Order *</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" id="birth_order" name="birth_order" value="<?= ($student_details_data) ? $student_details_data['birth_o'] : "" ?>" />
                        </div>
                        <label for="no_siblings" class="col-2 col-form-label text-right">No. Siblings *</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" id="no_siblings" name="no_siblings" value="<?= ($student_details_data) ? $student_details_data['tnoc'] : "" ?>" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name_previous_school" class="col-3 col-form-label text-right">Name of Previous School </label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" id="name_previous_school" name="name_previous_school" value="<?= ($student_details_data) ? $student_details_data['prev_school'] : "" ?>" />
                        </div>
                        <label for="address_previous_school" class="col-2 col-form-label text-right">Address of Previous School </label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" id="address_previous_school" name="address_previous_school" value="<?= ($student_details_data) ? $student_details_data['addprev_school'] : "" ?>" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nisn" class="col-3 col-form-label text-right">NISN</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" id="nisn" name="nisn" value="<?= ($student_details_data) ? $student_details_data['nisn'] : "" ?>" />
                        </div>
                        <label for="spoken_language" class="col-2 col-form-label text-right">Spoken Language *</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" id="spoken_language" name="spoken_language" value="<?= ($student_details_data) ? $student_details_data['language'] : "" ?>" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="home_address" class="col-3 col-form-label text-right">Home Address *</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" id="home_address" name="home_address" value="<?= ($student_details_data) ? $student_details_data['address'] : "" ?>" />
                        </div>
                        <label for="postal_code" class="col-2 col-form-label text-right">Postal Code *</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" id="postal_code" name="postal_code" value="<?= ($student_details_data) ? $student_details_data['postal_code'] : "" ?>" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="city" class="col-3 col-form-label text-right">City *</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" id="city" name="city" value="<?= ($student_details_data) ? $student_details_data['city'] : "" ?>" />
                        </div>
                        <label for="home_distance" class="col-2 col-form-label text-right">Home Distance to School *</label>
                        <div class="col-md-2"><input type="text" class="form-control" id="home_distance" name="home_distance" value="<?= ($student_details_data) ? $student_details_data['distance'] : "" ?>" /><small>Km</small></div>
                    </div>
                    <div class="form-group row">
                        <label for="phone_number" class="col-3 col-form-label text-right">Phone Number *</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?= ($student_details_data) ? $student_details_data['phone'] : "" ?>" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabel" class="col-3 col-form-label text-right">Going to School by *</label>
                        <div class="col-md-9">
                            <div id="gender" class="btn-group" data-toggle="buttons">
                                <label class="btn bg-primary border" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default"> <input type="radio" class="join-btn" name="vehicle" <?= ($student_details_data) ? (($student_details_data['vehicle'] == 'Private Vehicle') ? "checked" : "") : "" ?> value="Private Vehicle" />Car/Motorcycle/Bicycle </label>
                                <label class="btn bg-primary border" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default"> <input type="radio" class="join-btn" name="vehicle" <?= ($student_details_data) ? (($student_details_data['vehicle'] == 'Public Transport') ? "checked" : "") : "" ?> value="Public Transport" />Public Transport </label>
                                <label class="btn bg-primary border" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default"> <input type="radio" class="join-btn" name="vehicle" <?= ($student_details_data) ? (($student_details_data['vehicle'] == 'Walking') ? "checked" : "") : "" ?> value="Walking" />Walking </label>
                                <label class="btn bg-primary border" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default"> <input type="radio" class="join-btn" name="vehicle" <?= ($student_details_data) ? (($student_details_data['vehicle'] == 'Shuttle Bus') ? "checked" : "") : "" ?> value="Shuttle Bus" />Shuttle Bus </label>
                                <label class="btn bg-primary border" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default"> <input type="radio" class="join-btn" name="vehicle" <?= ($student_details_data) ? (($student_details_data['vehicle'] == 'Others') ? "checked" : "") : "" ?> value="Others" />Others </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="profile_pict" class="col-3 col-form-label text-right">Photo 3x4*</label>
                        <div class="col-md-3">
                            <input type="file" class="form-control" id="profile_pict" name="profile_pict" />
                        </div>
                        <div class="col-md-3">
                            <img src="<?= ($form_file_data) ? (($form_file_data['profile_pict']) ? base_url("/assets/upload/profile/") . '/' . $form_file_data['profile_pict'] : NULL) : NULL ?>" style="height: 236px; width: 177px;" />
                            <input type="text" class="form-control" id="old_photo" name="old_photo" value="<?= ($form_file_data) ? $form_file_data['profile_pict'] : NULL ?>" hidden />
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
                    <input type="text" id="fathers_id" name="fathers_id" value="<?= ($fathers_particular_data) ? $fathers_particular_data['id'] : NULL ?>" hidden>
                    <input type="text" id="mothers_id" name="mothers_id" value="<?= ($mothers_particular_data) ? $mothers_particular_data['id'] : NULL ?>" hidden>
                    <div class="item form-group">
                        <label class="col-form-label col-3 label-align" for="fathers_name">Father’s Name<span class="required">*</span>
                        </label>
                        <div class="col-md-3">
                            <input type="text" id="fathers_name" name="fathers_name" required="required" class="form-control " value="<?= ($fathers_particular_data) ? $fathers_particular_data['name'] : "" ?>"><small>As in Birth Certificate</small>
                        </div>
                        <label class="col-form-label col-2 label-align" for="mothers_name">Mother's Name<span class="required">*</span>
                        </label>
                        <div class="col-md-3">
                            <input type="text" id="mothers_name" name="mothers_name" required="required" class="form-control " value="<?= ($mothers_particular_data) ? $mothers_particular_data['name'] : "" ?>"><small>As in Birth Certificate</small>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-3 label-align" for="fathers_pob">Place of Birth<span class="required">*</span>
                        </label>
                        <div class="col-md-3">
                            <input type="text" id="fathers_pob" name="fathers_pob" required="required" class="form-control " value="<?= ($fathers_particular_data) ? $fathers_particular_data['pob'] : "" ?>">
                        </div>
                        <label class="col-form-label col-2 label-align" for="mothers_pob">Place of Birth<span class="required">*</span>
                        </label>
                        <div class="col-md-3">
                            <input type="text" id="mothers_pob" name="mothers_pob" required="required" class="form-control " value="<?= ($mothers_particular_data) ? $mothers_particular_data['pob'] : "" ?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-3 label-align">Date Of Birth <span class="required">*</span>
                        </label>
                        <div class="col-md-3">
                            <input id="birthday" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" name="fathers_dob" value="<?= ($fathers_particular_data) ? $fathers_particular_data['dob'] : "" ?>">
                        </div>
                        <label class="col-form-label col-2 label-align">Date Of Birth <span class="required">*</span>
                        </label>
                        <div class="col-md-3">
                            <input id="birthday" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" name="mothers_dob" value="<?= ($mothers_particular_data) ? $mothers_particular_data['dob'] : "" ?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-3 label-align" for="fathers_nationality">Nationality<span class="required">*</span>
                        </label>
                        <div class="col-md-3">
                            <input type="text" id="fathers_nationality" name="fathers_nationality" required="required" class="form-control " value="<?= ($fathers_particular_data) ? $fathers_particular_data['nationality'] : "" ?>">
                        </div>
                        <label class="col-form-label col-2 label-align" for="mothers_nationality">Nationality<span class="required">*</span>
                        </label>
                        <div class="col-md-3">
                            <input type="text" id="mothers_nationality" name="mothers_nationality" required="required" class="form-control " value="<?= ($mothers_particular_data) ? $mothers_particular_data['nationality'] : "" ?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-3 label-align" for="fathers_religion">Religion<span class="required">*</span>
                        </label>
                        <div class="col-md-3">
                            <input type="text" id="fathers_religion" name="fathers_religion" required="required" class="form-control " value="<?= ($fathers_particular_data) ? $fathers_particular_data['religion'] : "" ?>">
                        </div>
                        <label class="col-form-label col-2 label-align" for="mothers_religion">Religion<span class="required">*</span>
                        </label>
                        <div class="col-md-3">
                            <input type="text" id="mothers_religion" name="mothers_religion" required="required" class="form-control " value="<?= ($mothers_particular_data) ? $mothers_particular_data['religion'] : "" ?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-3 label-align" for="first-name">ID Type<span class="required">*</span>
                        </label>
                        <div class="col-md-3">
                            <div id="fathers_id_type" class="btn-group" data-toggle="buttons">
                                <label class="btn btn-primary border" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default"> <input type="radio" name="fathers_id_type" value="National ID Card" class="join-btn" <?= ($fathers_particular_data) ? (($fathers_particular_data['id_type'] == 'National ID Card') ? "checked" : "") : "" ?> /> &nbsp; KTP &nbsp; </label>
                                <label class="btn btn-primary border" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default"> <input type="radio" name="fathers_id_type" value="Driver License" class="join-btn" <?= ($fathers_particular_data) ? (($fathers_particular_data['id_type'] == 'Driver License') ? "checked" : "") : "" ?> /> SIM </label>
                                <label class="btn btn-primary border" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default"> <input type="radio" name="fathers_id_type" value="Passport" class="join-btn" <?= ($fathers_particular_data) ? (($fathers_particular_data['id_type'] == 'Passport') ? "checked" : "") : "" ?> /> Passport </label>
                            </div>
                        </div>
                        <label class="col-form-label col-2 label-align" for="first-name">ID Type<span class="required">*</span>
                        </label>
                        <div class="col-md-3">
                            <div id="mothers_id_type" class="btn-group" data-toggle="buttons">
                                <label class="btn btn-primary border" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default"> <input type="radio" name="mothers_id_type" value="National ID Card" class="join-btn" <?= ($mothers_particular_data) ? (($mothers_particular_data['id_type'] == 'National ID Card') ? "checked" : "") : "" ?> /> &nbsp; KTP &nbsp; </label>
                                <label class="btn btn-primary border" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default"> <input type="radio" name="mothers_id_type" value="Driver License" class="join-btn" <?= ($mothers_particular_data) ? (($mothers_particular_data['id_type'] == 'Driver License') ? "checked" : "") : "" ?> /> SIM </label>
                                <label class="btn btn-primary border" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default"> <input type="radio" name="mothers_id_type" value="Passport" class="join-btn" <?= ($mothers_particular_data) ? (($mothers_particular_data['id_type'] == 'Passport') ? "checked" : "") : "" ?> /> Passport </label>
                            </div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-3 label-align" for="fathers_id_number">ID Number<span class="required">*</span>
                        </label>
                        <div class="col-md-3">
                            <input type="text" id="fathers_id_number" name="fathers_id_number" required="required" class="form-control " value="<?= ($fathers_particular_data) ? $fathers_particular_data['id_number'] : "" ?>">
                        </div>
                        <label class="col-form-label col-2 label-align" for="mothers_id_number">ID Number<span class="required">*</span>
                        </label>
                        <div class="col-md-3">
                            <input type="text" id="mothers_id_number" name="mothers_id_number" required="required" class="form-control " value="<?= ($mothers_particular_data) ? $mothers_particular_data['id_number'] : "" ?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-3 label-align" for="fathers_education">Last Education Title<span class="required">*</span>
                        </label>
                        <div class="col-md-3">
                            <input type="text" id="fathers_education" name="fathers_education" required="required" class="form-control " value="<?= ($fathers_particular_data) ? $fathers_particular_data['last_education'] : "" ?>">
                        </div>
                        <label class="col-form-label col-2 label-align" for="mothers_education">Last Education Title<span class="required">*</span>
                        </label>
                        <div class="col-md-3">
                            <input type="text" id="mothers_education" name="mothers_education" required="required" class="form-control " value="<?= ($mothers_particular_data) ? $mothers_particular_data['last_education'] : "" ?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-3 label-align" for="fathers_major">Major<span class="required">*</span>
                        </label>
                        <div class="col-md-3">
                            <input type="text" id="fathers_major" name="fathers_major" required="required" class="form-control " value="<?= ($fathers_particular_data) ? $fathers_particular_data['major'] : "" ?>">
                        </div>
                        <label class="col-form-label col-2 label-align" for="mothers_major">Major<span class="required">*</span>
                        </label>
                        <div class="col-md-3">
                            <input type="text" id="mothers_major" name="mothers_major" required="required" class="form-control " value="<?= ($mothers_particular_data) ? $mothers_particular_data['major'] : "" ?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-3 label-align" for="fathers_university">University Name<span class="required">*</span>
                        </label>
                        <div class="col-md-3">
                            <input type="text" id="fathers_university" name="fathers_university" required="required" class="form-control " value="<?= ($fathers_particular_data) ? $fathers_particular_data['univ_name'] : "" ?>">
                        </div>
                        <label class="col-form-label col-2 label-align" for="mothers_university">University Name<span class="required">*</span>
                        </label>
                        <div class="col-md-3">
                            <input type="text" id="mothers_university" name="mothers_university" required="required" class="form-control " value="<?= ($mothers_particular_data) ? $mothers_particular_data['univ_name'] : "" ?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-3 label-align" for="fathers_address">Home Address<span class="required">*</span>
                        </label>
                        <div class="col-md-3">
                            <input type="text" id="fathers_address" name="fathers_address" required="required" class="form-control " value="<?= ($fathers_particular_data) ? $fathers_particular_data['home_address'] : "" ?>">
                        </div>
                        <label class="col-form-label col-2 label-align" for="mothers_address">Home Address<span class="required">*</span>
                        </label>
                        <div class="col-md-3">
                            <input type="text" id="mothers_address" name="mothers_address" required="required" class="form-control " value="<?= ($mothers_particular_data) ? $mothers_particular_data['home_address'] : "" ?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-3 label-align" for="fathers_city">City<span class="required">*</span>
                        </label>
                        <div class="col-md-3">
                            <input type="text" id="fathers_city" name="fathers_city" required="required" class="form-control " value="<?= ($fathers_particular_data) ? $fathers_particular_data['city'] : "" ?>">
                        </div>
                        <label class="col-form-label col-2 label-align" for="mothers_city">City<span class="required">*</span>
                        </label>
                        <div class="col-md-3">
                            <input type="text" id="mothers_city" name="mothers_city" required="required" class="form-control " value="<?= ($mothers_particular_data) ? $mothers_particular_data['city'] : "" ?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-3 label-align" for="fathers_postal">Postal Code<span class="required">*</span>
                        </label>
                        <div class="col-md-3">
                            <input type="text" id="fathers_postal" name="fathers_postal" required="required" class="form-control " value="<?= ($fathers_particular_data) ? $fathers_particular_data['postal'] : "" ?>">
                        </div>
                        <label class="col-form-label col-2 label-align" for="mothers_postal">Postal Code<span class="required">*</span>
                        </label>
                        <div class="col-md-3">
                            <input type="text" id="mothers_postal" name="mothers_postal" required="required" class="form-control " value="<?= ($mothers_particular_data) ? $mothers_particular_data['postal'] : "" ?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-3 label-align" for="fathers_phone">Phone Number<span class="required">*</span>
                        </label>
                        <div class="col-md-3">
                            <input type="text" id="fathers_phone" name="fathers_phone" required="required" class="form-control " value="<?= ($fathers_particular_data) ? $fathers_particular_data['phone_number'] : "" ?>">
                        </div>
                        <label class="col-form-label col-2 label-align" for="mothers_phone">Phone Number<span class="required">*</span>
                        </label>
                        <div class="col-md-3">
                            <input type="text" id="mothers_phone" name="mothers_phone" required="required" class="form-control " value="<?= ($mothers_particular_data) ? $mothers_particular_data['phone_number'] : "" ?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-3 label-align" for="fathers_email">Email<span class="required">*</span>
                        </label>
                        <div class="col-md-3">
                            <input type="text" id="fathers_email" name="fathers_email" required="required" class="form-control " value="<?= ($fathers_particular_data) ? $fathers_particular_data['email'] : "" ?>">
                        </div>
                        <label class="col-form-label col-2 label-align" for="mothers_email">Email<span class="required">*</span>
                        </label>
                        <div class="col-md-3">
                            <input type="text" id="mothers_email" name="mothers_email" required="required" class="form-control " value="<?= ($mothers_particular_data) ? $mothers_particular_data['email'] : "" ?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-3 label-align" for="fathers_occupation">Occupation<span class="required">*</span>
                        </label>
                        <div class="col-md-3">
                            <input type="text" id="fathers_occupation" name="fathers_occupation" required="required" class="form-control " value="<?= ($fathers_particular_data) ? $fathers_particular_data['occu'] : "" ?>">
                        </div>
                        <label class="col-form-label col-2 label-align" for="mothers_occupation">Occupation<span class="required">*</span>
                        </label>
                        <div class="col-md-3">
                            <input type="text" id="mothers_occupation" name="mothers_occupation" required="required" class="form-control " value="<?= ($mothers_particular_data) ? $mothers_particular_data['occu'] : "" ?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-3 label-align" for="fathers_position">Position<span class="required">*</span>
                        </label>
                        <div class="col-md-3">
                            <input type="text" id="fathers_position" name="fathers_position" required="required" class="form-control " value="<?= ($fathers_particular_data) ? $fathers_particular_data['post'] : "" ?>">
                        </div>
                        <label class="col-form-label col-2 label-align" for="mothers_position">Position<span class="required">*</span>
                        </label>
                        <div class="col-md-3">
                            <input type="text" id="mothers_position" name="mothers_position" required="required" class="form-control " value="<?= ($mothers_particular_data) ? $mothers_particular_data['post'] : "" ?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-3 label-align" for="fathers_institution">Name of Institution<span class="required">*</span>
                        </label>
                        <div class="col-md-3">
                            <input type="text" id="fathers_institution" name="fathers_institution" required="required" class="form-control " value="<?= ($fathers_particular_data) ? $fathers_particular_data['inst_name'] : "" ?>">
                        </div>
                        <label class="col-form-label col-2 label-align" for="mothers_institution">Name of Institution<span class="required">*</span>
                        </label>
                        <div class="col-md-3">
                            <input type="text" id="mothers_institution" name="mothers_institution" required="required" class="form-control " value="<?= ($mothers_particular_data) ? $mothers_particular_data['inst_name'] : "" ?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-3 label-align" for="fathers_office">Office Address<span class="required">*</span>
                        </label>
                        <div class="col-md-3">
                            <input type="text" id="fathers_office" name="fathers_office" required="required" class="form-control " value="<?= ($fathers_particular_data) ? $fathers_particular_data['office_address'] : "" ?>">
                        </div>
                        <label class="col-form-label col-2 label-align" for="mothers_office">Office Address<span class="required">*</span>
                        </label>
                        <div class="col-md-3">
                            <input type="text" id="mothers_office" name="mothers_office" required="required" class="form-control " value="<?= ($mothers_particular_data) ? $mothers_particular_data['office_address'] : "" ?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-3 label-align" for="first-name">Relationship with Child<span class="required">*</span>
                        </label>
                        <div class="col-md-3">
                            <div id="fathers_relationship" class="btn-group" data-toggle="buttons">
                                <label class="btn btn-primary border" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default"> <input type="radio" name="fathers_relationship" value="Biological" class="join-btn" <?= ($fathers_particular_data) ? (($fathers_particular_data['child_relation'] == 'Biological') ? "checked" : "") : "" ?> /> &nbsp; Biological &nbsp; </label>
                                <label class="btn btn-primary border" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default"> <input type="radio" name="fathers_relationship" value="Guardian" class="join-btn" <?= ($fathers_particular_data) ? (($fathers_particular_data['child_relation'] == 'Guardian') ? "checked" : "") : "" ?> /> Guardian </label>
                            </div>
                        </div>
                        <label class="col-form-label col-2 label-align" for="first-name">Relationship with Child<span class="required">*</span>
                        </label>
                        <div class="col-md-3">
                            <div id="mothers_relationship" class="btn-group" data-toggle="buttons">
                                <label class="btn btn-primary border" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default"> <input type="radio" name="mothers_relationship" value="Biological" class="join-btn" <?= ($mothers_particular_data) ? (($mothers_particular_data['child_relation'] == 'Biological') ? "checked" : "") : "" ?> /> &nbsp; Biological &nbsp; </label>
                                <label class="btn btn-primary border" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default"> <input type="radio" name="mothers_relationship" value="Guardian" class="join-btn" <?= ($mothers_particular_data) ? (($mothers_particular_data['child_relation'] == 'Guardian') ? "checked" : "") : "" ?> /> Guardian </label>
                            </div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-3 label-align" for="fathers_status">Marital Status<span class="required">*</span>
                        </label>
                        <div class="col-md-3">
                            <input type="text" id="fathers_status" name="fathers_status" required="required" class="form-control " value="<?= ($fathers_particular_data) ? $fathers_particular_data['marital_status'] : "" ?>">
                        </div>
                        <label class="col-form-label col-2 label-align" for="mothers_status">Marital Status<span class="required">*</span>
                        </label>
                        <div class="col-md-3">
                            <input type="text" id="mothers_status" name="mothers_status" required="required" class="form-control " value="<?= ($mothers_particular_data) ? $mothers_particular_data['marital_status'] : "" ?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-3 label-align" for="fathers_lives">The Child Lives with<span class="required">*</span>
                        </label>
                        <div class="col-md-3">
                            <input type="text" id="fathers_lives" name="fathers_lives" required="required" class="form-control " value="<?= ($fathers_particular_data) ? $fathers_particular_data['child_live'] : "" ?>">
                        </div>
                        <label class="col-form-label col-2 label-align" for="mothers_lives">The Child Lives with<span class="required">*</span>
                        </label>
                        <div class="col-md-3">
                            <input type="text" id="mothers_lives" name="mothers_lives" required="required" class="form-control " value="<?= ($mothers_particular_data) ? $mothers_particular_data['child_live'] : "" ?>">
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
                    <input type="text" id="student_interest_id" name="student_interest_id" value="<?= ($student_interest_data) ? $student_interest_data['id'] : NULL ?>" hidden>
                    <div class="x_title">
                        <h2 style="width: 100%; text-align:center;">Child Talent/Interest</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-3 label-align" for="arts">Arts</label>
                        <div class="col-md-7">
                            <input type="text" id="arts" name="arts" class="form-control " value="<?= ($student_interest_data) ? $student_interest_data['arts'] : "" ?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-3 label-align" for="music">Music</label>
                        <div class="col-md-7">
                            <input type="text" id="music" name="music" class="form-control " value="<?= ($student_interest_data) ? $student_interest_data['music'] : "" ?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-3 label-align" for="cognitive">Cognitive</label>
                        <div class="col-md-7">
                            <input type="text" id="cognitive" name="cognitive" class="form-control " value="<?= ($student_interest_data) ? $student_interest_data['cognitive'] : "" ?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-3 label-align" for="sport">Sport</label>
                        <div class="col-md-7">
                            <input type="text" id="sport" name="sport" class="form-control " value="<?= ($student_interest_data) ? $student_interest_data['sport'] : "" ?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-3 label-align" for="organization_community">Organization / Community</label>
                        <div class="col-md-7">
                            <input type="text" id="organization_community" name="organization_community" class="form-control " value="<?= ($student_interest_data) ? $student_interest_data['organization_community'] : "" ?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-3 label-align" for="others_talent">Others</label>
                        <div class="col-md-7">
                            <input type="text" id="others_talent" name="others_talent" class="form-control " value="<?= ($student_interest_data) ? $student_interest_data['others'] : "" ?>">
                        </div>
                    </div>
                    <div class="x_title">
                        <h2 style="width: 100%; text-align:center;">Child Background Education</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="item form-group">
                        <div class="col" style="width: 100%;">
                            <div class="text-center">
                                <label class="col-form-label" for="first-name">School Type</label>
                            </div> <br>
                            <div>
                                <label class="col-form-label label-align" for="first-name">(Preschool)</label>
                            </div> <br>
                            <div>
                                <label class="col-form-label label-align" for="first-name">(Primary School)</label>
                            </div> <br>
                            <div>
                                <label class="col-form-label label-align" for="first-name">Others</label>
                            </div> <br>
                        </div>
                        <div class="col" style="width: 100%;">
                            <div class="text-center">
                                <label class="col-form-label" for="first-name">Previous School Name</label>
                            </div> <br>
                            <div>
                                <input type="text" id="preschool_prev_name" name="preschool_prev_name" class="form-control " value="<?= ($preschool_data) ? $preschool_data['prev_school_name'] : "" ?>">
                            </div> <br>
                            <div>
                                <input type="text" id="primary_prev_name" name="primary_prev_name" class="form-control " value="<?= ($primary_data) ? $primary_data['prev_school_name'] : "" ?>">
                            </div> <br>
                            <div>
                                <input type="text" id="others_edu_prev_name" name="others_edu_prev_name" class="form-control " value="<?= ($others_edu_data) ? $others_edu_data['prev_school_name'] : "" ?>">
                            </div> <br>
                        </div>
                        <div class="col" style="width: 100%;">
                            <div class="text-center">
                                <label class="col-form-label label-align" for="first-name">Year</label>
                            </div> <br>
                            <div>
                                <input type="text" id="preschool_year" name="preschool_year" class="form-control " value="<?= ($preschool_data) ? $preschool_data['year'] : "" ?>">
                            </div> <br>
                            <div>
                                <input type="text" id="primary_year" name="primary_year" class="form-control " value="<?= ($primary_data) ? $primary_data['year'] : "" ?>">
                            </div> <br>
                            <div>
                                <input type="text" id="others_edu_year" name="others_edu_year" class="form-control " value="<?= ($others_edu_data) ? $others_edu_data['year'] : "" ?>">
                            </div> <br>
                        </div>
                        <div class="col" style="width: 100%;">
                            <div class="text-center">
                                <label class="col-form-label label-align" for="first-name">Address</label>
                            </div> <br>
                            <div>
                                <input type="text" id="preschool_address" name="preschool_address" class="form-control " value="<?= ($preschool_data) ? $preschool_data['address'] : "" ?>">
                            </div> <br>
                            <div>
                                <input type="text" id="primary_address" name="primary_address" class="form-control " value="<?= ($primary_data) ? $primary_data['address'] : "" ?>">
                            </div> <br>
                            <div>
                                <input type="text" id="others_edu_address" name="others_edu_address" class="form-control " value="<?= ($others_edu_data) ? $others_edu_data['address'] : "" ?>">
                            </div> <br>
                        </div>
                        <div class="col" style="width: 100%;">
                            <div class="text-center">
                                <label class="col-form-label label-align" for="first-name">City</label>
                            </div> <br>
                            <div>
                                <input type="text" id="preschool_city" name="preschool_city" class="form-control " value="<?= ($preschool_data) ? $preschool_data['city'] : "" ?>">
                            </div> <br>
                            <div>
                                <input type="text" id="primary_city" name="primary_city" class="form-control " value="<?= ($primary_data) ? $primary_data['city'] : "" ?>">
                            </div> <br>
                            <div>
                                <input type="text" id="others_edu_city" name="others_edu_city" class="form-control " value="<?= ($others_edu_data) ? $others_edu_data['city'] : "" ?>">
                            </div> <br>
                        </div>
                    </div>
                    <div class="x_title">
                        <h2 style="width: 100%; text-align:center;">Child Non-Formal Education Background/Extraculiculer Activities</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div id="col_nonformal_edu">
                        <?php if ($student_background_nonformal_edu_data) :
                            $total_nonFormalEdu = count($student_background_nonformal_edu_data);
                        ?>
                            <input type="text" name="total_nonFormalEdu" id="total_nonFormalEdu" value="<?= $total_nonFormalEdu ?>" hidden>
                            <input type="text" name="count_nonFormalEdu" id="count_nonFormalEdu" value="<?= $total_nonFormalEdu ?>" hidden>
                            <?php foreach ($student_background_nonformal_edu_data as $key => $value) :
                                $key += 1;
                                $student_nonformal_id = $value['id'];
                                $student_nonformal_lesson_activities = $value['lesson_activities'];
                                $student_nonformal_location = $value['location'];
                                $student_nonformal_days_week = $value['days_week'];
                                $student_nonformal_hours_session = $value['hours_session'];
                                $student_nonformal_start_year = $value['start_year'];
                                $student_nonformal_end_year = $value['end_year'];
                            ?>
                                <input type="text" name="student_background_nonformal_edu_id_<?= $key ?>" id="student_background_nonformal_edu_id_<?= $key ?>" value="<?= $student_nonformal_id ?>" hidden>
                                <div class="row" style="width: 100%;" id="lesson_activities_row_<?= $key ?>"><label class="col-12 col-sm-12 col-md-2 offset-md-2">Type of Lesson/Activities</label>
                                    <div class="col-12 col-sm-12 col-md-5"><input type="text" id="lesson_activities_<?= $key ?>" name="lesson_activities_<?= $key ?>" class="form-control " value="<?= $student_nonformal_lesson_activities ?>"></div>
                                </div>
                                <div class="row" style="width: 100%;" id="location_nonformal_edu_row_<?= $key ?>"><label class="col-12 col-sm-12 col-md-2 offset-md-2">Location</label>
                                    <div class="col-12 col-sm-12 col-md-5"><input type="text" id="location_nonformal_edu_<?= $key ?>" name="location_nonformal_edu_<?= $key ?>" class="form-control " value="<?= $student_nonformal_location ?>"></div>
                                </div>
                                <div class="row" style="width: 100%;" id="daysweek_nonformal_edu_row_<?= $key ?>"><label class="col-12 col-sm-12 col-md-2 offset-md-2">Days/Week</label>
                                    <div class="col-12 col-sm-12 col-md-5"><input type="text" id="daysweek_nonformal_edu_<?= $key ?>" name="daysweek_nonformal_edu_<?= $key ?>" class="form-control " value="<?= $student_nonformal_days_week ?>"></div>
                                </div>
                                <div class="row" style="width: 100%;" id="hourssession_nonformal_edu_row_<?= $key ?>"><label class="col-12 col-sm-12 col-md-2 offset-md-2">Hours/Session</label>
                                    <div class="col-12 col-sm-12 col-md-5"><input type="text" id="hourssession_nonformal_edu_<?= $key ?>" name="hourssession_nonformal_edu_<?= $key ?>" class="form-control " value="<?= $student_nonformal_hours_session ?>"></div>
                                </div>
                                <div class="row" style="width: 100%;" id="startyear_nonformal_edu_row_<?= $key ?>"><label class="col-12 col-sm-12 col-md-2 offset-md-2">Starting Year</label>
                                    <div class="col-12 col-sm-12 col-md-5"><input type="text" id="startyear_nonformal_edu_<?= $key ?>" name="startyear_nonformal_edu_<?= $key ?>" class="form-control " value="<?= $student_nonformal_start_year ?>"></div>
                                </div>
                                <div class="row" style="width: 100%;" id="endyear_nonformal_edu_row_<?= $key ?>"><label class="col-12 col-sm-12 col-md-2 offset-md-2">Ending Year</label>
                                    <div class="col-12 col-sm-12 col-md-5"><input type="text" id="endyear_nonformal_edu_<?= $key ?>" name="endyear_nonformal_edu_<?= $key ?>" class="form-control " value="<?= $student_nonformal_end_year ?>"></div>
                                    <?php if ($key == '1') : ?>
                                        <button type="button" class="btn btn-primary" id="add_NonFormalEdu" style="display: block;"><i class="fa fa-plus"></i></button><button type="button" class="btn btn-danger" id="remove_NonFormalEdu" style="display: none;"><i class="fa fa-minus"></i></button>
                                    <?php else : ?>
                                        <a href="<?= base_url("user/deleteNonFormalEdu/$student_nonformal_id") ?>">
                                            <button type="button" class="btn btn-warning"><i class="fa fa-trash"></i></button>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            <?php
                            endforeach;
                        else : ?>
                            <input type="text" name="total_nonFormalEdu" id="total_nonFormalEdu" value="1" hidden>
                            <input type="text" name="count_nonFormalEdu" id="count_nonFormalEdu" value="1" hidden>
                            <div class="row" style="width: 100%;" id="lesson_activities_row_1"><label class="col-12 col-sm-12 col-md-2 offset-md-2">Type of Lesson/Activities</label>
                                <div class="col-12 col-sm-12 col-md-5"><input type="text" id="lesson_activities_1" name="lesson_activities_1" class="form-control "></div>
                            </div>
                            <div class="row" style="width: 100%;" id="location_nonformal_edu_row_1"><label class="col-12 col-sm-12 col-md-2 offset-md-2">Location</label>
                                <div class="col-12 col-sm-12 col-md-5"><input type="text" id="location_nonformal_edu_1" name="location_nonformal_edu_1" class="form-control "></div>
                            </div>
                            <div class="row" style="width: 100%;" id="daysweek_nonformal_edu_row_1"><label class="col-12 col-sm-12 col-md-2 offset-md-2">Days/Week</label>
                                <div class="col-12 col-sm-12 col-md-5"><input type="text" id="daysweek_nonformal_edu_1" name="daysweek_nonformal_edu_1" class="form-control "></div>
                            </div>
                            <div class="row" style="width: 100%;" id="hourssession_nonformal_edu_row_1"><label class="col-12 col-sm-12 col-md-2 offset-md-2">Hours/Session</label>
                                <div class="col-12 col-sm-12 col-md-5"><input type="text" id="hourssession_nonformal_edu_1" name="hourssession_nonformal_edu_1" class="form-control "></div>
                            </div>
                            <div class="row" style="width: 100%;" id="startyear_nonformal_edu_row_1"><label class="col-12 col-sm-12 col-md-2 offset-md-2">Starting Year</label>
                                <div class="col-12 col-sm-12 col-md-5"><input type="text" id="startyear_nonformal_edu_1" name="startyear_nonformal_edu_1" class="form-control "></div>
                            </div>
                            <div class="row" style="width: 100%;" id="endyear_nonformal_edu_row_1"><label class="col-12 col-sm-12 col-md-2 offset-md-2">Ending Year</label>
                                <div class="col-12 col-sm-12 col-md-5"><input type="text" id="endyear_nonformal_edu_1" name="endyear_nonformal_edu_1" class="form-control "></div> <button type="button" class="btn btn-primary" id="add_NonFormalEdu" style="display: block;"><i class="fa fa-plus"></i></button><button type="button" class="btn btn-danger" id="remove_NonFormalEdu" style="display: none;"><i class="fa fa-minus"></i></button>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="x_title">
                        <h2 style="width: 100%; text-align:center;">Person(s) Live with the Child</h2>
                        <div class="clearfix"></div>
                    </div>
                    <?php if ($student_relationship_data) :
                        $total_studentRelationship = count($student_relationship_data);
                    ?>
                        <input type="text" name="total_studentRelationship" id="total_studentRelationship" value="<?= $total_studentRelationship ?>" hidden>
                        <input type="text" name="count_studentRelationship" id="count_studentRelationship" value="<?= $total_studentRelationship ?>" hidden>
                        <?php foreach ($student_relationship_data as $key => $value) :
                            $key += 1;
                            $student_relationship_id = $value['id'];
                            $student_relationship_name = $value['name'];
                            $student_relationship_relationship = $value['relationship'];
                            $student_relationship_address = $value['address'];
                            $student_relationship_phone_number = $value['phone_number'];
                            $student_relationship_email = $value['email'];
                        ?>
                            <div id="col_studentRelationship">
                                <input type="text" id="student_relationship_id_<?= $key ?>" name="student_relationship_id_<?= $key ?>" value="<?= $student_relationship_id ?>" hidden>
                                <div class="row" style="width: 100%;" id="person_name_row_<?= $key ?>"><label class="col-12 col-sm-12 col-md-2 offset-md-2">Name as in Birth Certificate</label>
                                    <div class="col-12 col-sm-12 col-md-5"><input type="text" id="person_name_<?= $key ?>" name="person_name_<?= $key ?>" class="form-control " value="<?= $student_relationship_name ?>"></div>
                                </div>
                                <div class="row" style="width: 100%;" id="person_relationship_row_<?= $key ?>"><label class="col-12 col-sm-12 col-md-2 offset-md-2">Relationship with the Child</label>
                                    <div class="col-12 col-sm-12 col-md-5"><input type="text" id="person_relationship_<?= $key ?>" name="person_relationship_<?= $key ?>" class="form-control " value="<?= $student_relationship_relationship ?>"></div>
                                </div>
                                <div class="row" style="width: 100%;" id="person_address_row_<?= $key ?>"><label class="col-12 col-sm-12 col-md-2 offset-md-2">Address</label>
                                    <div class="col-12 col-sm-12 col-md-5"><input type="text" id="person_address_<?= $key ?>" name="person_address_<?= $key ?>" class="form-control " value="<?= $student_relationship_address ?>"></div>
                                </div>
                                <div class="row" style="width: 100%;" id="person_phone_row_<?= $key ?>"><label class="col-12 col-sm-12 col-md-2 offset-md-2">Phone Number</label>
                                    <div class="col-12 col-sm-12 col-md-5"><input type="text" id="person_phone_<?= $key ?>" name="person_phone_<?= $key ?>" class="form-control " value="<?= $student_relationship_phone_number ?>"></div>
                                </div>
                                <div class="row" style="width: 100%;" id="person_email_row_<?= $key ?>"><label class="col-12 col-sm-12 col-md-2 offset-md-2">Email</label>
                                    <div class="col-12 col-sm-12 col-md-5"><input type="text" id="person_email_<?= $key ?>" name="person_email_<?= $key ?>" class="form-control " value="<?= $student_relationship_email ?>"></div>
                                    <?php if ($key == '1') : ?>
                                        <button type="button" class="btn btn-primary" id="add_studentRelationship" style="display: block;"><i class="fa fa-plus"></i></button>
                                        <button type="button" class="btn btn-danger" id="remove_studentRelationship" style="display: none;"><i class="fa fa-minus"></i></button>
                                    <?php else : ?>
                                        <a href="<?= base_url("user/deleteRelationship/$student_relationship_id") ?>">
                                            <button type="button" class="btn btn-warning"><i class="fa fa-trash"></i></button>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php
                        endforeach;
                    else : ?>
                        <input type="text" name="total_studentRelationship" id="total_studentRelationship" value="1" hidden>
                        <input type="text" name="count_studentRelationship" id="count_studentRelationship" value="1" hidden>
                        <div id="col_studentRelationship">
                            <div class="row" style="width: 100%;" id="person_name_row_1"><label class="col-12 col-sm-12 col-md-2 offset-md-2">Name as in Birth Certificate</label>
                                <div class="col-12 col-sm-12 col-md-5"><input type="text" id="person_name_1" name="person_name_1" class="form-control "></div>
                            </div>
                            <div class="row" style="width: 100%;" id="person_relationship_row_1"><label class="col-12 col-sm-12 col-md-2 offset-md-2">Relationship with the Child</label>
                                <div class="col-12 col-sm-12 col-md-5"><input type="text" id="person_relationship_1" name="person_relationship_1" class="form-control "></div>
                            </div>
                            <div class="row" style="width: 100%;" id="person_address_row_1"><label class="col-12 col-sm-12 col-md-2 offset-md-2">Address</label>
                                <div class="col-12 col-sm-12 col-md-5"><input type="text" id="person_address_1" name="person_address_1" class="form-control "></div>
                            </div>
                            <div class="row" style="width: 100%;" id="person_phone_row_1"><label class="col-12 col-sm-12 col-md-2 offset-md-2">Phone Number</label>
                                <div class="col-12 col-sm-12 col-md-5"><input type="text" id="person_phone_1" name="person_phone_1" class="form-control "></div>
                            </div>
                            <div class="row" style="width: 100%;" id="person_email_row_1"><label class="col-12 col-sm-12 col-md-2 offset-md-2">Email</label>
                                <div class="col-12 col-sm-12 col-md-5"><input type="text" id="person_email_1" name="person_email_1" class="form-control "></div>
                                <button type="button" class="btn btn-primary" id="add_studentRelationship" style="display: block;"><i class="fa fa-plus"></i></button>
                                <button type="button" class="btn btn-danger" id="remove_studentRelationship" style="display: none;"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                    <?php endif; ?>

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
                    <input type="text" id="student_message_id" name="student_message_id" value="<?= ($student_message_data) ? $student_message_data['id'] : NULL; ?>" hidden>
                    <div class="x_title">
                        <h2 style="width: 100%; text-align:center;">School Information</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-2 label-align" for="first-name"></label>
                        <div class="col-md-8">
                            <textarea id="message_school" required="required" class="form-control" name="message_school" placeholder="Please let us know how you know Kids Republic School"><?= ($student_message_data) ? $student_message_data['school_information'] : ""; ?></textarea>
                        </div>
                    </div>
                    <div class="x_title">
                        <h2 style="width: 100%; text-align:center;">Declaration</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-2 label-align" for="first-name"></label>
                        <div class="col-md-8">
                            <textarea id="message_declaration" required="required" class="form-control" name="message_declaration" placeholder="The details in this form are the best of my knowledge true and correct and i will keep the school informed of any changes"><?= ($student_message_data) ? $student_message_data['declaration'] : ""; ?></textarea>
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