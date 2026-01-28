<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Support;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $table = "users";
    const ADMIN = 'administrateur';
    const RESPONSABLE = 'responsable';


    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'blocked',
        'category',
        'id_category',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function supports()
    {
        return $this->hasMany(Support::class, 'id_user');
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

    public function reclamation()
    {
        return $this->hasMany(User::class, 'id_user');
    }
}
