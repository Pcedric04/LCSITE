<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Provinceseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Provinces = [
            [
                'name' => 'Balé',
                'users_id' => 1,
                'regions_id' => 1
            ],
            [
                'name' => 'Bam',
                'users_id' => 1,
                'regions_id' => 5
            ],
            [
                'name' => 'Banwa',
                'users_id' => 1,
                'regions_id' => 1
            ],
            [
                'name' => 'Bazèga',
                'users_id' => 1,
                'regions_id' => 7
            ],
            [
                'name' => 'Bougouriba',
                'users_id' => 1,
                'regions_id' => 13
            ],
            [
                'name' => 'Boulgou',
                'users_id' => 1,
                'regions_id' => 4
            ],
            [
                'name' => 'Boulkiemdé',
                'users_id' => 1,
                'regions_id' => 6
            ],
            [
                'name' => 'Comoé',
                'users_id' => 1,
                'regions_id' => 2
            ],
            [
                'name' => 'Ganzourgou',
                'users_id' => 1,
                'regions_id' => 11
            ],
            [
                'name' => 'Gnagna',
                'users_id' => 1,
                'regions_id' => 8
            ],
            [
                'name' => 'Gourma',
                'users_id' => 1,
                'regions_id' => 8
            ],
            [
                'name' => 'Houet',
                'users_id' => 1,
                'regions_id' => 9
            ],
            [
                'name' => 'Ioba',
                'users_id' => 1,
                'regions_id' => 13
            ],
            [
                'name' => 'Kadiogo',
                'users_id' => 1,
                'regions_id' => 3
            ],
            [
                'name' => 'Kénédougou',
                'users_id' => 1,
                'regions_id' => 9
            ],
            [
                'name' => 'Komondjari',
                'users_id' => 1,
                'regions_id' => 8
            ],
            [
                'name' => 'Kompienga',
                'users_id' => 1,
                'regions_id' => 8
            ],
            [
                'name' => 'Kossi',
                'users_id' => 1,
                'regions_id' => 1
            ],
            [
                'name' => 'Koulpélogo',
                'users_id' => 1,
                'regions_id' => 4
            ],
            [
                'name' => 'Kouritenga',
                'users_id' => 1,
                'regions_id' => 4
            ],
            [
                'name' => 'Kourwéogo',
                'users_id' => 1,
                'regions_id' => 11
            ],
            [
                'name' => 'Léraba',
                'users_id' => 1,
                'regions_id' => 2
            ],
            [
                'name' => 'Loroum',
                'users_id' => 1,
                'regions_id' => 10
            ],
            [
                'name' => 'Mouhoun',
                'users_id' => 1,
                'regions_id' => 1
            ],
            [
                'name' => 'Nahouri',
                'users_id' => 1,
                'regions_id' => 7
            ],
            [
                'name' => 'Namentenga',
                'users_id' => 1,
                'regions_id' => 5
            ],
            [
                'name' => 'Nayala',
                'users_id' => 1,
                'regions_id' => 1
            ],
            [
                'name' => 'Noumbiel',
                'users_id' => 1,
                'regions_id' => 13
            ],
            [
                'name' => 'Oubritenga',
                'users_id' => 1,
                'regions_id' => 11
            ],
            [
                'name' => 'Oudalan',
                'users_id' => 1,
                'regions_id' => 12
            ],
            [
                'name' => 'Passoré',
                'users_id' => 1,
                'regions_id' => 10
            ],
            [
                'name' => 'Poni',
                'users_id' => 1,
                'regions_id' => 13
            ],
            [
                'name' => 'Sanguie',
                'users_id' => 1,
                'regions_id' => 6
            ],
            [
                'name' => 'Sanmatenga',
                'users_id' => 1,
                'regions_id' => 5
            ],
            [
                'name' => 'Séno',
                'users_id' => 1,
                'regions_id' => 12
            ],
            [
                'name' => 'Sissili',
                'users_id' => 1,
                'regions_id' => 6
            ],
            [
                'name' => 'Soum',
                'users_id' => 1,
                'regions_id' => 12
            ],
            [
                'name' => 'Sourou',
                'users_id' => 1,
                'regions_id' => 1
            ],
            [
                'name' => 'Tapoa',
                'users_id' => 1,
                'regions_id' => 8
            ],
            [
                'name' => 'Tuy',
                'users_id' => 1,
                'regions_id' => 9
            ],
            [
                'name' => 'Yagha',
                'users_id' => 1,
                'regions_id' => 12
            ],
            [
                'name' => 'Yatenga',
                'users_id' => 1,
                'regions_id' => 10
            ],
            [
                'name' => 'Ziro',
                'users_id' => 1,
                'regions_id' => 6
            ],
            [
                'name' => 'Zondoma',
                'users_id' => 1,
                'regions_id' => 10
            ],
            [
                'name' => 'Zoundwéogo',
                'users_id' => 1,
                'regions_id' => 7
            ],
        ];

        $region = DB::table('provinces')->insert($Provinces);
        /*  $Provinces->Regions()->attach(1); */
    }
}
