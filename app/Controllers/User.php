<?php

namespace App\Controllers;

use \App\Models\StudentDetailModel;
use \App\Models\StudentInterestModel;
use \App\Models\StudentBackgroundEduModel;
use \App\Models\StudentBackgroundNonFormalEduModel;
use \App\Models\StudentRelationshipModel;
use \App\Models\StudentMessageModel;
use \App\Models\FathersParticularModel;
use \App\Models\MothersParticularModel;
use \App\Models\StudentImmunizationModel;
use \App\Models\StudentHealthHistoryModel;
use \App\Models\StudentAllergiesModel;
use \App\Models\StudentPregnancyHistoryModel;
use \App\Models\StudentHealthDescriptionModel;
use \App\Models\StudentVehicleModel;
use \App\Models\FormFileModel;
use \App\Models\StudentFamilyInformationModel;
use \App\Models\StudentPrevEvalCurrentServiceModel;
use \App\Models\StudentDevelopmentDomainsModel;
use \App\Models\ParentsSurveyModel;
use \App\Models\UsersModel;
use Myth\Auth\Authorization\GroupModel;
use Myth\Auth\Models\UserModel;
use \App\Models\InvoiceStatusModel;
use \App\Models\PricelistModel;

class User extends BaseController
{
	protected $studentDetail;
	protected $studentInterest;
	protected $studentBackgroundEdu;
	protected $studentBackgroundNonFormalEdu;
	protected $studentRelationship;
	protected $studentMessage;
	protected $mothersParticular;
	protected $fathersParticular;
	protected $user_id;
	protected $studentImmunization;
	protected $studentHealthHistory;
	protected $studentAllergies;
	protected $studentPregnancyHistory;
	protected $studentHealthDescription;
	protected $studentVehicle;
	protected $formFile;
	protected $studentFamilyInformation;
	protected $studentPrevEvalCurrentService;
	protected $studentDevelopmentDomains;
	protected $parentsSurvey;
	protected $usersDetail;
	protected $mythAuthUser;
	protected $groupUser;
	protected $invoiceStatus;
	protected $pricelist;

	public function __construct()
	{
		$this->studentDetail 					= new StudentDetailModel();
		$this->studentInterest 					= new StudentInterestModel();
		$this->studentBackgroundEdu 			= new StudentBackgroundEduModel();
		$this->studentBackgroundNonFormalEdu 	= new StudentBackgroundNonFormalEduModel();
		$this->studentRelationship			 	= new StudentRelationshipModel();
		$this->studentMessage				 	= new StudentMessageModel();
		$this->fathersParticular 				= new FathersParticularModel();
		$this->mothersParticular 				= new MothersParticularModel();
		$this->user_id							= user()->id;
		$this->studentImmunization				= new StudentImmunizationModel();
		$this->studentHealthHistory				= new StudentHealthHistoryModel();
		$this->studentAllergies					= new StudentAllergiesModel();
		$this->studentPregnancyHistory			= new StudentPregnancyHistoryModel();
		$this->studentHealthDescription			= new StudentHealthDescriptionModel();
		$this->studentVehicle					= new StudentVehicleModel();
		$this->formFile							= new FormFileModel();
		$this->studentFamilyInformation			= new StudentFamilyInformationModel();
		$this->studentPrevEvalCurrentService	= new StudentPrevEvalCurrentServiceModel();
		$this->studentDevelopmentDomains		= new StudentDevelopmentDomainsModel();
		$this->parentsSurvey					= new ParentsSurveyModel();
		$this->usersDetail						= new UsersModel();
		$this->mythAuthUser						= new UserModel();
		$this->groupUser						= new GroupModel();
		$this->invoiceStatus					= new InvoiceStatusModel();
		$this->pricelist						= new PricelistModel();
	}

	public function index()
	{
		$data['title'] = "Homepage";
		return view('users/index', $data);
	}

	public function applicationforadmission()
	{
		$data['title'] = "Application For Admission";
		$data['validation'] = \Config\Services::validation();
		/**
		 * Retrieve data when the user has filled out the form.
		 */
		$data['student_details_data'] = $this->studentDetail->getStudentDetail(NULL, $this->user_id);
		$data['student_interest_data'] = NULL;
		$data['student_background_nonformal_edu_data'] = NULL;
		$data['student_relationship_data'] = NULL;
		$data['student_message_data'] = NULL;
		$data['preschool_data'] = NULL;
		$data['primary_data'] = NULL;
		$data['others_edu_data'] = NULL;
		$data['fathers_particular_data'] = NULL;
		$data['mothers_particular_data'] = NULL;
		$data['form_file_data'] = NULL;

		if ($data['student_details_data']) {
			$student_nis	= $data['student_details_data']['nis'];
			$data['student_interest_data'] 			= $this->studentInterest->getStudentInterest($student_nis);

			$data['preschool_data'] 		= $this->studentBackgroundEdu->getStudentBackgroundEdu($student_nis, NULL, 'Preschool');
			$data['primary_data'] 			= $this->studentBackgroundEdu->getStudentBackgroundEdu($student_nis, NULL, 'Primary School');
			$data['others_edu_data'] 		= $this->studentBackgroundEdu->getStudentBackgroundEdu($student_nis, NULL, 'Others');

			$data['student_background_nonformal_edu_data'] = $this->studentBackgroundNonFormalEdu->getStudentBackgroundNonFormalEdu($student_nis);
			$data['student_relationship_data'] = $this->studentRelationship->getStudentRelationship($student_nis);
			$data['student_message_data'] = $this->studentMessage->getStudentMessage($student_nis);

			$data['fathers_particular_data'] 		= $this->fathersParticular->getFathersParticularDetail($data['student_details_data']['fathers_id']);

			$data['mothers_particular_data'] 		= $this->mothersParticular->getMothersParticularDetail($data['student_details_data']['mothers_id']);
			$data['form_file_data']			= $this->formFile->getFormFile($this->user_id);
		}
		return view('forms/applicationforadmission', $data);
	}

	public function healthexaminationrecord()
	{
		$data['title'] = "Health Examination Record";
		$data['validation'] = \Config\Services::validation();

		$data['student_details_data'] = $this->studentDetail->getStudentDetail(NULL, $this->user_id);
		$data['student_immunization_data'] = NULL;
		$data['student_health_history_data'] = NULL;
		$data['student_allergies_data'] = NULL;
		$data['student_pregnancy_history_data'] = NULL;
		$data['student_health_description'] = NULL;

		if ($data['student_details_data']) {
			$student_nis	= $data['student_details_data']['nis'];
			$data['student_immunization_data'] = $this->studentImmunization->getStudentImmunization(($student_nis));
			$data['student_health_history_data'] = $this->studentHealthHistory->getStudentHealthHistory($student_nis);
			$data['student_allergies_data'] = $this->studentAllergies->getStudentAllergies(($student_nis));
			$data['student_pregnancy_history_data'] = $this->studentPregnancyHistory->getStudentPregnancyHistory($student_nis);
			$data['student_health_description'] = $this->studentHealthDescription->getStudentHealthDescription($student_nis);
		}

		return view('forms/healthexaminationrecord', $data);
	}

	public function parentsquestionnaire()
	{
		$data['title'] = "Parent's Questionnaire";
		$data['validation'] = \Config\Services::validation();

		$data['student_details_data'] = $this->studentDetail->getStudentDetail(NULL, $this->user_id);
		$data['fathers_particular_data'] = NULL;
		$data['mothers_particular_data'] = NULL;
		$data['student_relationship_data'] = NULL;
		$data['student_family_information_data'] = NULL;
		$data['student_prev_eval_current_service_data'] = NULL;
		$data['student_development_domains_data'] = NULL;
		$data['parents_survey_data'] = NULL;
		$data['student_health_description_data'] = NULL;

		if ($data['student_details_data']) {
			$student_nis	= $data['student_details_data']['nis'];

			$data['fathers_particular_data']	= $this->fathersParticular->getFathersParticularDetail($data['student_details_data']['fathers_id']);

			$data['mothers_particular_data'] 	= $this->mothersParticular->getMothersParticularDetail($data['student_details_data']['mothers_id']);

			$data['student_relationship_data']	= $this->studentRelationship->getStudentRelationship($student_nis);
			$data['student_family_information_data'] = $this->studentFamilyInformation->getStudentFamilyInformation($student_nis);
			$data['student_prev_eval_current_service_data'] = $this->studentPrevEvalCurrentService->getStudentPrevEvalCurrentService($student_nis);
			$data['student_development_domains_data'] = $this->studentDevelopmentDomains->getStudentDevelopmentDomains($student_nis);
			$data['parents_survey_data'] = $this->parentsSurvey->getParentsSurvey($student_nis);
			$data['student_health_description_data'] = $this->studentHealthDescription->getStudentHealthDescription($student_nis);
		}

		return view('forms/parentsquestionnaire', $data);
	}

