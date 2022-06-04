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
                'kode' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ],
                'nama' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ],
                'akun_id' => [
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
        $model = new MasterJsimpModel();
        $model->insert([
            'kode' => $this->request->getVar('kode'),
            'nama' => $this->request->getVar('nama'),
            'akun_id' => $this->request->getVar('akun_id') 
        ]);
        session()->setFlashdata('message', 'Tambah Data Master Jenis Simpanan Berhasil');
        return redirect()->to('/MasterJSimp');
    }

    public function update($id)
    {
        if (!$this->validate([
            'kode' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ],
                'nama' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ],
                'akun_id' => [
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
  
    $model = new MasterJsimpModel();
    $model->update($id, [ 
        'kode' => $this->request->getVar('kode'),
        'nama' => $this->request->getVar('nama'),
        'akun_id' => $this->request->getVar('akun_id') 
    ]);
    session()->setFlashdata('message', 'Update Data Obat Berhasil');
    return redirect()->to('/MasterJSimp');
    }
  
    function delete($id)
    { 
        $model = new MasterJsimpModel();
        $jsimp = $model->find($id);
        if (empty($jsimp)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Master Jenis Simpanan Tidak ditemukan !');
        }
        $model->delete($id);
        session()->setFlashdata('message', 'Delete Master Jenis Simpanan Berhasil');
        return redirect()->to('/MasterJSimp');
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
