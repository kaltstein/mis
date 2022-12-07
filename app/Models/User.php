<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $appends = ['full_name'];
    protected $fillable = [
        'email',
        'password',
        'role',
        'last_name',
        'first_name',
        'middle_name',
        'address',
        'birthday',
        'gender',
        'religion',
        'civil_status',
        'educational_attainment',
        'contact_no',
        'enrolled',
        'employment_status',
        'solo_parent',
        'pwd',
        'disability',
        'lgbtq',
        'youth_member',
        'youth_org',
        'emergency_contact_name',
        'emergency_contact_address',
        'emergency_contact_no',
        'emergency_contact_relationship',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFullNameAttribute() // notice that the attribute name is in CamelCase.
    {
        return $this->last_name . ' ' . $this->first_name . ' ' . $this->middle_name;
    }
}
