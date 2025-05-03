<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Regionseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Regions = [
            [
                'name' => 'Boucle du Mouhoun',
                'users_id' => 1
            ],
            [
                'name' => 'Cascades',
                'users_id' => 1
            ],
            [
                'name' => 'Centre',
                'users_id' => 1
            ],
            [
                'name' => 'Centre-Est',
                'users_id' => 1
            ],
            [
                'name' => 'Centre-Nord',
                'users_id' => 1
            ],
            [
                'name' => 'Centre-Ouest',
                'users_id' => 1
            ],
            [
                'name' => 'Centre-Sud',
                'users_id' => 1
            ],
            [
                'name' => 'Est',
                'users_id' => 1
            ],
            [
                'name' => 'Hauts-Bassins',
                'users_id' => 1
            ],
            [
                'name' => 'Nord',
                'users_id' => 1
            ],
            [
                'name' => 'Plateau-Central',
                'users_id' => 1
            ],
            [
                'name' => 'Sahel',
                'users_id' => 1
            ],
            [
                'name' => 'Sud-Ouest',
                'users_id' => 1
            ],
        ];
        $region = DB::table('regions')->insert($Regions);
    }
}
