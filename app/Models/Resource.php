<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resource extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'manufacturer', 'id_category', 'cpu', 'ram', 'storage', 'os', 'location', 'status'];

    public function category()
    {
        return $this->belongsTo(ResourceCategory::class, 'id_category');
    }
    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'id_resource');
    }
    public function histories()
    {
        return $this->hasMany(ReservationsHistory::class, 'id_resource');
    }
}
