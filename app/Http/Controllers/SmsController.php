<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redis;
use Mockery\CountValidator\Exception;
use Illuminate\Support\Facades\Log;

require app_path().'/Libraries/Ccpsms/CCPRestSmsSDK.php';

class SmsController extends Controller
{
    private $accountSid = '8a48b5515249574b01525360f4d71294';
    private $accountToken = '4843f1bb4b6e41fbb9c242793ae2362c';
    private $appId = '8a48b5515418ae2d015427216e581bb8';
    private $serverIP='app.cloopen.com';
    private $serverPort='8883';
    private $softVersion='2013-12-26';
    private $templateIDS = array(
        'verification_code' => '133284',
//        'verification_code' => '1'
    );
    private $rest;

    public function __construct()
    {
        $this->rest = new \REST($this->serverIP,$this->serverPort,$this->softVersion);
    }

    /**
     * 发送模板短信
     * @param to 手机号码集合,用英文逗号分开
     * @param datas 内容数据 格式为数组 例如：array('Marry','Alon')，如不需替换请填 null
     */
    public function sendVerificationSms($action, $to)
    {
        try {
            //现对手机号进行验证，注册时检查是否已经注册，登陆时检查是否注册
            $user = User::table('ft2_users')->where('mobile', $to)->first();

            if ($action == 'register') {
                if (! empty($user)) {
                    throw new \Exception('该手机号已注册！');
                }
            } elseif ($action == 'login') {
                //现在没有判断
            } else {
                throw new \Exception(Config::get('constants.PARAM_ERROR_MESSAGE'));
            }

            $this->rest->setAccount($this->accountSid,$this->accountToken);
            $this->rest->setAppId($this->appId);

            $verification_code = $this->getRandomNumberString(6);
            $datas = array($verification_code, '1');

            //写入缓存
            Redis::set('ft2_verification_code:'.$to, $verification_code);
            Redis::expire('ft2_verification_code:'.$to, 300);

            // 发送模板短信
            $result = $this->rest->sendTemplateSMS($to,$datas,$this->templateIDS['verification_code']);

            if ($result == NULL OR $result->statusCode!=0) {
                throw new Exception('短信发送失败！');
            }else {
                return response()->success([]);
            }
        }catch (Exception $e) {
            return response()->fail($e->getMessage());
        }

    }

    private function getRandomNumberString($length)
    {
        $str = '';
        $strPol = '0123456789';
        $max = strlen($strPol)-1;

        for ($i=0;$i<$length;$i++){
            $str .= $strPol[mt_rand(0,$max)];
        }

        return $str;
    }

}