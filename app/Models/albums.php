<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class albums extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function photos()
    {
        return $this->hasMany(photos::class);
    }
    public function users()
    {
        return $this->belongsTo(user::class);
    }
}
