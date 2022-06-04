<?php 

namespace App\Models;

use CodeIgniter\Model;

class MasterGolKreditModel extends Model
	{
        protected $table = "tb_golonganKredit";
    	protected $primaryKey = "id";
        protected $returnType = "object";
        protected $useTimestamps = true;
        protected $allowedFields = ['nama', 'bawah','atas'];  
         
	} 