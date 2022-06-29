<?php 

namespace App\Models;

use CodeIgniter\Model;

class MasterJsimpModel extends Model
	{
        protected $table = "tb_master_jsimp";
    	protected $primaryKey = "id";
        protected $returnType = "object";
        protected $useTimestamps = true;
        protected $allowedFields = ['kode','nama','akun'];  
 
	} 