<?php

namespace App\Controllers;

class master extends BaseController
{
    public function index()
    { 
        return view('Master/Bungasimpanan/index');
    }
    public function tambah()
    { 
        return view('Master/Bungasimpanan/tambah');
    }
}
