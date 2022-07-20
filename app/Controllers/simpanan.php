<?php

namespace App\Controllers;
use App\Models\SimpananModel;
use App\Models\AnggotaModel;


class Simpanan extends BaseController
{  protected $simpanan;
    protected $anggota;

    function __construct()
    {
        $this->simpanan=new SimpananModel();
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

}
