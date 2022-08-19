<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Checklist extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'BIGINT',
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'BIGINT',
            ],
            'shift' => [
                'type' => 'enum',
                'constraint' => ['morning', 'afternoon', 'night'],
                'default' => 'morning'
            ],
            'item_id' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'values' => [
                'type' => 'CHAR',
                'constraint' => 50
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
        $this->forge->createTable('checklists');
    }

    public function down()
    {
        $this->forge->dropTable('checklists');
    }
}
