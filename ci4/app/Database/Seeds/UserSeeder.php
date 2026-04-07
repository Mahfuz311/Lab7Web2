<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $model = model('UserModel');

        $data = [
            [
                'username'      => 'admin',
                'useremail'     => 'admin@email.com',
                'userpassword'  => password_hash('admin123', PASSWORD_DEFAULT),
                'role'          => 'admin'
            ],
            [
                'username'      => 'user_biasa',
                'useremail'     => 'user@email.com',
                'userpassword'  => password_hash('user123', PASSWORD_DEFAULT),
                'role'          => 'user'
            ]
        ];

        $this->db->table('user')->truncate();

        $model->insertBatch($data);
    }
}