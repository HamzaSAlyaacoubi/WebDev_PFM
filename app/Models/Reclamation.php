<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{
    protected $fillable = ['reservation_id', 'user_id', 'Problem_type', 'description'];
    function reservation()
    {
        return $this->belongsTo(Reservation::class, 'reservation_id');
    }
    function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
