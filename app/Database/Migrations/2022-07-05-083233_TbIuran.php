<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbIuran extends Migration
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
            'no_anggota'       => [
                'type'       => 'INT', 
                'constraint'     => 11,
            ],
            'tgl_bayar'       => [
                'type'       => 'DATE', 
            ],
            'jenis_simpanan'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,
            ],
            'jumlah_bln'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,
            ],
            'tgl_mulai'       => [
                'type'       => 'int', 
                'constraint'     => 11,
            ],
            'bln_m'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,
            ],
            'thn_m'       => [
                'type'       => 'int', 
                'constraint'     => 20,
            ],
            'jumlah'       => [
                'type'       => 'float',
            ],
            'pokok'       => [
                'type'       => 'float',
            ],
            'wajib'       => [
                'type'       => 'float', 
            ],
            'opr'       => [
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
        $this->forge->createTable('tb_iuran');
    }

    public function down()
    {
        $this->forge->dropTable('tb_iuran');
    }
}
