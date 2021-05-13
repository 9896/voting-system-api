<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'election_id',
        'profile_photo',
        'user_id'
    ];

    /**
     * Return the election/Title which this leader holds. One-to-One(inverse)
     * 
     * @param null
     * @return App\Models\Election
     */
    public function election()
    {
        return $this->belongsTo(App\Models\Election::class);
    }

        /**
     * A leader is just basically a student, this method returns an instance of user that the leader simply is. One-to-One.(inverse)
     * 
     * @param null
     * @return App\Models\User
     */
    public function user()
    {
        return $this->belongsTo(App\Models\User::class);
    }

        /**
     * Returns the number of votes that participant has. One-to-Many
     * 
     * @param null
     * @return App\Models\Vote
     */
    public function vote()
    {
        return $this->hasMany(App\Models\Vote::class);
    }

    /**
     * returns request sent by a particular participant. One-to-One
     * 
     * @param null
     * @return App\Models\request
     */

    public function request()
    {
        return $this->hasOne(App\Models\Request::class);
    }
}
