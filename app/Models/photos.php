<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class photos extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $guarded = [];
    public function albums()
    {
        return $this->belongsTo(albums::class);
    }
    public function categories()
    {
        return $this->belongsToMany(categories::class);
    }
    public function souscategories()
    {
        return $this->belongsToMany(souscategories::class);
    }
}
