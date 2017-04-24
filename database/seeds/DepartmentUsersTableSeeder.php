<?php

use Illuminate\Database\Seeder;

class DepartmentUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('department_users')->insert([
            'user_id' => 1,
            'department_id' => 1
        ]);
    }
}
