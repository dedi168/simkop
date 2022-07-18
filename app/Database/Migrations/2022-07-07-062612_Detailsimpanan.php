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
                'type'       => 'INT', 
                'constraint'     => 11,
            ],
            'tgl' => [
                'type'       => 'VARCHAR', 
                'constraint'     => 100,
            ],
            'jenis_simpanan' => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,
            ],
            'jumlah' => [
                'type'       => 'float',
            ],
            'opr' => [
                'type'       => 'VARCHAR', 
                'constraint'     => 100,
            ],
            'kode' => [
                'type'       => 'INT', 
                'constraint'     => 100,
            ],
            'debet' => [
                'type'       => 'float', 
            ],
            'kredit' => [
                'type'       => 'float',  
            ],
            'jumlah_simpanan' => [
                'type'       => 'float',  
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
