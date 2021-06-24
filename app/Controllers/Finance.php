<?php

namespace App\Controllers;

class Finance extends BaseController
{
	public function index()
	{
		$data['title'] = "Welcome";
		return view('finance/index', $data);
	}
}
