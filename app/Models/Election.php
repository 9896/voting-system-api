<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'application_start',
        'application_end',
        'election_start',
        'election_end',
        'election_title',
        'election_title_code',
        'election_credentials',
        'faculty',
        'department',
        'state'
    ];

    /**
     * This method returns all participants associated with an election.One-to-Many
     * 
     * @param null
     * @return App\models\Participant
     */
    public function participant()
    {
        return $this->hasMany(App\Models\Participant::class);
    }

    /**
     * This method returns a leader who becomes a leader through the election.One-to-One
     * 
     * @param null
     * @return App\Models\Leader
     */
    public function leader()
    {
        return $this->hasOne(App\Models\Leader::class);
    }

    /**
     * This method returns all requests associated/sent in regard to a certain election.One-to-many
     * 
     * @param null
     * @return App\Models\Request
     */
    public function request()
    {
        return $this->hasMany(App\Models\Request::class);
    }

    /**
     * Returns all votes casted during this election. One-to-many
     * 
     * @param null
     * @return App\Models\Vote
     */
    public function vote()
    {
        return $this->hasMany(App\Models\Vote::class);
    }
}

