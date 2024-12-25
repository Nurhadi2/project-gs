<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KetuaKelompokTani extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_ketua_kelompok_tani' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'nama_lengkap' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ],
            'handphone' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ],
            'nik' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true
            ],
            'id_user' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addKey('id_ketua_kelompok_tani', TRUE);
        $this->forge->createTable('tb_ketua_kelompok_tani');
    }

    public function down()
    {
        $this->forge->dropTable('tb_ketua_kelompok_tani');
    }
}
