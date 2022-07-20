<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailDeposit extends Migration
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
            'no_deposito'       => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'tgl' => [
                'type'       => 'DATE',  
            ],
            'jumlah' => [
                'type'       => 'FLOAT',  
            ],
            'tgl_ambil' => [
                'type'       => 'DATE',  
            ],
            'jenis' => [
                'type'       => 'VARCHAR', 
                'constraint'     => '100',
            ],
            'opr' => [
                'type'       => 'VARCHAR', 
                'constraint'     => '100',
            ],
            'status' => [
                'type'       => 'INT', 
                'constraint'     => '100',
            ], 
            'saldo' => [
                'type'       => 'FLOAT',  
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
        $this->forge->createTable('tb_detail_deposito');
    }

    public function down()
    {
        $this->forge->dropTable('tb_detail_deposito');
    }
}
