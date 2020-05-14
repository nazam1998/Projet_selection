<?php

use Illuminate\Database\Seeder;

class TitreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('titres')->insert([
            'titre' => 'Coding School',
        ]);
        DB::table('titres')->insert([
            'titre' => 'Marketing Lab',
        ]);
        DB::table('titres')->insert([
            'titre' => 'Formations TIC',
        ]);
        DB::table('titres')->insert([
            'titre' => 'Espace de coworking',
        ]);
    }
}
