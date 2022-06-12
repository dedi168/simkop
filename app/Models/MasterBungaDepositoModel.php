<?php 

namespace App\Models;

use CodeIgniter\Model;

class MasterBungaDepositoModel extends Model
	{
        protected $table = "tb_master_bunga_deposito";
    	protected $primaryKey = "id";
        protected $returnType = "object";
        protected $useTimestamps = true;
        protected $allowedFields = ['jangka','bunga','keterangan'];   
	} 