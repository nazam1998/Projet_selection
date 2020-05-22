<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            ['nom' => 'annonce-écriture'],
            ['nom' => 'annonce-lecture'],

            ['nom' => 'user-lecture-nom'],
            ['nom' => 'user-lecture-prenom'],
            ['nom' => 'user-lecture-genre'],
            ['nom' => 'user-lecture-statut'],
            ['nom' => 'user-lecture-commune'],
            ['nom' => 'user-lecture-adresse'],
            ['nom' => 'user-lecture-email'],
            ['nom' => 'user-lecture-telephone'],
            ['nom' => 'user-lecture-ordinateur'],
            ['nom' => 'user-lecture-objectif'],
            ['nom' => 'user-lecture-photo'],
            ['nom' => 'user-lecture-abo'],
            ['nom' => 'user-lecture-groupe'],
            ['nom' => 'user-lecture-role'],
            ['nom' => 'user-lecture-interet'],

            ['nom' => 'user-ecriture-nom'],
            ['nom' => 'user-ecriture-prenom'],
            ['nom' => 'user-ecriture-genre'],
            ['nom' => 'user-ecriture-statut'],
            ['nom' => 'user-ecriture-commune'],
            ['nom' => 'user-ecriture-adresse'],
            ['nom' => 'user-ecriture-email'],
            ['nom' => 'user-ecriture-telephone'],
            ['nom' => 'user-ecriture-ordinateur'],
            ['nom' => 'user-ecriture-objectif'],
            ['nom' => 'user-ecriture-photo'],
            ['nom' => 'user-ecriture-abo'],
            ['nom' => 'user-ecriture-groupe'],
            ['nom' => 'user-ecriture-role'],
            ['nom' => 'user-ecriture-interet'],

            ['nom' => 'contact'],
            ['nom' => 'groupe'],

            ['nom' => 'candidat-full'],

            ['nom' => 'candidat-lecture-nom'],
            ['nom' => 'candidat-lecture-prenom'],
            ['nom' => 'candidat-lecture-genre'],
            ['nom' => 'candidat-lecture-statut'],
            ['nom' => 'candidat-lecture-commune'],
            ['nom' => 'candidat-lecture-adresse'],
            ['nom' => 'candidat-lecture-email'],
            ['nom' => 'candidat-lecture-telephone'],
            ['nom' => 'candidat-lecture-ordinateur'],
            ['nom' => 'candidat-lecture-objectif'],
            ['nom' => 'candidat-lecture-photo'],
            ['nom' => 'candidat-lecture-abo'],
            ['nom' => 'candidat-lecture-groupe'],
            ['nom' => 'candidat-lecture-interet'],
        ]);
    }
}
