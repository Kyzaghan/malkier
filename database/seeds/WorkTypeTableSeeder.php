<?php

use Illuminate\Database\Seeder;

class WorkTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('work_types')->insert([
            'department_id' => 1,
            'name' => 'Devam Ediyor'
        ]);

        DB::table('support_types')->insert([
            'department_id' => 1,
            'name' => 'Tamamlandı'
        ]);
    }
}
