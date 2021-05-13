<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Authenticate a user by conterchecking what is in the database
     * 
     * @param Request
     * @return Response
     */

     public function authenticateUser(Request $request)
     {
         //
         $validator = Validator::make($request->all(),[
            'email' => 'required | email',
            'password' => 'required | string'
        ]);

        if($validator->fails()){
            return response()->json(['Error' => 'Enter correct input']);
        }else{

            $credentials = $request->only('email', 'password');

             $email = $request->input('email');
            // $user = User::where([
            //     ['email', $email],
            //  
            // ])->first();

            if(Auth::attempt($credentials)){
                $user = User::where([
                ['email', $email], 
                 ])->first();

                $oauthClient = $user->oauthClient;
                $dbPassword = $user->password;
                $secret = $oauthClient->secret;
                $client_id = $oauthClient->id;
                
            return response()->json([
             'db_password' => $dbPassword,
             'secret' => $secret,
             'client_id' => $client_id]);
                
            }else{
                return response()->json(['Error' => 'User Does not Exist Bwana']);
            }
        }
     }
}
