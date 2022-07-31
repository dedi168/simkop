<?php

namespace App\Controllers;
use App\Models\TransaksiModel;
use App\Models\RekeningModel;
use Dompdf\Dompdf;
class kas extends BaseController
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
        $data['judul']="";  
            $data['awal']=null;
            $data['akhir']=null;
            $data['rekening']=$this->rek->findAll(); 
        return view('Akuntansi/Laporan/blnk', $data);
    }  
    public function cari()
    {  
        $data['judul']="";
 
        $rekening=$this->request->getVar('rekening'); 
        $data['rekening']=$rekening;  
    if ($rekening==null) {
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
            $builder = $this->kas;
            $builder->select('*');
            $builder->join('rekening', 'rekening.kode_akun = transaksi.kode_akun');    
            $builder->where('transaksi.created_at BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
            $data['akhir']=$fillend; 
            $query = $builder->get();   
            $data['kas']=$query->getResult();    

            $builder = $this->kas;
            $builder->where('created_at BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
            $builder->selectSum('kredit');    
            $query = $builder->get();   
            $data['kredit']=$query->getRow(); 
            
            $builder = $this->kas;
            $builder->where('created_at BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
            $builder->selectSum('debet');    
            $query = $builder->get();   
            $data['debet']=$query->getRow(); 
            
            $builder->selectAvg('debet');
            $query = $builder->get();
            $data['Rdebet']=$query->getRow();  
            // return  json_encode($data); 
        return view('Akuntansi/Laporan/lapkasv', $data);
    } else {
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
            $builder = $this->kas;
            $builder->select('*');
            $builder->join('rekening', 'rekening.kode_akun = transaksi.kode_akun');   
            $builder->where('transaksi.kode_akun',$rekening);
            $builder->where('transaksi.created_at BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
            $data['akhir']=$fillend; 
            $query = $builder->get();   
            $data['kas']=$query->getResult();    

            $builder = $this->kas;
            $builder->where('created_at BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
            $builder->selectSum('kredit');    
            $query = $builder->get();   
            $data['kredit']=$query->getRow(); 
            
            $builder = $this->kas;
            $builder->where('created_at BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
            $builder->selectSum('debet');    
            $query = $builder->get();   
            $data['debet']=$query->getRow(); 
            
            $builder->selectAvg('debet');
            $query = $builder->get();
            $data['Rdebet']=$query->getRow();  
            // return  json_encode($data); 
        return view('Akuntansi/Laporan/lapkasv', $data);
    }


       
    }  
    public function cetak()
    {  
        $data['judul']="";
 
        $rekening=$this->request->getVar('rekening'); 
        $data['rekening']=$rekening;  
    if ($rekening==null) {
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
            $builder = $this->kas;
            $builder->select('*');
            $builder->join('rekening', 'rekening.kode_akun = transaksi.kode_akun');    
            $builder->where('transaksi.created_at BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
            $data['akhir']=$fillend; 
            $query = $builder->get();   
            $data['kas']=$query->getResult();    

            $builder = $this->kas;
            $builder->where('created_at BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
            $builder->selectSum('kredit');    
            $query = $builder->get();   
            $data['kredit']=$query->getRow(); 
            
            $builder = $this->kas;
            $builder->where('created_at BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
            $builder->selectSum('debet');    
            $query = $builder->get();   
            $data['debet']=$query->getRow(); 
            
            $builder->selectAvg('debet');
            $query = $builder->get();
            $data['Rdebet']=$query->getRow();   
    } else {
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
            $builder = $this->kas;
            $builder->select('*');
            $builder->join('rekening', 'rekening.kode_akun = transaksi.kode_akun');   
            $builder->where('transaksi.kode_akun',$rekening);
            $builder->where('transaksi.created_at BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
            $data['akhir']=$fillend; 
            $query = $builder->get();   
            $data['kas']=$query->getResult();    

            $builder = $this->kas;
            $builder->where('created_at BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
            $builder->selectSum('kredit');    
            $query = $builder->get();   
            $data['kredit']=$query->getRow(); 
            
            $builder = $this->kas;
            $builder->where('created_at BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
            $builder->selectSum('debet');    
            $query = $builder->get();   
            $data['debet']=$query->getRow(); 
            
            $builder->selectAvg('debet');
            $query = $builder->get();
            $data['Rdebet']=$query->getRow();   
    }

            $filename = 'Laporan-Kas-'.date('d-M-Y-H-i');  
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
        $dompdf->loadHtml(view('/Akuntansi/Laporan/laporankas', $data));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // render html as PDF
        $dompdf->render();
        // output the generated pdf
        $dompdf->stream($filename);  
    }  

  
}
