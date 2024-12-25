<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class JenisKomoditas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_jenis_komoditas' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name_jenis_komoditas' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addKey('id_jenis_komoditas', true);
        $this->forge->createTable('tb_jenis_komoditas');
    }

    public function down()
    {
        $this->forge->dropTable('tb_jenis_komoditas');
    }
}
