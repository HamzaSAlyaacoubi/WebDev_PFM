<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{
    protected $fillable = ['id_reservation', 'id_user', 'problem_type', 'description'];
    
    public function history()
    {
        return $this->belongsTo(ReservationsHistory::class, 'id_reservation');
    }

    function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
