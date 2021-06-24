<?php

namespace App\Controllers;

class Marketing extends BaseController
{
	public function index()
	{
		$data['title'] = "Welcome";
		return view('marketing/index', $data);
	}
}
