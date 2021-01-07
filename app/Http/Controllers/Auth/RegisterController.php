<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Paciente;
use App\Medico;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'dataDeNascimento' => ['required', 'date'],
            'tipo' => ['required']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $userId = DB::table('users')->latest('created_at')->first();
        // dd((string)$userId->id);
        $usuarioId = $userId->id + 1;
        // dd((string)$pacienteId, $userId);
        // dd((string)$pacienteId);
        // dd($userId);
        // $pacienteId = (int)$userId->id+1;
        // dd($pacienteId);
        // dd((int)$userId->id+1);
        // $pacienteId = ($userId+1);
        // dd($pacienteId);

        // dd($data);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            // 'data' => $data['data']
            // 'tipo' => $data['tipo']
        ]);

        if ($data['tipo'] == 2) {
            $paciente = Paciente::create([
                'pacienteId' => (string)$usuarioId,
                'dataDeNascimento' => $data['dataDeNascimento'],
                'tipo' => $data['tipo']
            ]);
        } else if ($data['tipo'] == 1) {
            $medico = Medico::create([
                'medicoId' => (string)$usuarioId,
                'dataDeNascimento' => $data['dataDeNascimento'],
                'tipo' => $data['tipo']
            ]);
        };


        return $user;
    }

    // public function index() {
    //     // $users = User::latest()->first();


    //     // return view('user');
    // }
}
