<?php 

namespace App\Models;

use CodeIgniter\Model;

class MasterJkreditModel extends Model
	{
        protected $table = "tb_master_jkredit";
    	protected $primaryKey = "id";
        protected $returnType = "object";
        protected $useTimestamps = true;
        protected $allowedFields = ['nama','akun','bunga','denda'];   
	} 