<?php

use Illuminate\Database\Seeder;

class MatiereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('matieres')->insert([
            'nom' => 'HTML',
            'image' => 'html.png',
        ]);
        DB::table('matieres')->insert([
            'nom' => 'CSS',
            'image' => 'css.jpg',
        ]);
        DB::table('matieres')->insert([
            'nom' => 'Bootstrap',
            'image' => 'bootstrap.png',
        ]);
        DB::table('matieres')->insert([
            'nom' => 'Javascript',
            'image' => 'javascript.jpg',
        ]);
        DB::table('matieres')->insert([
            'nom' => 'React',
            'image' => 'react.png',
        ]);
        DB::table('matieres')->insert([
            'nom' => 'Laravel',
            'image' => 'laravel.png',
        ]);
    }
}
