<?php

namespace App\Controllers;
use App\Models\DetaiSimpananModel;
use App\Models\BungaSimpananModel;
use App\Models\simpananModel;
 

class DetailSimpanan extends BaseController
{   
    protected $simpananD;
    protected $simpanan;
    protected $bunga;

    function __construct()
    {
        $this->simpananD=new DetaiSimpananModel();
        $this->simpanan = new simpananModel();
        $this->bunga = new BungaSimpananModel();
    }
    
    public function index()
    { 
        $data['simpananD'] = $this->simpananD->getdata(); 
        return view ('Simpanan/Penyetoran/index', $data);
    } 
    public function tambah()
    {  
        $data['simpananD'] = $this->simpananD->findAll();  
        $data['simpanan'] = $this->simpanan->findAll();  
        $data['bunga'] = $this->bunga->findAll();  
        return view('Simpanan/Penyetoran/tambah',$data);
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
            'created_at' => date('Y-m-d h:i'),
            'updated_at' => date('Y-m-d h:i')
        ]);
        session()->setFlashdata('message', 'Tambah Data Iuran Berhasil');
        return redirect()->to('/detailsimpanan');
    }
    public function edit($id)
    {  
        //  $datasim = $this->simpananD->getdetail();  
        // $datasim= $this->simpananD->find($id);
        // if (empty($datasim)) 
        //     {
        //         throw new \CodeIgniter\Exceptions\PageNotFoundException('Data iuran Tidak ditemukan !');
        //     }
        // $data['simpananD'] = $datasim;
        // $data['simpanan'] = $this->simpanan->findAll(); 
        $builder = $this->simpanan;
        $builder->select('*');
        $builder->join('tb_detailsimpanan', 'tb_detailsimpanan.no_tabungan = tb_simpanan.no_tabungan'); 
        $builder->where('tb_detailsimpanan.id', $id);  
        $query = $builder->get(); 
        $data['simpananD'] = $this->simpanan->findAll(); 

        $data['simpanan']=$query->getRow();
        return view('Simpanan/Penyetoran/edit', $data);
    }
    public function update($id)
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
        $this->simpananD->update($id, [ 
            'no_tabungan' => $this->request->getVar('no_tabungan'), 
            'tgl' => $this->request->getVar('tgl'), 
            'opr' => $this->request->getVar('opr'), 
            'jenis_simpanan' => $this->request->getVar('jenis_simpanan'), 
            'jumlah' => $this->request->getVar('jumlah'),
            'kredit' => $this->request->getVar('jumlah'),
            'kode' => $this->request->getVar('kode'), 
            'jumlah_simpanan' => $this->request->getVar('jumlahS'),
            'created_at' => $this->request->getVar('created_at'),
            'updated_at' => date('Y-m-d h:i')    ]);
    session()->setFlashdata('message', 'Update Setoran Simpanan Berhasil');
    return redirect()->to('/detailsimpanan');
    }
  
    function delete($id)
    { 
        $simd = $this->simpananD->find($id);
        if (empty($simd)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Simpanan Tidak ditemukan !');
        }
        $this->simpananD->delete($id);
        session()->setFlashdata('message', 'Delete Simpanan Berhasil');
        return redirect()->to('/detailsimpanan');
    }
    function tes($id)
    { 
        $simd = $this->simpananD->find($id);
        if (empty($simd)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Simpanan Tidak ditemukan !');
        }
        $this->simpananD->delete($id);
        session()->setFlashdata('message', 'Delete Simpanan Berhasil');
        return redirect()->to('/detailsimpanan');
    }

    public function getDataSimpanan($id){
        $builder = $this->simpanan;
        $builder->select('tb_simpanan.no_tabungan,nama,alamat,telp,no_anggota,jumlah_simpanan');
        $builder->join('tb_detailsimpanan', 'tb_detailsimpanan.no_tabungan = tb_simpanan.no_tabungan'); 
        $builder->where('tb_simpanan.no_tabungan', $id); 
        $builder->orderBy('tb_detailsimpanan.created_at', 'DESC');
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
