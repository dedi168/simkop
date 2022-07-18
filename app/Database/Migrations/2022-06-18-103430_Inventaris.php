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
                'type'       => 'VARCHAR', 
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
                'type'       => 'INT', 
                'constraint'     => 100,
            ],
            'nilai' => [
                'type'       => 'INT', 
                'constraint'     => 100,
            ],
            'tgl_habis' => [
                'type'       => 'INT', 
                'constraint'     => 100,
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
