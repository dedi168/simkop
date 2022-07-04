<?php

namespace App\Controllers;
use App\Models\PinjamanModel;


class Pinjaman extends BaseController
{  protected $pinjaman;

    function __construct()
    {
        $this->pinjaman=new PinjamanModel();
    }
    
    public function index()
    { 
        $data['pinjaman'] = $this->pinjaman->getdatajenis(); 
        return view('Pinjaman/Buka/index', $data);
    } 
    public function tambah()
    {  $data['pinjaman'] = $this->pinjaman->findAll(); 
        $data['jenis'] = $this->pinjaman->getjenis(); 
        return view('Pinjaman/Buka/tambah',$data);
    } 
    public function store()
    {
        if (!$this->validate([
                'no_pinjaman' => [
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
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
            // 'telp' => [
            //     'rules' => 'required',
            //     'errors' => [
            //     'required' => '{field} Harus diisi'
            // ]
            // ], 
            'pekerjaan' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
            // 'no_anggota' => [
            //     'rules' => 'required',
            //     'errors' => [
            //     'required' => '{field} Harus diisi'
            // ]
            // ], 
            'tanggal' => [
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
            'jml_pinjaman' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
            'sistem_bunga' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
            'jangka_waktu' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
            'jangka_harian' => [
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
            'administrasi' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
            'gaji' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
            // 'keperluan' => [
            //     'rules' => 'required',
            //     'errors' => [
            //     'required' => '{field} Harus diisi'
            // ]
            // ], 
            // 'nsp' => [
            //     'rules' => 'required',
            //     'errors' => [
            //     'required' => '{field} Harus diisi'
            // ]
            // ], 
            'jenis' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
            'status' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
            // 'ref' => [
            //     'rules' => 'required',
            //     'errors' => [
            //     'required' => '{field} Harus diisi'
            // ]
            // ], 
            'meterai' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
            'provisi' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
            'premi' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
            // 'noid' => [
            //     'rules' => 'required',
            //     'errors' => [
            //     'required' => '{field} Harus diisi'
            // ]
            // ], 
            'nama2' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
            'alamat2' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
            'pekerjaan2' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
            'gaji2' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
            'hub' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
            // 'prs' => [
            //     'rules' => 'required',
            //     'errors' => [
            //     'required' => '{field} Harus diisi'
            // ]
            // ], 
            // 'prs_alamat' => [
            //     'rules' => 'required',
            //     'errors' => [
            //     'required' => '{field} Harus diisi'
            // ]
            // ], 
            // 'sumber_bayar' => [
            //     'rules' => 'required',
            //     'errors' => [
            //     'required' => '{field} Harus diisi'
            // ]
            // ], 
            // 'bayar' => [
            //     'rules' => 'required',
            //     'errors' => [
            //     'required' => '{field} Harus diisi'
            // ]
            // ], 
            'tmp' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
            'tgl_lahir' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
            // 'jaminan' => [
            //     'rules' => 'required',
            //     'errors' => [
            //     'required' => '{field} Harus diisi'
            // ]
            // ], 
            // 'gol' => [
            //     'rules' => 'required',
            //     'errors' => [
            //     'required' => '{field} Harus diisi'
            // ]
            // ],        
        ])) 
        {
        session()->setFlashdata('error', $this->validator->listErrors());
        return redirect()->back()->withInput();
        } 
        $this->pinjaman->insert([
            'no_pinjaman' => $this->request->getVar('no_pinjaman'),
            'nama1' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            // 'telp' => $this->request->getVar('telp'),
            'pekerjaan' => $this->request->getVar('pekerjaan'),
            'no_anggota' => $this->request->getVar('no_anggota'),
            'tanggal' => $this->request->getVar('tanggal'),
            'opr' => $this->request->getVar('opr'),
            'jml_pinjaman' => $this->request->getVar('jml_pinjaman'),
            'sistem_bunga' => $this->request->getVar('sistem_bunga'),
            'jangka_waktu' => $this->request->getVar('jangka_waktu'), 
            'jangka_harian' => $this->request->getVar('jangka_harian'),
            'bunga' => $this->request->getVar('bunga'),
            'administrasi' => $this->request->getVar('administrasi'),
            'gaji' => $this->request->getVar('gaji'),
            // 'keperluan' => $this->request->getVar('keperluanjt'),
            // 'nsp' => $this->request->getVar('nsp'),
            'jenis'=> $this->request->getVar('jenis'),
            'status'=> $this->request->getVar('status'),
            // 'ref'=> $this->request->getVar('ref'),
            'meterai'=> $this->request->getVar('meterai'),
            'provisi'=> $this->request->getVar('provisi'),
            'premi'=> $this->request->getVar('premi'),
            'noid'=> $this->request->getVar('noid'),
            'nama2'=> $this->request->getVar('nama2'),
            'alamat2'=> $this->request->getVar('alamat2'),
            'pekerjaan2'=> $this->request->getVar('pekerjaan2'),
            'gaji2'=> $this->request->getVar('gaji2'),
            'hub'=> $this->request->getVar('hub'),
            // 'prs'=> $this->request->getVar('prs'),
            // 'prs_alamat'=> $this->request->getVar('prs_alamat'),
            // 'sumber_bayar'=> $this->request->getVar('sumber_bayar'),
            // 'bayar'=> $this->request->getVar('bayar'),
            'tmp'=> $this->request->getVar('tmp'),
            'tgl_lahir'=> $this->request->getVar('tgl_lahir'),
            // 'jaminan'=> $this->request->getVar('jaminan'),
            // 'gol'=> $this->request->getVar('gol')
        ]);
        session()->setFlashdata('message', 'Tambah Data Pinjaman Berhasil');
        return redirect()->to('/pinjaman');
    }
    public function edit($no_pinjaman)
    { 
        $data['pinjaman'] = $this->pinjaman->findAll(); 
        $data['jenis'] = $this->pinjaman->getjenis(); 
        $datapin = $this->pinjaman->find($no_pinjaman); 
        if (empty($datapin)) 
            {
                throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pinjaman Tidak ditemukan !');
            }
        $data['pinjaman'] = $datapin;
        return view('Pinjaman/Buka/edit', $data);
    }
    public function update($no_pinjaman)
    {
        if (!$this->validate([
            'no_pinjaman' => [
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
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
            // 'telp' => [
            //     'rules' => 'required',
            //     'errors' => [
            //     'required' => '{field} Harus diisi'
            // ]
            // ], 
            'pekerjaan' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
            // 'no_anggota' => [
            //     'rules' => 'required',
            //     'errors' => [
            //     'required' => '{field} Harus diisi'
            // ]
            // ], 
            'tanggal' => [
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
            'jml_pinjaman' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
            'sistem_bunga' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
            'jangka_waktu' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
            'jangka_harian' => [
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
            'administrasi' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
            'gaji' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
            // 'keperluan' => [
            //     'rules' => 'required',
            //     'errors' => [
            //     'required' => '{field} Harus diisi'
            // ]
            // ], 
            // 'nsp' => [
            //     'rules' => 'required',
            //     'errors' => [
            //     'required' => '{field} Harus diisi'
            // ]
            // ], 
            'jenis' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
            'status' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
            // 'ref' => [
            //     'rules' => 'required',
            //     'errors' => [
            //     'required' => '{field} Harus diisi'
            // ]
            // ], 
            'meterai' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
            'provisi' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
            'premi' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
            // 'noid' => [
            //     'rules' => 'required',
            //     'errors' => [
            //     'required' => '{field} Harus diisi'
            // ]
            // ], 
            'nama2' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
            'alamat2' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
            'pekerjaan2' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
            'gaji2' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
            'hub' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
            // 'prs' => [
            //     'rules' => 'required',
            //     'errors' => [
            //     'required' => '{field} Harus diisi'
            // ]
            // ], 
            // 'prs_alamat' => [
            //     'rules' => 'required',
            //     'errors' => [
            //     'required' => '{field} Harus diisi'
            // ]
            // ], 
            // 'sumber_bayar' => [
            //     'rules' => 'required',
            //     'errors' => [
            //     'required' => '{field} Harus diisi'
            // ]
            // ], 
            // 'bayar' => [
            //     'rules' => 'required',
            //     'errors' => [
            //     'required' => '{field} Harus diisi'
            // ]
            // ], 
            'tmp' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
            'tgl_lahir' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
            // 'jaminan' => [
            //     'rules' => 'required',
            //     'errors' => [
            //     'required' => '{field} Harus diisi'
            // ]
            // ], 
            // 'gol' => [
            //     'rules' => 'required',
            //     'errors' => [
            //     'required' => '{field} Harus diisi'
            // ]
            // ],        
        ])) 
        {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } 
        $this->pinjaman->update($no_pinjaman, [
            'no_pinjaman' => $this->request->getVar('no_pinjaman'),
            'nama1' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            // 'telp' => $this->request->getVar('telp'),
            'pekerjaan' => $this->request->getVar('pekerjaan'),
            'no_anggota' => $this->request->getVar('no_anggota'),
            'tanggal' => $this->request->getVar('tanggal'),
            'opr' => $this->request->getVar('opr'),
            'jml_pinjaman' => $this->request->getVar('jml_pinjaman'),
            'sistem_bunga' => $this->request->getVar('sistem_bunga'),
            'jangka_waktu' => $this->request->getVar('jangka_waktu'), 
            'jangka_harian' => $this->request->getVar('jangka_harian'),
            'bunga' => $this->request->getVar('bunga'),
            'administrasi' => $this->request->getVar('administrasi'),
            'gaji' => $this->request->getVar('gaji'),
            // 'keperluan' => $this->request->getVar('keperluanjt'),
            // 'nsp' => $this->request->getVar('nsp'),
            'jenis'=> $this->request->getVar('jenis'),
            'status'=> $this->request->getVar('status'),
            // 'ref'=> $this->request->getVar('ref'),
            'meterai'=> $this->request->getVar('meterai'),
            'provisi'=> $this->request->getVar('provisi'),
            'premi'=> $this->request->getVar('premi'),
            'noid'=> $this->request->getVar('noid'),
            'nama2'=> $this->request->getVar('nama2'),
            'alamat2'=> $this->request->getVar('alamat2'),
            'pekerjaan2'=> $this->request->getVar('pekerjaan2'),
            'gaji2'=> $this->request->getVar('gaji2'),
            'hub'=> $this->request->getVar('hub'),
            // 'prs'=> $this->request->getVar('prs'),
            // 'prs_alamat'=> $this->request->getVar('prs_alamat'),
            // 'sumber_bayar'=> $this->request->getVar('sumber_bayar'),
            // 'bayar'=> $this->request->getVar('bayar'),
            'tmp'=> $this->request->getVar('tmp'),
            'tgl_lahir'=> $this->request->getVar('tgl_lahir'),
            // 'jaminan'=> $this->request->getVar('jaminan'),
            // 'gol'=> $this->request->getVar('gol')
        ]);
        session()->setFlashdata('message', 'Update Data Pinjaman Berhasil');
        return redirect()->to('/pinjaman');
    }
    function delete($no_pinjaman)
    {  
        $delpin = $this->pinjaman->find($no_pinjaman);
        if (empty($delpin)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pinjaman Tidak ditemukan !');
        }
        $this->pinjaman->delete($no_pinjaman);
        session()->setFlashdata('message', 'Delete Pinjaman Berhasil');
        return redirect()->to('/pinjaman');
    }
}
