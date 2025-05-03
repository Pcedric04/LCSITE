<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Commune extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function Province()
    {
        return $this->belongsTo(Province::class);
    }
    public function users()
    {
        return $this->belongsTo(user::class);
    }
}