	public function vehicleregistration()
	{
		$data['title'] = "Vehicle Registration";
		$data['validation'] = \Config\Services::validation();

		$data['student_details_data'] = $this->studentDetail->getStudentDetail(NULL, $this->user_id);
		$data['fathers_particular_data'] = NULL;
		$data['mothers_particular_data'] = NULL;
		$data['student_vehicle_data'] = NULL;

		if ($data['student_details_data']) {
			$student_nis	= $data['student_details_data']['nis'];

			$data['fathers_particular_data'] 		= $this->fathersParticular->getFathersParticularDetail($data['student_details_data']['fathers_id']);

			$data['mothers_particular_data'] 		= $this->mothersParticular->getMothersParticularDetail($data['student_details_data']['mothers_id']);

			$data['student_vehicle_data'] 		= $this->studentVehicle->getStudentVehicle($student_nis);
		}
		return view('forms/vehicleregistration', $data);
	}

	public function schoolrecommendation()
	{
		$data['title'] = "School Recommendation";
		$data['formfiles'] = $this->formFile->getFormFile($this->user_id, NULL, 'prevschool');
		if ($data['formfiles']) {
			$data['formfiles'] = $data['formfiles']['prevschool'];
		} else {
			$data['formfiles'] = NULL;
		}
		return view('forms/schoolrecommendation', $data);
	}

	public function payments()
	{
		$data['title'] = "Payment Description";
		return view('payments/index', $data);
	}

	public function invoice()
	{
		$students = $this->studentDetail->select('`users`.`id`, `student_details`.`nis`, `student_details`.`name`, `users`.`email`, `users`.`username`, `student_details`.`address`, `student_details`.`city`, `student_details`.`phone`, `invoice_status`.`no_invoice`, `invoice_status`.`status`, `invoice_status`.`created_at`, `invoice_status`.`updated_at`,`auth_groups_users`.`group_id`')
			->join('users', 'student_details.users_id = users.id', 'RIGHT')
			->join('invoice_status', 'student_details.nis = invoice_status.student_nis', 'RIGHT')
			->join('`auth_groups_users`', 'student_details.users_id = auth_groups_users.user_id', 'RIGHT')
			->where('invoice_status.status', '1')
			->where('student_details.users_id', $this->user_id)
			->findAll();
		foreach ($students as $key => $value) {
			$price = $this->pricelist->find($value['group_id']);
			$group = $this->groupUser->find($value['group_id']);
			$formFile = $this->formFile->where('users_id', $value['id'])->find();
			$students[$key]['payment'] = $price;
			$students[$key]['group'] = $group;
			$students[$key]['formfile'] = $formFile;
		}
		$data['title'] = "Payment Description";
		// dd($students);
		if ($students) {
			$data['students'] =  $students[0];
			return view('payments/invoice', $data);
		} else {
			return view('payments/invoice_404', $data);
			// return view('errors/html/error_404');
		}
	}

	public function receipt()
	{
		$data['title'] = "Receipt";
		$data['formfiles'] = $this->formFile->getFormFile($this->user_id, NULL, 'invoice');
		if ($data['formfiles']) {
			$data['formfiles'] = $data['formfiles']['invoice'];
		} else {
			$data['formfiles'] = NULL;
		}
		return view('payments/receipt', $data);
	}

