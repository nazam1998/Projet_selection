<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AnnonceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('annonces')->insert([
            'texte'=>'Hello World',
            'date'=>Carbon::now(),
            'afficher'=>true
        ]);
    }
}
