<?php

use App\Description;
use App\Evenement;
use App\Titre;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EtapeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $evenement = Evenement::first();
        DB::table('etapes')->insert([
            'titre' => Titre::inRandomOrder()->first()->titre,
            'description' => Description::inRandomOrder()->first()->description,
            'date' => $evenement->date,
            'evenement_id' => $evenement->id,
        ]);

        $evenement = Evenement::inRandomOrder()->first();
        DB::table('etapes')->insert([
            'titre' => Titre::inRandomOrder()->first()->titre,
            'description' => Description::inRandomOrder()->first()->description,
            'date' => $evenement->date,
            'evenement_id' => $evenement->id,
        ]);

        $evenement = Evenement::inRandomOrder()->first();
        DB::table('etapes')->insert([
            'titre' => Titre::inRandomOrder()->first()->titre,
            'description' => Description::inRandomOrder()->first()->description,
            'date' => $evenement->date,
            'evenement_id' => $evenement->id,
        ]);

        $evenement = Evenement::inRandomOrder()->first();
        DB::table('etapes')->insert([
            'titre' => Titre::inRandomOrder()->first()->titre,
            'description' => Description::inRandomOrder()->first()->description,
            'date' => $evenement->date,
            'evenement_id' => $evenement->id,
        ]);
        $evenement = Evenement::inRandomOrder()->first();
        DB::table('etapes')->insert([
            'titre' => Titre::inRandomOrder()->first()->titre,
            'description' => Description::inRandomOrder()->first()->description,
            'date' => $evenement->date,
            'evenement_id' => $evenement->id,
        ]);
        $evenement = Evenement::inRandomOrder()->first();
        DB::table('etapes')->insert([
            'titre' => Titre::inRandomOrder()->first()->titre,
            'description' => Description::inRandomOrder()->first()->description,
            'date' => $evenement->date,
            'evenement_id' => $evenement->id,
        ]);
    }
}
