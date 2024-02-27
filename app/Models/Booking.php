<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }

    public function sport()
    {
        return $this->belongsTo(Sport::class, 'sport_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function setUserIdAttribute($input)
    {
        if ($input) {
            if (auth('api')->check()) {
                $this->attributes['user_id'] = auth('api')->id();
            } else {
                $this->attributes['user_id'] = auth()->id();
            }
        }
    }
    public function scopeApiFilters($query, $request)
    {
        if ($request->has('date')) {
            $query->where('date', strtolower($request->date));
        }

        if ($request->has('vendor_id')) {
            $query->where('vendor_id', $request->vendor_id);
        }

        if ($request->has('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        return $query;
    }
}
