<?php

namespace App\Controllers;

class Teacher extends BaseController
{
	public function index()
	{
		$data['title'] = "Dashboard";
		return view('teacher/index', $data);
	}
}
