<?php

namespace App\Controllers;

class logintest extends BaseController
{
    public function index()
    {
        $data['title'] = "Welcome";
        return view('test/welcome', $data);
    }
}
