<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SportCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'is_enabled'];

    public function scopeEnabled($query)
    {
        return $query->where('is_enabled', true);
    }
}
