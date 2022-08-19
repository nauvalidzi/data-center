<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'BIGINT',
                'auto_increment' => true,
            ],
            'nip' => [
                'type' => 'CHAR',
                'constraint' => 50,
                'unique' => true
            ],
            'username' => [
                'type' => 'CHAR',
                'constraint' => 15,
                'unique' => true
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'unique' => true
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'phone' => [
                'type' => 'CHAR',
                'constraint' => 17,
                'unique' => true,
                'null' => true
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['active', 'inactive'],
                'default' => 'inactive'
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
