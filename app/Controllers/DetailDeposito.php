<?php

namespace App\Controllers;
use App\Models\DepositoModel;
use App\Models\DetailDepositoModel; 
use App\Models\MasterBungaDepositoModel;
use App\Models\BungaSimpananModel;
use App\Models\DetaiSimpananModel;
use App\Models\SimpananModel;
use Dompdf\Dompdf;


class DetailDeposito extends BaseController
{   
    protected $deposito;
    protected $Ddeposito; 
    protected $bunga;
    protected $bungaS;
    protected $simpanan;
    protected $sim;


    function __construct()
    {
        $this->deposito=new DepositoModel();
        $this->Ddeposito = new DetailDepositoModel(); 
        $this->bunga = new MasterBungaDepositoModel(); 
        $this->bungaS = new BungaSimpananModel(); 
        $this->simpanan = new DetaiSimpananModel(); 
        $this->sim = new SimpananModel(); 
    }
    
    public function index()
    { 

         $currentPage= $this->request->getVar('page')? $this->request->getVar('page'):1; 
        $data['deposito'] = $this->Ddeposito->paginateNews(2,'default');
        $data['pager'] = $this->Ddeposito->pager;
        $data['links'] = $data['pager']->links();
        $data['currentPage']=$currentPage;
      
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
                $no_tabungan = $this->request->getVar('no_tabungan');  
                $this->sim->update($no_tabungan, [ 
                    'saldo_utama' => $this->request->getVar('simpan'), 
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
                'jumlah' =>$this->request->getVar('saldo'), 
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
                $no_tabungan = $this->request->getVar('no_tabungan');  
                $this->sim->update($no_tabungan, [ 
                    'saldo_utama' => $this->request->getVar('simpan'), 
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

    public function bukti($id){
        $builder = $this->deposito;
        $builder->select('tb_detail_deposito.id,nama,tb_deposito.tgl,tb_deposito.jumlah,tb_deposito.bunga,tb_detail_deposito.saldo,alamat,jangka_waktu,tb_detail_deposito.status,tgl_ambil,
        tb_detail_deposito.opr,tb_detail_deposito.no_deposito,tb_detailsimpanan.no_tabungan,sistem,tb_master_bunga_deposito.jangka,jatuh_tempo,jumlah_simpanan,keterangan,tb_deposito.tgl');
        $builder->join('tb_detail_deposito', 'tb_detail_deposito.no_deposito = tb_deposito.no_deposito');  
        $builder->join('tb_master_bunga_deposito', 'tb_master_bunga_deposito.id = tb_deposito.jangka_waktu');  
        $builder->join('tb_detailsimpanan', 'tb_detailsimpanan.no_tabungan = tb_deposito.no_tabungan'); 
        $builder->where('tb_detail_deposito.id', $id);   
        $builder->orderby('tb_detailsimpanan.no_tabungan', 'DESC');
        $query = $builder->get();   
        $data['deposito']=$query->getRow(); 
        $filename = 'Laporan-Perpanjang/Tutup-Deposito-'.date('d-M-Y-H-i');  
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
                $dompdf->loadHtml(view('Deposito/Laporan/buktitutupdepo', $data));

                // (optional) setup the paper size and orientation
                $dompdf->setPaper('A4', 'portrait');

                // render html as PDF
                $dompdf->render();
                // output the generated pdf
                $dompdf->stream($filename); 
    }
}
