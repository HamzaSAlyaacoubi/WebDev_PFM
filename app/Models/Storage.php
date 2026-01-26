<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Storage extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = ['name', 'brand', 'capacity', 'type', 'speed', 'status', 'quantity_available', 'description', 'id_category'];

    function category()
    {

        return $this->belongsTo(ResourceCategory::class, 'id_category');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'id_resource');
    }

    public function reservationsHistory()
    {
        return $this->hasMany(ReservationsHistory::class, 'id_resource');
    }
}
