<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BungaSimpanan extends Migration
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
            'bunga'       => [
                'type'       => 'Float', 
            ],
            'batas' => [
                'type' => 'FLOAT',
                'null' => true,
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
        $this->forge->createTable('tb_bunga_simpanan');
    }

    public function down()
    {
        $this->forge->dropTable('tb_bunga_simpanan');
    }
}
