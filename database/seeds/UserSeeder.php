<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
                'nom' => 'Muhammad',
                'prenom' => 'Nazam',
                'genre' => 'Homme',
                'statut' => 'Célibataire',
                'commune' => 'Anderlecht',
                'adresse' => 'Rue Eloy, 96',
                'telephone' => '+32 492 80 18 58',
                'ordinateur' => true,
                'objectif' => 'Tout réussir',
                'photo' => 'On va Tous Rater.png',
                'abo'=>true,
                'formulaire_id'=>App\Formulaire::inRandomOrder()->first()->id,
                'role_id'=>1,
                'email'=>'nazam98-be@email.com',
                'password'=>Hash::make('nazam98-be@email.com')
            ]
        ]);
    }
}
