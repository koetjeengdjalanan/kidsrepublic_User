<?php

namespace App\Controllers;

class Admission extends BaseController
{
	public function index()
	{
		$data['title'] = "Dashboard";
		return view('admission/index', $data);
	}
}
