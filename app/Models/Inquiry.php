<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;

    protected $fillable = ['car_id','name','phone','email','message','status','source'];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
