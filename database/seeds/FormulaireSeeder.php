<?php

use Illuminate\Database\Seeder;

class FormulaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('formulaires')->insert([
            'titre' => 'Formation longue',
        ]);
        DB::table('formulaires')->insert([
            'titre' => 'Formation courte',
        ]);

        App\Formulaire::all()->each(function ($formulaire) use ($interet) { 
            $formulaire->interets()->attach(
                $interet->random(rand(1, 4))->pluck('id')->toArray()
            );
    });
}
}
