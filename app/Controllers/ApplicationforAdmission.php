<?php

namespace App\Controllers;

use \App\Models\StudentDetailModel;

class applicationforadmission extends BaseController
{    
    protected $userDetail;

    
    public function __construct()
    {
        $this->studentDetail = new StudentDetailModel();
    }
    
    protected function studentData($nis = 1)
    {
        $student_detail = $this->studentDetail->where(['nis' => $nis])->findAll();
        foreach ($student_detail as $s) {
            $new['application_admission'] = null;
            $new_students = ["student_detail" => $s];
        }
    }

	public function index()
	{
		$data['title'] = "Application For Admission";
		return view('forms/applicationforadmission', $data);
	}
}
