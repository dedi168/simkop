<?php 

namespace App\Models;

use CodeIgniter\Model;

class DetailDepositoModel extends Model
	{
        protected $table = "tb_detail_deposito";
    	protected $primaryKey = "id";
        protected $returnType = "object";
        protected $useTimestamps = true;
        protected $allowedFields = ['id','no_deposito','tgl','jumlah','tgl_ambil','jenis','opr','status','saldo'];  
        function getdata(){ 
            return $this->db->table('tb_deposito')
            ->join('tb_detail_deposito', 'tb_detail_deposito.id = tb_deposito.no_deposito')  
            ->get()->getResult();   
        } 
	} 