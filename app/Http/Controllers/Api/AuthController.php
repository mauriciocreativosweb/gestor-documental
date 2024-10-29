<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Mail\SendEmailCode;
use App\Message\Success;
use App\Message\Fail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function register(RegisterRequest $registerRequest){
        try{
            if(User::where('email', $registerRequest->email)->exists()){
                return back()->with('answer', Fail::failUserRegister);
            }else{
                $userNew = new User();
                $userNew['name'] = $registerRequest->name;
                $userNew['email'] = $registerRequest->email;
                $userNew['password'] = $registerRequest->password;
                $userNew['state'] = 1;
                $userNew['icon'] = 'iconNewUser.jpg';
                $userNew['cellphone'] = '0000000000';
                $userNew['user_code'] = 000000;
                $userNew->save();
                $userNew->assignRole('user');
                $userModel = User::find($userNew->id);
                $credentials = $registerRequest->only('email','password');
                Auth::attempt($credentials);
                event(new Registered($userModel));
                return back()->with('answer', Success::successUserRegister);
            }

        }catch(ModelNotFoundException $e){
                return back()->with('answer', Fail::failModelException);
        }

    }

  
    public function login(LoginRequest $loginRequest){
        try{
            if(User::where('email', $loginRequest->email)->exists()){
                $user = User::where('email','=',$loginRequest->email)->first();
                if(Hash::check($loginRequest->password, $user->password  )){
                    if($user->state){
                        $credentials = $loginRequest->only('email','password');
                       if(Auth::attempt($credentials )){
                            $loginRequest->session()->regenerate();
                            $user->generateCode();
                            $response = Http::asForm()->post(env("APP_URL").'/oauth/token', [
                                'grant_type' => 'password',
                                'client_id' => env('CLIENT_PASSPORT_ID'),
                                'client_secret' => env('CLIENT_PASSPORT_SECRET'),
                                'username' => $loginRequest->email,
                                'password' => $loginRequest->password,
                                'scope' => '',
                            ]);
                            Session::put('token_bearer', $response->json()['access_token']);
                            Session::put('token_refresh', $response->json()['refresh_token']);
                            Session::put('Check2Fa', true);
                            return redirect()->route('2fa.index');
                       } else{
                            return back()->with('answer', Fail::failUserLogin);
                       } 
                    }else{
                        return back()->with('answer', Fail::failAuthorizationLogin);
                    }
                   
                }else{
                    return back()->with('answer', Fail::failUserLogin);
                }
            }else{
                return back()->with('answer', Fail::failUserLogin);
            }
        }catch(ModelNotFoundException $e){
            return back()->with('answer', Fail::failUserLogin);
        }
    }
}
