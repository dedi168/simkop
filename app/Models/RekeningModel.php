<?php 

namespace App\Models;

use CodeIgniter\Model;

class RekeningModel extends Model
	{
        protected $table = "rekening";
    	protected $primaryKey = "kode_akun";
        protected $returnType = "object";
        protected $useTimestamps = true;
        protected $allowedFields = ['kode','nama_akun','status'];  
         
	} 