	public function saveAdmission()
	{
		/***
		 * Validation Form Admission
		 */
		$this->validation();
		$session = session();
		$files 					= $this->request->getFile('profile_pict');
		$formfiles 				= $this->formFile->getFormFile($this->user_id);
		$old_photo				= $this->request->getVar('old_photo');
		if ($files->getError() == 4) {
			$fileName = $old_photo;
		} else {
			$fileName = $files->getRandomName();
			$dir_path = 'assets/upload/profile/';
			$files->move($dir_path, $fileName);
			if ($old_photo != null) unlink(base_url($dir_path) . $old_photo);
		}
		$formfile_data = [
			'users_id' => $this->user_id,
			'profile_pict' => $fileName
		];
		if ($formfiles) {
			$formfile_id = $formfiles['id'];
			$this->formFile->where("id", $formfile_id)->set($formfile_data)->update();
		} else {
			$this->formFile->save($formfile_data);
		}

		/**
		 * Fathers Particular data request
		 */
		$fathers_id_req					= $this->request->getVar('fathers_id');
		$fathers_name					= $this->request->getVar('fathers_name');
		$fathers_pob					= $this->request->getVar('fathers_pob');
		$fathers_dob					= $this->request->getVar('fathers_dob');
		$fathers_nationality			= $this->request->getVar('fathers_nationality');
		$fathers_religion				= $this->request->getVar('fathers_religion');
		$fathers_id_type				= $this->request->getVar('fathers_id_type');
		$fathers_id_number				= $this->request->getVar('fathers_id_number');
		$fathers_education				= $this->request->getVar('fathers_education');
		$fathers_major					= $this->request->getVar('fathers_major');
		$fathers_university				= $this->request->getVar('fathers_university');
		$fathers_address				= $this->request->getVar('fathers_address');
		$fathers_city					= $this->request->getVar('fathers_city');
		$fathers_postal					= $this->request->getVar('fathers_postal');
		$fathers_phone					= $this->request->getVar('fathers_phone');
		$fathers_email					= $this->request->getVar('fathers_email');
		$fathers_occupation				= $this->request->getVar('fathers_occupation');
		$fathers_position				= $this->request->getVar('fathers_position');
		$fathers_institution			= $this->request->getVar('fathers_institution');
		$fathers_office					= $this->request->getVar('fathers_office');
		$fathers_relationship			= $this->request->getVar('fathers_relationship');
		$fathers_status					= $this->request->getVar('fathers_status');
		$fathers_lives					= $this->request->getVar('fathers_lives');

		$fathers_particular_data		= [
			'name'			=> $fathers_name,
			'pob'			=> $fathers_pob,
			'dob'			=> $fathers_dob,
			'nationality'	=> $fathers_nationality,
			'religion'		=> $fathers_religion,
			'id_type'		=> $fathers_id_type,
			'id_number'		=> $fathers_id_number,
			'last_education' => $fathers_education,
			'major'			=> $fathers_major,
			'univ_name'		=> $fathers_university,
			'home_address'	=> $fathers_address,
			'city'			=> $fathers_city,
			'postal'		=> $fathers_postal,
			'phone_number'	=> $fathers_phone,
			'email'			=> $fathers_email,
			'occu'			=> $fathers_occupation,
			'post'			=> $fathers_position,
			'inst_name'		=> $fathers_institution,
			'office_address' => $fathers_office,
			'child_relation' => $fathers_relationship,
			'marital_status' => $fathers_status,
			'child_live'	=> $fathers_lives
		];

		/**
		 * Mothers Particular data request
		 */
		$mothers_id_req					= $this->request->getVar('mothers_id');
		$mothers_name					= $this->request->getVar('mothers_name');
		$mothers_pob					= $this->request->getVar('mothers_pob');
		$mothers_dob					= $this->request->getVar('mothers_dob');
		$mothers_nationality			= $this->request->getVar('mothers_nationality');
		$mothers_religion				= $this->request->getVar('mothers_religion');
		$mothers_id_type				= $this->request->getVar('mothers_id_type');
		$mothers_id_number				= $this->request->getVar('mothers_id_number');
		$mothers_education				= $this->request->getVar('mothers_education');
		$mothers_major					= $this->request->getVar('mothers_major');
		$mothers_university				= $this->request->getVar('mothers_university');
		$mothers_address				= $this->request->getVar('mothers_address');
		$mothers_city					= $this->request->getVar('mothers_city');
		$mothers_postal					= $this->request->getVar('mothers_postal');
		$mothers_phone					= $this->request->getVar('mothers_phone');
		$mothers_email					= $this->request->getVar('mothers_email');
		$mothers_occupation				= $this->request->getVar('mothers_occupation');
		$mothers_position				= $this->request->getVar('mothers_position');
		$mothers_institution			= $this->request->getVar('mothers_institution');
		$mothers_office					= $this->request->getVar('mothers_office');
		$mothers_relationship			= $this->request->getVar('mothers_relationship');
		$mothers_status					= $this->request->getVar('mothers_status');
		$mothers_lives					= $this->request->getVar('mothers_lives');

		$mothers_particular_data		= [
			'name'			=> $mothers_name,
			'pob'			=> $mothers_pob,
			'dob'			=> $mothers_dob,
			'nationality'	=> $mothers_nationality,
			'religion'		=> $mothers_religion,
			'id_type'		=> $mothers_id_type,
			'id_number'		=> $mothers_id_number,
			'last_education' => $mothers_education,
			'major'			=> $mothers_major,
			'univ_name'		=> $mothers_university,
			'home_address'	=> $mothers_address,
			'city'			=> $mothers_city,
			'postal'		=> $mothers_postal,
			'phone_number'	=> $mothers_phone,
			'email'			=> $mothers_email,
			'occu'			=> $mothers_occupation,
			'post'			=> $mothers_position,
			'inst_name'		=> $mothers_institution,
			'office_address' => $mothers_office,
			'child_relation' => $mothers_relationship,
			'marital_status' => $mothers_status,
			'child_live'	=> $mothers_lives
		];

		/**
		 * Insert data
		 */
		if ($fathers_id_req || $mothers_id_req) {
			$fathers_particular_data['id'] = $fathers_id_req;
			$fathers_db_id = $fathers_id_req;
			$this->fathersParticular->save($fathers_particular_data);
			$mothers_particular_data['id'] = $mothers_id_req;
			$mothers_db_id = $mothers_id_req;
			$this->mothersParticular->save($mothers_particular_data);
		} else {
			$fathers_db_id = $this->fathersParticular->insert($fathers_particular_data);
			$mothers_db_id = $this->mothersParticular->insert($mothers_particular_data);
		}

		/**
		 * Student Detail data request
		 */
		$nis						= $this->request->getVar('nis');
		$fullname					= $this->request->getVar('fullname');
		$gender 					= $this->request->getVar('gender');
		$place_of_birth 			= $this->request->getVar('place_of_birth');
		$birthday 					= $this->request->getVar('birthday');
		$nationality 				= $this->request->getVar('nationality');
		$religion 					= $this->request->getVar('religion');
		$birth_order 				= $this->request->getVar('birth_order');
		$no_siblings 				= $this->request->getVar('no_siblings');
		if ($this->request->getVar('name_previous_school')) {
			$name_previous_school	= $this->request->getVar('name_previous_school');
		} else {
			$name_previous_school	= NULL;
		}
		if ($this->request->getVar('address_previous_school')) {
			$address_previous_school = $this->request->getVar('address_previous_school');
		} else {
			$address_previous_school = NULL;
		}
		if ($this->request->getVar('nisn')) {
			$nisn 					= $this->request->getVar('nisn');
		} else {
			$nisn					= NULL;
		}
		$spoken_language 			= $this->request->getVar('spoken_language');
		$home_address 				= $this->request->getVar('home_address');
		$postal_code 				= $this->request->getVar('postal_code');
		$city 						= $this->request->getVar('city');
		$home_distance 				= $this->request->getVar('home_distance');
		$phone_number 				= $this->request->getVar('phone_number');
		$vehicle 					= $this->request->getVar('vehicle');


		$student_details_data = [
			'name'			=> $fullname,
			'gender'		=> $gender,
			'pob'			=> $place_of_birth,
			'dob'			=> $birthday,
			'nationality'	=> $nationality,
			'religion'		=> $religion,
			'birth_o'		=> $birth_order,
			'tnoc'			=> $no_siblings,
			'prev_school' 	=> $name_previous_school,
			'addprev_school' => $address_previous_school,
			'nisn'			=> $nisn,
			'language'		=> $spoken_language,
			'address'		=> $home_address,
			'city'			=> $city,
			'postal_code'	=> $postal_code,
			'phone'			=> $phone_number,
			'distance'		=> $home_distance,
			'vehicle'		=> $vehicle,
			'mothers_id'	=> $mothers_db_id,
			'fathers_id'	=> $fathers_db_id,
			'users_id'		=> $this->user_id
		];

		if ($nis) {
			$this->studentDetail->where("nis", $nis)->set($student_details_data)->update();
		} else {
			$nis = $this->studentDetail->insert($student_details_data);
		}


		/**
		 * Student talent and interest request
		 */
		$student_interest_id	= $this->request->getVar('student_interest_id');
		if ($this->request->getVar('arts')) {
			$arts 					= $this->request->getVar('arts');
		} else {
			$arts 					= "N/A";
		}
		if ($this->request->getVar('music')) {
			$music 					= $this->request->getVar('music');
		} else {
			$music 					= "N/A";
		}
		if ($this->request->getVar('cognitive')) {
			$cognitive 				= $this->request->getVar('cognitive');
		} else {
			$cognitive 				= "N/A";
		}
		if ($this->request->getVar('sport')) {
			$sport 					= $this->request->getVar('sport');
		} else {
			$sport					= "N/A";
		}
		if ($this->request->getVar('organization_community')) {
			$organization_community = $this->request->getVar('organization_community');
		} else {
			$organization_community	= "N/A";
		}
		if ($this->request->getVar('others_talent')) {
			$others_talent 			= $this->request->getVar('others_talent');
		} else {
			$others_talent			= "N/A";
		}

		$student_interest_data = [
			'arts'						=> $arts,
			'music'						=> $music,
			'cognitive'					=> $cognitive,
			'sport'						=> $sport,
			'organization_community'	=> $organization_community,
			'others'					=> $others_talent,
			'student_nis'				=> $nis
		];

		if ($student_interest_id) {
			$student_interest_data['id'] = $student_interest_id;
			$this->studentInterest->replace($student_interest_data);
		} else {
			$this->studentInterest->save($student_interest_data);
		}

		/**
		 * Student background education Request
		 */

		if ($this->request->getVar('preschool_prev_name')) {
			$preschool_prev_name = $this->request->getVar('preschool_prev_name');
		} else {
			$preschool_prev_name = NULL;
		}
		if ($this->request->getVar('preschool_year')) {
			$preschool_year = $this->request->getVar('preschool_year');
		} else {
			$preschool_year = NULL;
		}
		if ($this->request->getVar('preschool_address')) {
			$preschool_address = $this->request->getVar('preschool_address');
		} else {
			$preschool_address = NULL;
		}
		if ($this->request->getVar('preschool_city')) {
			$preschool_city = $this->request->getVar('preschool_city');
		} else {
			$preschool_city = NULL;
		}


		if ($this->request->getVar('primary_prev_name')) {
			$primary_prev_name = $this->request->getVar('primary_prev_name');
		} else {
			$primary_prev_name = NULL;
		}
		if ($this->request->getVar('primary_year')) {
			$primary_year = $this->request->getVar('primary_year');
		} else {
			$primary_year = NULL;
		}
		if ($this->request->getVar('primary_address')) {
			$primary_address = $this->request->getVar('primary_address');
		} else {
			$primary_address = NULL;
		}
		if ($this->request->getVar('primary_city')) {
			$primary_city = $this->request->getVar('primary_city');
		} else {
			$primary_city = NULL;
		}


		if ($this->request->getVar('others_edu_prev_name')) {
			$others_edu_prev_name = $this->request->getVar('others_edu_prev_name');
		} else {
			$others_edu_prev_name = NULL;
		}
		if ($this->request->getVar('others_edu_year')) {
			$others_edu_year = $this->request->getVar('others_edu_year');
		} else {
			$others_edu_year = NULL;
		}
		if ($this->request->getVar('others_edu_address')) {
			$others_edu_address = $this->request->getVar('others_edu_address');
		} else {
			$others_edu_address = NULL;
		}
		if ($this->request->getVar('others_edu_city')) {
			$others_edu_city = $this->request->getVar('others_edu_city');
		} else {
			$others_edu_city = NULL;
		}

		if ($preschool_prev_name != NULL && $preschool_year != NULL && $preschool_address != NULL && $preschool_city != NULL) {
			$preschool_data = [
				'prev_school_name'	=> $preschool_prev_name,
				'year'				=> $preschool_year,
				'address'			=> $preschool_address,
				'city'				=> $preschool_city,
				'student_nis'		=> $nis,
				'prev_school_type'	=> 'Preschool'
			];
			/**
			 * Check if preschool is filled in database or not
			 */
			$preschool_data_db 	= $this->studentBackgroundEdu->getStudentBackgroundEdu($nis, NULL, "Preschool");
			if ($preschool_data_db) {
				$preschool_data['id'] = $preschool_data_db['id'];
				$this->studentBackgroundEdu->replace($preschool_data);
			} else {
				$this->studentBackgroundEdu->save($preschool_data);
			}
		}

		if ($primary_prev_name != NULL && $primary_year != NULL && $primary_address != NULL && $primary_city != NULL) {
			$primary_data = [
				'prev_school_name'	=> $primary_prev_name,
				'year'				=> $primary_year,
				'address'			=> $primary_address,
				'city'				=> $primary_city,
				'student_nis'		=> $nis,
				'prev_school_type'	=> 'Primary School'
			];
			/**
			 * Check if preschool is filled in database or not
			 */
			$primary_data_db 	= $this->studentBackgroundEdu->getStudentBackgroundEdu($nis, NULL, "Primary School");
			if ($primary_data_db) {
				$primary_data['id'] = $primary_data_db['id'];
				$this->studentBackgroundEdu->replace($primary_data);
			} else {
				$this->studentBackgroundEdu->save($primary_data);
			}
		}
		if ($others_edu_prev_name != NULL && $others_edu_year != NULL && $others_edu_address != NULL && $others_edu_city != NULL) {
			$others_edu_data = [
				'prev_school_name'	=> $others_edu_prev_name,
				'year'				=> $others_edu_year,
				'address'			=> $others_edu_address,
				'city'				=> $others_edu_city,
				'student_nis'		=> $nis,
				'prev_school_type'	=> 'Others'
			];

			/**
			 * Check if preschool is filled in database or not
			 */
			$others_edu_data_db 	= $this->studentBackgroundEdu->getStudentBackgroundEdu($nis, NULL, "Others");
			if ($others_edu_data_db) {
				$others_edu_data['id'] = $others_edu_data_db['id'];
				$this->studentBackgroundEdu->replace($others_edu_data);
			} else {
				$this->studentBackgroundEdu->save($others_edu_data);
			}
		}

		$total_nonFormalEdu = (int) $this->request->getVar('total_nonFormalEdu');
		for ($x = 1; $x <= $total_nonFormalEdu; $x++) {
			$lesson_activities = 'lesson_activities_' . $x;
			$lesson_activities = $this->request->getVar($lesson_activities);
			$location_nonformal_edu = 'location_nonformal_edu_' . $x;
			$location_nonformal_edu = $this->request->getVar($location_nonformal_edu);
			$daysweek_nonformal_edu = 'daysweek_nonformal_edu_' . $x;
			$daysweek_nonformal_edu = $this->request->getVar($daysweek_nonformal_edu);
			$hourssession_nonformal_edu = 'hourssession_nonformal_edu_' . $x;
			$hourssession_nonformal_edu = $this->request->getVar($hourssession_nonformal_edu);
			$startyear_nonformal_edu = 'startyear_nonformal_edu_' . $x;
			$startyear_nonformal_edu = $this->request->getVar($startyear_nonformal_edu);
			$endyear_nonformal_edu = 'endyear_nonformal_edu_' . $x;
			$endyear_nonformal_edu = $this->request->getVar($endyear_nonformal_edu);
			$student_background_nonformal_edu = 'student_background_nonformal_edu_id_' . $x;
			if ($this->request->getVar($student_background_nonformal_edu)) {
				$student_background_nonformal_edu_id = $this->request->getVar($student_background_nonformal_edu);
			} else {
				$student_background_nonformal_edu_id = NULL;
			}
			if ($lesson_activities != NULL && $location_nonformal_edu != NULL && $daysweek_nonformal_edu != NULL && $hourssession_nonformal_edu != NULL && $startyear_nonformal_edu != NULL && $endyear_nonformal_edu != NULL) {
				$student_background_nonformal_edu_data =
					[
						'lesson_activities'		=> $lesson_activities,
						'location'				=> $location_nonformal_edu,
						'days_week'				=> $daysweek_nonformal_edu,
						'hours_session'			=> $hourssession_nonformal_edu,
						'start_year'			=> $startyear_nonformal_edu,
						'end_year'				=> $endyear_nonformal_edu,
						'student_nis'			=> $nis
					];
				if ($student_background_nonformal_edu_id) {
					$student_background_nonformal_edu_data['id'] = $student_background_nonformal_edu_id;
					$this->studentBackgroundNonFormalEdu->replace($student_background_nonformal_edu_data);
				} else {
					$this->studentBackgroundNonFormalEdu->save($student_background_nonformal_edu_data);
				}
			}
		}

		$total_studentRelationship = (int) $this->request->getVar('total_studentRelationship');
		for ($x = 1; $x <= $total_studentRelationship; $x++) {
			$person_name = 'person_name_' . $x;
			$person_name = $this->request->getVar($person_name);
			$person_relationship = 'person_relationship_' . $x;
			$person_relationship = $this->request->getVar($person_relationship);
			$person_address = 'person_address_' . $x;
			$person_address = $this->request->getVar($person_address);
			$person_phone = 'person_phone_' . $x;
			$person_phone = $this->request->getVar($person_phone);
			$person_email = 'person_email_' . $x;
			$person_email = $this->request->getVar($person_email);
			$student_relationship_id = 'student_relationship_id_' . $x;
			if ($this->request->getVar($student_relationship_id)) {
				$student_relationship_id = $this->request->getVar($student_relationship_id);
			} else {
				$student_relationship_id = NULL;
			}
			if ($person_name != NULL && $person_relationship != NULL && $preschool_address != NULL && $person_phone != NULL && $person_email != NULL) {
				$student_relationship_data =
					[
						'name'					=> $person_name,
						'relationship'			=> $person_relationship,
						'address'				=> $person_address,
						'phone_number'			=> $person_phone,
						'email'					=> $person_email,
						'student_nis'			=> $nis
					];
				if ($student_relationship_id) {
					$student_relationship_data['id'] = $student_relationship_id;
					$this->studentRelationship->replace($student_relationship_data);
				} else {
					$this->studentRelationship->save($student_relationship_data);
				}
			}
		}

		$student_message_id	= $this->request->getVar('student_message_id');
		$message_school = $this->request->getVar('message_school');
		$message_declaration = $this->request->getVar('message_declaration');
		$student_message_data = [
			'school_information'	=> $message_school,
			'declaration'			=> $message_declaration,
			'student_nis'			=> $nis
		];

		if ($student_message_id) {
			$student_message_data['id'] = $student_message_id;
			$this->studentMessage->replace($student_message_data);
		} else {
			$this->studentMessage->save($student_message_data);
		}

		/**
		 * Set Message Alert
		 */
		$session = session();
		$session->setFlashdata('success', 'Success');
		return redirect()->to('/user/applicationforadmission');
	}

