<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'nom'=>'Muhammad',
                'prenom'=>'Nazam',
                'genre'=>'Homme',
                'statut'=>'Célibataire',
                'commune'=>'Anderlecht',
                'adresse'=>'Rue Eloy, 96',
                'telephone'=>'+32 492 80 18 58',
                'ordinateur'=>true,
                'objectif'=>'Tout réussir',
                'photo'=>'On va Tous Rater.png',
                ''
            ]
        ]);
    }
}
