<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TambahAnggota extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'no_anggota'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true, 
            ],
            'nama'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255,
            ],
            'tempat'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255, 
            ],
            'tanggal_lahir'       => [
                'type'       => 'DATE',  
            ], 
            'jk'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255, 
            ],
            'status'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255, 
            ],
            'alamat'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255, 
            ],
            'telp'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255, 
            ],
            'pekerjaan'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255, 
            ],
            'tanggal'       => [
                'type'       => 'DATE',  
            ],
            'wilayah'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255, 
            ],
            'desa'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255, 
            ],
            'desa_adat'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255, 
            ],
            'kecamatan'       => [
                'type'       => 'VARCHAR', 
                'constraint'     => 255, 
            ],
            'no_identitas'       => [
                'type'       => 'INT', 
                'constraint'     => 50, 
            ],
            'id_user'       => [
                'type'       => 'INT', 
                'constraint'     => 11, 
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
        $this->forge->addKey('no_anggota', true);
        $this->forge->createTable('tb_anggota');
    }

    public function down()
    {
        $this->forge->dropTable('tb_anggota');
    }
}
