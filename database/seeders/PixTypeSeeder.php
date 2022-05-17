<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class PixTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pix_types')->insert([
            ['name' => 'CPF'],
            ['name' => 'CNPJ'],
            ['name' => 'E-mail'],
            ['name' => 'Celular'],
            ['name' => 'Chave aleatória'],
        ]);
    }
}
