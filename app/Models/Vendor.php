<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Vendor extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    public const CITIES = [
        'pokhara' => 'Pokhara',
    ];
    public const STATUS = [
        'pending' => 'Pending',
        'active' => 'Active',
        'hold' => 'Hold',
        'rejected' => 'Rejected'
    ];

    protected $fillable = [
        'user_id', 'name', 'city', 'zipcode', 'address', 'tax_number', 'google_map_link', 'status', 'is_banned', 'banned_reason', 'is_close'
    ];

    protected $appends = ['display_image'];

    public function setIsBannedAttribute($input)
    {
        if ($input && ($input == "on" || $input == "off")) {
            $this->attributes['is_banned'] = $input == "on" ? 1 : 0;
        } else {
            $this->attributes['is_banned'] = 0;
        }
    }
    public function setIsCloseAttribute($input)
    {
        if ($input && ($input == "on" || $input == "off")) {
            $this->attributes['is_close'] = $input == "on" ? 1 : 0;
        } else {
            $this->attributes['is_close'] = 0;
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getDisplayImageAttribute()
    {
        return $this->getMedia()->last();
    }
}
