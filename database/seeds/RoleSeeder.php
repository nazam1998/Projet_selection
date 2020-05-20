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

        App\Role::find(1)->permissions()->attach(App\Permission::all()->pluck('id'));
        App\Role::find(1)->roles()->attach(App\Role::all()->pluck('id'), ['ecriture' => true]);

        App\Role::find(2)->permissions()->attach(App\Permission::all()->pluck('id'));
        App\Role::find(2)->roles()->attach(App\Role::where('id', '!=', 1)->pluck('id'), ['ecriture' => true]);

        App\Role::find(3)->permissions()->attach(App\Permission::all()->pluck('id'));
        App\Role::find(3)->roles()->attach(App\Role::where('id', '>=', 3)->pluck('id'), ['ecriture' => true]);
    }
}
