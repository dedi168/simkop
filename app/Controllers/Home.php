<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['title']='welcome';
        return view('Auth/reset');
    }
}
