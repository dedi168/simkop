<?php

namespace App\Controllers;
use App\Models\MasterJkreditModel;
class MasterJKredit extends BaseController
{protected $jkre;

    function __construct()
    {
        $this->jkre=new MasterJkreditModel();
    }
    
    public function index()
    { 
        $data['jkre'] = $this->jkre->findAll(); 
        return view('Master/masterjeniskredit', $data);
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
                'akun' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
                'bunga' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
                'denda' => [
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
        $this->jkre->insert([
            'nama' => $this->request->getVar('nama'),
            'akun' => $this->request->getVar('akun'),
            'bunga' => $this->request->getVar('bunga'),
            'denda' => $this->request->getVar('denda')
        ]);
        session()->setFlashdata('message', 'Tambah Data Master Jenis kredit Berhasil');
        return redirect()->to('/MasterJKredit');
    }

    public function update($id)
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ],
                'akun' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
                'bunga' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
                'denda' => [
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
        $model = new MasterJkreditModel();
        $model->update($id, [ 
            'nama' => $this->request->getVar('nama'),
            'akun' => $this->request->getVar('akun'),
            'bunga' => $this->request->getVar('bunga'),
            'bunga' => $this->request->getVar('denda')
    ]);
    session()->setFlashdata('message', 'Update Master Jenis Kredit Berhasil');
    return redirect()->to('/MasterJKre');
    }
  
    function delete($id)
    { 
        $model = new MasterJsimpModel();
        $jker = $model->find($id);
        if (empty($jker)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Master Jenis kredit Tidak ditemukan !');
        }
        $model->delete($id);
        session()->setFlashdata('message', 'Delete Master Jenis Kredit Berhasil');
        return redirect()->to('/MasterJKre');
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
