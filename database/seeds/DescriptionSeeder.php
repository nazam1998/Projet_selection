<?php

use Illuminate\Database\Seeder;

class DescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('descriptions')->insert([
            'description' => 'Same At in bit bit kindred been among for they may teachers smile for Kids.',
        ]);
        DB::table('descriptions')->insert([
            'description' => "Offer kids Stallman Stallman's become friends room life Johnny 1999 a to kids the succinctly.",
        ]);
        DB::table('descriptions')->insert([
            'description' => "Students his with back the ability ability the line through at Columbia Saturday his his.",
        ]);
        DB::table('descriptions')->insert([
            'description' => "Screens another 1970s commercial for to potential by capabilities opposed potential way way decades to.",
        ]);
        DB::table('descriptions')->insert([
            'description' => "Stallman listeners years Stallman like of deaf of adolescence merely was music of horror was.",
        ]);
    }
}
