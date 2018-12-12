<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Hash;

class ApiAuthController extends Controller
{
    
    public function register(Request $request){

       $request->validate([

            'email'=>'required',
            'name'=>'required',
            'password'=>'required'

       ]); 

       $user=new User();
       $user->name=$request->name;
       $user->email=$request->email;
       $user->password=bcrypt($request->password);
       $user->save();


       $client = new \GuzzleHttp\Client(); 

       $response = $client->post(url('/oauth/token'), [
           'form_params' => [
               'grant_type' => 'password',
               'client_id' => '2',
               'client_secret' => 'b8VBchHqP2Y64VRShsm1ij88qsd38dazw5IWjQuD',
               'username' => $request->email,
               'password' => $request->password,
               'scope' => '',
           ],
       ]);
        

        return response(['data'=>json_decode((string) $response->getBody(), true)]);

    }

    public function login(Request $request){

        $request->validate([

            'email'=>'required',
            'password'=>'required'

       ]); 

       $user=User::where('email', $request->email)->first();
       if(!$user){
        return response(['status'=>'error', 'message'=>'User not found']);
       }
       if(Hash::check($request->password, $user->password)){

        $client = new \GuzzleHttp\Client(); 

       $response = $client->post(url('/oauth/token'), [
           'form_params' => [
               'grant_type' => 'password',
               'client_id' => '2',
               'client_secret' => 'b8VBchHqP2Y64VRShsm1ij88qsd38dazw5IWjQuD',
               'username' => $request->email,
               'password' => $request->password,
               'scope' => '',
           ],
       ]);

       
       return response(['data'=>json_decode((string) $response->getBody(), true)]);
       }

      

    }

}
