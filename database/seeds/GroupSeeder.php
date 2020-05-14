<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            [
                'nom' => 'Coding Test X',
                'responsable_id' => User::inRandomOrder()->where('role_id', 2)->first()->id,
                'coach_id' => User::inRandomOrder()->where('role_id', 5)->first()->id
            ],
            [
                'nom' => 'Coding Test 11',
                'responsable_id' => User::inRandomOrder()->where('role_id', 2)->first()->id,
                'coach_id' => User::inRandomOrder()->where('role_id', 5)->first()->id
            ],
            [
                'nom' => 'Marketing Labs 20',
                'responsable_id' => User::inRandomOrder()->where('role_id', 2)->first()->id,
                'coach_id' => User::inRandomOrder()->where('role_id', 5)->first()->id
            ],

        ]);
    }
}
