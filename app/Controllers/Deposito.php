<?php

namespace App\Controllers;
use App\Models\DepositoModel;
use App\Models\AnggotaModel;
use App\Models\MasterBungaDepositoModel;
use App\Models\SimpananModel;
use Dompdf\Dompdf;
 

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

    public function bukti($id){
        $data['deposito']=$this->deposito->find($id);
        $filename = 'Laporan-Deposito-'.date('d-M-Y-H-i');  
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
                $dompdf->loadHtml(view('Deposito/Laporan/buktideposito', $data));

                // (optional) setup the paper size and orientation
                $dompdf->setPaper('A4', 'portrait');

                // render html as PDF
                $dompdf->render();
                // output the generated pdf
                $dompdf->stream($filename); 
    }
    public function blank(){
        $data['judul']="";  
        $data['awal']=null;
        $data['akhir']=null;
        $data['status']=null;
        return view ('Deposito/Laporan/blank',$data);
    }
    public function cari(){
        $status=$this->request->getVar('status'); 
        $data['status']=$status;  
        $start_date=$this->request->getVar('awal');   
        $data['awal']=$start_date;
        $fillend=$this->request->getVar('akhir');
        $thn=substr($fillend,0,8); 
        $tgl=substr($fillend,8,10)+(1); 
        if ($tgl>date('m')) {
            $end_date=$thn.($tgl-1);
        } else {
            $end_date=$thn.$tgl;
        } 
        $data['akhir']=$fillend; 



        $depo=$this->request->getVar('status');
        $data['status']=$this->request->getVar('status'); 
        if ($depo=="AKTIF") {
            $data['judul']=""; 
            $builder = $this->deposito;
            $builder->select('no_deposito,nama,ahli_waris,alamat,jatuh_tempo,jumlah as deposit,status');
            $builder->where('status','AKTIF');
            $builder->where('jatuh_tempo BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');    
            $query = $builder->get();   
            $data['deposito']=$query->getResult(); 
            $data['judul']=""; 

            $builder = $this->deposito;
            $builder->selectSum('jumlah');
            $builder->where('status','AKTIF');
            $builder->where('jatuh_tempo BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');    
            $query = $builder->get();   
            $data['total']=$query->getRow();  
            if ($data['deposito']==null) {
                $data['judul']="Tidak Ada Data Yang Sesuai"; 
                return view ('Deposito/Laporan/lap',$data);
            } else {  
                $data['judul']="";
                return view ('Deposito/Laporan/lap',$data);
            } 
        } else {
            $data['judul']=""; 
            $builder = $this->deposito;
            $builder->select('no_deposito,nama,ahli_waris,alamat,jatuh_tempo,jumlah as deposit,status');
            $builder->where('status','TUTUP');
            $builder->where('jatuh_tempo BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');    
            $query = $builder->get();   
            $data['deposito']=$query->getResult(); 
            $data['judul']=""; 

            $builder = $this->deposito;
            $builder->selectSum('jumlah');
            $builder->where('status','TUTUP');
            $builder->where('jatuh_tempo BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');    
            $query = $builder->get();   
            $data['total']=$query->getRow();  
            if ($data['deposito']==null) {
                $data['judul']="Tidak Ada Data Yang Sesuai"; 
                return view ('Deposito/Laporan/lap',$data);
            } else {  
                $data['judul']="";
                return view ('Deposito/Laporan/lap',$data);
            } 
            
        }         }

    public function laporan()
    {   
        $status=$this->request->getVar('status'); 
        $data['status']=$status;  
        $start_date=$this->request->getVar('awal');   
        $data['awal']=$start_date;
        $fillend=$this->request->getVar('akhir');
        $thn=substr($fillend,0,8); 
        $tgl=substr($fillend,8,10)+(1); 
        if ($tgl>date('m')) {
            $end_date=$thn.($tgl-1);
        } else {
            $end_date=$thn.$tgl;
        } 
        $data['akhir']=$fillend; 



        $depo=$this->request->getVar('status');
        $data['status']=$this->request->getVar('status');         if ($depo=="AKTIF") {
            $data['judul']=""; 
            $builder = $this->deposito;
            $builder->select('no_deposito,nama,ahli_waris,alamat,jatuh_tempo,jumlah as deposit,status');
            $builder->where('status','AKTIF');
            $builder->where('jatuh_tempo BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');    
            $query = $builder->get();   
            $data['deposito']=$query->getResult(); 
            $data['judul']=""; 

            $builder = $this->deposito;
            $builder->selectSum('jumlah');
            $builder->where('status','AKTIF');
            $builder->where('jatuh_tempo BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');    
            $query = $builder->get();   
            $data['total']=$query->getRow();  
            if ($data['deposito']==null) {
                $data['judul']="Tidak Ada Data Yang Sesuai";  
            } else {  
                $data['judul']="";
            } 
                $filename = 'Laporan-Deposito-'.date('d-M-Y-H-i');  
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
                $dompdf->loadHtml(view('/Deposito/Laporan/laporandeposito', $data));

                // (optional) setup the paper size and orientation
                $dompdf->setPaper('A4', 'portrait');

                // render html as PDF
                $dompdf->render();
                // output the generated pdf
                $dompdf->stream($filename);    
        } else { 
            $data['judul']=""; 
            $builder = $this->deposito;
            $builder->select('no_deposito,nama,ahli_waris,alamat,jatuh_tempo,jumlah as deposit,status');
            $builder->where('status','AKTIF');
            $builder->where('jatuh_tempo BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');    
            $query = $builder->get();   
            $data['deposito']=$query->getResult(); 
            $data['judul']=""; 

            $builder = $this->deposito;
            $builder->selectSum('jumlah');
            $builder->where('status','AKTIF');
            $builder->where('jatuh_tempo BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');    
            $query = $builder->get();   
            $data['total']=$query->getRow();  
            if ($data['deposito']==null) {
                $data['judul']="Tidak Ada Data Yang Sesuai";  
            } else {  
                $data['judul']="";
            } 
                $filename = 'Laporan-Deposito-'.date('d-M-Y-H-i');  
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
                $dompdf->loadHtml(view('/Deposito/Laporan/laporandeposito', $data));

                // (optional) setup the paper size and orientation
                $dompdf->setPaper('A4', 'portrait');

                // render html as PDF
                $dompdf->render();
                // output the generated pdf
                $dompdf->stream($filename);   
        }     
        
    } 
}
