<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;

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
    protected $redirectTo = '/home';

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
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

     public function showRegistrationForm()
     {
        $locations = DB::table('location')->get();
        $educ_attain = DB::table('educ_attain')->get();
        $positions = DB::table('latest_position')->get();
        return view('auth.register')->with(['locations' => $locations, 'positions' => $positions, 'educ_attain' => $educ_attain]);
     }

    protected function create(array $data)
    {
        return User::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        
        //event(new Registered($user = $this->create($request->all())));

     /*   User::create([
            'email' => $request->email,
            'password' => bcrypt($request->pass),
        ]);*/
        $user = new User();
        $user->email = $request->email;
        $user->password = bcrypt($request->pass);
        $user->save();
        event(new Registered($user));
        $candidate = new Candidate();
        $candidate->first_name = $request->first_name;
        $candidate->last_name = $request->last_name;
        $candidate->mobile_no = $request->contact;
        $candidate->tel_no = $request->tel;
        $candidate->location = $request->location;
        $candidate->expected_salary = $request->expected_salary;
        $candidate->latest_position = $request->latest_position;
        $candidate->educ_attain = $request->educ_attain;

        $user_id = User::where('email', '==', $request->email, '&&', 'pass', '==', $user->password);
        $candidate->user_id = $user_id->id;

        $candidate->save();
        event(new Registered($candidate));
        $this->guard()->login($user);
        
        return $this->registered($request, $user) ?: redirect($this->redirectPath());
    }
}
