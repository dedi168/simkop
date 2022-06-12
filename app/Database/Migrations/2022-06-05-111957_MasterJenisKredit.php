<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MasterJenisKredit extends Migration
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
            'nama'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,
            ],
            'akun'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,
            ],
            'bunga'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,
            ],
            'denda'       => [
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
        $this->forge->createTable('tb_master_jkredit');
    }

    public function down()
    {
        $this->forge->dropTable('tb_master_jkredit');
    }
}
