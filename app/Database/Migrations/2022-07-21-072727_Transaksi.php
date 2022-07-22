<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transaksi extends Migration
{
    public function up()
    {
         
        $this->forge->addField([
            'nomor'=>['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true], 
            'nama'=>['type' => 'varchar', 'constraint' => 100], 
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true], 
        ]);
        $this->forge->addKey('nomor', true); 
        $this->forge->createTable('rekening_lv0', true);
          /*
         * rekening_lv1
         */
        $this->forge->addField([
            'kode'=>['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'level0'=>['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0], 
            'nama'=>['type' => 'varchar', 'constraint' => 100],
            'gneraca'=>['type' => 'varchar', 'constraint' => 100], 
            'status'=>['type' => 'varchar', 'constraint' => 100],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true], 
        ]);
        $this->forge->addKey('kode', true);
        $this->forge->addForeignKey('level0', 'rekening_lv0', 'nomor', 'CASCADE'); 
        $this->forge->createTable('rekening_lv1', true);
         /*
         * master_transaksi
         */
        $this->forge->addField([
            'no_jurnal'=> ['type' => 'int', 'constraint' => 11, 'unsigned' => true ],
            'ref'=> ['type'=> 'varchar', 'constraint'=> 100,],
            'tanggal'=> ['type'=> 'varchar', 'constraint'=> 100,],
            'catatan'=> ['type' => 'varchar', 'constraint' => 100], 
            'opr'=> ['type' => 'varchar', 'constraint' => 100], 
            'jenis'=> ['type' => 'varchar', 'constraint' => 100], 
            'bagian'=> ['type' => 'varchar', 'constraint' => 100],  
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true], 
        ]);

        $this->forge->addKey('no_jurnal', true);  

        $this->forge->createTable('master_transaksi', true);

        /*
         * rekening
         */
        $this->forge->addField([
            'kode_akun'=>['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'kode'=>['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
            'nama_akun'=>['type'=> 'varchar', 'constraint'=> 100,],
            'status'=>['type'=> 'varchar', 'constraint'=> 100,],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true], 
        ]);
        $this->forge->addKey('kode_akun', true);
        $this->forge->addForeignKey('kode', 'rekening_lv1', 'kode', 'CASCADE'); 
        $this->forge->createTable('rekening', true);

        /*
         * transaksi
         */
        $this->forge->addField([
            'nomor'=> [ 'type' => 'INT','constraint'=> 11,'unsigned'=> true , 'auto_increment' => true ],
            'no_jurnal'=> ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
            'kode_akun'=> ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
            'debet'=> ['type'=> 'FLOAT',], 
            'kredit'=> ['type'=> 'FLOAT',],  
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true], 
        ]);
        $this->forge->addKey('nomor', true); 
        $this->forge->addForeignKey('no_jurnal', 'master_transaksi', 'no_jurnal', 'CASCADE'); 
        $this->forge->addForeignKey('kode_akun', 'rekening', 'kode_akun', 'CASCADE'); 
        $this->forge->createTable('transaksi'); 
        }

    public function down()
    {
        $this->forge->dropTable('transaksi', true); 
        $this->forge->dropTable('master_transaksi', true); 
        $this->forge->dropTable('rekening', true); 
        $this->forge->dropTable('rekeninglv1', true); 
        $this->forge->dropTable('rekeninglv0', true); 
    } 
}
