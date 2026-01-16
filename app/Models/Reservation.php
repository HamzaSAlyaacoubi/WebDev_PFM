<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['user_id','resource_id','Category_id','start_date','end_date','status','reason',];
    function resource()
    {
        return $this->belongsTo(Resource::class, 'resource_id');
    }
    function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    function category()
    {
        return $this->belongsTo(ResourceCategory::class, 'Category_id', 'id');
    }
}
