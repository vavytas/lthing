<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Guzzle\Http\Client;


class ApiAuthController extends Controller
{
    
    public function register(){

       $validatedData = $request->validate([

            'email'=>'required',
            'name'=>'required',
            'password'=>'required'

       ]); 

       $user=new User();
       $user->name=$request->name;
       $user->email=$request->email;
       $user->password=bcrypt($request->password);
       $user->save();


       $http = new Client;

       $response = $http->post('http://lthing.biuld/oauth/token', [
           'form_params' => [
               'grant_type' => 'password',
               'client_id' => 'client-id',
               'client_secret' => 'client-secret',
               'username' => $request->email,
               'password' => $request->password,
               'scope' => '',
           ],
       ]);
        return $response;

        return response(['data'=>json_decode((string) $response->getBody(), true)]);

    }

    public function login(){

    }

}
