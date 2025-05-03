<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Province extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function Region()
    {
        return $this->belongsTo(Region::class);
    }
    public function Regions()
    {
        return $this->belongsToMany(Region::class);
    }
    public function users()
    {
        return $this->belongsTo(user::class);
    }
}
