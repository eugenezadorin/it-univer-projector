<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('priorities')->insert([
            ['name' => 'Low', 'sort' => 100],
            ['name' => 'Normal', 'sort' => 200],
            ['name' => 'High', 'sort' => 300],
            ['name' => 'Immediate', 'sort' => 500],
        ]);
    }
}
