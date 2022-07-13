<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Detailsimpanan extends Migration
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
            'no_tabungan'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,
            ],
            'tgl' => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,
            ],
            'jenis_simpanan' => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,
            ],
            'jumlah' => [
                'type'       => 'INT', 
                'constraint'     => 100,
            ],
            'opr' => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,
            ],
            'kode' => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,
            ],
            'debet' => [
                'type'       => 'float', 
            ],
            'kredit' => [
                'type'       => 'float',  
            ],
            'jumlah_simpanan' => [
                'type'       => 'float', 
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
        $this->forge->createTable('tb_detailSimpanan');
    }

    public function down()
    {
        $this->forge->dropTable('tb_detailSimpanan');
    }
}
