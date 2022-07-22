<?php 

namespace App\Models;

use CodeIgniter\Model;

class InventarisModel extends Model
	{
        protected $table = "tb_inventaris";
    	protected $primaryKey = "id";
        protected $returnType = "object";
        protected $useTimestamps = true;
        protected $allowedFields = ['kode','nama','tgl_beli','umur','jumlah','nilai','tgl_habis','grup'];  
        
        public function getdatauser()
        { 
            return $this->db->table('tb_anggota')
            ->join('users', 'users.id = tb_anggota.id_user') 
            ->orderBy('no_anggota', 'asc')
            ->get()->getResult();  
        }
        public function getuser()
        {
            return $this->db->table('users') 
            ->get()->getResult();  
        }
	} 