<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'id' => 1,
            'name' => 'user_role',
            'display_name' => 'Kullanıcı Rolü',
            'description' => 'Normal kullanıcılar için yaratılmış roldür.',
            'created_at' => date('Y-m-d H:i:s',time())
        ]);

        DB::table('roles')->insert([
            'id' => 2,
            'name' => 'admin_role',
            'display_name' => 'Yönetici Rolü',
            'description' => 'Yöneticiler için yaratılmış roldür.',
            'created_at' => date('Y-m-d H:i:s',time())
        ]);
    }
}
