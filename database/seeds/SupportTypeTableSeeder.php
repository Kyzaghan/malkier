<?php

use Illuminate\Database\Seeder;

class SupportTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('support_types')->insert([
            'department_id' => 1,
            'name' => 'E-Posta'
        ]);

        DB::table('support_types')->insert([
            'department_id' => 1,
            'name' => 'Yerinde Destek'
        ]);

        DB::table('support_types')->insert([
            'department_id' => 1,
            'name' => 'Cep Telefonu'
        ]);

        DB::table('support_types')->insert([
            'department_id' => 1,
            'name' => 'Telefon'
        ]);
    }
}
