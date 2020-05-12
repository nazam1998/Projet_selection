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

        $interets = App\Interet::all();
        App\Formulaire::all()->each(function ($formulaire) use ($interets) {
            $formulaire->interets()->attach(
                $interets->random(rand(1, 4))->pluck('id')->toArray()
            );
        });
    }
}
