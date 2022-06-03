<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AkunSimp extends Migration
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
            'akun'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,
            ],
            'keterangan' => [
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
        $this->forge->createTable('tb_akunsimp');
    }

    public function down()
    {
        $this->forge->dropTable('tb_akunsimp');
    }
}
