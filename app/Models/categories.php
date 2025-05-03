<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class categories extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $guarded = [];
    public function souscategories()
    {
        return $this->belongsToMany(souscategories::class);
    }
    public function users()
    {
        return $this->belongsTo(user::class);
    }

}
