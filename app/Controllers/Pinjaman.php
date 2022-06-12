<?php

namespace App\Controllers;
use App\Models\PinjamanModel;


class Pinjaman extends BaseController
{  protected $pinjaman;

    function __construct()
    {
        $this->pinjaman=new PinjamanModel();
    }
    
    public function index()
    { 
        $data['pinjaman'] = $this->pinjaman->findAll(); 
        return view('Pinjaman/Buka/index', $data);
    } 
    public function tambah()
    {  
        return view('Pinjaman/Buka/tambah');
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
