<?php

namespace App\Controllers;
use App\Models\IuranModel;
use App\Models\AnggotaModel;

use function PHPUnit\Framework\stringEndsWith;

class Iuran extends BaseController
{protected $iuran;
    protected $anggota;

    function __construct()
    {
        $this->iuran=new IuranModel();
        $this->anggota = new AnggotaModel();
    }
    
    public function index()
    { 
        $data['iuran'] = $this->iuran->findAll(); 
        return view ('Anggota/Iuran/index', $data);
    } 
    public function tambah()
    {  
        $data['iuran'] = $this->iuran->findAll(); 
        $data['miuran'] = $this->iuran->miuran(); 
        $data['anggota'] = $this->iuran->getanggota(); 
        return view('Anggota/Iuran/tambah',$data);
    }   
    public function store()
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
        $this->iuran->insert([
            'no_anggota' => $this->request->getVar('no_anggota'), 
            'jenis_simpanan' => $this->request->getVar('jenis_simpanan'),
            'tgl_bayar' => $this->request->getVar('tgl_bayar'),
            'jumlah_bln' => $this->request->getVar('jumlah_bln'),
            // 'tgl_mulai' => $this->request->getVar('tgl_mulai'),
            'bln_m' => $this->request->getVar('bln_m'),
            'thn_m' => $this->request->getVar('thn_m'),
            'jumlah' => $this->request->getVar('jumlah'),
            'pokok' => $this->request->getVar('pokok'),
            'wajib' => $this->request->getVar('wajib'),
            'opr' => $this->request->getVar('opr')
        ]);
        session()->setFlashdata('message', 'Tambah Data Iuran Berhasil');
        return redirect()->to('/iuran');
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
            'opr' => $this->request->getVar('opr')
    ]);
    session()->setFlashdata('message', 'Update Iuran Berhasil');
    return redirect()->to('/iuran');
    }
  
    function delete($id)
    { 
        $iuran = $this->iuran->find($id);
        if (empty($iuran)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Iuran Tidak ditemukan !');
        }
        $this->iuran->delete($id);
        session()->setFlashdata('message', 'Delete Iuran Berhasil');
        return redirect()->to('/iuran');
    }

    public function getAnggota($id){
        $data = $this->anggota->find($id);  
        return  json_encode($data);  
        // return $data->nama ;  
    }
}
