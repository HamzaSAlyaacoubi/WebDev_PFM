<?php

namespace App\Models;

use App\Models\Servers;
use App\Models\VirtualMachines;
use App\Models\Network;
use App\Models\Storage;

use Illuminate\Database\Eloquent\Model;


class Reservation extends Model
{
    protected $fillable = ['id_user', 'id_resource', 'id_category', 'start_date', 'end_date', 'status', 'justification',];

    function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    function category()
    {
        return $this->belongsTo(ResourceCategory::class, 'id_category', 'id');
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
