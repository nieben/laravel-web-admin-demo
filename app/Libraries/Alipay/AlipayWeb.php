<?php
/**
 * Created by PhpStorm.
 * User: bnie
 * Date: 2016/7/28
 * Time: 11:17
 */

class AlipayWeb {

    private $alipayPublicKey = '-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDDI6d306Q8fIfCOaTXyiUeJHkr
IvYISRcc73s3vF1ZT7XN8RNPwJxo8pWaJMmvyTn9N4HQ632qJBVHf8sxHi/fEsra
prwCtzvzQETrNRwVxLO5jVmRGi60j8Ue1efIlzPXV9je9mkjzOmdssymZkh2QhUr
CmZYI/FCEa3/cNMW0QIDAQAB
-----END PUBLIC KEY-----
';

    public function verify_notify($post) {
        if(empty($post) OR !isset($post['sign']) OR !isset($post['sign_type'])) {//判断POST来的数组是否为空
            return false;
        }

        //生成签名结果
        $is_sign = $this->get_sign_veryfy($post, $post["sign"], $post['sign_type']);

        //验证
        //$responsetTxt的结果不是true，与服务器设置问题、合作身份者ID、notify_id一分钟失效有关
        //isSign的结果不是true，与安全校验码、请求时的参数格式（如：带自定义参数等）、编码格式有关
        if ($is_sign) {
            return true;
        } else {
            return false;
        }
    }

    private function get_sign_veryfy($para_temp, $sign, $sign_type) {
        //除去待签名参数数组中的空值和签名参数
        $para_filter = $this->para_filter($para_temp);

        //对待签名参数数组排序
        $para_sort = $this->arg_sort($para_filter);

        //把数组所有元素，按照“参数=参数值”的模式用“&”字符拼接成字符串
        //$prestr = $this->create_link_string_without_quotes($para_sort);
        $prestr = urldecode(http_build_query($para_sort));

        $is_sgin = false;
        switch (strtoupper(trim($sign_type))) {
            case "RSA" :
                $is_sgin = $this->rsa_verify($prestr, $this->alipayPublicKey, $sign);
                break;
            default :
                $is_sgin = false;
        }

        return $is_sgin;
    }

    /**
     * 除去数组中的空值和签名参数
     * @param $para 签名参数组
     * return 去掉空值与签名参数后的新签名参数组
     */
    private function para_filter($para) {
        $para_filter = array();
        while (list ($key, $val) = each ($para)) {
            if($key == "sign" || $key == "sign_type" || $val == "")continue;
            else	$para_filter[$key] = $para[$key];
        }
        return $para_filter;
    }

    /**
     * 对数组排序
     * @param $para 排序前的数组
     * return 排序后的数组
     */
    private function arg_sort($para) {
        ksort($para);
        reset($para);
        return $para;
    }

    /**
     * RSA验签
     * @param $data 待签名数据
     * @param $ali_public_key 支付宝的公钥
     * @param $sign 要校对的的签名结果
     * return 验证结果
     */
    private function rsa_verify($data, $ali_public_key, $sign)  {
        $res = openssl_get_publickey($ali_public_key);
        $result = (bool)openssl_verify($data, base64_decode($sign), $res);
        var_dump($data);
        var_dump($result);
        openssl_free_key($res);
        return $result;
    }

}