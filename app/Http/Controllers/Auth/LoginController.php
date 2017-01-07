<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle a login request to the application.
     * 手机号密码登陆
     * @param  \Illuminate\Http\Request  $request
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        $message = '登录失败！';

        return $this->sendFailedLoginResponse($message);
    }

    /**
     * 手机号验证码快捷登陆
     * @param Request $request
     */
    public function quickLogin(Request $request)
    {
        $this->validateQuickLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        //先验证验证码是否正确
        if ($this->checkVerificationCode($request->input('mobile'), $request->input('verification_code'))) {
            //检查是否为系统用户
            if ($this->attemptQuickLogin($request)) {
                return $this->sendLoginResponse($request);
            } else {
                //如果是活动用户，在本系统创建用户，并引导填写补充信息
                if ($this->isActivityUser($request->input('mobile'))) {
                    $user = $this->create($request->input('mobile'));
                    $this->guard()->login($user);

                    return response()->success([
                        'redirect' => '/user/supplementary_information'
                    ]);
                } else {
                    $message = '该手机号未注册！';
                    return $this->sendFailedLoginResponse($message);
                }
            }
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        $message = '验证码错误！';
        return $this->sendFailedLoginResponse($message);
    }

    protected function isUser($mobile)
    {
        $user = User::where('mobile', $mobile)->first();

        return empty($user) ? false : true;
    }

    protected function isActivityUser($mobile)
    {
        //肺腾活动系统user表，线上环境部署在同一个数据库
        $user = DB::table('users')->where('mobile', $mobile)->first();

        return empty($user) ? false : true;
    }

    protected function checkVerificationCode($mobile, $verificationCode) {
//        return TRUE;
        $rVerificationCode = Redis::get('ft2_verification_code:'.$mobile);

        return ($verificationCode == $rVerificationCode);
    }

    protected function create($mobile)
    {
        return User::create([
            'mobile' => $mobile,
            'avatar' => $this->getRandomAvatar()
        ]);
    }

    protected function getRandomAvatar()
    {
        $avatars = json_decode(Config::get('constants.DEFAULT_AVATARS'), true);

        return $avatars[mt_rand(0, count($avatars) - 1)];
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required', 'password' => 'required',
        ]);
    }

    protected function validateQuickLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required', 'verification_code' => 'required',
        ]);
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        $credentials = $this->credentials($request);
        $credentials['disabled'] = 0;  //用户不能为禁用状态

        //标记remember_token
        return $this->guard()->attempt(
            $credentials, TRUE
        );
    }

    protected function attemptQuickLogin(Request $request)
    {
        $credentials = $request->only($this->username());
        $credentials['disabled'] = 0;  //用户不能为禁用状态

        return $this->guard()->attempt(
            $credentials, TRUE    //标记remember_token
        );
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return $this->authenticated($request, $this->guard()->user());
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        //如果未填写基本信息，引导填写基本信息
        if ($user->information_filled == 0) {
            return response()->success([
                'redirect' => '/user/basic_information'
            ]);
        } else {
            return response()->success([
                'redirect' => '/home'
            ]);
        }
    }

    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  String $message
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendFailedLoginResponse($message)
    {
        return response()->fail($message);
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'mobile';
    }

    /**
     * Log the user out of the application.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('/');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }
}
