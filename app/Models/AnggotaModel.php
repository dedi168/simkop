<?php 

namespace App\Models;

use CodeIgniter\Model;

class AnggotaModel extends Model
	{
        protected $table = "tb_anggota";
    	protected $primaryKey = "no_anggota";
        protected $returnType = "object";
        protected $useTimestamps = true;
        protected $allowedFields = ['nama','tempat','tanggal_lahir','jk','status','alamat','telp','pekerjaan','tanggal','wilayah','desa','desa_adat','kecamatan','no_identitas','id_user' ];  
        public function getdatauser()
        { 
            return $this->db->table('tb_anggota')
            ->join('users', 'users.id = tb_anggota.id_user') 
            ->get()->getResult();  
        }
        public function getuser()
        {
            return $this->db->table('users') 
            ->get()->getResult();  
        }
	} 