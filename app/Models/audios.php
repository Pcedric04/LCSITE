<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class audios extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $guarded = [];
    public function categories()
    {
        return $this->belongsTo(categories::class);
    }

    public function souscategories()
    {
        return $this->belongsTo(souscategories::class);
    }

    public function users()
    {
        return $this->belongsTo(user::class);
    }
}
