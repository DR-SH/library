<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['title' => 'Художественная литература'],
            ['title' => 'Нехудожественная литература'],
            ['title' => 'Детям и родителям'],
            ['title' => 'Литература на иностранных языках'],
            ['title' => 'Бизнес-литература']
        ]);
    }
}
