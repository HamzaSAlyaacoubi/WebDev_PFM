<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \App\Models\Servers;
use \App\Models\VirtualMachines;
use \App\Models\Network;
use \App\Models\Storage;

class ReservationsHistory extends Model
{
    protected $fillable = ['id_responsable', 'id_user', 'id_resource', 'id_category', 'reservation_date', 'start_date', 'end_date', 'user_justification', 'status', 'responsable_justification'];

    function responsable()
    {
        return $this->belongsTo(User::class, 'id_responsable');
    }
    function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    function category()
    {
        return $this->belongsTo(ResourceCategory::class, 'id_category');
    }

    public function resource()
    {
        return match ($this->id_category) {
            1 => $this->belongsTo(Servers::class, 'id_resource'),
            2 => $this->belongsTo(VirtualMachines::class, 'id_resource'),
            3 => $this->belongsTo(Network::class, 'id_resource'),
            4 => $this->belongsTo(Storage::class, 'id_resource'),
            default => null,
        };
    }
}
