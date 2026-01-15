<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class VirtualMachines extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = ['name', 'cpu', 'ram', 'storage', 'storage_type', 'os', 'ip_address', 'server_hote', 'status', 'quantity_available', 'description', 'id_categorie'];

    public function category()
    {
        return $this->belongsTo(ResourceCategory::class, 'id_categorie');
    }
}
