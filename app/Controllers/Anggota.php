<?php

namespace App\Controllers;
use App\Models\AnggotaModel;
use App\Libraries\Libpdf;
use Dompdf\Dompdf;


class Anggota extends BaseController
{  protected $Anggota;

    function __construct()
    {
        $this->anggota=new AnggotaModel();
    }
    
    public function index()
    {  
        $currentPage= $this->request->getVar('page')? $this->request->getVar('page'):1;
        $data = [
            'anggota'=> $this->anggota->paginate(10 , 'default'),
            'pager' => $this->anggota->pager,
            'currentPage'=>$currentPage,
        ] ;   
        return view('Anggota/Buka/index', $data); 
    } 
    public function tambah()
    {  
        $data['anggota'] = $this->anggota->findAll(); 
      $data['users'] = $this->anggota->getuser(); 
        return view('Anggota/Buka/tambah',$data);
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
                'nama' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ],
                'tempat' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
                'tanggal_lahir' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ],
                'jk' => [
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
                'pekerjaan' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ],  
            //     'wilayah' => [
            //     'rules' => 'required',
            //     'errors' => [
            //     'required' => '{field} Harus diisi'
            // ]
            // ],
                'desa' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ], 
                'kecamatan' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ],
            //     'no_identitas' => [
            //     'rules' => 'required',
            //     'errors' => [
            //     'required' => '{field} Harus diisi'
            // ]
            // ],
                'opr' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ],  
                'id_user' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} Harus diisi'
            ]
            ],
                'st' => [
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
        $model = new AnggotaModel();
        $model->insert([
            'no_anggota' => $this->request->getVar('no_anggota'),
            'nama' => $this->request->getVar('nama'),
            'tempat' => $this->request->getVar('tempat'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'jk' => $this->request->getVar('jk'),
            'status' => $this->request->getVar('status'),
            'alamat' => $this->request->getVar('alamat'),
            'telp' => $this->request->getVar('telp'),
            'pekerjaan' => $this->request->getVar('pekerjaan'), 
            // 'wilayah' => $this->request->getVar('wilayah'),
            'desa' => $this->request->getVar('desa'),
            'kecamatan' => $this->request->getVar('kecamatan'),
            'no_identitas' => $this->request->getVar('no_identitas'),
            'opr' => $this->request->getVar('opr'),
            'id_user' => $this->request->getVar('id_user'),
            'st'=> $this->request->getVar('st')
        ]);
        session()->setFlashdata('message', 'Tambah Data anggota Berhasil');
        return redirect()->to('/anggota');
    }
    public function edit($no_anggota)
    { 
        $dataanggota['anggota'] = $this->anggota->getdatauser(); 
        $data['users'] = $this->anggota->getuser(); 
        $dataanggota = $this->anggota->find($no_anggota);
        if (empty($dataanggota)) 
            {
                throw new \CodeIgniter\Exceptions\PageNotFoundException('Data anggota Tidak ditemukan !');
            }
        $data['anggota'] = $dataanggota;
        return view('Anggota/Buka/ubah', $data);
    }
    public function update($no_anggota)
    {
        if (!$this->validate([
            'no_anggota' => [
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
            'tempat' => [
            'rules' => 'required',
            'errors' => [
            'required' => '{field} Harus diisi'
        ]
        ], 
            'tanggal_lahir' => [
            'rules' => 'required',
            'errors' => [
            'required' => '{field} Harus diisi'
        ]
        ],
            'jk' => [
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
            'pekerjaan' => [
            'rules' => 'required',
            'errors' => [
            'required' => '{field} Harus diisi'
        ]
        ],  
        //     'wilayah' => [
        //     'rules' => 'required',
        //     'errors' => [
        //     'required' => '{field} Harus diisi'
        // ]
        // ],
            'desa' => [
            'rules' => 'required',
            'errors' => [
            'required' => '{field} Harus diisi'
        ]
        ], 
            'kecamatan' => [
            'rules' => 'required',
            'errors' => [
            'required' => '{field} Harus diisi'
        ]
        ],
        //     'no_identitas' => [
        //     'rules' => 'required',
        //     'errors' => [
        //     'required' => '{field} Harus diisi'
        // ]
        // ],
            'opr' => [
            'rules' => 'required',
            'errors' => [
            'required' => '{field} Harus diisi'
        ]
        ],  
            'id_user' => [
            'rules' => 'required',
            'errors' => [
            'required' => '{field} Harus diisi'
        ]
        ],
            'st' => [
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
        $model = new AnggotaModel();
        $model->update($no_anggota, [  
        'no_anggota' => $this->request->getVar('no_anggota'),
        'nama' => $this->request->getVar('nama'),
        'tempat' => $this->request->getVar('tempat'),
        'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
        'jk' => $this->request->getVar('jk'),
        'status' => $this->request->getVar('status'),
        'alamat' => $this->request->getVar('alamat'),
        'telp' => $this->request->getVar('telp'),
        'pekerjaan' => $this->request->getVar('pekerjaan'), 
        // 'wilayah' => $this->request->getVar('wilayah'),
        'desa' => $this->request->getVar('desa'),
        'kecamatan' => $this->request->getVar('kecamatan'),
        'no_identitas' => $this->request->getVar('no_identitas'),
        'opr' => $this->request->getVar('opr'),
        'id_user' => $this->request->getVar('id_user'),
        'st'=> $this->request->getVar('st')
        ]);
        session()->setFlashdata('message', 'Update Data anggotan Berhasil');
        return redirect()->to('/anggota');
    }
    function delete($no_anggota)
    {  
        $agt = $this->anggota->find($no_anggota);
        if (empty($agt)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Anggota Tidak ditemukan !');
        }
        $this->anggota->delete($no_anggota);
        session()->setFlashdata('message', 'Delete Anggota Berhasil');
        return redirect()->to('/anggota');
    }
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
        if ($status==null) { 
                $builder = $this->anggota;  
                $builder->where('created_at BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
                $data['akhir']=$fillend; 
                $query = $builder->get();   
                $data['anggota']=$query->getResult();     
                if ($data['anggota']==null) {
                    $data['judul']="Belum Ada Data Anggota ".$status; 
                    $data['status']=$status; 
                } else {
                    $data['judul']=""; 
                    $data['status']=$status; 
                }
        } else {
           
                $builder = $this->anggota; 
                $builder->where('st',$status);
                $builder->where('created_at BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
                $data['akhir']=$fillend; 
                $query = $builder->get();   
                $data['anggota']=$query->getResult();
                if ($data['anggota']==null) {
                    $data['judul']="Belum Ada Data Anggota ".$status; 
                    $data['status']=$status; 
                } else {
                    $data['judul']=""; 
                    $data['status']=$status; 
                } 
        }
        $filename = 'Laporan-Anggota-'.$status.'-'.date('d-m-Y-H-i');  
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
        $dompdf->loadHtml(view('/Anggota/Laporan/LaporanAnggota', $data));

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
        $data['status']=null;
        return view('Anggota/Laporan/blnk',$data);
    } 
    public function cari()
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
        if ($status==null) { 
                $builder = $this->anggota;  
                $builder->where('created_at BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
                $data['akhir']=$fillend; 
                $query = $builder->get();   
                $data['anggota']=$query->getResult();   
                $data['status']=$status;  
            return view('Anggota/Laporan/lapAnggota', $data);
        } else {
           
                $builder = $this->anggota; 
                $builder->where('st',$status);
                $builder->where('created_at BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
                $data['akhir']=$fillend; 
                $query = $builder->get();   
                $data['anggota']=$query->getResult();
                if ($data['anggota']==null) {
                    $data['status']=$status;
                    $data['judul']="Belum Ada Data Anggota ".$status;
                    return view('Anggota/Laporan/lapAnggota', $data);
                } else {
                    $data['judul']="";
                    $data['status']=$status;
                    return view('Anggota/Laporan/lapAnggota', $data);
                } 
        }
  
    } 
    public function bukti($no_anggota)
    {  
       $data['anggota'] = $this->anggota->find($no_anggota); 
        $filename = 'Bukti-Anggota-'.date('d-m-Y-H-i');  
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
        $dompdf->loadHtml(view('/Anggota/Laporan/bukti', $data));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // render html as PDF
        $dompdf->render();
        // output the generated pdf
        $dompdf->stream($filename); 

       
    }
}
