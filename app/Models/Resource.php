<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resource extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'manufacturer', 'category_id', 'cpu', 'ram', 'storage', 'os', 'location', 'status'];

    public function category()
    {
        return $this->belongsTo(ResourceCategory::class, 'category_id');
    }
    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'resource_id');
    }
}
