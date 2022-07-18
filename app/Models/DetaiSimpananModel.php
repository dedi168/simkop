<?php 

namespace App\Models;

use CodeIgniter\Model;

class DetaiSimpananModel extends Model
	{
        protected $table = "tb_detailsimpanan";
    	protected $primaryKey = "id";
        protected $returnType = "object";
        protected $useTimestamps = false;
        protected $allowedFields = ['id','no_tabungan','tgl','jenis_simpanan','jumlah','opr','kode','debet','kredit','jumlah_simpanan','created_at','updated_at'];   
        protected $validationRules = []; 
        protected $validationMessages = []; 
        protected $skipValidation = false;   
        function getdata(){ 
            return $this->db->table('tb_detailsimpanan')
            ->join('tb_simpanan','tb_simpanan.no_tabungan = tb_detailsimpanan.no_tabungan') 
            ->where('jenis_simpanan','KREDIT')
            ->orderBy('jenis_simpanan',SORT_DESC)
            ->get()->getResult();   
        }
        function getdetail(){ 
            return $this->db->table('tb_detailsimpanan')
            ->join('tb_simpanan','tb_simpanan.no_tabungan = tb_detailsimpanan.no_tabungan') 
            ->get()->getResult();   
        }
        function getdatasim(){ 
            return $this->db->table('tb_detailsimpanan')
            ->join('tb_simpanan','tb_simpanan.no_tabungan = tb_detailsimpanan.no_tabungan') 
            ->where('jenis_simpanan','DEBET')
            ->orderBy('jenis_simpanan',SORT_DESC)
            ->get()->getResult();   
        }
    } 