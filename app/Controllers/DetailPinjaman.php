<?php

namespace App\Controllers;
use App\Models\DetailPinjamanModel; 
use App\Models\PinjamanModel;
use Dompdf\Dompdf;
 

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
        $currentPage= $this->request->getVar('page')? $this->request->getVar('page'):1;
        $UsersM = new \App\Models\UsersM();
        $data['pinjamanD'] = $this->pinjamanD->paginateNews(10,'default');
        $data['pager'] = $this->pinjamanD->pager;
        $data['links'] = $data['pager']->links();
        $data['currentPage']=$currentPage;
 
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
            'created_at'=>date('Y/m/d H:i:s'),
            'updated_at'=>date('Y/m/d H:i:s'),
        ]);
        $no_pinjaman = $this->request->getVar('no_pinjaman');
        $sisa = $this->request->getVar('jumlah');
        if ($sisa<=0) {
            $this->pinjaman->update($no_pinjaman,[ 
                'status'=>'TUTUP'
            ]);
        }  
        session()->setFlashdata('message', 'Tambah Data Berhasil');
        return redirect()->to('/detailpinjaman');
    }
    public function edit($id)
    {  
        $builder = $this->pinjaman; 
        $builder->select('id,tb_detail_pinjaman.opr,denda,tb_detail_pinjaman.no_pinjaman,tb_detail_pinjaman.bayar,pokok,tb_detail_pinjaman.bunga as jbunga,bayarke,sisa,tb_buka_pinjaman.bunga,nama1,jml_pinjaman,sistem_bunga,tb_buka_pinjaman.created_at,jangka_waktu,tb_buka_pinjaman.tanggal');
        $builder->join('tb_detail_pinjaman', 'tb_detail_pinjaman.no_pinjaman = tb_buka_pinjaman.no_pinjaman'); 
        $builder->where('tb_detail_pinjaman.id', $id);  
        $query = $builder->get();  
        $data['pinjamanD']=$query->getRow();
        $data['pinjaman'] = $this->pinjaman->findAll();   
 
        return view('Pinjaman/Penyetoran/edit', $data);
    }
    public function update($id)
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
        $this->pinjamanD->update($id,[ 
            'no_pinjaman' => $this->request->getVar('no_pinjaman'),	
            'tanggal' => $this->request->getVar('tanggal'),	
            'bayar' => $this->request->getVar('angsuran'),	
            'pokok' => $this->request->getVar('pokok'),	
            'bunga' => $this->request->getVar('jbunga'),	
            'denda' => $this->request->getVar('denda'),	
            'opr' => $this->request->getVar('opr'),	
            'bayarke' => $this->request->getVar('bayarke'),	
            'sisa' => $this->request->getVar('jumlah'),
            'updated_at'=>date('Y/m/d H:i:s'),	 
        ]);
        $no_pinjaman = $this->request->getVar('no_pinjaman');
        $sisa = $this->request->getVar('jumlah');
        if ($sisa<=0) {
            $this->pinjaman->update($no_pinjaman,[ 
                'status'=>'TUTUP'
            ]);
        }  
        
        session()->setFlashdata('message', 'Ubah Data Berhasil');
        return redirect()->to('/detailpinjaman');
    }
  
    function delete($id)
    { 
        $simd = $this->pinjamanD->find($id);
        if (empty($simd)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pinjaman Tidak ditemukan !');
        }
        $this->pinjamanD->delete($id);
        session()->setFlashdata('message', 'Delete Pinjaman Berhasil');
        return redirect()->to('/detailpinjaman');
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
        $builder->select('tb_buka_pinjaman.no_pinjaman,tb_detail_pinjaman.bayar,pokok,tb_detail_pinjaman.bunga as jbunga,bayarke,sisa,tb_buka_pinjaman.bunga,nama1,jml_pinjaman,sistem_bunga,tb_buka_pinjaman.created_at,jangka_waktu,tb_buka_pinjaman.tanggal');
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
    public function bukti($id){ 
        $builder = $this->pinjaman; 
        $builder->select('id,tb_detail_pinjaman.opr,denda,tb_detail_pinjaman.no_pinjaman,tb_detail_pinjaman.bayar,pokok,tb_detail_pinjaman.bunga as jbunga,bayarke,sisa,tb_buka_pinjaman.bunga,nama1,jml_pinjaman,sistem_bunga,tb_buka_pinjaman.created_at,jangka_waktu,tb_buka_pinjaman.tanggal');
        $builder->join('tb_detail_pinjaman', 'tb_detail_pinjaman.no_pinjaman = tb_buka_pinjaman.no_pinjaman'); 
        $builder->where('tb_detail_pinjaman.id', $id);  
        $query = $builder->get();  
        $data['pinjamanD']=$query->getRow(); 

        $filename = 'Bukti-Setoran-Pinjaman-'.date('d-m-Y-H-i');  
         // instantiate and use the dompdf class
         $dompdf = new Dompdf(); 
         $options = $dompdf->getOptions();
         $options->set('defaultFont', 'Courier');
         $options->set('isRemoteEnabled', TRUE);
         $options->set('debugKeepTemp', TRUE);
         $options->set('isHtml5ParserEnabled', TRUE);
         $options->set('chroot', '/');
         $options->setIsRemoteEnabled(true);
         
         $dompdf = new Dompdf($options);
         $dompdf->set_option('isRemoteEnabled', TRUE);
         
         $auth = base64_encode("username:password");
         
         $context = stream_context_create(array(
         'ssl' => array(
         'verify_peer' => FALSE,
         'verify_peer_name' => FALSE,
         'allow_self_signed'=> TRUE
         ),
         'http' => array(
         'header' => "Authorization: Basic $auth"
         )
         ));
         
         $dompdf->setHttpContext($context);
         // load HTML content
         $dompdf->loadHtml(view('/Pinjaman/Laporan/buktisetoran', $data));
 
         // (optional) setup the paper size and orientation
         $dompdf->setPaper('A4', 'portrait');
 
         // render html as PDF
         $dompdf->render();
         // output the generated pdf
         $dompdf->stream($filename); 
 
     }
}
