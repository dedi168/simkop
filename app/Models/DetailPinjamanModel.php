<?php 

namespace App\Models;

use CodeIgniter\Model;

class DetailPinjamanModel extends Model
	{
        protected $table = "tb_detail_pinjaman";
    	protected $primaryKey = "id";
        protected $returnType = "object";
        protected $useTimestamps = false;
        protected $allowedFields = ['no_pinjaman','tanggal','bayar','pokok','bunga','denda','opr','bayarke','sisa'];   
        protected $validationRules = []; 
        protected $validationMessages = []; 
        protected $skipValidation = false;   
        function getTemp(){ 
            return $this->db->table('TTemp') 
            ->get()->getResult(); 
        } 
    } 