<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Log extends Migration
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
            'description' => [
                'type' => 'TEXT',
            ],
            'created_at' => [
                'type' => 'TIMESTAMP'
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('logs');
    }

    public function down()
    {
        $this->forge->dropTable('logs');
    }
}
