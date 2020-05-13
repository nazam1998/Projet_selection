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
                'nom'=>'Admin',
                'prenom'=>'Le petit',
                'email'=>'admin@admin.com',
                'password'=> Hash::make('123456789'),
                'genre'=>'Homme',
                'statut'=>'Célibataire',
                'commune'=>'Anderlecht',
                'adresse'=>'Rue Eloy, 96',
                'telephone'=>'+32 492 80 18 58',
                'ordinateur'=>true,
                'objectif'=>'Tout réussir',
                'photo'=>'On va Tous Rater.png',
                'role_id'=> 1,
                'abo'=> true,
                'formulaire_id'=>App\Formulaire::inRandomOrder()->first()->id,
            ]
        ]);
    }
}
