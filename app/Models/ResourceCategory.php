<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ResourceCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description'];

    public function resources()
    {
        return $this->hasMany(Resource::class, 'category_id');
    }

    public function servers()
    {
        return $this->hasMany(Servers::class, 'id_categorie');
    }

    public function virtualMachines()
    {
        return $this->hasMany(VirtualMachines::class, 'id_categorie');
    }

    public function network()
    {
        return $this->hasMany(Network::class, 'id_categorie');
    }

    public function storage()
    {
        return $this->hasMany(Storage::class, 'id_categorie');
    }

    public function reservationHistory()
    {
        return $this->hasMany(ReservationsHistory::class, 'id_category');
    }
}
