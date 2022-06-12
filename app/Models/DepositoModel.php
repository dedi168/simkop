<?php 

namespace App\Models;

use CodeIgniter\Model;

class DepositoModel extends Model
	{
        protected $table = "tb_deposito";
    	protected $primaryKey = "no_deposito";
        protected $returnType = "object";
        protected $useTimestamps = true;
        protected $allowedFields = ['no_deposito','nama','alamat','tgl_lahir','telp','jangka_waktu','bunga','jumlah','no_anggota','jatuh_tempo','status','operator','no_tabungan','sistem','perpanjangan','kali','jenis','pekerjaan','mulai','created_at'];  
         
	} 