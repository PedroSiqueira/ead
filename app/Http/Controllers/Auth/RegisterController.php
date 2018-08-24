<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerificaMail;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Register Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles the registration of new users as well as their
      | validation and creation. By default this controller uses a trait to
      | provide this functionality without requiring any additional code.
      |
     */

use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/disciplinas';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255|unique:users',
                    'password' => 'required|string|min:8|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data) {
        $user = User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                    'token' => str_random(31),
        ]);

        Mail::to($user->email)->send(new VerificaMail($user));

        return $user;
    }

    public function verificaMail($token) {
        $user = User::where('token', $token)->first();
        if (isset($user)) {
            if (!$user->verified) {
                $user->verified = true;
                $user->save();
                return redirect('/login')->with('status', ['success', "Teu email está verificado. Agora você pode se autenticar."]);
            } else {
                return redirect('/login')->with('status', ['warning', "Seu email já foi verificado. Você pode se autenticar."]);
            }
        }
        return redirect('/login')->with('status', ["danger", "Desculpe-me, teu email não pôde ser verificado."]);
    }

    protected function registered(Request $request, $user) {
        $this->guard()->logout();
        return redirect('/login')->with('status', ['warning', 'Tua conta foi criada! Agora só falta você verificar teu email para confirmar tua conta.']);
    }

}
