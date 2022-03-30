<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Validator;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
        ]);

        if ( User::where('email', $request->email)->first() ) {
            return $this->handleResponse( false, null, 'Такой пользователь уже есть!', 200);
        }


        if($validator->fails()){
            return $this->handleResponse(false, $validator->errors, 'Ошибка проверки!', 200);
        }

        $input = $request->all();

        $input = Arr::add($input, 'password', bcrypt('password'));
        $user = User::create($input);
        $success['token'] =  $user->createToken('LaravelSanctumAuth')->plainTextToken;

        //return $this->handleResponse($success, 'User successfully registered!');


    }

}
