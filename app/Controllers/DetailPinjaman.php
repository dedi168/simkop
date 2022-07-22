<?php

namespace App\Controllers;
use App\Models\DetailPinjamanModel; 
use App\Models\PinjamanModel;
 

class DetailPinjaman extends BaseController
{   
    protected $pinjamanD;
    protected $pinjaman; 

    function __construct()
    {
        $this->pinjamanD=new DetailPinjamanModel();
        $this->pinjaman = new PinjamanModel(); 
    }
    
    public function index()
    { 
        $builder = $this->pinjaman;
        $builder->select('id,tb_detail_pinjaman.no_pinjaman,nama1,jml_pinjaman,tb_detail_pinjaman.bayar,pokok,tb_detail_pinjaman.bunga,sisa,bayarke');
        $builder->join('tb_detail_pinjaman', 'tb_detail_pinjaman.no_pinjaman = tb_buka_pinjaman.no_pinjaman'); 
        $query = $builder->get();
        $data['pinjamanD']=$query->getResult();    
        return view ('Pinjaman/Penyetoran/index', $data);
    } 
    public function tambah()
    {  
        $data['pinjamanD'] = $this->pinjamanD->findAll();  
        $data['pinjaman'] = $this->pinjaman->findAll();   
        return view('Pinjaman/Penyetoran/tambah',$data);
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
                'angsuran' => [
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
        $this->pinjamanD->insert([ 
            'no_pinjaman' => $this->request->getVar('no_pinjaman'),	
            'tanggal' => $this->request->getVar('tanggal'),	
            'bayar' => $this->request->getVar('angsuran'),	
            'pokok' => $this->request->getVar('pokok'),	
            'bunga' => $this->request->getVar('jbunga'),	
            'denda' => $this->request->getVar('denda'),	
            'opr' => $this->request->getVar('opr'),	
            'bayarke' => $this->request->getVar('bayarke'),	
            'sisa' => $this->request->getVar('jumlah'),	 
        ]);
        session()->setFlashdata('message', 'Tambah Data Berhasil');
        return redirect()->to('/detailpinjaman');
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

    public function getDataPinjaman($id){
        $builder = $this->pinjaman;
        $builder->select('tb_buka_pinjaman.no_pinjaman,tb_detail_pinjaman.bayar,pokok,tb_detail_pinjaman.bunga as jbunga,bayarke,sisa,tb_buka_pinjaman.bunga,nama1,jml_pinjaman,sistem_bunga,tb_buka_pinjaman.created_at,jangka_waktu');
        $builder->join('tb_detail_pinjaman', 'tb_detail_pinjaman.no_pinjaman = tb_buka_pinjaman.no_pinjaman'); 
        $builder->where('tb_buka_pinjaman.no_pinjaman', $id); 
        $builder->orderBy('tb_detail_pinjaman.created_at', 'DESC');
        $query = $builder->get(); 

        $data=$query->getRow();
        if ($data==null) {
            $data = $this->pinjaman->find($id); 
            return  json_encode($data);  
        }
        return  json_encode($data);  
        // return $data->nama ;  
    }
}
