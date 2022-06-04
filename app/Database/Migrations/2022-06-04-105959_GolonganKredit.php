<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class GolonganKredit extends Migration
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
            'bawah' => [
                'type'       => 'INT', 
                'constraint'     => 100,
            ],
            'atas' => [
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
        $this->forge->createTable('tb_golonganKredit');
    }

    public function down()
    {
        $this->forge->dropTable('tb_golonganKredit');
    }
}
