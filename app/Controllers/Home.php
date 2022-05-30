<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['title']='welcome';
        return view('welcome_message');
    }
}
