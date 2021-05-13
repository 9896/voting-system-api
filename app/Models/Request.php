<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'election_id',
        'user_id'
    ];

    /**
     * Returns election related to the request sent by a participant. One-to-Many(inverse)
     * 
     * @param null
     * @return App\Models\Election
     */
    public function election()
    {
        return $this->belongTo(App\Models\Election::class);
    }

    /**
     * Returns user who sent the request. One-to-One(inverse)
     * 
     * @param null
     * @return App\Models\User
     */
    public function user()
    {
        return $this->belongsTo(App\Models\User::class);
    }
}
