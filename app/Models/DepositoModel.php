<?php 

namespace App\Models;

use CodeIgniter\Model;

class DepositoModel extends Model
	{
        protected $table = "tb_deposito";
    	protected $primaryKey = "no_deposito";
        protected $returnType = "object";
        protected $useTimestamps = true;
        protected $allowedFields = ['no_deposito','nama','alamat','tgl','telp','jangka_waktu','bunga','jumlah',
        'no_anggota','jatuh_tempo','status','operator','no_tabungan','sistem','perpanjangan','kali','jenis','pekerjaan','mulai','ahli_waris'];  
        function getdata(){ 
            return $this->db->table('tb_deposito')
            ->select('no_deposito,tb_deposito.nama,tb_deposito.alamat,tb_deposito.tgl,tb_deposito.telp
            ,jangka_waktu,tb_deposito.bunga,jumlah,tb_deposito.no_anggota,jatuh_tempo,tb_deposito.status,
            operator,no_tabungan,sistem,perpanjangan,jenis,ahli_waris,mulai,tb_master_bunga_deposito.jangka')
            ->join('tb_master_bunga_deposito', 'tb_master_bunga_deposito.id = tb_deposito.jangka_waktu') 
            ->join('tb_anggota', 'tb_anggota.no_anggota = tb_deposito.no_anggota')  
            ->get()->getResult();   
        } 
	} 