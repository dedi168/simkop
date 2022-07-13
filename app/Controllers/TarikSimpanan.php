<?php

namespace App\Controllers;
use App\Models\DetaiSimpananModel;
use App\Models\simpananModel;
 

class TarikSimpanan extends BaseController
{   
    protected $simpananD;
    protected $simpanan;

    function __construct()
    {
        $this->simpananD=new DetaiSimpananModel();
        $this->simpanan = new simpananModel();
    }
    
    public function index()
    { 
        $data['simpananD'] = $this->simpananD->getdatasim(); 
        return view ('Simpanan/Penarikan/index', $data);
    } 
    public function tambah()
    {  
        $data['simpananD'] = $this->simpananD->findAll();  
        $data['simpanan'] = $this->simpanan->findAll();  
        return view('Simpanan/Penarikan/tambah',$data);
    }   
    public function store()
    {
        if (!$this->validate([ 
                'no_tabungan' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
                'kode' => [
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
        ])) 
        {
        session()->setFlashdata('error', $this->validator->listErrors());
        return redirect()->back()->withInput();
        } 
        $this->simpananD->insert([
            'no_tabungan' => $this->request->getVar('no_tabungan'), 
            'tgl' => $this->request->getVar('tgl'), 
            'opr' => $this->request->getVar('opr'), 
            'jenis_simpanan' => $this->request->getVar('jenis_simpanan'), 
            'jumlah' => $this->request->getVar('jumlah'),
            'kredit' => $this->request->getVar('jumlah'),
            'kode' => $this->request->getVar('kode'), 
            'jumlah_simpanan' => $this->request->getVar('jumlahS'),
            'created_at' => $this->request->getVar('created_at')

        ]);
        session()->setFlashdata('message', 'Tambah Data Iuran Berhasil');
        return redirect()->to('/tariksimpanan');
    }
    public function edit($id)
    {   
        $dataiuran = $this->iuran->find($id);
        $data['miuran'] = $this->iuran->miuran(); 
        if (empty($dataiuran)) 
            {
                throw new \CodeIgniter\Exceptions\PageNotFoundException('Data iuran Tidak ditemukan !');
            }
        $data['iuran'] = $dataiuran;
        return view('Anggota/Iuran/edit', $data);
    }
    public function update($id)
    {
        if (!$this->validate([ 
            'no_anggota' => [
            'rules' => 'required',
            'errors' => [
            'required' => '{field} Harus diisi'
            ]
            ], 
                'jenis_simpanan' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
                'jumlah_bln' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
            //     'tgl_mulai' => [
            //     'rules' => 'required',
            //     'errors' => [
            //     'required' => '{field} Harus diisi'
            // ]
            // ], 
                'bln_m' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
                'thn_m' => [
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
                'opr' => [
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
        $this->iuran->update($id, [ 
            'no_anggota' => $this->request->getVar('no_anggota'), 
            'jenis_simpanan' => $this->request->getVar('jenis_simpanan'),
            'jumlah_bln' => $this->request->getVar('jumlah_bln'),
            // 'tgl_mulai' => $this->request->getVar('tgl_mulai'),
            'bln_m' => $this->request->getVar('bln_m'),
            'thn_m' => $this->request->getVar('thn_m'),
            'jumlah' => $this->request->getVar('jumlah'),
            'pokok' => $this->request->getVar('pokok'),
            'wajib' => $this->request->getVar('wajib'),
            'created_at' => $this->request->getVar('created_at')
    ]);
    session()->setFlashdata('message', 'Update Iuran Berhasil');
    return redirect()->to('/tariksimpanan');
    }
  
    function delete($id)
    { 
        $simd = $this->simpananD->find($id);
        if (empty($simd)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Simpanan Tidak ditemukan !');
        }
        $this->simpananD->delete($id);
        session()->setFlashdata('message', 'Delete Simpanan Berhasil');
        return redirect()->to('/tariksimpanan');
    }

    public function getDataSimpanan($id){
        $builder = $this->simpanan;
        $builder->select('tb_simpanan.no_tabungan,nama,alamat,telp,no_anggota,jumlah_simpanan');
        $builder->join('tb_detailsimpanan', 'tb_detailsimpanan.no_tabungan = tb_simpanan.no_tabungan'); 
        $builder->where('tb_simpanan.no_tabungan', $id); 
        $builder->orderBy('tb_detailsimpanan.created_at', 'DESC');
        $builder->limit('1');
        $query = $builder->get(); 

        $data=$query->getRow();
        if ($data==null) {
            $data = $this->simpanan->find($id); 
            return  json_encode($data);  
        }
        return  json_encode($data);  
        // return $data->nama ;  
    }
}
