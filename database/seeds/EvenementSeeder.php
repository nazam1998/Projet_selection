<?php

use App\Formulaire;
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
            'description'=>'Venez servir de Coding Test dans la Coding X',
            'etat'=>'En Cours',
            'Titre'=>'Séléction Coding X',
            'formulaire_id'=>Formulaire::inRandomOrder()->first()->id
        ]);
        DB::table('evenements')->insert([
            'description'=>'Venez servir de Coding Test dans la Coding X',
            'etat'=>'Terminé',
            'Titre'=>'Séléction Coding X',
            'formulaire_id'=>Formulaire::inRandomOrder()->first()->id
        ]);
    }
}
