<?php

namespace App\Controllers;
use App\Models\MasterBungaDepositoModel;
class Masterbungadeposit extends BaseController
{protected $bdep;

    function __construct()
    {
        $this->bdep=new MasterBungaDepositoModel();
    }
    
    public function index()
    { 
        $currentPage= $this->request->getVar('page')? $this->request->getVar('page'):1;
        $data = [
            'bdep'=> $this->bdep->paginate(10 , 'default'),
            'pager' => $this->bdep->pager,
            'currentPage'=>$currentPage,
        ] ;   
        return view('Master/masterbungadeposit', $data);
    } 
    public function store()
    {
        if (!$this->validate([ 
                'jangka' => [
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
                'keterangan' => [
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
        $this->bdep->insert([
            'id' => $this->request->getVar('id'),
            'jangka' => $this->request->getVar('jangka'),
            'bunga' => $this->request->getVar('bunga'),
            'keterangan' => $this->request->getVar('keterangan') 
        ]);
        session()->setFlashdata('message', 'Tambah Data Master Jenis kredit Berhasil');
        return redirect()->to('/Masterbungadeposit');
    }

    public function update($id)
    {
        if (!$this->validate([
            'jangka' => [
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
                'keterangan' => [
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
        $model = new MasterBungaDepositoModel();
        $model->update($id, [  
            'jangka' => $this->request->getVar('jangka'),
            'bunga' => $this->request->getVar('bunga'),
            'keterangan' => $this->request->getVar('keterangan') 
    ]);
    session()->setFlashdata('message', 'Update Master Bunga Deposito Berhasil');
    return redirect()->to('/Masterbungadeposit');
    }
  
    function delete($id)
    { 
        $model = new MasterBungaDepositoModel();
        $bdep = $model->find($id);
        if (empty($bdep)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Master Jenis kredit Tidak ditemukan !');
        }
        $model->delete($id);
        session()->setFlashdata('message', 'Delete Master Jenis Kredit Berhasil');
        return redirect()->to('/Masterbungadeposito');
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
