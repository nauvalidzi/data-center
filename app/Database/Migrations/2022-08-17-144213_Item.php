<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Item extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'BIGINT',
                'auto_increment' => true,
            ],
            'group_id' => [
                'type' => 'INT'
            ],
            'item_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'item_value' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'description' => [
                'type' => "TEXT",
                'null' => true
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
        $this->forge->createTable('items');
    }

    public function down()
    {
        $this->forge->dropTable('items');
    }
}
