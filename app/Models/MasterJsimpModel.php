<?php 

namespace App\Models;

use CodeIgniter\Model;

class MasterJsimpModel extends Model
	{
        protected $table = "tb_master_jsimp";
    	protected $primaryKey = "id";
        protected $returnType = "object";
        protected $useTimestamps = true;
        protected $allowedFields = ['kode','nama','akun_id'];  

        public function getdatajsim()
        {
            return $this->db->table('tb_master_jsimp')
            ->join('tb_akunsimp', 'tb_akunsimp.id = tb_master_jsimp.akun_id')
            ->get()->getResultArray();  
        }

        function getdataakun(){ 
			return $this->db->table('tb_akunsimp')
            ->orderBy('id', 'asc')
            ->get()->getResultArray();  
        } 
	} 