<?php

use Illuminate\Database\Seeder;

class InteretSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('interets')->insert([
            'nom' => 'Coding School',
        ]);
        DB::table('interets')->insert([
            'nom' => 'Marketing Lab',
        ]);
        DB::table('interets')->insert([
            'nom' => 'Formations TIC',
        ]);
        DB::table('interets')->insert([
            'nom' => 'Espace de coworking',
        ]);
    }
}
