<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MasterJenisSimpanan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true, 
            ],
            'nama'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,
            ],
            'akun_id' => [
                'type'       => 'INT', 
                'constraint'     => 11,
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
        $this->forge->createTable('tb_master_jsimp');
    }

    public function down()
    {
        $this->forge->dropTable('tb_master_jsimp');
    }
}
