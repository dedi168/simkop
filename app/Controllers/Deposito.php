<?php

namespace App\Controllers;
use App\Models\DepositoModel;
use App\Models\AnggotaModel;
use App\Models\MasterBungaDepositoModel;
use App\Models\SimpananModel;
 

class Deposito extends BaseController
{   
    protected $deposito;
    protected $anggota;
    protected $simpanan;
    protected $bunga;

    function __construct()
    {
        $this->deposito=new DepositoModel();
        $this->anggota = new AnggotaModel();
        $this->simpanan = new SimpananModel();
        $this->bunga = new MasterBungaDepositoModel();
    }
    
    public function index()
    { 
        $data['deposito'] = $this->deposito->getdata(); 
        return view ('Deposito/index', $data);
    } 
    public function tambah()
    {  
        $data['deposito'] = $this->deposito->findAll();  
        $data['simpanan'] = $this->simpanan->findAll();  
        $data['anggota'] = $this->anggota->findAll();  
        $data['bunga'] = $this->bunga->findAll();  
        return view('Deposito/tambah',$data);
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
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],  
            'telp' => [
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
            'bunga' => [
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
            'no_anggota' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],       
            'jenis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ], 
            'ahli_waris' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],  
            'no_tabungan' => [
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
        $this->deposito->insert([ 
            'no_deposito' => $this->request->getVar('no_deposito'),
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'tgl' => $this->request->getVar('tgl'),
            'telp' => $this->request->getVar('telp'),
            'jangka_waktu' => $this->request->getVar('jangka_waktu'),
            'bunga' => $this->request->getVar('bunga'),
            'jumlah' => $this->request->getVar('jumlah'),
            'no_anggota' => $this->request->getVar('no_anggota'),
            'jatuh_tempo' => $this->request->getVar('jatuh_tempo'),
            'status' => $this->request->getVar('status'),
            'operator' => $this->request->getVar('operator'),
            'no_tabungan' => $this->request->getVar('no_tabungan'),
            'sistem' => $this->request->getVar('sistem'),
            'perpanjangan' => $this->request->getVar('perpanjangan'),
            // 'kali' => $this->request->getVar('kali'),
            'jenis' => $this->request->getVar('jenis'),
            'ahli_waris' => $this->request->getVar('ahli_waris'),
            'mulai' => $this->request->getVar('mulai')
        ]);
        session()->setFlashdata('message', 'Tambah Data Deposito Berhasil');
        return redirect()->to('/deposito');
    }
    public function edit($id)
    {   
        $builder = $this->deposito;
        $builder->select('no_deposito,tb_deposito.nama,tb_simpanan.nama as atsnm,tb_deposito.alamat,tgl,tb_deposito.telp,jangka_waktu,tb_deposito.bunga,
        jumlah,tb_deposito.no_anggota,jatuh_tempo,tb_deposito.status,tb_deposito.operator,tb_deposito.no_tabungan,sistem,perpanjangan,tb_deposito.jenis,ahli_waris,mulai');
        $builder->join('tb_master_bunga_deposito', 'tb_master_bunga_deposito.id = tb_deposito.jangka_waktu'); 
        $builder->join('tb_anggota', 'tb_anggota.no_anggota = tb_deposito.no_anggota'); 
        $builder->join('tb_simpanan', 'tb_simpanan.no_tabungan = tb_deposito.no_tabungan'); 
        $builder->where('tb_deposito.no_deposito', $id);  
        $query = $builder->get();   
        $data['deposito']=$query->getRow();   
        $data['anggota'] = $this->anggota->findAll();  
        $data['bunga'] = $this->bunga->findAll();  
        $data['simpanan'] = $this->simpanan->findAll();  

        return view('Deposito/edit', $data);
    }
    public function update($no_deposito)
    {
        if (!$this->validate([ 
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
            'telp' => [
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
            'bunga' => [
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
            'no_anggota' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],       
            'jenis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ], 
            'ahli_waris' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],  
            'no_tabungan' => [
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
        $this->deposito->update($no_deposito, [ 
            'no_deposito' => $this->request->getVar('no_deposito'),
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'tgl' => $this->request->getVar('tgl'),
            'telp' => $this->request->getVar('telp'),
            'jangka_waktu' => $this->request->getVar('jangka_waktu'),
            'bunga' => $this->request->getVar('bunga'),
            'jumlah' => $this->request->getVar('jumlah'),
            'no_anggota' => $this->request->getVar('no_anggota'),
            'jatuh_tempo' => $this->request->getVar('jatuh_tempo'),
            'status' => $this->request->getVar('status'),
            'operator' => $this->request->getVar('operator'),
            'no_tabungan' => $this->request->getVar('no_tabungan'),
            'sistem' => $this->request->getVar('sistem'),
            'perpanjangan' => $this->request->getVar('perpanjangan'),
            // 'kali' => $this->request->getVar('kali'),
            'jenis' => $this->request->getVar('jenis'),
            'ahli_waris' => $this->request->getVar('ahli_waris'),
            'mulai' => $this->request->getVar('mulai')
    ]);
    session()->setFlashdata('message', 'Update Deposito Berhasil');
    return redirect()->to('/deposito');
    }
  
    function delete($no_deposito)
    { 
        $deposito = $this->deposito->find($no_deposito);
        if (empty($deposito)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Deposito Tidak ditemukan !');
        }
        $this->deposito->delete($no_deposito);
        session()->setFlashdata('message', 'Delete Deposito Berhasil');
        return redirect()->to('/deposito');
    }

    public function getSimpanan($id){
        $data = $this->simpanan->find($id);  
        return  json_encode($data);  
        // return $data->nama ;  
    }
    public function getAnggota($id){
        $data = $this->anggota->find($id);  
        return  json_encode($data);  
        // return $data->nama ;  
    }
    public function getBunga($id){
        $data = $this->bunga->find($id);  
        return  json_encode($data);  
        // return $data->nama ;  
    }
}
