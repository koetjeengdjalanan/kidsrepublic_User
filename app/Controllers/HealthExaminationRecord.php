<?php

namespace App\Controllers;

class healthexaminationrecord extends BaseController
{
	public function index()
	{
		$data['title'] = "Health Examination Record";
		return view('forms/healthexaminationrecord', $data);
	}
}
