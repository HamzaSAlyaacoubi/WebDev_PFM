<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReservationsHistory extends Model
{
    protected $fillable = ['id_user', 'id_resource', 'id_category', 'reservation_date', 'start_date', 'end_date', 'user_justification', 'status', 'responsable_justification'];

    function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    function category()
    {
        return $this->belongsTo(ResourceCategory::class, 'id_category');
    }
}
