<?php

namespace App\Controllers;
use App\Models\AnggotaModel;
use App\Models\DetaiSimpananModel;
use App\Models\DetailPinjamanModel;
use App\Models\DetailDepositoModel;
use App\Models\SimpananModel;
use App\Models\PinjamanModel;
use App\Models\DepositoModel;


class User extends BaseController
{
    protected $anggota;
    protected $simpananD;
    protected $pinjamanD;
    protected $depositoD;
    protected $simpanan;
    protected $pinjaman;
    protected $deposito;

    function __construct()
    { 
        $this->anggota = new AnggotaModel();
        $this->simpananD = new DetaiSimpananModel();
        $this->pinjamanD = new DetailPinjamanModel();
        $this->depositoD = new DetailDepositoModel();
        $this->simpanan = new SimpananModel();
        $this->pinjaman = new PinjamanModel();
        $this->deposito = new DepositoModel();
    }
    public function index()
    {
        // $data['title']='Nasabah';
        $builder = $this->anggota;
        $builder->select('username,email,alamat,telp,nama,tb_anggota.status,jk,user_image');
        $builder->join('users', 'users.id = tb_anggota.id_user'); 
        $id=user()->id;  
        $builder->where('users.id',$id);
        $query = $builder->get(); 

        $data['user']=$query->getRow();  
 
        if ($data['user']==null) { 
            $data['user']=="";
            return view('User/index',$data); 
        }
        // dd($data);
        return view('User/index',$data);
    }
    public function riwayat()
    { 
        $builder = $this->anggota;
        $builder->select('username,email,alamat,telp,nama,tb_anggota.status,jk,user_image,no_anggota');
        $builder->join('users', 'users.id = tb_anggota.id_user'); 
        $id=user()->id;  
        $builder->where('users.id',$id);
        $query = $builder->get();  
        $data['user']=$query->getRow(); 
        if ($data['user']!=null) {
        $no_anggota=$data['user']->no_anggota; 
        
            $data['judulR'] ='';
            //simpanan
                $pager = \Config\Services::pager(); 
                $data['simpanan'] = $this->simpanan->paginate(10);
                $data['pager'] = $this->simpanan->pager; 
                $data['page'] = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
                $builder = $this->simpanan; 
                $builder->join('tb_anggota', 'tb_anggota.no_anggota = tb_simpanan.no_anggota'); 
                $builder->where('tb_simpanan.no_anggota', $no_anggota);  
                $query = $builder->get();  
                $data['Nsimpanan']=$query->getRow(); 
                if ($data['Nsimpanan']==null) { 
                    $data['judul'] ='Belum Ada Simpanan';              
                } else{
                    $data['judul'] ='';
                $no_simpanan = $data['Nsimpanan']->no_tabungan; 

                $builder = $this->simpananD;
                $builder->select('*');
                $builder->where('tb_detailsimpanan.no_tabungan', $no_simpanan);  
                $builder->orderBy('tb_detailsimpanan.created_at', 'DESC'); 
                $query = $builder->get();  
                $data['simpanan']=$query->getResult(); }
            //akhir simpanan
            //pinjaman
                $builder = $this->pinjaman; 
                $builder->join('tb_anggota', 'tb_anggota.no_anggota = 	tb_buka_pinjaman.no_anggota'); 
                $builder->where('	tb_buka_pinjaman.no_anggota', $no_anggota);  
                $query = $builder->get();  
                $data['Npinjaman']=$query->getRow(); 
                if ($data['Npinjaman']==null) {
                    $data['judulP']='Belum Ada Pinjaman';
                } else{
                    $data['judulP'] ='';
                $no_pinjaman = $data['Npinjaman']->no_pinjaman; 

                $builder = $this->pinjamanD;
                $builder->select('*');
                $builder->join('tb_buka_pinjaman', 'tb_buka_pinjaman.no_pinjaman = 	tb_detail_pinjaman.no_pinjaman'); 
                $builder->where('tb_detail_pinjaman.no_pinjaman', $no_pinjaman);  
                $builder->orderBy('tb_detail_pinjaman.created_at', 'DESC'); 
                $query = $builder->get();  
                $data['pinjaman']=$query->getResult(); }
            //akhir pinjaman
            //deposito
                $builder = $this->deposito; 
                $builder->join('tb_anggota', 'tb_anggota.no_anggota = tb_deposito.no_anggota'); 
                $builder->where('tb_deposito.no_anggota', $no_anggota);  
                $query = $builder->get();  
                $data['Ndeposito']=$query->getRow(); 
                if ($data['Ndeposito']==null) {
                    $data['judulD'] = "Belum Ada Deposito"; 
                } else{
                    $data['judulD'] ='';
                    $no_deposito = $data['Ndeposito']->no_deposito; 

                $builder = $this->deposito;
                $builder->select('*');
                $builder->where('tb_deposito.no_deposito', $no_deposito);  
                $query = $builder->get();  
                $data['deposito']=$query->getResult(); }
            //akhir deposito
        } else {
            $data['judulR'] ='Belum Ada Riwayat Transaksi';
        } 
        return view('User/riwayat',$data);
    }

     
}
