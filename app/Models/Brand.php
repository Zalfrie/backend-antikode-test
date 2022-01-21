<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo',
        'banner'
    ];

    public function outlets()
    {
        $this->hasMany(Outlet::class);
    }

    public function products()
    {
        $this->hasMany(Product::class);
    }
}
