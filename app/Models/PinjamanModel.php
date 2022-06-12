<?php 

namespace App\Models;

use CodeIgniter\Model;

class PinjamanModel extends Model
	{
        protected $table = "tb_buka_pinjaman";
    	protected $primaryKey = "no_pinjaman";
        protected $returnType = "object";
        protected $useTimestamps = true;
        protected $allowedFields = ['no_pinjaman','nama','alamat','telp','pekerjaan','no_anggota','tanggal','opr','jml_pinjaman','sistem_bunga','jangka_waktu','jangka_harian','bunga','administrasi','gaji','keperluan','nsp','jenis','status','ref','meterai','provisi','premi','	noid','	nama2','alamat2','pekerjaan2','gaji2','hub','prs','prs_alamat','sumber_bayar','bayar','tmp','tgl_lahir','jaminan','gol'	];  
         
	} 