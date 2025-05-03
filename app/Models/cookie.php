<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Justijndepover\CookieConsent\Concerns\InteractsWithCookies;
class cookie extends Model
{
    use HasFactory, InteractsWithCookies;
}
