<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MasterIuran extends Migration
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
            'pokok'       => [
                'type'       => 'Decimal', 
                'constraint'     => 50.2,
            ],
            'wajib' => [
                'type'       => 'Decimal', 
                'constraint'     => 50.2,
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
        $this->forge->createTable('tb_master_iuran');
    }

    public function down()
    {
        $this->forge->dropTable('tb_master_iuran');
    }
}
