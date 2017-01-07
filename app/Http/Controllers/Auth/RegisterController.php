<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/user/basic_information';

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
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        if ($this->checkVerificationCode($request->input('mobile'), $request->input('verification_code'))) {
            $user = $this->create($request->all());

            $this->guard()->login($user);

            return response()->success([
                'redirect' => '/user/basic_information'
            ]);
        } else {
            return response()->fail('验证码错误！');
        }
    }

    protected function checkVerificationCode($mobile, $verificationCode) {
//        return TRUE;
        $rVerificationCode = Redis::get('ft2_verification_code:'.$mobile);

        return ($verificationCode == $rVerificationCode);
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
            'nickname' => 'required|max:255',
            'mobile' => 'required|unique:ft2_users',
            'verification_code' => 'required',
            'password' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'nickname' => $data['nickname'],
            'mobile' => $data['mobile'],
            'password' => bcrypt($data['password']),
            'avatar' => $this->getRandomAvatar()
        ]);
    }

    protected function getRandomAvatar()
    {
        $avatars = json_decode(Config::get('constants.DEFAULT_AVATARS'), true);

        return $avatars[mt_rand(0, count($avatars) - 1)];
    }
}
