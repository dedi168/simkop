<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {
        $data['title']='Nasabah';
        return view('User/index');
    }
    public function riwayat()
    { 
        return view('User/riwayat');
    }
}
