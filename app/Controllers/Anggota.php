<?php

namespace App\Controllers;
use App\Models\AnggotaModel;


class Anggota extends BaseController
{  protected $Anggota;

    function __construct()
    {
        $this->anggota=new AnggotaModel();
    }
    
    public function index()
    {  
        $pager = \Config\Services::pager(); 
        $data['anggota'] = $this->anggota->paginate(10);
        $data['pager'] = $this->anggota->pager; 
        $data['page'] = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $data['anggota'] = $this->anggota->getdatauser();  
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
            // 'no_identitas' => $this->request->getVar('no_identitas'),
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
        // 'no_identitas' => $this->request->getVar('no_identitas'),
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
}
