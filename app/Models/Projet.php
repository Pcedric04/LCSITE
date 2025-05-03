<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Projet extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function Region()
    {
        return $this->belongsToMany(Region::class);
    }
    public function provinces()
    {
        return $this->belongsToMany(Province::class);
    }
    public function users()
    {
        return $this->belongsTo(user::class);
    }
}
