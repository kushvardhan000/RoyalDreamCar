<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'brand_id','model_id','title','slug','price','discount_price','year','registration_year',
        'fuel_type','transmission','ownership','color','mileage','engine_cc','power','torque',
        'seating_capacity','insurance_valid_till','registration_state','registration_city','vin_number',
        'stock_number','short_description','description','meta_title','meta_description','featured','sold','status','views'
    ];

    protected $casts = [
        'featured' => 'boolean',
        'sold' => 'boolean',
        'views' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('published', function ($builder) {
            $builder->where('status', 'published');
        });
    }

    public function scopeAvailable($query)
    {
        return $query->where('status', 'published')->where('sold', false);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function model()
    {
        return $this->belongsTo(CarModel::class, 'model_id');
    }

    public function images()
    {
        return $this->hasMany(CarImage::class)->orderBy('sort_order');
    }

    public function primaryImage()
    {
        return $this->hasOne(CarImage::class)
            ->where('image_type', 'main')
            ->orderBy('sort_order');
    }

    public function galleryImages()
    {
        return $this->hasMany(CarImage::class)
            ->where('image_type', '!=', 'main')
            ->orderBy('sort_order');
    }

    public function features()
    {
        return $this->belongsToMany(CarFeature::class, 'car_feature_map', 'car_id', 'feature_id')->withTimestamps();
    }
}
