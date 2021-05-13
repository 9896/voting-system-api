<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vote;
use Illuminate\Support\Facades\Validator;

class VotesController extends Controller
{
    /**
     * Display a listing of the resource. Returns all the votes casted for a particular election
     *
     * @return \Illuminate\Http\Response
     */
    public function index($election_id)
    {
        //
        $votes = Vote::where('election_id', $id)->get();
        return $votes;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Note that voter_id must be unique but only a particular election since many voter ids will be present
        $validatedData = Validator::make($request->all(),[
            'voter_id' => [
                Rule::unique('votes')->where(function($query){
                    return $query->where('election_id',$request->input('election_id'));
                })
            ]
        ]);
        //
        Vote::create([
            'election_id' => $request->input('election_id'),
            'participant_id' => $request->input('participant_id'),
            'voter_id' => $request->input('user_id')
        ]);
    }

    /**
     * Display the specified resource. This method would show all the votes belonging to a particular participant
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($election_id,$participant_id)
    {
        //
        $votes = Vote::where([
            'participant_id'=> $participant_id,
            'election_id' => $election_id
        ])->get();
        return $votes;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage. Revoke a vote
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($election_id, $user_id)
    {
        //
        $vote = Vote::where([
            'election_id' => $election_id,
            'user_id' => $user_id
            ])->get();
        $vote->destroy();
    }
}
