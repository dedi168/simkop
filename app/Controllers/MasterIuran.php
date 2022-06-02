<?php

namespace App\Controllers;
use App\Models\MasterIuranModel;


class MasterIuran extends BaseController
{ 

    function __construct()
    {
        $this->iuran=new MasterIuranModel();
    }
    
    public function index()
    { 
        $data['iuran'] = $this->iuran->findAll(); 
        return view('Master/masteriuran', $data);
    } 
   
    public function update($id)
    {
        if (!$this->validate([
                'pokok' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ],
                'wajib' => [
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
    
        $this->iuran->update($id, [  
            'pokok' => $this->request->getVar('pokok'),
            'wajib' => $this->request->getVar('wajib') 
        ]);
        session()->setFlashdata('message', 'Update Data iuran Berhasil');
        return redirect()->to('/masteriuran');
    }

}
