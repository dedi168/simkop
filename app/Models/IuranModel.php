<?php 

namespace App\Models;

use CodeIgniter\Model;

class IuranModel extends Model
	{
        protected $table = "tb_iuran";
    	protected $primaryKey = "id";
        protected $returnType = "object";
        protected $useTimestamps = false;
        protected $allowedFields = ['id','no_anggota','tgl_bayar','jenis_simpanan','jumlah_bln','tgl_mulai','bln_m','thn_m','jumlah	pokok','wajib','opr','created_at'];   
        protected $validationRules = []; 
        protected $validationMessages = []; 
        protected $skipValidation = false; 
        function miuran()
    { 
        return $this->db->table('tb_master_iuran')    
        ->get()->getResult(); 
    }
    } 