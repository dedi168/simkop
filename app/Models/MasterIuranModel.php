<?php 

namespace App\Models;

use CodeIgniter\Model;

class MasterIuranModel extends Model
	{
        protected $table = "tb_master_iuran";
    	protected $primaryKey = "id";
        protected $returnType = "object";
        protected $useTimestamps = true;
        protected $allowedFields = ['pokok', 'wajib'];  
         
	} 