<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Deposito extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'no_deposito'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true, 
            ],
            'nama'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,
            ],
            
            'alamat'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,
            ],
            'tgl'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,
            ],
            'telp'       => [
                'type'       => 'INT', 
                'constraint'     => 15,
            ], 
            'jangka_waktu'       => [
                'type'       => 'INT', 
                'constraint'     => 15,
            ],
            'bunga'       => [
                'type'       => 'FLOAT',
                'constraint'     => 8.2,  
            ],
            'jumlah'       => [
                'type'       => 'FLOAT',  
            ],
            'no_anggota'       => [
                'type'       => 'INT', 
                'constraint'     => 11,
            ],
            'jatuh_tempo'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,
            ], 
            'status'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,
            ],
            'operator'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,
            ],
            
            'no_tabungan'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,
            ],
            'sistem'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 100,
            ],
            'perpanjangan'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 100,
            ],
            'kali'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 100,
            ],
            'jenis'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,
            ],
            'ahli_waris'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,
            ],
            'mulai'       => [
                'type'       => 'DATE',  
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
        $this->forge->addKey('no_deposito', true);
        $this->forge->createTable('tb_deposito');
    }

    public function down()
    {
        $this->forge->dropTable('tb_deposito');
    }
}
