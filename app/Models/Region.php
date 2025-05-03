<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Region extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $guarded = [];
    public function Projet()
    {
        return $this->belongsToMany(Projet::class);
    }
    public function Provinces()
    {
        return $this->belongsToMany(Province::class);
    }

    public function users()
    {
        return $this->belongsTo(user::class);
    }
}
