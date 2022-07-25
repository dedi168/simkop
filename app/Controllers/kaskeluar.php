<?php

namespace App\Controllers;
use App\Models\TransaksiModel;
use App\Models\RekeningModel;
class kaskeluar extends BaseController
{
    protected $kas;
    protected $rek;

    function __construct()
    {
        $this->kas=new TransaksiModel();
        $this->rek=new RekeningModel();
    }
    
    public function index()
    { 
        $data['kas'] = $this->kas->findAll(); 
        $data['transaksi'] = $this->kas->getmastertransaksi(); 
        $data['rekening'] = $this->rek->findAll(); 

        return view('Akuntansi/Kaskeluar/index', $data);
    } 
    public function store()
    {
        if (!$this->validate([ 
                'no_jurnal' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ],
                'jumlah' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
                'rekening' => [
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
        $this->kas->insert([
            'no_jurnal' => $this->request->getVar('no_jurnal'),
            // 'tanggal' => $this->request->getVar('tanggal'), 
            'catatan' => $this->request->getVar('catatan') ,
            'debet' => $this->request->getVar('jumlah') ,
            'kode_akun' => $this->request->getVar('rekening') , 
        ]);
        session()->setFlashdata('message', 'Tambah Data Kas Keluar Berhasil');
        return redirect()->to('/kaskeluar');
    }

    public function update($nomor)
    {
        if (!$this->validate([
            'no_jurnal' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ],
                'jumlah' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
                'rekening' => [
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
        $this->kas->update($nomor, [  
            'no_jurnal' => $this->request->getVar('no_jurnal'),
            // 'tanggal' => $this->request->getVar('tanggal'), 
            'catatan' => $this->request->getVar('catatan') ,
            'debet' => $this->request->getVar('jumlah') ,
            'kode_akun' => $this->request->getVar('rekening') , 
    ]);
    session()->setFlashdata('message', 'Update Kas Keluar Berhasil');
    return redirect()->to('/kaseluar');
    }
  
    function delete($nomor)
    { 
        $model = $this->kas;
        $jkre = $model->find($nomor);
        if (empty($jkre)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Master Jenis kredit nomor rek ditemukan !');
        }
        $this->kas->delete($nomor);
        session()->setFlashdata('message', 'Delete Kas Keluar Berhasil');
        return redirect()->to('/kaskeluar');
    }
    public function getrekening($id){ 
        $data = $this->rek->find($id);  
        // $data= $this->kas->find($id); 
        return  json_encode($data);  
        // return $data->nama ;  
    }
}
