<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\View;

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
        View::addExtension('html', 'php');

        return view('dist.signup');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        try {
            $this->validateRegister($request);

            if ($this->checkVerificationCode($request->input('mobile'), $request->input('verification_code'))) {
                $user = $this->create($request->all());

                $this->guard()->login($user);

                return response()->success([
                    'redirect' => '/user/basic_information'
                ]);
            } else {
                throw new \Exception('验证码错误！');
            }
        } catch (\Exception $e) {
            return response()->fail($e->getMessage());
        }
    }

    protected function checkVerificationCode($mobile, $verificationCode) {
//        return TRUE;
        $rVerificationCode = Redis::get('ft2_verification_code:'.$mobile);

        return ($verificationCode == $rVerificationCode);
    }

    protected function validateRegister(Request $request)
    {
        $this->validate($request, [
            'nickname' => 'required|max:255|unique:ft2_users,nickname|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]+$/u',
            'mobile' => 'required|unique:ft2_users,mobile',
            'verification_code' => 'required',
            'password' => 'required|min:6',
        ]);
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
            'nickname' => 'required|max:255|unique:ft2_users,nickname',
            'mobile' => 'required|unique:ft2_users,mobile',
            'verification_code' => 'required',
            'password' => 'required|min:6',
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
        $newUser = new User([
            'nickname' => $data['nickname'],
            'mobile' => $data['mobile'],
            'password' => bcrypt($data['password']),
            'avatar' => $this->getRandomAvatar()
        ]);

        $newUser->save();

        return $newUser;
    }

    protected function getRandomAvatar()
    {
        $avatars = json_decode(Config::get('constants.DEFAULT_AVATARS'), true);

        return $avatars[mt_rand(0, count($avatars) - 1)];
    }
}
