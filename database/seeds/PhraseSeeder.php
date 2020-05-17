<?php

use Illuminate\Database\Seeder;

class PhraseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('phrases')->insert([
            'texte'=>"Désolé, il n'y a pas d'évènement actuellement",
        ]);
    }
}
