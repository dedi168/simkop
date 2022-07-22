<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PinjamanDetail extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'no_pinjaman'        => [ 'type'           => 'INT','constraint'     => 11,'unsigned'       => true , ],
            'nama1'              => ['type'       => 'VARCHAR', 'constraint'     => 255,],
            'alamat'       => ['type'       => 'VARCHAR', 'constraint'     => 255,             ],
            'telp'       => ['type'       => 'VARCHAR', 'constraint'     => 255,            ], 
            'pekerjaan'       => ['type'       => 'VARCHAR', 'constraint'     => 255,            ], 
            'no_anggota'       => ['type'       => 'INT', 'constraint'     => 11,            ],           
            'tanggal'       => ['type'       => 'DATE',              ], 
            'opr'       => ['type'       => 'VARCHAR', 'constraint'     => 255,            ], 
            'jml_pinjaman'       => ['type'       => 'INT', 'constraint'     => 100,            ], 
            'sistem_bunga'       => ['type'       => 'VARCHAR', 'constraint'     => 255,            ], 
            'jangka_waktu'       => ['type'       => 'INT', 'constraint'     => 100,            ],
            'jangka_harian'       => ['type'       => 'INT', 'constraint'     => 100,           ],  
            'bunga'       => ['type'       => 'float',            ], 
            'administrasi'       => ['type'       => 'float',              ], 
            'gaji'       => ['type'       => 'float',             ],  
            'keperluan'       => ['type'       => 'VARCHAR', 'constraint'     => 255,            ],  
            'nsp'       => ['type'       => 'VARCHAR', 'constraint'     => 255,            ],  
            'jenis'       => ['type'       => 'VARCHAR', 'constraint'     => 255,            ],  
            'status'       => ['type'       => 'VARCHAR', 'constraint'     => 255,            ],  
            'ref'       => ['type'       => 'VARCHAR', 'constraint'     => 255,            ],  
            'meterai'       => ['type'       => 'VARCHAR', 'constraint'     => 255,           ],  
            'provisi'       => ['type'       => 'float',             ], 
            'premi'       => ['type'       => 'float',              ],   
            'noid'       => ['type'       => 'VARCHAR', 'constraint'     => 255,            ], 
            'nama2'       => ['type'       => 'VARCHAR', 'constraint'     => 255,            ],
            'alamat2'       => ['type'       => 'VARCHAR', 'constraint'     => 255,              ], 
            'pekerjaan2'       => ['type'       => 'VARCHAR', 'constraint'     => 255,            ], 
            'gaji2'       => ['type'       => 'float',             ],   
            'hub'       => ['type'       => 'VARCHAR', 'constraint'     => 255,           ], 
            'prs'       => ['type'       => 'VARCHAR', 'constraint'     => 255,            ],
            'prs_alamat'       => ['type'       => 'VARCHAR', 'constraint'     => 255,            ], 
            'sumber_bayar'       => ['type'       => 'VARCHAR', 'constraint'     => 255,           ], 
            'bayar'       => ['type'       => 'FLOAT',             ], 
            'tmp'       => ['type'       => 'VARCHAR', 'constraint'     => 255,            ], 
            'tgl_lahir'       => ['type'       => 'DATE', ], 
            'jaminan'       => ['type'       => 'VARCHAR', 'constraint'     => 255,], 
            'gol'        => ['type'       => 'VARCHAR', 'constraint'     => 255,],
            'created_at' => [	'type'	=> 'DATETIME','null'	=> true,],	
            'updated_at' => [	'type'	=> 'DATETIME','null'	=> true,]	
        ]);
        $this->forge->addKey('no_pinjaman', true);
        $this->forge->createTable('tb_buka_pinjaman');
        /*
         * tb_detail_pinjaman
         */
        $this->forge->addField([
            'id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'no_pinjaman'      => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0], 
            'tanggal'          => ['type' => 'date'],
            'bayar'            => ['type' => 'float'],  
            'pokok'            => ['type' => 'float'],  
            'bunga'            => ['type' => 'float'],  
            'denda'            => ['type' => 'float'],  
            'opr'              => ['type' => 'varchar', 'constraint' => 100],  
            'bayarke'          => ['type' => 'int', 'constraint' => 100],  
            'sisa'             => ['type' => 'float'],  
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true], 
        ]);

        $this->forge->addKey('id', true); 
        $this->forge->addForeignKey('no_pinjaman', 'tb_buka_pinjaman', 'no_pinjaman', 'CASCADE');

        $this->forge->createTable('tb_detail_pinjaman', true);

        /*
         * ttemp
         */
        $this->forge->addField([
            'id'=>['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'no_pinjaman'=>['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
            'tgl'=>['type' => 'date'],
            'jumlah'=>['type' => 'float'],
            'bunga'=>['type' => 'float'],
            'pokok'=>['type' => 'float'],
            'saldo'=>['type' => 'float'],
            'nomor'=>['type' => 'int', 'constraint' => 100],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true], 
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('no_pinjaman', 'tb_buka_pinjaman', 'no_pinjaman', 'CASCADE'); 
        $this->forge->createTable('TTemp', true);
        /*
         * jaminan
         */
        $this->forge->addField([
            'id'=>['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'no_pinjaman'=>['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
            'tgl'=>['type' => 'date'],
            'nomor'=>['type' => 'int', 'constraint' => 100],
            'nama_dok'=>['type' => 'varchar', 'constraint' => 100],
            'an'=>['type' => 'varchar', 'constraint' => 100], 
            'nomor'=>['type' => 'int', 'constraint' => 100],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true], 
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('no_pinjaman', 'tb_buka_pinjaman', 'no_pinjaman', 'CASCADE'); 
        $this->forge->createTable('jaminan', true);
        }

    public function down()
    {
        $this->forge->dropTable('tb_detail_pinjaman', true);
        $this->forge->dropTable('TTemp', true);
        $this->forge->dropTable('jaminan', true);
    }
}
