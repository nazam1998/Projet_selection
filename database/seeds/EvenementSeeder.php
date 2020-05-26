<?php

use App\Formulaire;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EvenementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('evenements')->insert([
            'date' => Carbon::now(),
            'etat' => 'En Cours',

            'formulaire_id' => Formulaire::inRandomOrder()->first()->id
        ]);
        DB::table('evenements')->insert([
            'date' => Carbon::now(),
            'etat' => 'Terminé',

            'formulaire_id' => Formulaire::inRandomOrder()->first()->id
        ]);
        DB::table('evenements')->insert([
            'date' => Carbon::now()->addDay(),
            'etat' => 'Futur',

            'formulaire_id' => Formulaire::inRandomOrder()->first()->id
        ]);
        DB::table('evenements')->insert([
            'date' => Carbon::now(),
            'etat' => 'En Cours',

            'formulaire_id' => Formulaire::inRandomOrder()->first()->id
        ]);
    }
}