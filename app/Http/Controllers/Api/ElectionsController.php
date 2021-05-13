<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Election;

class ElectionsController extends Controller
{
    /**
     * Display a listing of the resource.Filtering and sorting will be done in frontEnd
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //fetch data
        $elections = Election::get();
        return $elections;
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
        $validator = Validator::make($request->all(),[
            'application_end' => 'required | date',
            'application_start' => 'required | date',
            'election_credentials' => 'required | string',
            'election_end' => 'required | date',
            'election_start' => 'required | date',
            'election_title' => 'required | string',
            'election_title_code' => 'required | string',
            'department' => 'nullable | string',
            'faculty' => 'nullable | string',
            'state' => 'required'
        ]);

        if($validator->fails()){
            return redirect();//add url to your form
        }else{
            Election::create([
                'application_end' => $request->input('application_end'),
                'application_start' => $request->input('application_start'),
                'department' => $request->input('department'),
                'election_credentials' => $request->input('election_credentials'),
                'election_end' => $request->input('election_end'),
                'election_start' => $request->input('election_start'),
                'election_title' => $request->input('election_title'),
                'election_tilte_code' => $request->input('eleciton_title_code'),
                'faculty' => $request->input('faculty'),
                'state' => $request->input('state')
            ]);
        }

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
        $election = Election::find($id);
        return $election;
    }

    /**
     * Update the specified resource in storage.
     * Every section of the election is updatable
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $election = Election::find($id);
        $election->application_end = (empty($request->input('application_end'))) ? $election->application_end : $request->input('application_end');
        $election->application_start = (empty($request->input('application_start'))) ? $election->application_start : $request->input('application_start');
        $election->department = $request->input('department');
        $election->election_credentials = (empty($request->input('election_credentials'))) ? $election->election_credentials : $request->input('election_credentials');
        $election->election_end = (empty($request->input('election_end'))) ? $election->election_end : $request->input('election_end');
        $election->election_start = (empty($request->input('election_start'))) ? $election->election_start : $request->input('election_start');
        $election->election_title = (empty($request->input('election_title'))) ? $election->election_title : $request->input('election_title');
        $election->election_title_code = (empty($request->input('election_title_code'))) ? $election->election_title_code : $request->input('election_title_code');
        $election->faculty = $request->input('faculty');
        $election->state = (empty($request->input('state'))) ? $election->state : $request->input('state');

        $election->save();
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
        $election = Election::find($id);
        $election->delete();
    }
}
