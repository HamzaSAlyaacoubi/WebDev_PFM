<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Network extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = ['name', 'brand', 'type', 'model', 'port_number', 'speed', 'status', 'quantity_available', 'description', 'id_categorie'];

    function categorie()
    {

        return $this->belongsTo(ResourceCategory::class, 'id_categorie');
    }
}
