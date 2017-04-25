<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'email' => 'admin@admin.com.tr',
            'username' => 'admin',
            'password' => bcrypt('admin')
        ]);

        DB::table('users')->insert([
            'id' => 2,
            'email' => 'user@user.com.tr',
            'username' => 'user',
            'password' => bcrypt('user')
        ]);

    }
}
