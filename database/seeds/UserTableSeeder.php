<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [
                'name' => 'Admin',
                'password' => '$2y$10$J/dkI68dIt0tx3fPIPjWxuc4n.NqHLfsQkieLQcf6NcOjXLrhWJei',
                'email_verified_at' => NULL,
                'role_id' => 1,
                'remember_token' => NULL,
            ]
        ];

        foreach ($items as $item) {
            \App\User::updateOrCreate(['email' => 'admin@admin.com'],$item);
        }
    }
}
