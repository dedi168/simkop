<?php 

namespace App\Models;

use CodeIgniter\Model;

class BungaSimpananModel extends Model
	{
        protected $table = "tb_bunga_simpanan";
    	protected $primaryKey = "id";
        protected $returnType = "object";
        protected $useTimestamps = true;
        protected $allowedFields = ['bunga', 'batas'];  
         
	} 