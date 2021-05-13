<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OauthClient extends Model
{
    use HasFactory;
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'created_at',
        'name',
        'password_client',
        'personal_access_client',
        'provider',
        'redirect',
        'revoked',
        'secret',
        'updated_at',
        'user_id'
    ];

    /**
     * Relationship to user. One-to-One(inverse).
     * 
     * @param null
     * @return App\Models\User
     */
    public function user()
    {
        return $this->belongsTo(App\Models\User::class);
    }
}
