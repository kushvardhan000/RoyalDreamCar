<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    protected $table = 'about_us';

    protected $guarded = [];

    protected $casts = [
        'why_choose_us' => 'array',
    ];
}