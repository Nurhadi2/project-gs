<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KelompokTani extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kelompok_tani' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'nama_kelompok_tani' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'nama_ketua' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'id_kecamatan' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addKey('id_kelompok_tani', TRUE);
        $this->forge->createTable('tb_kelompok_tani');
    }

    public function down()
    {
        $this->forge->dropTable('tb_kelompok_tani');
    }
}