	public function savehealth()
	{
		$student_nis 		= (int) $this->request->getVar('nis');

		$student_weight		= $this->request->getVar('weight');
		$student_height		= $this->request->getVar('height');
		$student_blood_type	= $this->request->getVar('blood_type');

		$student_health_record_data = [
			'weight'	=> $student_weight,
			'height'	=> $student_height,
			'blood_type' => $student_blood_type
		];

		if ($student_nis) {
			$this->studentDetail->where("nis", $student_nis)->set($student_health_record_data)->update();
		} else {
			$this->studentDetail->save($student_health_record_data);
		}


		$total_studentImmunization = (int) $this->request->getVar('total_studentImmunization');
		for ($x = 1; $x <= $total_studentImmunization; $x++) {
			$immunization_type = "new_immunization_type_" . $x;
			$immunization_type = $this->request->getVar($immunization_type);
			$immunization_year = "new_immunization_year_" . $x;
			$immunization_year = $this->request->getVar($immunization_year);
			$student_immunization_id = 'student_immunization_id_' . $x;
			if ($this->request->getVar($student_immunization_id)) {
				$student_immunization_id = $this->request->getVar($student_immunization_id);
			} else {
				$student_immunization_id = NULL;
			}

			if ($immunization_year != NULL && $immunization_type != NULL) {
				$student_immunization_data = [
					'type' 			=> $immunization_type,
					'year' 			=> $immunization_year,
					'student_nis'	=> $student_nis
				];
				if ($student_immunization_id) {
					$student_immunization_data['id'] = $student_immunization_id;
					$this->studentImmunization->replace($student_immunization_data);
				} else {
					$this->studentImmunization->save($student_immunization_data);
				}
			}
		}

		$total_studentHealthHistory = (int) $this->request->getVar('total_studentHealthHistory');
		for ($x = 1; $x <= $total_studentHealthHistory; $x++) {
			$student_sickness = "new_sickness_history_" . $x;
			$student_sickness = $this->request->getVar($student_sickness);
			$student_age = "new_age_history_" . $x;
			$student_age = $this->request->getVar($student_age);
			$student_prevention = "student_prevention_" . $x;
			$student_prevention = $this->request->getVar($student_prevention);
			$student_health_history_id = "new_prevention_history_" . $x;
			if ($this->request->getVar($student_health_history_id)) {
				$student_health_history_id = $this->request->getVar($student_health_history_id);
			} else {
				$student_health_history_id = NULL;
			}

			if ($student_sickness != NULL && $student_age != NULL && $student_prevention != NULL) {
				$student_health_history_data = [
					'student_nis'			=> $student_nis,
					'sickness_disorder'		=> $student_sickness,
					'age'					=> $student_age,
					'prevention_medication' => $student_prevention
				];

				if ($student_health_history_id) {
					$student_health_history_data['id'] = $student_health_history_id;
					$this->studentHealthHistory->replace($student_health_history_data);
				} else {
					$this->studentHealthHistory->save($student_health_history_data);
				}
			}
		}

		$total_studentAllergies = (int) $this->request->getVar('total_studentAllergies');
		for ($x = 1; $x <= $total_studentAllergies; $x++) {
			$student_allergies = "new_allergies_" . $x;
			$student_allergies = $this->request->getVar($student_allergies);
			$student_age_allergies = "new_age_allergies_" . $x;
			$student_age_allergies = $this->request->getVar($student_age_allergies);
			$student_prevention_allergies = "new_prevention_allergies_" . $x;
			$student_prevention_allergies = $this->request->getVar($student_prevention_allergies);
			$student_allergies_id = "student_allergies_id_" . $x;
			if ($this->request->getVar($student_allergies_id)) {
				$student_allergies_id = $this->request->getVar($student_allergies_id);
			} else {
				$student_allergies_id = NULL;
			}

			if ($student_allergies != NULL && $student_age_allergies != NULL && $student_prevention_allergies != NULL) {
				$student_allergies_data = [
					'student_nis'			=> $student_nis,
					'type'					=> $student_allergies,
					'age'					=> $student_age_allergies,
					'prevention_medication' => $student_prevention_allergies
				];

				if ($student_allergies_data) {
					$student_allergies_data['id'] = $student_allergies_id;
					$this->studentAllergies->replace($student_allergies_data);
				} else {
					$this->studentAllergies->save($student_allergies_data);
				}
			}
		}

		$student_pregnancy_history_id = $this->request->getVar('student_pregnancy_history_id');
		$during_pregnancy			= $this->request->getVar('health31');
		$during_labour				= $this->request->getVar('health32');
		$during_first_year			= $this->request->getVar('health33');
		$during_second_third_year	= $this->request->getVar('health34');
		$mother_physical			= $this->request->getVar('health35');
		$mother_mental				= $this->request->getVar('health36');
		$birth_proses				= $this->request->getVar('health37');
		$time_of_birth				= $this->request->getVar('health38');
		$baby_nutritional			= $this->request->getVar('health39');

		$text_during_pregnancy				= $this->request->getVar('text_health31');
		$text_during_labour					= $this->request->getVar('text_health32');
		$text_during_first_year				= $this->request->getVar('text_health33');
		$text_during_second_third_year		= $this->request->getVar('text_health34');
		$text_mother_physical				= $this->request->getVar('text_health35');
		$text_mother_mental					= $this->request->getVar('text_health36');
		$text_birth_proses					= $this->request->getVar('text_health37');
		$text_baby_nutritional_breastmilk	= $this->request->getVar('text_health39_bm');
		$text_baby_nutritional_others		= $this->request->getVar('text_health39_o');

		$birth_height				= $this->request->getVar('birth_height');
		$birth_weight				= $this->request->getVar('birth_weight');

		$student_pregnancy_history_data = [
			'student_nis' 							=> $student_nis,
			'during_pregnancy' 						=> $during_pregnancy,
			'during_labour' 						=> $during_labour,
			'during_first_year' 					=> $during_first_year,
			'during_second_third_year' 				=> $during_second_third_year,
			'mother_physical'						=> $mother_physical,
			'mother_mental'							=> $mother_mental,
			'birth_proses'							=> $birth_proses,
			'time_of_birth'							=> $time_of_birth,
			'baby_nutritional'						=> $baby_nutritional,
			'birth_height'							=> $birth_height,
			'birth_weight'							=> $birth_weight,
			'text_during_pregnancy'					=> $text_during_pregnancy,
			'text_during_labour'					=> $text_during_labour,
			'text_during_first_year'				=> $text_during_first_year,
			'text_during_second_third_year'			=> $text_during_second_third_year,
			'text_mother_physical'					=> $text_mother_physical,
			'text_mother_mental'					=> $text_mother_mental,
			'text_birth_proses'						=> $text_birth_proses,
			'text_baby_nutritional_breastmilk'		=> $text_baby_nutritional_breastmilk,
			'text_baby_nutritional_others'			=> $text_baby_nutritional_others,
		];

		if ($student_pregnancy_history_id) {
			$student_pregnancy_history_data['id'] = $student_pregnancy_history_id;
			$this->studentPregnancyHistory->replace($student_pregnancy_history_data);
		} else {
			$this->studentPregnancyHistory->save($student_pregnancy_history_data);
		}

		$student_health_description_id = $this->request->getVar('student_health_description_id');
		$illness				= $this->request->getVar('health41');
		$describe_illness		= $this->request->getVar('text_health41');
		$respiratory_reaction	= $this->request->getVar('text_health42');
		$medication				= $this->request->getVar('text_health43');
		$serious_injuries		= $this->request->getVar('text_health44');
		$wear_glasses			= $this->request->getVar('health45');
		$vision_problem			= $this->request->getVar('text_health45');
		$hearing_problem		= $this->request->getVar('text_health46');

		$student_health_description_data = [
			'student_nis' 			=> $student_nis,
			"illness" 				=> $illness,
			"describe_illness"		=> $describe_illness,
			"respiratory_reaction"	=> $respiratory_reaction,
			"medication"			=> $medication,
			"serious_injuries"		=> $serious_injuries,
			"wear_glasses"			=> $wear_glasses,
			"vision_problem"		=> $vision_problem,
			"hearing_problem"		=> $hearing_problem
		];

		if ($student_health_description_id) {
			$student_health_description_data['id'] = $student_health_description_id;
			$this->studentHealthDescription->replace($student_health_description_data);
		} else {
			$this->studentHealthDescription->save($student_health_description_data);
		}

		/**
		 * Set Message Alert
		 */
		$session = session();
		$session->setFlashdata('success', 'Success');
		return redirect()->to('/user/healthexaminationrecord');
	}

