<?php

namespace App\Controllers;
use App\Models\TransaksiModel;
use App\Models\RekeningModel;
class kasmasuk extends BaseController
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
        $currentPage= $this->request->getVar('page')? $this->request->getVar('page'):1; 
        $data['kas'] = $this->kas->paginatemasuk(2,'default');
        $data['pager'] = $this->kas->pager;
        $data['links'] = $data['pager']->links();
        $data['currentPage']=$currentPage; 
        if ($data['kas']==null) {
            $data['judul']="belum ada transaksi";
            // $data['kas'] = $this->kas->findAll(); 
            $data['transaksi'] = $this->kas->getmastertransaksi(); 
            $data['rekening'] = $this->rek->findAll(); 
        } else { 
            $data['judul']="";
            $data['transaksi'] = $this->kas->getmastertransaksi(); 
            $data['rekening'] = $this->rek->findAll(); 
            $builder = $this->kas;
            $builder->select('rekening.nama_akun');
            $builder->join('rekening', 'rekening.kode_akun = transaksi.kode_akun'); 
            $kode_akun= $this->request->getVar('kode_akun') ;
            $builder->where('transaksi.kode_akun', $kode_akun);  
            $query = $builder->get();   
            $data['coba']=$query->getRow();  
        }
        return view('Akuntansi/KasMasuk/index', $data);
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
            'kredit' => $this->request->getVar('jumlah') ,
            'kode_akun' => $this->request->getVar('rekening') , 
        ]);
        session()->setFlashdata('message', 'Tambah Data Kas Masuk Berhasil');
        return redirect()->to('/kasmasuk');
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
            'kredit' => $this->request->getVar('jumlah') ,
            'kode_akun' => $this->request->getVar('rekening') , 
    ]);
    session()->setFlashdata('message', 'Update Kas Masuk Berhasil');
    return redirect()->to('/kaseluar');
    }
  
    function delete($nomor)
    { 
        $model = $this->kas;
        $jkre = $model->find($nomor);
        if (empty($jkre)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Tidak ditemukan !');
        }
        $this->kas->delete($nomor);
        session()->setFlashdata('message', 'Delete Kas Masuk Berhasil');
        return redirect()->to('/kasmasuk');
    }
    public function getrekening($id){ 
        $data = $this->rek->find($id);  
        // $data= $this->kas->find($id); 
        return  json_encode($data);  
        // return $data->nama ;  
    }
}
