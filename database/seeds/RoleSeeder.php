<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'nom' => 'Administrateur',
        ]);
        DB::table('roles')->insert([
            'nom' => 'Responsable',
        ]);
        DB::table('roles')->insert([
            'nom' => 'Lead Coach',
        ]);
        DB::table('roles')->insert([
            'nom' => 'Partenaire',
        ]);
        DB::table('roles')->insert([
            'nom' => 'Coach',
        ]);
        DB::table('roles')->insert([
            'nom' => 'Student',
        ]);
        DB::table('roles')->insert([
            'nom' => 'Candidat',
        ]);
    }
}
