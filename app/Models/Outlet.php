<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'picture',
        'address',
        'longitude',
        'latitude'
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
