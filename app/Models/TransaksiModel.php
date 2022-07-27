<?php 

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
	{
        protected $table = "transaksi";
    	protected $primaryKey = "nomor";
        protected $returnType = "object";
        protected $useTimestamps = true;
        protected $allowedFields = ['no_jurnal','kode_akun','debet','kredit','catatan'];  
        public function getmastertransaksi()
        {
            return $this->db->table('master_transaksi') 
            ->get()->getResult();  
        }
        public function getkasmasuk()
        {
            return $this->db->table('transaksi') 
            ->where('debet', '0') 
            ->get()->getResult();  
        }
        public function getkaskeluar()
        {
            return $this->db->table('transaksi') 
            ->where('kredit', '0') 
            ->get()->getResult();  
        }
        public function getMtransaksi($id)
        {
            return $this->db->table('master_transaksi') 
            ->where('no_jurnal',$id) 
            ->get()->getResult();  
        }
        public function gettransaksilv1()
        {
            return $this->db->table('rekening_lv1') 
            ->get()->getResult();  
        } 
        public function gettransaksilv0()
        {
            return $this->db->table('rekening_lv0') 
            ->get()->getResult();  
        } 
        public function getrek($id)
        {
            return $this->db->table('rekening')
            ->where('kode_akun',$id) 
            ->get()->getResult();  
        } 
        public function getrekening()
        {
            return $this->db->table('rekening') 
            ->get()->getResult();  
        } 
        function getdatajenis(){ 
            return $this->db->table('tb_buka_pinjaman')
            ->join('tb_master_jkredit','tb_master_jkredit.id =tb_buka_pinjaman.jenis') 
            ->get()->getResult();   
        }
	} 