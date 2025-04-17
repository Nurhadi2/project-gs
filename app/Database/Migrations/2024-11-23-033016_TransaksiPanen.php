<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TransaksiPanen extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_transaksi_panen' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'bulan' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true
            ],
            'tahun' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true
            ],
            'id_lahan' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'total_area' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true
            ],
            'produksi' => [
                'type' => 'DOUBLE',
                'null' => true
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addKey('id_transaksi_panen', TRUE);
        $this->forge->createTable('tb_transaksi_panen');
    }

    public function down()
    {
        $this->forge->dropTable('tb_transaksi_panen');
    }
}
