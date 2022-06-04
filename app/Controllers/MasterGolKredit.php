<?php

namespace App\Controllers;
use App\Models\MasterGolKreditModel;
class MasterGolKredit extends BaseController
{protected $golkre;

    function __construct()
    {
        $this->golkre=new MasterGolKreditModel(); 
    }

    public function index()
    { 
        $data['golkre'] = $this->golkre->findAll(); 
        echo view('Master/mastergolkredit',$data); 
    }
         
    public function store()
    {
        if (!$this->validate([
                'id' => [
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
                'bawah' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
                'atas' => [
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
        $this->golkre->insert([
            'id' => $this->request->getVar('id'),
            'nama' => $this->request->getVar('nama'),
            'bawah' => $this->request->getVar('bawah'),
            'atas' => $this->request->getVar('atas') 
        ]);
        session()->setFlashdata('message', 'Tambah Data Master Jenis Simpanan Berhasil');
        return redirect()->to('/MasterGolKredit');
    }

    public function update($id)
    {
        if (!$this->validate([
            'id' => [
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
            'bawah' => [
            'rules' => 'required',
            'errors' => [
            'required' => '{field} Harus diisi'
        ]
        ], 
            'atas' => [
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
    $this->golkre->update($id, [ 
            'id' => $this->request->getVar('id'),
            'nama' => $this->request->getVar('nama'),
            'bawah' => $this->request->getVar('bawah'),
            'atas' => $this->request->getVar('atas') 
    ]);
    session()->setFlashdata('message', 'Update Data Obat Berhasil');
    return redirect()->to('/MasterJSimp');
    }
  
    function delete($id)
    {  
        $model = new MasterGolKreditModel();
        $jsimp = $model->find($id);
        if (empty($golkre)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Master golongan kredit Tidak ditemukan !');
        }
        $model->delete($id);
        session()->setFlashdata('message', 'Delete Master golongan kredit Berhasil');
        return redirect()->to('/MasterGolKredit');
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
