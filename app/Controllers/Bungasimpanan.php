<?php

namespace App\Controllers;
use App\Models\BungaSimpananModel;


class Bungasimpanan extends BaseController
{
    protected $bunga;

    function __construct()
    {
        $this->bunga=new BungaSimpananModel();
    }
    
    public function index()
    { 
        $data['bunga'] = $this->bunga->findAll(); 
        return view('Master/Bungasimpanan/index', $data);
    } 
   
    public function update($id)
    {
        if (!$this->validate([
                'bunga' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ],
                'batas' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
        ]))
        {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back();
        }
    
        $this->bunga->update($id, [  
            'bunga' => $this->request->getVar('bunga'),
            'batas' => $this->request->getVar('batas') 
        ]);
        session()->setFlashdata('message', 'Update Data Bunga Simpanan Berhasil');
        return redirect()->to('/bungasimpanan');
    }

}
