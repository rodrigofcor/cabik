<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;


class DddSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ddds')->insert([
            ['id' => '11', 'name' => '11 – São Paulo – SP'],
            ['id' => '12', 'name' => '12 - São José dos Campos – SP'],
            ['id' => '13', 'name' => '13 - Santos – SP'],
            ['id' => '14', 'name' => '14 - Bauru – SP'],
            ['id' => '15', 'name' => '15 - Sorocaba – SP'],
            ['id' => '16', 'name' => '16 - Ribeirão Preto – SP'],
            ['id' => '17', 'name' => '17 - São José do Rio Preto – SP'],
            ['id' => '18', 'name' => '18 - Presidente Prudente – SP'],
            ['id' => '19', 'name' => '19 – Campinas – SP'],
            ['id' => '21', 'name' => '21 – Rio de Janeiro – RJ'],
            ['id' => '22', 'name' => '22 – Campos dos Goytacazes – RJ'],
            ['id' => '24', 'name' => '24 – Volta Redonda – RJ'],
            ['id' => '27', 'name' => '27 – Vila Velha/Vitória – ES'],
            ['id' => '28', 'name' => '28 – Cachoeiro de Itapemirim – ES'],
            ['id' => '31', 'name' => '31 – Belo Horizonte – MG'],
            ['id' => '32', 'name' => '32 - Juiz de Fora – MG'],
            ['id' => '33', 'name' => '33 – Governador Valadares – MG'],
            ['id' => '34', 'name' => '34 – Uberlândia – MG'],
            ['id' => '35', 'name' => '35 – Poços de Caldas – MG'],
            ['id' => '37', 'name' => '37 – Divinópolis – MG'],
            ['id' => '38', 'name' => '38 – Montes Claros – MG'],
            ['id' => '41', 'name' => '41 – Curitiba – PR'],
            ['id' => '42', 'name' => '42 – Ponta Grossa – PR'],
            ['id' => '43', 'name' => '43 – Londrina – PR'],
            ['id' => '44', 'name' => '44 – Maringá – PR'],
            ['id' => '45', 'name' => '45 – Foz do Iguaçú – PR'],
            ['id' => '46', 'name' => '46 – Francisco Beltrão/Pato Branco – PR'],
            ['id' => '47', 'name' => '47 – Joinville – SC'],
            ['id' => '48', 'name' => '48 – Florianópolis – SC'],
            ['id' => '49', 'name' => '49 – Chapecó – SC'],
            ['id' => '51', 'name' => '51 – Porto Alegre – RS'],
            ['id' => '53', 'name' => '53 – Pelotas – RS'],
            ['id' => '54', 'name' => '54 – Caxias do Sul – RS'],
            ['id' => '55', 'name' => '55 – Santa Maria – RS'],
            ['id' => '61', 'name' => '61 – Brasília – DF'],
            ['id' => '62', 'name' => '62 – Goiânia – GO'],
            ['id' => '63', 'name' => '63 – Palmas – TO'],
            ['id' => '64', 'name' => '64 – Rio Verde – GO'],
            ['id' => '65', 'name' => '65 – Cuiabá – MT'],
            ['id' => '66', 'name' => '66 – Rondonópolis – MT'],
            ['id' => '67', 'name' => '67 – Campo Grande – MS'],
            ['id' => '68', 'name' => '68 – Rio Branco – AC'],
            ['id' => '69', 'name' => '69 – Porto Velho – RO'],
            ['id' => '71', 'name' => '71 – Salvador – BA'],
            ['id' => '73', 'name' => '73 – Ilhéus – BA'],
            ['id' => '74', 'name' => '74 – Juazeiro – BA'],
            ['id' => '75', 'name' => '75 – Feira de Santana – BA'],
            ['id' => '77', 'name' => '77 – Barreiras – BA'],
            ['id' => '79', 'name' => '79 – Aracaju – SE'],
            ['id' => '81', 'name' => '81 – Recife – PE'],
            ['id' => '82', 'name' => '82 – Maceió – AL'],
            ['id' => '83', 'name' => '83 – João Pessoa – PB'],
            ['id' => '84', 'name' => '84 – Natal – RN'],
            ['id' => '85', 'name' => '85 – Fortaleza – CE'],
            ['id' => '86', 'name' => '86 – Teresina – PI'],
            ['id' => '87', 'name' => '87 – Petrolina – PE'],
            ['id' => '88', 'name' => '88 – Juazeiro do Norte – CE'],
            ['id' => '89', 'name' => '89 – Picos – PI'],
            ['id' => '91', 'name' => '91 – Belém – PA'],
            ['id' => '92', 'name' => '92 – Manaus – AM'],
            ['id' => '93', 'name' => '93 – Santarém – PA'],
            ['id' => '94', 'name' => '94 – Marabá – PA'],
            ['id' => '95', 'name' => '95 – Boa Vista – RR'],
            ['id' => '96', 'name' => '96 – Macapá – AP'],
            ['id' => '97', 'name' => '97 – Coari – AM'],
            ['id' => '98', 'name' => '98 – São Luís – MA'],
            ['id' => '99', 'name' => '99 – Imperatriz – MA'],
        ]);
    }
}
