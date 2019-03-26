<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
            ['genre' => 'Детектив', 'created_at' => now(), 'updated_at' => now()],
            ['genre' => 'Роман', 'created_at' => now(), 'updated_at' => now()],
            ['genre' => 'Фантастика', 'created_at' => now(), 'updated_at' => now()],
            ['genre' => 'Современная проза', 'created_at' => now(), 'updated_at' => now()],
            ['genre' => 'Юмор', 'created_at' => now(), 'updated_at' => now()],
            ['genre' => 'Фольклор', 'created_at' => now(), 'updated_at' => now()],
            ['genre' => 'Психология', 'created_at' => now(), 'updated_at' => now()],
            ['genre' => 'Саморазвитие', 'created_at' => now(), 'updated_at' => now()],
            ['genre' => 'Биология', 'created_at' => now(), 'updated_at' => now()],
            ['genre' => 'География', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
