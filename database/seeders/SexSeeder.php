<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class SexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sexes')->insert([
            ['id' => 'M', 'name' => 'Macho'],
            ['id' => 'F', 'name' => 'Fêmea'],
            ['id' => 'I', 'name' => 'Não tenho certeza'],
        ]);
    }
}
