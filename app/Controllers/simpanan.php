<?php

namespace App\Controllers;
use App\Models\SimpananModel;


class Simpanan extends BaseController
{  protected $simpanan;

    function __construct()
    {
        $this->simpanan=new SimpananModel();
    }
    
    public function index()
    { 
        $data['simpanan'] = $this->simpanan->findAll(); 
        return view('Simpanan/Buka/index', $data);
    } 
    public function tambah()
    {   $data['simpanan'] = $this->simpanan->findAll(); 
        $data['bunga'] = $this->simpanan->getbunga(); 
        $data['anggota'] = $this->simpanan->getanggota();  
        return view('Simpanan/Buka/tambah',$data);
    } 
    public function getanggota()
    { 
		$request = \Config\Services::request();
		$id = $request->getPostGet('term');
		$anggota = $this->simpanan->like('id_anggota', $id)->findAll();
		$w = array();
		foreach($anggota as $rt):
			$w[] = [
				"label" => $rt['id_anggota'],
				"email" => $rt['nama'],
			];
			
		endforeach; 
		echo json_encode($w);

		
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
