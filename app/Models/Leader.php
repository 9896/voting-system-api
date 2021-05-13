<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leader extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'election_id',
        'participant_id'
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
        return $this->belongsTo(App\Models\User::class, 'participant_id');
    }

    /**
     * Returns the number of votes that made the leader a leader. One-to-Many
     * 
     * @param null
     * @return App\Models\Vote
     */
    public function vote()
    {
        return $this->hasMany(App\Models\Vote::class, 'participant_id');
    }
}
