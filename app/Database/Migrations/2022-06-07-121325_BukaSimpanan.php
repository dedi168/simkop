<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BukaSimpanan extends Migration
{
    public function up()
    {
        
        $this->forge->addField([
            'no_tabungan'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true, 
            ],
            'operator'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,
            ],
            'nama'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255, 
            ],
            'alamat'       => [
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
            'telp'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,
            ],
            'status'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,
            ],
            'bunga'       => [
                'type'       => 'FLOAT', 
                'constraint'     => 8.1,
            ],
            'jenis'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,
            ],
            'jk'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,
            ],
            'jt'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,
            ],
            'setoran'       => [
                'type'       => 'FLOAT', 
                'constraint'     => 12.2,
            ],
            'nilai'       => [
                'type'       => 'FLOAT', 
                'constraint'     => 12.2,
            ],
            'tgl_lahir'       => [
                'type'	=> 'DATETIME',
                'null'	=> true,
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
        $this->forge->addKey('no_tabungan', true);
        $this->forge->createTable('tb_simpanan');
    }

    public function down()
    {
        $this->forge->dropTable('tb_simpanan');
    }
}
