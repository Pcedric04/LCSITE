<?php

namespace App\Service;

use App\Models\categories;
use App\Models\Province;
use App\Models\Region;
use Illuminate\Support\Facades\DB;

class RegionService
{
    public static function provinces($id)
    {
            $regions = Region::where('id', '=', $id)->first();
        $provinces = DB::table('provinces')
            ->where('provinces.regions_id', '=', $regions->id)->get(['id']);
        $data = [];
        foreach ($provinces as $provinces_items) {
            $temp_data = [];
            $provinces = DB::table('provinces')
                ->where('id', '=', $provinces_items->id)->first();
            $temp_data['provinces'] = $provinces;
            $data[] = $temp_data;
        }
        return $data;
    }
}
