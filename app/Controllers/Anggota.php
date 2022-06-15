<?php

namespace App\Controllers;
use App\Models\AnggotaModel;


class Anggota extends BaseController
{  protected $Anggota;

    function __construct()
    {
        $this->anggota=new AnggotaModel();
    }
    
    public function index()
    { 
        $data['anggota'] = $this->anggota->findAll(); 
        return view('Anggota/Buka/index', $data);
    } 
    public function tambah()
    {  $data['pinjaman'] = $this->pinjaman->findAll(); 
        return view('Pinjaman/Buka/tambah',$data);
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