	public function saveparentsquest()
	{
		$this->parentsQuestValidation();

		$student_nis 					= (int) $this->request->getVar('nis');

		$student_family_information_id	= $this->request->getVar('student_family_information_id');
		$parents_language				= $this->request->getVar('parents_language');
		$person_completing				= $this->request->getVar('person_completing');
		$whom_stay_during_day			= $this->request->getVar('text_parents23');
		$family_circumstances			= $this->request->getVar('text_parents24');
		$family_principles				= $this->request->getVar('text_parents25');
		$assessment_enjoyable_time		= $this->request->getVar('text_parents31');
		$assessment_development_concern	= $this->request->getVar('text_parents32');

		$student_family_information_data = [
			'student_nis' 						=> $student_nis,
			'parents_language' 					=> $parents_language,
			'person_completing' 				=> $person_completing,
			'whom_stay_during_day' 				=> $whom_stay_during_day,
			'family_circumstances'			 	=> $family_circumstances,
			'family_principles' 				=> $family_principles,
			'assessment_enjoyable_time' 		=> $assessment_enjoyable_time,
			'assessment_development_concern'	=> $assessment_development_concern
		];

		if ($student_family_information_id) {
			$student_family_information_data['id'] = $student_family_information_id;
			$this->studentFamilyInformation->replace($student_family_information_data);
		} else {
			$this->studentFamilyInformation->save($student_family_information_data);
		}

		$total_relationship_parentQuest = (int) $this->request->getVar('total_relationship_parentQuest');
		for ($x = 1; $x <= $total_relationship_parentQuest; $x++) {
			$person_name = "person_name_" . $x;
			$person_name = $this->request->getVar($person_name);
			$person_ages = "person_ages_" . $x;
			$person_ages = $this->request->getVar($person_ages);
			$person_relationship = "person_relationship_" . $x;
			$person_relationship = $this->request->getVar($person_relationship);
			$student_relationship_id = "student_relationship_id_" . $x;
			if ($this->request->getVar($student_relationship_id)) {
				$student_relationship_id = $this->request->getVar($student_relationship_id);
			} else {
				$student_relationship_id = NULL;
			}

			if ($person_name != NULL && $person_ages != NULL && $person_relationship != NULL) {
				$student_relationship_data = [
					'student_nis'	=> $student_nis,
					'name'			=> $person_name,
					'ages'			=> $person_ages,
					'relationship'	=> $person_relationship
				];

				if ($student_relationship_id) {
					$this->studentRelationship->where("id", $student_relationship_id)->set($student_relationship_data)->update();
				} else {
					$this->studentRelationship->save($student_relationship_data);
				}
			}
		}

		$student_prev_eval_current_service_id	= $this->request->getVar('student_prev_eval_current_service_id');
		$evaluations			= $this->request->getVar('parents41');
		$text_evaluations		= $this->request->getVar('text_parents42');
		$results_evaluations	= $this->request->getVar('text_parents43');
		$service				= $this->request->getVar('parents44');
		$results_service		= $this->request->getVar('text_parents45');
		$provided_service		= $this->request->getVar('text_parents46');

		$student_prev_eval_current_service_data = [
			'student_nis' 						=> $student_nis,
			'evaluations'		=> $evaluations,
			'text_evaluations'	=> $text_evaluations,
			'results_evaluations'	=> $results_evaluations,
			'service'				=> $service,
			'results_service'		=> $results_service,
			'provided_service'		=> $provided_service
		];

		if ($student_prev_eval_current_service_id) {
			$student_prev_eval_current_service_data['id'] = $student_prev_eval_current_service_id;
			$this->studentPrevEvalCurrentService->replace($student_prev_eval_current_service_data);
		} else {
			$this->studentPrevEvalCurrentService->save($student_prev_eval_current_service_data);
		}

		$student_development_domains_id	= $this->request->getVar('student_development_domains_id');
		$eat_drink				= $this->request->getVar('parents51');
		$dress					= $this->request->getVar('parents52');
		$use_toilet				= $this->request->getVar('parents53');
		$respond_approiately	= $this->request->getVar('parents54');
		$seek_out_playing		= $this->request->getVar('parents55');
		$play_cooperatively		= $this->request->getVar('parents56');
		$speak					= $this->request->getVar('parents57');
		$people_unfamiliar		= $this->request->getVar('parents58');
		$verbally				= $this->request->getVar('parents59');
		$write_words			= $this->request->getVar('parents510');
		$can_read				= $this->request->getVar('parents511');

		$student_development_domains_data = [
			'student_nis' 			=> $student_nis,
			'eat_drink'				=> $eat_drink,
			'dress'					=> $dress,
			'use_toilet'			=> $use_toilet,
			'respond_approiately'	=> $respond_approiately,
			'seek_out_playing'		=> $seek_out_playing,
			'play_cooperatively'	=> $play_cooperatively,
			'speak'					=> $speak,
			'people_unfamiliar'		=> $people_unfamiliar,
			'verbally'				=> $verbally,
			'write_words'			=> $write_words,
			'can_read'				=> $can_read
		];

		if ($student_development_domains_id) {
			$student_development_domains_data['id'] = $student_development_domains_id;
			$this->studentDevelopmentDomains->replace($student_development_domains_data);
		} else {
			$this->studentDevelopmentDomains->save($student_development_domains_data);
		}

		$parents_survey_id				= $this->request->getVar('parents_survey_id');
		$why_choose						= $this->request->getVar("text_parents61");
		$method_think					= $this->request->getVar("text_parents62");
		$hope							= $this->request->getVar("text_parents63");
		$responsibilities_opinion		= $this->request->getVar("text_parents64");
		$want_to_become					= $this->request->getVar("text_parents65");
		$wish							= $this->request->getVar("text_parents66");
		$ideal_curriculum				= $this->request->getVar("text_parents67");
		$un_opinion						= $this->request->getVar("text_parents68");
		$international_exam_opinion		= $this->request->getVar("text_parents69");
		$curriculum_prefer				= $this->request->getVar("text_parents610");
		$spiritual_hope					= $this->request->getVar("text_parents611");
		$academics_hope					= $this->request->getVar("text_parents612");
		$global_view_hope				= $this->request->getVar("text_parents613");
		$nationality_hope				= $this->request->getVar("text_parents614");
		$social_emotional_hope			= $this->request->getVar("text_parents615");
		$spirit_effort					= $this->request->getVar("text_parents616");
		$academics_effort				= $this->request->getVar("text_parents617");
		$global_view_effort				= $this->request->getVar("text_parents618");
		$nationality_effort				= $this->request->getVar("text_parents619");
		$social_emotional_effort		= $this->request->getVar("text_parents620");
		$child_describe					= $this->request->getVar("text_parents71");
		$demotivation_respond			= $this->request->getVar("text_parents72");
		$bullying_respond				= $this->request->getVar("text_parents73");
		$cheating_respond				= $this->request->getVar("text_parents74");
		$failure_respond				= $this->request->getVar("text_parents75");
		$lateness_respond				= $this->request->getVar("text_parents76");
		$most_interacts					= $this->request->getVar("text_parents77");
		$communication					= $this->request->getVar("text_parents78");
		$ideas							= $this->request->getVar("text_parents79");
		$finance						= $this->request->getVar("text_parents710");
		$student_independence			= $this->request->getVar("text_parents711");
		$independence_train				= $this->request->getVar("text_parents712");
		$parents_opinion				= $this->request->getVar("text_parents713");
		$eligible						= $this->request->getVar("text_parents714");
		$contribution					= $this->request->getVar("text_parents715");
		$school_notes					= $this->request->getVar("text_parents716");
		$teacher_notes					= $this->request->getVar("text_parents717");

		$parents_survey_data = [
			'student_nis' 					=> $student_nis,
			"why_choose" 					=> $why_choose,
			"method_think" 					=> $method_think,
			"hope" 							=> $hope,
			"responsibilities_opinion" 		=> $responsibilities_opinion,
			"want_to_become" 				=> $want_to_become,
			"wish"	 						=> $wish,
			"ideal_curriculum" 				=> $ideal_curriculum,
			"un_opinion" 					=> $un_opinion,
			"international_exam_opinion" 	=> $international_exam_opinion,
			"curriculum_prefer" 			=> $curriculum_prefer,
			"spiritual_hope" 				=> $spiritual_hope,
			"academics_hope" 				=> $academics_hope,
			"global_view_hope" 				=> $global_view_hope,
			"nationality_hope"				=> $nationality_hope,
			"social_emotional_hope" 		=> $social_emotional_hope,
			"spirit_effort" 				=> $spirit_effort,
			"academics_effort" 				=> $academics_effort,
			"global_view_effort" 			=> $global_view_effort,
			"nationality_effort" 			=> $nationality_effort,
			"social_emotional_effort" 		=> $social_emotional_effort,
			"child_describe" 				=> $child_describe,
			"demotivation_respond" 			=> $demotivation_respond,
			"bullying_respond" 				=> $bullying_respond,
			"cheating_respond"	 			=> $cheating_respond,
			"failure_respond" 				=> $failure_respond,
			"lateness_respond"		 		=> $lateness_respond,
			"most_interacts" 				=> $most_interacts,
			"communication" 				=> $communication,
			"ideas" 						=> $ideas,
			"finance" 						=> $finance,
			"student_independence" 			=> $student_independence,
			"independence_train" 			=> $independence_train,
			"parents_opinion" 				=> $parents_opinion,
			"eligible" 						=> $eligible,
			"contribution"					=> $contribution,
			"school_notes"					=> $school_notes,
			"teacher_notes"					=> $teacher_notes
		];

		if ($parents_survey_id) {
			$parents_survey_data['id'] = $parents_survey_id;
			$this->parentsSurvey->replace($parents_survey_data);
		} else {
			$this->parentsSurvey->save($parents_survey_data);
		}

		/**
		 * Set Message Alert
		 */
		$session = session();
		$session->setFlashdata('success', 'Success');
		return redirect()->to('/user/parentsquestionnaire');
	}

