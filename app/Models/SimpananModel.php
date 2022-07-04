<?php 

namespace App\Models;

use CodeIgniter\Model;

class SimpananModel extends Model
	{
        protected $table = "tb_simpanan";
    	protected $primaryKey = "no_tabungan";
        protected $returnType = "object";
        protected $useTimestamps = true;
        protected $allowedFields = ['no_tabungan','operator','nama','alamat','pekerjaan','no_anggota','telp','status','bunga','jenis','jk','jt','setoran','nilai','tgl_lahir'];  
        public function getbunga()
        {
            return $this->db->table('tb_bunga_simpanan') 
            ->get()->getResult();  
        }
        public function get_anggota($title)
        {  
            $hsl=$this->db->query("SELECT * FROM tb_anggota WHERE no_anggota='$no_anggota'"); 
            if($hsl->num_rows()>0){ 
                foreach ($hsl->result() as $data) {
                    $hasil=array(
                        'no_anggota' => $data->no_anggota,
                        'nama' => $data->nama,
                        'alamat' => $data->alamt,
                        'telp' => $data->telp,
                        );

                }
            }

        return $hasil;
         
        }
        function cari($no_anggota){
            $query= $this->db->get_where('tb_anggota',array('no_anggota'=>$no_anggota));
            return $query;
        }
	} 