<?php 

namespace App\Models;

use CodeIgniter\Model;

class AnggotaModel extends Model
	{
        protected $table = "tb_anggota";
    	protected $primaryKey = "no_anggota";
        protected $returnType = "object";
        protected $useTimestamps = true;
        protected $allowedFields = ['no_anggota','nama','tempat','tanggal_lahir','jk','status','alamat','telp','pekerjaan','tanggal','wilayah','desa','desa_adat','kecamatan','no_identitas','id_user' ];  
         
	} 