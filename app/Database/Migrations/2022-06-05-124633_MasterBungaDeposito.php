<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MasterBungaDeposito extends Migration
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
            'jangka'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,
            ],
            'bunga'       => [
                'type'       => 'FLOAT',  
            ],
            'keterangan'       => [
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
        $this->forge->addKey('id', true);
        $this->forge->createTable('tb_master_bunga_deposito');
    }

    public function down()
    {
        $this->forge->dropTable('tb_master_bunga_deposito');
    }
}
