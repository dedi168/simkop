<?php

namespace App\Controllers;
use App\Models\InventarisModel; 
use Dompdf\Dompdf;


class Inventaris extends BaseController
{  protected $inventaris;

    function __construct()
    {
        $this->inventaris=new InventarisModel();
    }
    
    public function index()
    {     
        $currentPage= $this->request->getVar('page')? $this->request->getVar('page'):1;
        $data = [
            'inventaris'=> $this->inventaris->paginate(10 , 'default'),
            'pager' => $this->inventaris->pager,
            'currentPage'=>$currentPage,
        ] ; 
        return view('Akuntansi/Inventaris/index', $data);
    } 
    public function tambah()
    {  
        $data['inventaris'] = $this->inventaris->findAll();  
        return view('Akuntansi/Inventaris/tambah',$data);
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
                'jumlah' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ],
                'nilai' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
                'grup' => [
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
        $this->inventaris->insert([ 
            'kode' => $this->request->getVar('kode'),
            'nama' => $this->request->getVar('nama'),
            'tgl_beli' => $this->request->getVar('tgl_beli'),
            'umur' => $this->request->getVar('umur'),
            'jumlah' => $this->request->getVar('jumlah'),
            'nilai' => $this->request->getVar('nilai'),
            'tgl_habis' => $this->request->getVar('tgl_habis'),
            'grup' => $this->request->getVar('grup'),
        ]);
        session()->setFlashdata('message', 'Tambah Data inventaris Berhasil');
        return redirect()->to('/inventaris');
    }
    public function edit($id)
    {  
        $datainventaris = $this->inventaris->find($id);
        if (empty($datainventaris)) 
            {
                throw new \CodeIgniter\Exceptions\PageNotFoundException('Data inventaris Tidak ditemukan !');
            }
        $data['inventaris'] = $datainventaris;
        return view('Akuntansi/Inventaris/ubah', $data);
    }
    public function update($id)
    {
        if (!$this->validate([
            'nama' => [
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
                'nilai' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
                'grup' => [
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
        $this->inventaris->update($id,[ 
            'kode' => $this->request->getVar('kode'),
            'nama' => $this->request->getVar('nama'),
            'tgl_beli' => $this->request->getVar('tgl_beli'),
            'umur' => $this->request->getVar('umur'),
            'jumlah' => $this->request->getVar('jumlah'),
            'nilai' => $this->request->getVar('nilai'),
            'tgl_habis' => $this->request->getVar('tgl_habis'),
            'grup' => $this->request->getVar('grup'),
        ]);
        session()->setFlashdata('message', 'Ubah Data inventaris Berhasil');
        return redirect()->to('/inventaris');
    }
    function delete($id)
    {  
        $inv = $this->inventaris->find($id);
        if (empty($inv)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Inventaris Tidak ditemukan !');
        }
        $this->inventaris->delete($id);
        session()->setFlashdata('message', 'Delete Inventaris Berhasil');
        return redirect()->to('/inventaris');
    }
    public function laporan()
    {  
        $data['inventaris'] = $this->inventaris->findAll(); 
        $builder = $this->inventaris;
            $builder->selectSum('nilai');    
            $query = $builder->get();   
            $data['harga']=$query->getRow(); 
        $filename = 'Laporan-Inventaris-'.date('d-M-Y-H-i');  
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
        $dompdf->loadHtml(view('/Akuntansi/Laporan/laporaninventaris', $data));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // render html as PDF
        $dompdf->render();
        // output the generated pdf
        $dompdf->stream($filename);  
    } 
}