	public function saveVehicle()
	{
		$msg_type = 'wrong';
		$msg = 'Failed to add data!';

		$student_nis = (int) $this->request->getVar('nis');
		$total_vehicle = (int) $this->request->getVar('total_vehicle');
		for ($x = 0; $x <= $total_vehicle; $x++) {
			$no_plat = "no_plat_" . $x;
			$no_plat = $this->request->getVar($no_plat);
			$pickup_name = "pickup_name_" . $x;
			$pickup_name = $this->request->getVar($pickup_name);
			$pickup_number = "pickup_number_" . $x;
			$pickup_number = $this->request->getVar($pickup_number);
			$student_vehicle_id = 'student_vehicle_id_' . $x;
			if ($this->request->getVar($student_vehicle_id)) {
				$student_vehicle_id = $this->request->getVar($student_vehicle_id);
			} else {
				$student_vehicle_id = NULL;
			}

			if ($no_plat != NULL && $pickup_name != NULL && $pickup_number != NULL) {
				$student_vehicle_data = [
					'no_plat' 				=> $no_plat,
					'pickup_person' 		=> $pickup_name,
					'pickup_person_phone' 	=> $pickup_number,
					'student_nis'			=> $student_nis
				];
				if ($student_vehicle_id) {
					$student_vehicle_data['id'] = $student_vehicle_id;
					$this->studentVehicle->replace($student_vehicle_data);
				} else {
					$this->studentVehicle->save($student_vehicle_data);
				}
				$msg_type = 'success';
				$msg = 'Success';
			}
		}

		/**
		 * Set Message Alert
		 */
		$session = session();
		$session->setFlashdata($msg_type, $msg);
		return redirect()->to('/user/vehicleregistration');
	}

