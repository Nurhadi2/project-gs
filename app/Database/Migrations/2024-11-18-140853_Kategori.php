<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kategori extends Migration
{
    public function up()
    {
        $this->forge->addField(array(
            'id_kategori' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'kategori_title' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'kategori_description' => array(
                'type' => 'TEXT',
                'null' => TRUE,
            ),
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ));
        $this->forge->addKey('id_kategori', TRUE);
        $this->forge->createTable('tb_kategori');
    }

    public function down()
    {
        $this->forge->dropTable('tb_kategori');
    }
}
