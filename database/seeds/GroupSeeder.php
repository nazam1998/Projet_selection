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

        $responsable1 = User::inRandomOrder()->where('role_id', 2)->whereDoesntHave('group')->first();
        $coach1 = User::inRandomOrder()->where('role_id', 5)->whereDoesntHave('group')->first();
        $group1 = Group::inRandomOrder()->first()->id;

        
        DB::table('group_user')->insert(
            [
                [
                    'user_id' => $responsable1->id,
                    'group_id' => $group1,
                    'role_id' => $responsable1->role_id,
                ],
                [
                    'user_id' => $coach1->id,
                    'group_id' => $group1,
                    'role_id' => $coach1->role_id,
                ],
            ]
        );

        $responsable2 = User::inRandomOrder()->where('role_id', 2)->whereDoesntHave('group')->first();
        $coach2 = User::inRandomOrder()->where('role_id', 5)->whereDoesntHave('group')->first();
        $group2 = Group::inRandomOrder()->whereDoesntHave('users')->first()->id;

        DB::table('group_user')->insert(
            [
                [
                    'user_id' => $responsable2->id,
                    'group_id' => $group2,
                    'role_id' => $responsable2->role_id,
                ],
                [
                    'user_id' => $coach2->id,
                    'group_id' => $group2,
                    'role_id' => $coach2->role_id,
                ],
            ]
        );


        $responsable3 = User::inRandomOrder()->where('role_id', 2)->whereDoesntHave('group')->first();
        $group3 = Group::inRandomOrder()->whereDoesntHave('users')->first()->id;

        DB::table('group_user')->insert(
            [
                [
                    'user_id' => $responsable3->id,
                    'group_id' => $group3,
                    'role_id' => $responsable3->role_id,
                ],
                
            ]
        );
    }
}
