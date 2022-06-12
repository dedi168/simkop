<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BukaPinjaman extends Migration
{
    public function up()
    { 
        $this->forge->addField([
            'no_pinjaman'        => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true, 
            ],
            'nama'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,
            ],
            'alamat'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,  
            ],
            'telp'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,
            ], 
            'pekerjaan'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,
            ], 
            'no_anggota'       => [
                'type'       => 'INT', 
                'constraint'     => 11,
            ], 
            'tanggal'       => [
                'type'       => 'DATE',  
            ], 
            'opr'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,
            ], 
            'jml_pinjaman'       => [
                'type'       => 'INT', 
                'constraint'     => 100,
            ], 
            'sistem_bunga'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,
            ], 
            'jangka_waktu'       => [
                'type'       => 'INT', 
                'constraint'     => 100,
            ],
            'jangka_harian'       => [
                'type'       => 'INT', 
                'constraint'     => 100,
            ],  
            'bunga'       => [
                'type'       => 'float', 
            ], 
            'administrasi'       => [
                'type'       => 'float',  
            ], 
            'gaji'       => [
                'type'       => 'float',  
            ],  
            'keperluan'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,
            ],  
            'nsp'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,
            ],  
            'jenis'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,
            ],  
            'status'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,
            ],  
            'ref'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,
            ],  
            'meterai'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,
            ], 
            'meterai'       => [
                'type'       => 'float',  
            ], 
            'provisi'       => [
                'type'       => 'float',  
            ], 
            'premi'       => [
                'type'       => 'float',  
            ],   
            'noid'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,
            ], 
            'nama2'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,
            ],
            'alamat2'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,  
            ], 
            'pekerjaan2'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,
            ], 
            'gaji2'       => [
                'type'       => 'float',  
            ],   
            'hub'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,
            ], 
            'prs'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,
            ],
             
            'prs_alamat'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,
            ], 
            'sumber_bayar'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,
            ], 
            'bayar'       => [
                'type'       => 'FLOAT',  
            ], 
            'tmp'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,
            ], 
            'tgl_lahir'       => [
                'type'       => 'DATE', 
            ], 
            'jaminan'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,
            ], 
            'gol'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,
            ],
            'created_at' => [	
                'type'	=> 'DATETIME',
                'null'	=> true,
                ],	
            'updated_at' => [	
                'type'	=> 'DATETIME',
                'null'	=> true,
                ]	
        ]);
        $this->forge->addKey('no_pinjaman', true);
        $this->forge->createTable('tb_buka_pinjaman');
    }

    public function down()
    {
        $this->forge->dropTable('tb_buka_pinjaman');
    }
}
