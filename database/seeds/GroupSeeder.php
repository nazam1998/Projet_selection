<?php

use App\User;
use App\Group;
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
            ],
            [
                'nom' => 'Coding Test 11',
                
            ],
            [
                'nom' => 'Marketing Labs 20',
                
            ],

        ]);
        DB::table('group_user')->insert([
            [
                'user_id' => User::inRandomOrder()->where('role_id', '>', 3)->whereDoesntHave('group')->first()->id,
                'group_id' => Group::inRandomOrder()->first()->id
            ],
            [
                'user_id' => User::inRandomOrder()->where('role_id', '>', 3)->whereDoesntHave('group')->first()->id,
                'group_id' => Group::inRandomOrder()->first()->id
            ],
            [
                'user_id' => User::inRandomOrder()->where('role_id', '>', 3)->whereDoesntHave('group')->first()->id,
                'group_id' => Group::inRandomOrder()->first()->id
            ],
            [
                'user_id' => User::inRandomOrder()->where('role_id', '>', 3)->whereDoesntHave('group')->first()->id,
                'group_id' => Group::inRandomOrder()->first()->id
            ],

        ]);
    }
}
