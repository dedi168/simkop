<?php 

namespace App\Models;

use CodeIgniter\Model;

class DetailPinjamanModel extends Model
	{
        protected $table = "tb_detail_pinjaman";
    	protected $primaryKey = "id";
        protected $returnType = "object";
        protected $useTimestamps = false;
        protected $allowedFields = ['no_pinjaman','tanggal','bayar','pokok','bunga','denda','opr','bayarke','sisa'];   
        protected $validationRules = []; 
        protected $validationMessages = []; 
        protected $skipValidation = false;   
        function getTemp(){ 
            return $this->db->table('TTemp') 
            ->get()->getResult(); 
        } 
        public function paginateNews(int $nb_page, $s) {
            return  $this->select('id,tb_detail_pinjaman.no_pinjaman,nama1,jml_pinjaman,tb_detail_pinjaman.bayar,pokok,tb_detail_pinjaman.bunga,sisa,bayarke,tb_detail_pinjaman.opr')
            ->join('tb_buka_pinjaman', 'tb_buka_pinjaman.no_pinjaman = tb_detail_pinjaman.no_pinjaman') 
            ->paginate($nb_page, $s);
        }
    } 