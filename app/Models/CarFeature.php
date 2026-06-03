<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarFeature extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug','description'];

    public function cars()
    {
        return $this->belongsToMany(Car::class, 'car_feature_map', 'feature_id', 'car_id')->withTimestamps();
    }
}