	public function deleteNonFormalEdu($id)
	{
		$this->studentBackgroundNonFormalEdu->delete($id);

		/**
		 * Set Message Alert
		 */
		$session = session();
		$session->setFlashdata('success', 'Delete Success');
		return redirect()->to('/user/applicationforadmission');
	}

	public function deleteRelationship($id)
	{
		$this->studentRelationship->delete($id);

		/**
		 * Set Message Alert
		 */
		$session = session();
		$session->setFlashdata('success', 'Delete Success');
		return redirect()->to(previous_url());
	}

	public function deleteImmunization($id)
	{
		$this->studentImmunization->delete($id);

		/**
		 * Set Message Alert
		 */
		$session = session();
		$session->setFlashdata('success', 'Delete Success');
		return redirect()->to('/user/healthexaminationrecord');
	}

	public function deleteHealth($id)
	{
		$this->studentHealthHistory->delete($id);

		/**
		 * Set Message Alert
		 */
		$session = session();
		$session->setFlashdata('success', 'Delete Success');
		return redirect()->to('/user/healthexaminationrecord');
	}

	public function deleteAllergies($id)
	{
		$this->studentAllergies->delete($id);

		/**
		 * Set Message Alert
		 */
		$session = session();
		$session->setFlashdata('success', 'Delete Success');
		return redirect()->to('/user/healthexaminationrecord');
	}

	public function deleteVehicle($id)
	{
		$this->studentVehicle->delete($id, false);

		// dd($this->studentVehicle->delete($id, false));
		/**
		 * Set Message Alert
		 */
		$session = session();
		$session->setFlashdata('success', 'Delete Success');
		return redirect()->to('/user/vehicleregistration');
	}

	public function setFirstTime($id)
	{
		// $student_nis = (int) $this->request->getVar('nis');
		$level = (int) $this->request->getVar('level');
		$type = 'failed';
		$msg_type = 'Failed';
		if ($level != 0) {
			if ($level == 2) $level = (int) $this->request->getVar('mayor');
			$this->groupUser->addUserToGroup($id, $level);
			$this->usersDetail->where(['id' => $id])->set(['first_time' => 0])->update();
			$type = 'success';
			$msg_type = 'Success';
		}
		/**
		 * Set Message Alert
		 */
		$session = session();
		$session->setFlashdata($type, $msg_type);
		return redirect()->to(previous_url());
	}

