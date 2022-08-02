<?php

namespace App\Controllers;
use App\Models\DetaiSimpananModel;
use App\Models\simpananModel;
use Dompdf\Dompdf;

 

class TarikSimpanan extends BaseController
{   
    protected $simpananD;
    protected $simpanan;

    function __construct()
    {
        $this->simpananD=new DetaiSimpananModel();
        $this->simpanan = new simpananModel();
    }
    
    public function index()
    { 
        $data['simpananD'] = $this->simpananD->getdatasim(); 
        return view ('Simpanan/Penarikan/index', $data);
    } 
    public function tambah()
    {  
        $data['simpananD'] = $this->simpananD->findAll();  
        $data['simpanan'] = $this->simpanan->findAll();  
        return view('Simpanan/Penarikan/tambah',$data);
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
            'debet' => $this->request->getVar('jumlah'),
            'kode' => $this->request->getVar('kode'), 
            'jumlah_simpanan' => $this->request->getVar('jumlahS'),
            'created_at' => $this->request->getVar('created_at'),
            'updated_at' => $this->request->getVar('updated_at')
        ]);
        $no_tabungan = $this->request->getVar('no_tabungan');  
        $this->simpanan->update($no_tabungan, [ 
            'saldo_utama' => $this->request->getVar('jumlahS'), 
        ]);
        session()->setFlashdata('message', 'Tambah Data Iuran Berhasil');
        return redirect()->to('/tariksimpanan');
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
        return view('Simpanan/Penarikan/edit', $data);
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
                'debet' => $this->request->getVar('jumlah'),
                'kode' => $this->request->getVar('kode'), 
                'jumlah_simpanan' => $this->request->getVar('jumlahS'),
                'created_at' => $this->request->getVar('created_at'),
                'updated_at' => $this->request->getVar('updated_at')    ]);
                
                $no_tabungan = $this->request->getVar('no_tabungan');  
                $this->simpanan->update($no_tabungan, [ 
                    'saldo_utama' => $this->request->getVar('jumlahS'), 
                ]);
        session()->setFlashdata('message', 'Update Setoran Simpanan Berhasil');
        return redirect()->to('/tariksimpanan');
    }
  
    function delete($id)
    { 
        $simd = $this->simpananD->find($id);
        if (empty($simd)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Simpanan Tidak ditemukan !');
        }
        $this->simpananD->delete($id);
        session()->setFlashdata('message', 'Delete Simpanan Berhasil');
        return redirect()->to('/tariksimpanan');
    }

    public function getDataSimpanan($id){
        $builder = $this->simpanan;
        $builder->select('tb_simpanan.no_tabungan,nama,alamat,telp,no_anggota,jumlah_simpanan');
        $builder->join('tb_detailsimpanan', 'tb_detailsimpanan.no_tabungan = tb_simpanan.no_tabungan'); 
        $builder->where('tb_simpanan.no_tabungan', $id); 
        $builder->orderBy('tb_detailsimpanan.created_at', 'DESC');
        $builder->limit('1');
        $query = $builder->get(); 

        $data=$query->getRow();
        if ($data==null) {
            $data = $this->simpanan->find($id); 
            return  json_encode($data);  
        }
        return  json_encode($data);  
        // return $data->nama ;  
    }
    public function bukti($id){
        $builder = $this->simpanan;
        $builder->select('nama,jumlah_simpanan');
        $builder->join('tb_detailsimpanan', 'tb_detailsimpanan.no_tabungan = tb_simpanan.no_tabungan'); 
        $builder->where('tb_detailsimpanan.id', $id);  
        $query = $builder->get();   
        $data['simpanan']=$query->getRow(); 
        $filename = 'Bukti-Penarikan-Simpanan-'.date('d-m-Y-H-i');  
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
        $dompdf->loadHtml(view('/Simpanan/Laporan/buktitransaksipenarikan', $data));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // render html as PDF
        $dompdf->render();
        // output the generated pdf
        $dompdf->stream($filename); 

    }
}
