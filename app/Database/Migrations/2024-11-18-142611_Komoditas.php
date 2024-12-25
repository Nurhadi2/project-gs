<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Komoditas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_komoditas' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'id_kategori' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'nama_komoditas' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addKey('id_komoditas', TRUE);
        $this->forge->createTable('tb_komoditas');
    }

    public function down()
    {
        $this->forge->dropTable('tb_komoditas');
    }
}
