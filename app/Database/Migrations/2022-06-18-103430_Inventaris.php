<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Inventaris extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kode'       => [
                'type'       => 'int', 
                'constraint'     => 11,
            ],
            'nama'       => [
                'type'       => 'varchar', 
                'constraint'     => 255,
            ],
            'tgl_beli'       => [
                'type'       => 'DATE',  
            ],
            'umur' => [
                'type'       => 'INT', 
                'constraint'     => 100,
            ],
            'jumlah' => [
                'type'       => 'float',  
            ],
            'nilai' => [
                'type'       => 'float',  
            ],
            'tgl_habis' => [
                'type'       => 'DATE',  
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
        $this->forge->addKey('id', true);
        $this->forge->createTable('tb_Inventaris');
    }

    public function down()
    {
        $this->forge->dropTable('tb_Inventaris');
    }
}
