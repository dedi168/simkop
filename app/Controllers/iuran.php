<?php

namespace App\Controllers;
use App\Models\IuranModel;
use App\Models\AnggotaModel;
use Dompdf\Dompdf;

use function PHPUnit\Framework\stringEndsWith;

class Iuran extends BaseController
{protected $iuran;
    protected $anggota;

    function __construct()
    {
        $this->iuran=new IuranModel();
        $this->anggota = new AnggotaModel();
    }
    
    public function index()
    { 
        $data['iuran'] = $this->iuran->findAll(); 
        return view ('Anggota/Iuran/index', $data);
    } 
    public function tambah()
    {  
        $data['iuran'] = $this->iuran->findAll(); 
        $data['miuran'] = $this->iuran->miuran(); 
        $data['anggota'] = $this->iuran->getanggota(); 
        return view('Anggota/Iuran/tambah',$data);
    }   
    public function store()
    {
        if (!$this->validate([ 
                'no_anggota' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
                'jenis_simpanan' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
                'jumlah_bln' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
            //     'tgl_mulai' => [
            //     'rules' => 'required',
            //     'errors' => [
            //     'required' => '{field} Harus diisi'
            // ]
            // ], 
                'bln_m' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
                'thn_m' => [
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
                'opr' => [
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
        $this->iuran->insert([
            'no_anggota' => $this->request->getVar('no_anggota'), 
            'jenis_simpanan' => $this->request->getVar('jenis_simpanan'),
            'tgl_bayar' => $this->request->getVar('tgl_bayar'),
            'jumlah_bln' => $this->request->getVar('jumlah_bln'),
            // 'tgl_mulai' => $this->request->getVar('tgl_mulai'),
            'bln_m' => $this->request->getVar('bln_m'),
            'thn_m' => $this->request->getVar('thn_m'),
            'jumlah' => $this->request->getVar('jumlah'),
            'pokok' => $this->request->getVar('pokok'),
            'wajib' => $this->request->getVar('wajib'),
            'opr' => $this->request->getVar('opr')
        ]);
        session()->setFlashdata('message', 'Tambah Data Iuran Berhasil');
        return redirect()->to('/iuran');
    }
    public function edit($id)
    {   
        $builder = $this->anggota;
        $builder->select('*');
        $builder->join('tb_iuran', 'tb_iuran.no_anggota = tb_anggota.no_anggota'); 
        $builder->where('tb_iuran.id', $id);  
        $query = $builder->get(); 
        $data['miuran'] = $this->iuran->miuran(); 
        $data['anggota'] = $this->iuran->getanggota(); 
        $data['iuran']=$query->getRow(); 
        // $data['simpanan']=$query->getRow();
        // $dataiuran = $this->iuran->find($id);
        // $data['miuran'] = $this->iuran->miuran(); 
        // $data['anggota'] = $this->iuran->getanggota(); 
        // if (empty($dataiuran)) 
        //     {
        //         throw new \CodeIgniter\Exceptions\PageNotFoundException('Data iuran Tidak ditemukan !');
        //     }
        // $data['iuran'] = $dataiuran;
        return view('Anggota/Iuran/edit', $data);
    }
    public function update($id)
    {
        if (!$this->validate([ 
            'no_anggota' => [
            'rules' => 'required',
            'errors' => [
            'required' => '{field} Harus diisi'
            ]
            ], 
                'jenis_simpanan' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
                'jumlah_bln' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
            //     'tgl_mulai' => [
            //     'rules' => 'required',
            //     'errors' => [
            //     'required' => '{field} Harus diisi'
            // ]
            // ], 
                'bln_m' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
                'thn_m' => [
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
                'opr' => [
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
        $this->iuran->update($id, [ 
            'no_anggota' => $this->request->getVar('no_anggota'), 
            'jenis_simpanan' => $this->request->getVar('jenis_simpanan'),
            'jumlah_bln' => $this->request->getVar('jumlah_bln'),
            // 'tgl_mulai' => $this->request->getVar('tgl_mulai'),
            'bln_m' => $this->request->getVar('bln_m'),
            'thn_m' => $this->request->getVar('thn_m'),
            'jumlah' => $this->request->getVar('jumlah'),
            'pokok' => $this->request->getVar('pokok'),
            'wajib' => $this->request->getVar('wajib'),
            'opr' => $this->request->getVar('opr')
        ]);
        session()->setFlashdata('message', 'Update Iuran Berhasil');
        return redirect()->to('/iuran');
    }
  
    function delete($id)
    { 
        $iuran = $this->iuran->find($id);
        if (empty($iuran)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Iuran Tidak ditemukan !');
        }
        $this->iuran->delete($id);
        session()->setFlashdata('message', 'Delete Iuran Berhasil');
        return redirect()->to('/iuran');
    }

    public function getAnggota($id){
        $data = $this->anggota->find($id);  
        return  json_encode($data);  
        // return $data->nama ;  
    }
    public function bukti($id)
    {  
       $data['iuran'] = $this->iuran->find($id);  
        $filename = 'Bukti-Iuran-'.date('d-m-Y-H-i');  
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
        $dompdf->loadHtml(view('/Anggota/Laporan/buktiiuran', $data));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // render html as PDF
        $dompdf->render();
        // output the generated pdf
        $dompdf->stream($filename); 

       
    }
    public function blank()
    {  
        $data['judul']="";  
            $data['awal']=null;
            $data['akhir']=null; 
        return view('Anggota/Laporan/Iuran/blnk', $data);
    }  
    public function cari()
    {  
        $data['judul']="";
  
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
                $builder = $this->iuran; 
                $builder->where('tgl_bayar BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
                $data['akhir']=$fillend; 
                $query = $builder->get();   
                $data['iuran']=$query->getResult(); 

                $builder = $this->iuran;
                $builder->where('tgl_bayar BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
                $builder->selectSum('pokok');    
                $query = $builder->get();   
                $data['pokok']=$query->getRow(); 
                
                $builder = $this->iuran;
                $builder->where('tgl_bayar BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
                $builder->selectSum('wajib');    
                $query = $builder->get();   
                $data['wajib']=$query->getRow(); 
                 
            return view('Anggota/Laporan/Iuran/lapiuran', $data); 
    }  
    public function cetak()
    {  
        $data['judul']="";
  
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
            $builder = $this->iuran; 
            $builder->where('tgl_bayar BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
            $data['akhir']=$fillend; 
            $query = $builder->get();   
            $data['iuran']=$query->getResult();    

            $builder = $this->iuran;
            $builder->where('tgl_bayar BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
            $builder->selectSum('pokok');    
            $query = $builder->get();   
            $data['pokok']=$query->getRow(); 
            
            $builder = $this->iuran;
            $builder->where('tgl_bayar BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
            $builder->selectSum('wajib');    
            $query = $builder->get();   
            $data['wajib']=$query->getRow(); 

        $filename = 'Laporan-Iuran-'.date('d-M-Y-H-i');  
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
        $dompdf->loadHtml(view('/Anggota/Laporan/Iuran/laporaniuran', $data));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // render html as PDF
        $dompdf->render();
        // output the generated pdf
        $dompdf->stream($filename);  
    } 
}
