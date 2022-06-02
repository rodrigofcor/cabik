<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class ObjectiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('objectives')->insert([
            ['id' => 'F', 'name' => 'Ajuda Financeira'],
            ['id' => 'D', 'name' => 'Doação'],
            ['id' => 'A', 'name' => 'Ambos'],
        ]);
    }
}
