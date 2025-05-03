<?php

namespace App\Service;

use App\Models\categories;
use Illuminate\Support\Facades\DB;

class categoriesService
{
    public static function souscategories($id)
    {
        $categories = categories::where('id', '=', $id)->first();
        $souscategories = DB::table('categories_souscategories')
            ->where('categories_souscategories.categories_id', '=', $categories->id)->get(['souscategories_id']);
        $data = [];
        foreach ($souscategories as $souscategories_items) {
            $temp_data = [];
            $souscategories = DB::table('souscategories')
                ->where('id', '=', $souscategories_items->souscategories_id)->first();
            $temp_data['souscategories'] = $souscategories;
            $data[] = $temp_data;
        }
        return $data;
    }
}
