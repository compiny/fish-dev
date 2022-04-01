<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
            'email' => 'required|unique:users|email',
            'password' => 'required',
            'repassword' => 'required|same:password',
        ]);


        if($validator->fails()){
            return $this->handleResponse(false, $validator->errors(), 'Ошибка проверки!', 200);
        }

        $data = [
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        $user = User::create($data);
        $token =  $user->createToken('LaravelSanctumAuth')->plainTextToken;
        $user = Arr::add($user, 'token', $token);

        return $this->handleResponse(true, $user, 'Пользователь зарегистрован.', 200);

    }

    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if($validator->fails()){
            return $this->handleResponse(false, $validator->errors(), 'Ошибка проверки!', 200);
        }

        $credentials = $request->all();


        if (Auth::attempt($credentials)) {

            $user = Auth::user();
            $result = $user->createToken($request->email);

            return $this->handleResponse(true, $result, 'Пользователь авторизован!', 200);

        }else{

            return $this->handleResponse(false, $validator->errors(), 'Ошибка авторизации!', 200);

        }
    }

}
