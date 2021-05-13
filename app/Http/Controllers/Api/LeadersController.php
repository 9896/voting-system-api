<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Leader;

class LeadersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $leaders = Leader::get();
        return $leaders;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Leader::create([
            'participant_id' => $request->input('participant_id'),
            'election_id' => $request->input('participant_id')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $leader = Leader::find($id);
        return $leader;
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
        $leader = Leader::find($id);
        $leader->participant_id = (empty($request->input('participant_id'))) ? $leader->participant_id : $request->input('participant_id');
        $leader->election_id = (empty($request->input('election_id'))) ? $leader->election_id : $request->input('election_id');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $leader = Leader::find($id);
        $leader->delete();
    }
}