	protected function validation()
	{
		if (!$this->validate([
			/**
			 * Validate for Student detail
			 */
			'fullname' =>
			[
				'rules'	=> 'required',
				'errors' =>
				[
					'required'	=> 'Full Name field is required.'
				]
			],
			'gender' =>
			[
				'rules'	=> 'required',
				'errors' =>
				[
					'required'	=> 'Gender field is required.'
				]
			],
			'place_of_birth' =>
			[
				'rules'	=> 'required',
				'errors' =>
				[
					'required'	=> 'Place of Birth field is required.'
				]
			],
			'birthday' =>
			[
				'rules'	=> 'required',
				'errors' =>
				[
					'required'	=> 'Date of Birth field is required.'
				]
			],
			'nationality' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> 'Place of Birth field is required.'
				]
			],
			'religion' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> 'Religion field is required.'
				]
			],
			'birth_order' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> 'Birth Order field is required.'
				]
			],
			'no_siblings' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> 'No. Siblings field is required.'
				]
			],
			'spoken_language' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> 'Spoken Language field is required.'
				]
			],
			'home_address' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> 'Home Address field is required.'
				]
			],
			'postal_code' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> 'Postal Code field is required.'
				]
			],
			'city' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> 'City field is required.'
				]
			],
			'home_distance' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> 'Home Distance field is required.'
				]
			],
			'phone_number' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> 'Phone Number field is required.'
				]
			],
			'vehicle' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> 'Going to School by field is required.'
				]
			],

			/**
			 * Validate for Father particular
			 */
			'fathers_name' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> "Father's Name field is required."
				]
			],
			'fathers_pob' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> "Father's Place of Birth field is required."
				]
			],
			'fathers_dob' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> "Father's Date of Birth field is required."
				]
			],
			'fathers_nationality' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> "Father's Nationality field is required."
				]
			],
			'fathers_religion' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> "Father's Religion field is required."
				]
			],
			'fathers_id_type' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> "Father's ID Type field is required."
				]
			],
			'fathers_id_number' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> "Father's ID Number field is required."
				]
			],
			'fathers_education' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> "Father's Last Education Title field is required."
				]
			],
			'fathers_major' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> "Father's Major field is required."
				]
			],
			'fathers_university' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> "Father's University Name field is required."
				]
			],
			'fathers_address' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> "Father's Home Address field is required."
				]
			],
			'fathers_city' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> "Father's City field is required."
				]
			],
			'fathers_postal' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> "Father's Postal Code field is required."
				]
			],
			'fathers_phone' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> "Father's Phone Number field is required."
				]
			],
			'fathers_email' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> "Father's Email field is required."
				]
			],
			'fathers_occupation' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> "Father's Occupation field is required."
				]
			],
			'fathers_position' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> "Father's Position field is required."
				]
			],
			'fathers_institution' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> "Father's Name of Institution field is required."
				]
			],
			'fathers_office' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> "Father's Office Address field is required."
				]
			],
			'fathers_relationship' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> "Father's Relationship with Child field is required."
				]
			],
			'fathers_status' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> "Father's Marital Status field is required."
				]
			],
			'fathers_lives' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> "Father's The Child Lives With field is required."
				]
			],

			/**
			 * Validate for Father particular
			 */
			'mothers_name' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> "Mother's Name field is required."
				]
			],
			'mothers_pob' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> "Mother's Place of Birth field is required."
				]
			],
			'mothers_dob' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> "Mother's Date of Birth field is required."
				]
			],
			'mothers_nationality' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> "Mother's Nationality field is required."
				]
			],
			'mothers_religion' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> "Mother's Religion field is required."
				]
			],
			'mothers_id_type' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> "Mother's ID Type field is required."
				]
			],
			'mothers_id_number' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> "Mother's ID Number field is required."
				]
			],
			'mothers_education' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> "Mother's Last Education Title field is required."
				]
			],
			'mothers_major' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> "Mother's Major field is required."
				]
			],
			'mothers_university' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> "Mother's University Name field is required."
				]
			],
			'mothers_address' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> "Mother's Home Address field is required."
				]
			],
			'mothers_city' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> "Mother's City field is required."
				]
			],
			'mothers_postal' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> "Mother's Postal Code field is required."
				]
			],
			'mothers_phone' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> "Mother's Phone Number field is required."
				]
			],
			'mothers_email' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> "Mother's Email field is required."
				]
			],
			'mothers_occupation' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> "Mother's Occupation field is required."
				]
			],
			'mothers_position' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> "Mother's Position field is required."
				]
			],
			'mothers_institution' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> "Mother's Name of Institution field is required."
				]
			],
			'mothers_office' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> "Mother's Office Address field is required."
				]
			],
			'mothers_relationship' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> "Mother's Relationship with Child field is required."
				]
			],
			'mothers_status' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> "Mother's Marital Status field is required."
				]
			],
			'mothers_lives' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> "Mother's The Child Lives With field is required."
				]
			],
			/**
			 * Validate admission message
			 */
			'message_school' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> "School Information With field is required."
				]
			],
			'message_declaration' =>
			[
				'rules' => 'required',
				'errors' =>
				[
					'required'	=> "Declaration With field is required."
				]
			],

		])) {
			// $validation = \Config\Services::validation();
			// return redirect()->to('/user/applicationforadmission')->withInput('validation', $validation);
			return redirect()->to('/user/applicationforadmission')->withInput();
		}
	}

	protected function parentsQuestValidation()
	{
		if (!$this->validate([
			/**
			 * Validate for Student detail
			 */
			'parents_language' =>
			[
				'rules'	=> 'required',
				'errors' =>
				[
					'required'	=> 'Parents Native Language field is required.'
				]
			],
			'person_completing' =>
			[
				'rules'	=> 'required',
				'errors' =>
				[
					'required'	=> 'Person Completing field is required.'
				]
			],
			'text_parents23' =>
			[
				'rules'	=> 'required',
				'errors' =>
				[
					'required'	=> 'This field is required.'
				]
			],
			'text_parents24' =>
			[
				'rules'	=> 'required',
				'errors' =>
				[
					'required'	=> 'This field is required.'
				]
			],
			'text_parents25' =>
			[
				'rules'	=> 'required',
				'errors' =>
				[
					'required'	=> 'This field is required.'
				]
			],
			'text_parents31' =>
			[
				'rules'	=> 'required',
				'errors' =>
				[
					'required'	=> 'This field is required.'
				]
			],
			'text_parents32' =>
			[
				'rules'	=> 'required',
				'errors' =>
				[
					'required'	=> 'This field is required.'
				]
			],
			'text_parents43' =>
			[
				'rules'	=> 'required',
				'errors' =>
				[
					'required'	=> 'This field is required.'
				]
			],
			'text_parents45' =>
			[
				'rules'	=> 'required',
				'errors' =>
				[
					'required'	=> 'This field is required.'
				]
			],
			'text_parents46' =>
			[
				'rules'	=> 'required',
				'errors' =>
				[
					'required'	=> 'This field is required.'
				]
			],
			'text_parents61' =>
			[
				'rules'	=> 'required',
				'errors' =>
				[
					'required'	=> 'This field is required.'
				]
			],
			'text_parents62' =>
			[
				'rules'	=> 'required',
				'errors' =>
				[
					'required'	=> 'This field is required.'
				]
			],
			'text_parents63' =>
			[
				'rules'	=> 'required',
				'errors' =>
				[
					'required'	=> 'This field is required.'
				]
			],
			'text_parents64' =>
			[
				'rules'	=> 'required',
				'errors' =>
				[
					'required'	=> 'This field is required.'
				]
			],
			'text_parents65' =>
			[
				'rules'	=> 'required',
				'errors' =>
				[
					'required'	=> 'This field is required.'
				]
			],
			'text_parents66' =>
			[
				'rules'	=> 'required',
				'errors' =>
				[
					'required'	=> 'This field is required.'
				]
			],
			'text_parents67' =>
			[
				'rules'	=> 'required',
				'errors' =>
				[
					'required'	=> 'This field is required.'
				]
			],
			'text_parents68' =>
			[
				'rules'	=> 'required',
				'errors' =>
				[
					'required'	=> 'This field is required.'
				]
			],
			'text_parents69' =>
			[
				'rules'	=> 'required',
				'errors' =>
				[
					'required'	=> 'This field is required.'
				]
			],
			'text_parents610' =>
			[
				'rules'	=> 'required',
				'errors' =>
				[
					'required'	=> 'This field is required.'
				]
			],
			'text_parents611' =>
			[
				'rules'	=> 'required',
				'errors' =>
				[
					'required'	=> 'This field is required.'
				]
			],
			'text_parents612' =>
			[
				'rules'	=> 'required',
				'errors' =>
				[
					'required'	=> 'This field is required.'
				]
			],
			'text_parents613' =>
			[
				'rules'	=> 'required',
				'errors' =>
				[
					'required'	=> 'This field is required.'
				]
			],
			'text_parents614' =>
			[
				'rules'	=> 'required',
				'errors' =>
				[
					'required'	=> 'This field is required.'
				]
			],
			'text_parents615' =>
			[
				'rules'	=> 'required',
				'errors' =>
				[
					'required'	=> 'This field is required.'
				]
			],
			'text_parents616' =>
			[
				'rules'	=> 'required',
				'errors' =>
				[
					'required'	=> 'This field is required.'
				]
			],
			'text_parents617' =>
			[
				'rules'	=> 'required',
				'errors' =>
				[
					'required'	=> 'This field is required.'
				]
			],
			'text_parents618' =>
			[
				'rules'	=> 'required',
				'errors' =>
				[
					'required'	=> 'This field is required.'
				]
			],
			'text_parents619' =>
			[
				'rules'	=> 'required',
				'errors' =>
				[
					'required'	=> 'This field is required.'
				]
			],
			'text_parents620' =>
			[
				'rules'	=> 'required',
				'errors' =>
				[
					'required'	=> 'This field is required.'
				]
			],
			'text_parents71' =>
			[
				'rules'	=> 'required',
				'errors' =>
				[
					'required'	=> 'This field is required.'
				]
			],
			'text_parents72' =>
			[
				'rules'	=> 'required',
				'errors' =>
				[
					'required'	=> 'This field is required.'
				]
			],
			'text_parents73' =>
			[
				'rules'	=> 'required',
				'errors' =>
				[
					'required'	=> 'This field is required.'
				]
			],
			'text_parents74' =>
			[
				'rules'	=> 'required',
				'errors' =>
				[
					'required'	=> 'This field is required.'
				]
			],
			'text_parents75' =>
			[
				'rules'	=> 'required',
				'errors' =>
				[
					'required'	=> 'This field is required.'
				]
			],
			'text_parents76' =>
			[
				'rules'	=> 'required',
				'errors' =>
				[
					'required'	=> 'This field is required.'
				]
			],
			'text_parents77' =>
			[
				'rules'	=> 'required',
				'errors' =>
				[
					'required'	=> 'This field is required.'
				]
			],
			'text_parents78' =>
			[
				'rules'	=> 'required',
				'errors' =>
				[
					'required'	=> 'This field is required.'
				]
			],
			'text_parents79' =>
			[
				'rules'	=> 'required',
				'errors' =>
				[
					'required'	=> 'This field is required.'
				]
			],
			'text_parents710' =>
			[
				'rules'	=> 'required',
				'errors' =>
				[
					'required'	=> 'This field is required.'
				]
			],
			'text_parents711' =>
			[
				'rules'	=> 'required',
				'errors' =>
				[
					'required'	=> 'This field is required.'
				]
			],
			'text_parents712' =>
			[
				'rules'	=> 'required',
				'errors' =>
				[
					'required'	=> 'This field is required.'
				]
			],
			'text_parents713' =>
			[
				'rules'	=> 'required',
				'errors' =>
				[
					'required'	=> 'This field is required.'
				]
			],
			'text_parents714' =>
			[
				'rules'	=> 'required',
				'errors' =>
				[
					'required'	=> 'This field is required.'
				]
			],
			'text_parents715' =>
			[
				'rules'	=> 'required',
				'errors' =>
				[
					'required'	=> 'This field is required.'
				]
			],
			'text_parents716' =>
			[
				'rules'	=> 'required',
				'errors' =>
				[
					'required'	=> 'This field is required.'
				]
			],
			'text_parents717' =>
			[
				'rules'	=> 'required',
				'errors' =>
				[
					'required'	=> 'This field is required.'
				]
			],
		])) {
			$validation = \Config\Services::validation();
			return redirect()->to('/user/applicationforadmission')->withInput('validation', $validation);
			// return redirect()->to('/user/parentsquestionnare')->withInput();
		}
	}
}
