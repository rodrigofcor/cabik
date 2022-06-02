<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class AgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ages')->insert([
            ['id' => 'F', 'name' => 'Filhote'],
            ['id' => 'J', 'name' => 'Jovem'],
            ['id' => 'A', 'name' => 'Adulto'],
            ['id' => 'I', 'name' => 'Idoso'],
        ]);
    }
}
