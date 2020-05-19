<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(InteretSeeder::class);
        $this->call(MatiereSeeder::class);
        $this->call(FormulaireSeeder::class);
        $this->call(EvenementSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(GroupSeeder::class);
        $this->call(AnnonceSeeder::class);
        $this->call(TitreSeeder::class);
        $this->call(DescriptionSeeder::class);
        $this->call(EtapeSeeder::class);
        $this->call(PhraseSeeder::class);
    }
}
