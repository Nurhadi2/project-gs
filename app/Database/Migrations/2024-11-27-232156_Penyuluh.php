<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penyuluh extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_penyuluh' => [
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
            'id_kecamatan' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addKey('id_penyuluh', TRUE);
        $this->forge->createTable('tb_penyuluh');
    }

    public function down()
    {
        $this->forge->dropTable('tb_penyuluh');
    }
}
