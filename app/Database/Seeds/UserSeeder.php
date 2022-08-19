<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nip' => '12345',
                'username' => 'admin',
                'name' => 'Administrator',
                'email'    => 'admin@demo.com',
                'password' => password_hash('12345', PASSWORD_BCRYPT),
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'nip' => '54321',
                'name' => 'Guest',
                'username' => 'guest',
                'email'    => 'guest@demo.com',
                'password' => password_hash('12345', PASSWORD_BCRYPT),
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
