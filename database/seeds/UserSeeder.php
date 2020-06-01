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
                'evenement_id'=>App\Evenement::inRandomOrder()->first()->id,
                'role_id'=>1,
                'email'=>'admin@admin',
                'password'=>Hash::make('admin@admin')
            ],
            [
                'nom' => 'Bakiasi',
                'prenom' => 'Noel',
                'genre' => 'Homme',
                'statut' => 'Célibataire',
                'commune' => 'Anderlecht',
                'adresse' => 'Rue Eloy, 96',
                'telephone' => '+32 492 80 18 58',
                'ordinateur' => true,
                'objectif' => 'Tout réussir',
                'photo' => 'On va Tous Rater.png',
                'abo'=>true,
                'evenement_id'=>App\Evenement::inRandomOrder()->first()->id,
                'role_id'=>6,
                'email'=>'noel@noel',
                'password'=>Hash::make('noel@noel')
            ],
            [
                'nom' => 'Primo',
                'prenom' => 'Nicolas',
                'genre' => 'Homme',
                'statut' => 'Célibataire',
                'commune' => 'Anderlecht',
                'adresse' => 'Place de la minoterie',
                'telephone' => '+32 123 77 88 99',
                'ordinateur' => true,
                'objectif' => 'Tout réussir',
                'photo' => 'On va Tous Rater.png',
                'abo'=>true,
                'evenement_id'=>App\Evenement::inRandomOrder()->first()->id,
                'role_id'=>2,
                'email'=>'nico@nico.com',
                'password'=>Hash::make('nico@nico.com')
            ],
            [
                'nom' => 'S.Y.',
                'prenom' => 'Kadir',
                'genre' => 'Homme',
                'statut' => 'Marié(e)',
                'commune' => 'Molenbeek',
                'adresse' => 'Place de la minoterie',
                'telephone' => '+32 123 77 88 99',
                'ordinateur' => true,
                'objectif' => 'Tout réussir',
                'photo' => 'On va Tous Rater.png',
                'abo'=>true,
                'evenement_id'=>App\Evenement::inRandomOrder()->first()->id,
                'role_id'=>2,
                'email'=>'kadir@kadir',
                'password'=>Hash::make('kadir@kadir.com')
            ],
            [
                'nom' => 'Fz',
                'prenom' => 'Elias',
                'genre' => 'Homme',
                'statut' => 'Célibataire',
                'commune' => 'Molenbeek',
                'adresse' => 'Place de la minoterie',
                'telephone' => '+32 123 77 88 99',
                'ordinateur' => true,
                'objectif' => 'Tout réussir',
                'photo' => 'On va Tous Rater.png',
                'abo'=>true,
                'evenement_id'=>App\Evenement::inRandomOrder()->first()->id,
                'role_id'=>5,
                'email'=>'eli@eli.com',
                'password'=>Hash::make('eli@eli.com')
            ],
            [
                'nom' => 'Max',
                'prenom' => 'Maxime',
                'genre' => 'Homme',
                'statut' => 'Célibataire',
                'commune' => 'Molenbeek',
                'adresse' => 'Place de la minoterie',
                'telephone' => '+32 123 77 88 99',
                'ordinateur' => true,
                'objectif' => 'Tout réussir',
                'photo' => 'On va Tous Rater.png',
                'abo'=>true,
                'evenement_id'=>App\Evenement::inRandomOrder()->first()->id,
                'role_id'=>5,
                'email'=>'max@max.com',
                'password'=>Hash::make('max@max.com')
            ],
            [
                'nom' => 'Azoud',
                'prenom' => 'Ismaël',
                'genre' => 'Homme',
                'statut' => 'Célibataire',
                'commune' => 'Molenbeek',
                'adresse' => 'Place de la minoterie',
                'telephone' => '+32 123 77 88 99',
                'ordinateur' => true,
                'objectif' => 'Tout réussir',
                'photo' => 'On va Tous Rater.png',
                'abo'=>true,
                'evenement_id'=>App\Evenement::inRandomOrder()->first()->id,
                'role_id'=>5,
                'email'=>'isma@isma.com',
                'password'=>Hash::make('isma@isma.com')
            ],
            [
                'nom' => 'Zak',
                'prenom' => 'Zakaria',
                'genre' => 'Homme',
                'statut' => 'Célibataire',
                'commune' => 'Molenbeek',
                'adresse' => 'Place de la minoterie',
                'telephone' => '+32 123 77 88 99',
                'ordinateur' => true,
                'objectif' => 'Tout réussir',
                'photo' => 'On va Tous Rater.png',
                'abo'=>true,
                'evenement_id'=>App\Evenement::inRandomOrder()->first()->id,
                'role_id'=>2,
                'email'=>'zak@zak.com',
                'password'=>Hash::make('zak@zak.com')
            ],
            [
                'nom' => 'Candidat',
                'prenom' => 'Bg',
                'genre' => 'Homme',
                'statut' => 'Célibataire',
                'commune' => 'Molenbeek',
                'adresse' => 'Place de la minoterie',
                'telephone' => '+32 123 77 88 99',
                'ordinateur' => true,
                'objectif' => 'Tout réussir',
                'photo' => 'On va Tous Rater.png',
                'abo'=>true,
                'evenement_id'=>App\Evenement::inRandomOrder()->first()->id,
                'role_id'=>7,
                'email'=>'candidat@candidat',
                'password'=>Hash::make('candidat@candidat')
            ]
        ]);
    }
}
