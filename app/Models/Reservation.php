<?php

namespace App\Models;
use App\Models\Servers;
use App\Models\VirtualMachines;
use App\Models\Network;
use App\Models\Storage;

use Illuminate\Database\Eloquent\Model;


class Reservation extends Model
{
    protected $fillable = ['user_id','resource_id','Category_id','start_date','end_date','status','reason',];
    // function resource()
    // {
    //     return $this->belongsTo(Resource::class, 'resource_id');
    // }
    function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    function category()
    {
        return $this->belongsTo(ResourceCategory::class, 'Category_id', 'id');
    }
    public function resource()
    {
        return match ($this->Category_id) {
            1 => $this->belongsTo(Servers::class, 'resource_id'),
            2 => $this->belongsTo(VirtualMachines::class, 'resource_id'),
            3 => $this->belongsTo(Network::class, 'resource_id'),
            4 => $this->belongsTo(Storage::class, 'resource_id'),
            default => null,
        };
    }

}
