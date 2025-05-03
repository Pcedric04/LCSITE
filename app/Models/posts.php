<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class posts extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function categories()
    {
        return $this->belongsTo(categories::class);
    }
    public function users()
    {
        return $this->belongsTo(user::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function incrementVisits($id)
        {
            $this->$id;
            $posts = posts::findOrFail($id);
               /*  $this->visits++; */
                $posts->visits++;
            $posts->save();
        }
}
