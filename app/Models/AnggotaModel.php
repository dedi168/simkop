<?php 

namespace App\Models;

use CodeIgniter\Model;

class AnggotaModel extends Model
	{
        protected $table = "tb_anggota";
    	protected $primaryKey = "no_anggota";
        protected $returnType = "object";
        protected $useTimestamps = true;
        protected $allowedFields = ['no_anggota','nama','tempat','tanggal_lahir','jk','status','alamat','telp','pekerjaan','tanggal','wilayah','desa','kecamatan','st','opr','no_identitas','id_user' ];  
        
        public function paginateNews(int $nb_page, $s) {
            return  $this->select('*')->join('users', 'users.id = tb_anggota.id_user')->orderBy('no_anggota', 'asc')->paginate($nb_page, $s); 
        }
        public function getuser()
        {
            return $this->db->table('users') 
            ->get()->getResult();  
        }
	} 