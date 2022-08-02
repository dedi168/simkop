<?php

namespace App\Controllers;
use App\Models\SimpananModel;
use App\Models\DetaiSimpananModel;
use App\Models\AnggotaModel;
use Dompdf\Dompdf;


class Simpanan extends BaseController
{  protected $simpanan;
 protected $dsimpanan;
    protected $anggota;

    function __construct()
    {
        $this->simpanan=new SimpananModel();
        $this->dsimpanan=new DetaiSimpananModel();
        $this->anggota = new AnggotaModel();

    }
    var $title='autocomplite';
    public function index()
    { 
        $data['simpanan'] = $this->simpanan->findAll(); 
        return view ('Simpanan/Buka/index', $data);
    } 
    public function tambah()
    {   $data['simpanan'] = $this->simpanan->findAll(); 
        $data['anggota'] = $this->anggota->findAll(); 
        $data['bunga'] = $this->simpanan->getbunga();  
        return view('Simpanan/Buka/tambah',$data);
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
                'operator' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ],
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
                'pekerjaan' => [
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
                'status' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ],
            //     'no_anggota' => [
            //     'rules' => 'required',
            //     'errors' => [
            //     'required' => '{field} Harus diisi'
            // ]
            // ], 
                'telp' => [
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
                'status' => [
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
                'jenis' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
                'tgl_lahir' => [
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
        $model = new SimpananModel();
        $model->insert([
            'no_tabungan' => $this->request->getVar('no_tabungan'),
            'operator' => $this->request->getVar('operator'),
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'pekerjaan' => $this->request->getVar('pekerjaan'),
            'telp' => $this->request->getVar('telp'),
            'status' => $this->request->getVar('status'),
            'no_anggota' => $this->request->getVar('no_anggota'), 
            'status' => $this->request->getVar('status'), 
            'bunga' => $this->request->getVar('bunga'),
            'jenis' => $this->request->getVar('jenis'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'jk' => $this->request->getVar('jk'),
            'jt' => $this->request->getVar('jt'),
            'setoran' => $this->request->getVar('setoran'),
            'nilai'=> $this->request->getVar('nilai')
        ]);
        session()->setFlashdata('message', 'Tambah Data Simpanan Berhasil');
        return redirect()->to('/simpanan');
    }
    public function edit($no_tabungan)
    { 
        $datasim['simpanan'] = $this->simpanan->findAll(); 
        $datasim = $this->simpanan->find($no_tabungan); 
        if (empty($datasim)) 
            {
                throw new \CodeIgniter\Exceptions\PageNotFoundException('Data simpanan Tidak ditemukan !');
            }
        $data['simpanan'] = $datasim;
        return view('Simpanan/Buka/edit', $data);
    }
    public function update($no_tabungan)
    {
        if (!$this->validate([
            'no_tabungan' => [
            'rules' => 'required',
            'errors' => [
            'required' => '{field} Harus diisi'
        ]
        ],
            'operator' => [
            'rules' => 'required',
            'errors' => [
            'required' => '{field} Harus diisi'
        ]
        ],
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
            'pekerjaan' => [
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
            'status' => [
            'rules' => 'required',
            'errors' => [
            'required' => '{field} Harus diisi'
        ]
        ],
        //     'no_anggota' => [
        //     'rules' => 'required',
        //     'errors' => [
        //     'required' => '{field} Harus diisi'
        // ]
        // ], 
            'telp' => [
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
            'status' => [
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
            'jenis' => [
            'rules' => 'required',
            'errors' => [
            'required' => '{field} Harus diisi'
        ]
        ], 
            'tgl_lahir' => [
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
        $model = new SimpananModel();
        $model->update($no_tabungan, [  
        'no_tabungan' => $this->request->getVar('no_tabungan'),
        'operator' => $this->request->getVar('operator'),
        'nama' => $this->request->getVar('nama'), 
        'alamat' => $this->request->getVar('alamat'),
        'pekerjaan' => $this->request->getVar('pekerjaan'),
        'telp' => $this->request->getVar('telp'),
        'status' => $this->request->getVar('status'),
        'no_anggota' => $this->request->getVar('no_anggota'), 
        'status' => $this->request->getVar('status'), 
        'bunga' => $this->request->getVar('bunga'),
        'jenis' => $this->request->getVar('jenis'),
        'tgl_lahir' => $this->request->getVar('tgl_lahir'),
        'jk' => $this->request->getVar('jk'),
        'jt' => $this->request->getVar('jt'),
        'setoran' => $this->request->getVar('setoran'),
        'nilai'=> $this->request->getVar('nilai')
        ]);
        session()->setFlashdata('message', 'Update Data Simpanan Berhasil');
        return redirect()->to('/simpanan');
    }
    function delete($no_tabungan)
    {  
        $deltab = $this->simpanan->find($no_tabungan);
        if (empty($deltab)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Simpanan Tidak ditemukan !');
        }
        $this->simpanan->delete($no_tabungan);
        session()->setFlashdata('message', 'Delete Simpanan Berhasil');
        return redirect()->to('/simpanan');
    }
    public function getAnggota($id){
        $data = $this->anggota->find($id);  
        return  json_encode($data);     
    }
    public function blank()
    {  
        $data['judul']="";  
        $data['awal']=null;
        $data['akhir']=null;
        $data['status']=null;
        return view('Simpanan/Laporan/blank',$data);
    } 
    public function cari(){   
          
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
        $builder = $this->simpanan;  
        $builder->where('created_at BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
        $data['akhir']=$fillend; 
        $query = $builder->get();   
        $data['simpanan']=$query->getResult();  
        if ( $data['simpanan']==null) {
            $data['judul']="Belum Ada Data Simpanan";
            return view('Simpanan/Laporan/lapSimpanan', $data);
        } else {
            $data['judul']="";
            return view('Simpanan/Laporan/lapSimpanan', $data);
        }     
    }
    public function laporan()
    {  
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
        $builder = $this->simpanan;  
        $builder->where('created_at BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
        $data['akhir']=$fillend; 
        $query = $builder->get();   
        $data['simpanan']=$query->getResult();  
        if ( $data['simpanan']==null) {
            $data['judul']="Belum Ada Data Simpanan"; 
        } else {
            $data['judul']=""; 
        }      
        $filename = 'Laporan-Data-Simpanan-'.date('d-M-Y-H-i');  
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
        $dompdf->loadHtml(view('/Simpanan/Laporan/laporansimpanan', $data));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // render html as PDF
        $dompdf->render();
        // output the generated pdf
        $dompdf->stream($filename);  
    } 

}
