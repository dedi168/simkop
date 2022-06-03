<?php

namespace App\Controllers;
use App\Models\MasterJsimpModel;
class MasterJSimp extends BaseController
{

    public function index()
    {
        $model = new MasterJsimpModel();
        $data['jsimp'] = $model->getdatajsim(); 
        $data['akun'] = $model->getdataakun();
        echo view('Master/masterjenissimpanan',$data); 
    }
     
  
    public function store()
    {
        if (!$this->validate([
                'nama' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ],
                'id_kategori' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ],
                'tipe' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ],
                'id_suplier' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi' 
            ]
            ], 
        
        ])) 
        {
        session()->setFlashdata('error', $this->validator->listErrors());
        return redirect()->back()->withInput();
        }
        $model = new DataObatModel();
        $model->insert([
            'nama' => $this->request->getVar('nama'),
            'id_kategori' => $this->request->getVar('id_kategori'),
            'tipe' => $this->request->getVar('tipe'),
            'id_suplier' => $this->request->getVar('id_suplier')
        ]);
        session()->setFlashdata('message', 'Tambah Data Obat Berhasil');
        return redirect()->to('/dataobat');
    }
    // protected $db, $builder;
    // public function __construct()
    // {
    //     $this->db      = \Config\Database::connect();
    //     $this->builder = $this-> db->table('tb_master_jsimp');
    // }
    // public function index()
    // {  
    //     $this->builder->select('*');
    //     $this->builder->join('tb_akunsimp', 'tb_akunsimp.id = tb_master_jsimp.akun_id'); 
    //     $query = $this->builder->get(); 

    //     $data['jsimp']=$query->getResultArray();


    //     return view('Master/masterjenissimpanan',$data);
    // }  
}
