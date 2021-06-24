<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data['title'] = "Welcome";
		return view('login', $data);
	}
	public function test()
	{
		$db = \Config\Database::connect();
		$builder = $db->table('student_details_dummy');
		$query = $builder->get();
		dd($query);
	}
}
