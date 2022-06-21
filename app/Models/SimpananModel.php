<?php 

namespace App\Models;

use CodeIgniter\Model;

class SimpananModel extends Model
	{
        protected $table = "tb_simpanan";
    	protected $primaryKey = "no_tabungan";
        protected $returnType = "object";
        protected $useTimestamps = true;
        protected $allowedFields = ['operator','nama','alamat','pekerjaan','no_anggota','telp','status','bunga','jenis','jk','jt','setoran','nilai','tgl_lahir'];  
        public function getbunga()
        {
            return $this->db->table('tb_bunga_simpanan') 
            ->get()->getResult();  
        }
        public function getanggota()
        { 
            return $this->db->table('tb_anggota') 
            ->get()->getResult();  
        }
	} 