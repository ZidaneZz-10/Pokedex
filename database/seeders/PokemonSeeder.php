<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PokemonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pokemon')->insert(
            [

                [
                    'nom'=>'Salaméche',
                    'type_id'=>1,
                    'image'=>'feu.png',
                    'niveau'=>'56',
                ],
                [
                    'nom'=>'Carapuce',
                    'type_id'=>2,
                    'image'=>'eau.png',
                    'niveau'=>'20',
                ],
                [
                    'nom'=>'Bulbizarre',
                    'type_id'=>3,
                    'image'=>'plante.png',
                    'niveau'=>'56',
                ],
            ],
        );
    }
}
