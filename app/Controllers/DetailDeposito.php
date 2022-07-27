<?php

namespace App\Controllers;
use App\Models\DepositoModel;
use App\Models\DetailDepositoModel; 
use App\Models\MasterBungaDepositoModel;
use App\Models\BungaSimpananModel;
use App\Models\DetaiSimpananModel;


class DetailDeposito extends BaseController
{   
    protected $deposito;
    protected $Ddeposito; 
    protected $bunga;
    protected $bungaS;
    protected $simpanan;


    function __construct()
    {
        $this->deposito=new DepositoModel();
        $this->Ddeposito = new DetailDepositoModel(); 
        $this->bunga = new MasterBungaDepositoModel(); 
        $this->bungaS = new BungaSimpananModel(); 
        $this->simpanan = new DetaiSimpananModel(); 
    }
    
    public function index()
    { 
        $builder = $this->deposito;
        $builder->select('id,tb_detail_deposito.no_deposito,tgl_ambil,tb_deposito.sistem,tb_detail_deposito.status,saldo,tb_detail_deposito.opr');
        $builder->join('tb_detail_deposito', 'tb_detail_deposito.no_deposito = tb_deposito.no_deposito');    
        $query = $builder->get();   
        $data['deposito']=$query->getResult();    
        return view ( 'Deposito/Perpanjang/index', $data); 
    } 
    public function tambah()
    {  
        $data['deposito'] = $this->deposito->findAll();  
        $data['ddeposito'] = $this->Ddeposito->findAll();    
        $data['bunga'] = $this->bunga->findAll();  
        $data['bungaS'] = $this->bungaS->findAll();  
        return view('Deposito/Perpanjang/tambah',$data);
    }   
    public function store()
    {
        if (!$this->validate([  
            'no_deposito' => [
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
        $perpanjang=$this->request->getVar('status');
        if ($perpanjang=='1') {
            $sistem=$this->request->getVar('sistem'); 
            if ($sistem=='AMBIL') {
                $this->Ddeposito->insert([ 
                    'no_deposito' => $this->request->getVar('no_deposito'),
                    'tgl' => $this->request->getVar('tgl'),
                    'jumlah' => $this->request->getVar('jumlah'),
                    'tgl_ambil' => $this->request->getVar('tgl'),
                    // 'jenis' => $this->request->getVar('jenis'),
                    'opr' => $this->request->getVar('opr'),
                    'status' => $this->request->getVar('status'),
                    'saldo' => $this->request->getVar('saldo')
                ]);
                $no_deposito = $this->request->getVar('no_deposito');
                $this->deposito->update($no_deposito,[
                    'status' => 'TUTUP'
                ]);
                session()->setFlashdata('message', $sistem);
                return redirect()->to('/detaildeposito');
            } else {
                $this->Ddeposito->insert([ 
                    'no_deposito' => $this->request->getVar('no_deposito'),
                    'tgl' => $this->request->getVar('tgl'),
                    'jumlah' => $this->request->getVar('jumlah'),
                    'tgl_ambil' => $this->request->getVar('tgl'),
                    // 'jenis' => $this->request->getVar('jenis'),
                    'opr' => $this->request->getVar('opr'),
                    'status' => $this->request->getVar('status'),
                    'saldo' => $this->request->getVar('saldo')
                ]);
                $no_deposito = $this->request->getVar('no_deposito');
                $this->deposito->update($no_deposito,[
                    'status' => 'TUTUP'
                ]);
                $this->simpanan->insert([
                    'no_tabungan' => $this->request->getVar('no_tabungan'), 
                    'tgl' => $this->request->getVar('tgl'), 
                    'opr' => $this->request->getVar('opr'), 
                    'jenis_simpanan' => 'KREDIT', 
                    'jumlah' => $this->request->getVar('saldoS'),
                    'kredit' => $this->request->getVar('saldoS'),
                    'kode' => '201', 
                    'jumlah_simpanan' => $this->request->getVar('simpan'),
                    'created_at' => date('Y-m-d h:i'),
                    'updated_at' => date('Y-m-d h:i')
                ]);
                session()->setFlashdata('message', $sistem);
                return redirect()->to('/detaildeposito');
            }
            
            
        } else if($perpanjang=='0'){
            $this->Ddeposito->insert([ 
                'no_deposito' => $this->request->getVar('no_deposito'),
                'tgl' => $this->request->getVar('tgl'),
                'jumlah' => $this->request->getVar('jumlah'),
                'tgl_ambil' => $this->request->getVar('tgl'),
                // 'jenis' => $this->request->getVar('jenis'),
                'opr' => $this->request->getVar('opr'),
                'status' => $this->request->getVar('status'),
                'saldo' => $this->request->getVar('saldo')
            ]); 
            $no_deposito = $this->request->getVar('no_deposito');
            $this->deposito->update($no_deposito,
            [
                'jangka_waktu' =>$this->request->getVar('jangka_waktu1'), 
                'jatuh_tempo' =>$this->request->getVar('jatuh_tempo1'), 
                'bunga' =>$this->request->getVar('bunga1'), 
            ]);
            session()->setFlashdata('message', 'Tambah Data Deposito Berhasil');
            return redirect()->to('/detaildeposito');
        }  
    }
    public function edit($id)
    {   
        $builder = $this->deposito;
        $builder->select('tb_detail_deposito.id,nama,tb_deposito.tgl,tb_deposito.jumlah,tb_deposito.bunga,tb_detail_deposito.saldo,
        tb_detail_deposito.opr,tb_detail_deposito.no_deposito,tb_detailsimpanan.no_tabungan,sistem,tb_master_bunga_deposito.jangka,jatuh_tempo,jumlah_simpanan,keterangan');
        $builder->join('tb_detail_deposito', 'tb_detail_deposito.no_deposito = tb_deposito.no_deposito');  
        $builder->join('tb_master_bunga_deposito', 'tb_master_bunga_deposito.id = tb_deposito.jangka_waktu');  
        $builder->join('tb_detailsimpanan', 'tb_detailsimpanan.no_tabungan = tb_deposito.no_tabungan'); 
        $builder->where('tb_detail_deposito.id', $id);   
        $query = $builder->get();   
        $data['deposito']=$query->getRow();    
        $data['bunga'] = $this->bunga->findAll();  
        $data['bungaS'] = $this->bungaS->findAll();    
        
        $builder = $this->deposito;
        $builder->select('id,tb_detail_deposito.no_deposito,tgl_ambil,tb_deposito.sistem,tb_detail_deposito.status,saldo,tb_detail_deposito.opr');
        $builder->join('tb_detail_deposito', 'tb_detail_deposito.no_deposito = tb_deposito.no_deposito');    
        $query = $builder->get();   
        $data['ndeposito']=$query->getResult();
        // dd($data);
        return view('Deposito/Perpanjang/edit', $data);
    }
    public function update($id)
    {
        if (!$this->validate([  
            'no_deposito' => [
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
        $perpanjang=$this->request->getVar('status');
        if ($perpanjang=='1') {
            $sistem=$this->request->getVar('sistem'); 
            if ($sistem=='AMBIL') {
                $this->Ddeposito->update($id,[ 
                    'no_deposito' => $this->request->getVar('no_deposito'),
                    'tgl' => $this->request->getVar('tgl'),
                    'jumlah' => $this->request->getVar('jumlah'),
                    'tgl_ambil' => $this->request->getVar('tgl'),
                    // 'jenis' => $this->request->getVar('jenis'),
                    'opr' => $this->request->getVar('opr'),
                    'status' => $this->request->getVar('status'),
                    'saldo' => $this->request->getVar('saldo')
                ]);
                $no_deposito = $this->request->getVar('no_deposito');
                $this->deposito->update($no_deposito,[
                    'status' => 'TUTUP'
                ]);
                session()->setFlashdata('message', $sistem);
                return redirect()->to('/detaildeposito');
            } else {
                $this->Ddeposito->update($id,[ 
                    'no_deposito' => $this->request->getVar('no_deposito'),
                    'tgl' => $this->request->getVar('tgl'),
                    'jumlah' => $this->request->getVar('jumlah'),
                    'tgl_ambil' => $this->request->getVar('tgl'),
                    // 'jenis' => $this->request->getVar('jenis'),
                    'opr' => $this->request->getVar('opr'),
                    'status' => $this->request->getVar('status'),
                    'saldo' => $this->request->getVar('saldo')
                ]);
                $no_deposito = $this->request->getVar('no_deposito');
                $this->deposito->update($no_deposito,[
                    'status' => 'TUTUP'
                ]);
                $this->simpanan->insert([
                    'no_tabungan' => $this->request->getVar('no_tabungan'), 
                    'tgl' => $this->request->getVar('tgl'), 
                    'opr' => $this->request->getVar('opr'), 
                    'jenis_simpanan' => 'KREDIT', 
                    'jumlah' => $this->request->getVar('saldoS'),
                    'kredit' => $this->request->getVar('saldoS'),
                    'kode' => '201', 
                    'jumlah_simpanan' => $this->request->getVar('simpan'),
                    'created_at' => date('Y-m-d h:i'),
                    'updated_at' => date('Y-m-d h:i')
                ]);
                session()->setFlashdata('message', $sistem);
                return redirect()->to('/detaildeposito');
            }
            
            
        } else if($perpanjang=='0'){
            $this->Ddeposito->update($id,[ 
                'no_deposito' => $this->request->getVar('no_deposito'),
                'tgl' => $this->request->getVar('tgl'),
                'jumlah' => $this->request->getVar('jumlah'),
                'tgl_ambil' => $this->request->getVar('tgl'),
                // 'jenis' => $this->request->getVar('jenis'),
                'opr' => $this->request->getVar('opr'),
                'status' => $this->request->getVar('status'),
                'saldo' => $this->request->getVar('saldo')
            ]); 
            $no_deposito = $this->request->getVar('no_deposito');
            $this->deposito->update($no_deposito,
            [
                'jangka_waktu' =>$this->request->getVar('jangka_waktu1'), 
                'jatuh_tempo' =>$this->request->getVar('jatuh_tempo1'), 
                'bunga' =>$this->request->getVar('bunga1'), 
            ]);
            session()->setFlashdata('message', 'Tambah Data Deposito Berhasil');
            return redirect()->to('/detaildeposito');
        } 
         
    }
  
    function delete($id)
    { 
        $Ddeposito = $this->Ddeposito->find($id);
        if (empty($Ddeposito)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Tidak ditemukan !');
        }
        $this->Ddeposito->delete($id);
        session()->setFlashdata('message', 'Delete Data Berhasil');
        return redirect()->to('/detaildeposito');
    }

    public function getNoDeposito($id){
        $builder = $this->deposito;
        $builder->select('nama,tb_deposito.tgl,tb_deposito.jumlah,tb_deposito.bunga,tb_detailsimpanan.no_tabungan,sistem,tb_master_bunga_deposito.jangka,jatuh_tempo,jumlah_simpanan');
        $builder->join('tb_master_bunga_deposito', 'tb_master_bunga_deposito.id = tb_deposito.jangka_waktu');  
        $builder->join('tb_detailsimpanan', 'tb_detailsimpanan.no_tabungan = tb_deposito.no_tabungan');
        $builder->orderBy('tb_detailsimpanan.created_at', 'DESC');  
        $builder->where('tb_deposito.no_deposito', $id);  
        $query = $builder->get();   
        $data=$query->getRow();    
         
        // $data = $this->deposito->find($id);  
        return  json_encode($data);  
        // return $data->nama ;  
    } 
    public function getBunga($id){
        $data = $this->bunga->find($id);  
        return  json_encode($data);  
        // return $data->nama ;  
    }
}
