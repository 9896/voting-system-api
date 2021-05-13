<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'registration_no',
        'name',
        'email',
        'email_verified_at',
        'password',
        'remember_token',
        'faculty',
        'department',
        'academic_status',
        'disciplinary_status',
        'state',
        'year',
        'semester',

        
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Return all votes for all elections(votes/election/request) a user has casted. One-to-Many
     * 
     * @param null
     * @return App\Model\Vote
     */
    public function vote()
    {
        return $this->hasMany(App\Models\Vote::class, 'voter_id');
    }

    /**
     * Return all requests sent by a user to participate.One-to-Many
     * 
     * @param null
     * @return App\Model\Request
     */
    public function request()
    {
        return $this->hasMany(App\Models\Request::class);
    }

    /**
     * User Oauth_client relationship
     * 
     * @param null
     * @return App\Model\OauthClient
     */
    public function oauthClient()
    {
        return $this->hasOne(OauthClient::class);
    }

    /**
     * Local scope to return only admin
     * 
     * @param Query
     * @return admin
     */
    public function scopeAdmin($query)
    {
        return $query->where('state', 'admin');
    }
}
