<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Sport extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

    protected $fillable = ['title', 'address', 'city', 'description', 'price_per_hour', 'vendor_id', 'sport_category_id', 'opening_time', 'closing_time'];
    protected $appends = [
        'images'
    ];
    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }

    public function sport_category()
    {
        return $this->belongsTo(SportCategory::class, 'sport_category_id');
    }

    public function scopeApiFilters($query, $request)
    {
        if ($request->has('city')) {
            $query->where('city', strtolower($request->city));
        }

        if ($request->has('sport_category_id')) {
            $query->where('sport_category_id', $request->sport_category_id);
        }

        if ($request->has('vendor_id')) {
            $query->where('vendor_id', $request->vendor_id);
        }

        if ($request->has('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        if ($request->has('address')) {
            $query->where('address', 'like', '%' . $request->address . '%');
        }

        return $query;
    }

    public function getImagesAttribute()
    {
        if ($this->getMedia()) {
            return $this->getMedia();
        }
        return null;
    }
}
