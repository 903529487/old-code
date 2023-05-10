<?php
/**
 * @Author: ysg
 * @Date:   2016-07-19 15:59:30
 * @Last Modified by:   ysg
 * @Last Modified time: 2016-08-08 15:37:39
 */
namespace Home\Lib;

class Tool {

    public function __construct()
    {
        # code...
    }
    //校验手机号码格式是否正确
    static public function checkPhone($phone){
        $telRule='/^1[3,7,8,5,4][0-9]{9}$/';
        return preg_match($telRule,$phone);
    }
    //校验用户名格式是否正确,必须以字母开头，至少4位
    static public function checkUserName($username){
        $userRule='/^[a-zA-Z]\w{3,10}$/';
        return preg_match($userRule,$username);
    }
    //校验密码号码格式是否正确
    static public function checkPw($pw){
        //不能出现特殊字符，字母和数字的组合，可以有下划线，最少六位，低于11位
        if (strlen($pw)>5 && strlen($pw)<11) {
            $pwRule='/^[\w]*(([0-9][a-zA-Z])|([a-zA-Z][0-9]))+[\w]*$/';
            return preg_match($pwRule,$pw);
        }
        return false;
    }

    //检查请求来源，$param String $_GET $_POST
    static public function checkRequest($request){
        $request=strtolower($request);
        switch ($request) {
            case 'get':
            if (IS_GET) {
                return true;
            }
            break;
            case 'post':
            if (IS_POST) {
                return true;
            }
            break;
            case 'put':
            if (IS_PUT) {
                return true;
            }
            break;
            case 'delete':
            if (IS_DELETE) {
                return true;
            }
            break;
            case 'ajax':
            if (IS_AJAX) {
                return true;
            }
            break;
            default:
                return false;
            break;
        }
    }

    /**
     * [random 随机数生成器]
     * @param  [INT] $length  [随机数长度]
     * @param  [INT] $numeric [随机数类型]
     * @return [string]          [随机数]
     */
    static public function random($length, $numeric) {
        // PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
        //$numberic=0表示发送字母加数字的验证码否则发送纯数字验证码，$length表示验证码的长度
        if($numeric) {
            $hash = sprintf('%0'.$length.'d', mt_rand(0, pow(10, $length) - 1));
        } else {
            $hash = '';
            $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789abcdefghjkmnpqrstuvwxyz';
            $max = strlen($chars) - 1;
            for($i = 0; $i < $length; $i++) {
                $hash .= $chars[mt_rand(0, $max)];
            }
        }
        return $hash;
    }
    //生成订单号
    static public function createOrderSn(){
        return C('DB_PREFIX').$_SERVER['REQUEST_TIME'].self::random(4,1);
    }
    //获取苹果APP传过来的json数据,本方法只试用于TP的I方法获取的数据
    static public function parseJson($data){
        if(!is_string($data)){
            return false;
        }
        $data=trim(strtolower($data),'&quot;');
        $data=str_replace('&quot;','"',$data);
        $data=str_replace('\\','',$data);
        $data=json_decode($data,true);
        return $data;
    }
    /**
     * 写日志，方便测试
     * 注意：服务器需要开通fopen配置
     * @param $word 要写入日志里的文本内容 默认值：空值
     */
    static public function logResult($word='',$type='alipay') {
        $fp = fopen(APP_PATH.'/Api/Log/'.$type.'finish.txt',"a");
        flock($fp, LOCK_EX) ;
        fwrite($fp,"执行日期：".strftime("%Y%m%d%H%M%S",time())."\n".$word."\n");
        flock($fp, LOCK_UN);
        fclose($fp);
    }
    /**
     * [useCache 使用查询静态缓存]
     * @return [void] [description]
     */
    static public function useCache($time = 7200){
        if (IS_GET) {
            if (IS_CACHE) {
                header('Content-Type:application/json; charset=utf-8');
                $url=ROOT_PATH.ltrim(TEMP_PATH.'Api/'.C('DB_PREFIX').md5($_SERVER['REQUEST_URI']).'.ts','.');
                if (file_exists($url) && ($_SERVER['REQUEST_TIME'] - filemtime($url)) < $time) {
                    readfile($url);
                    exit;
                }
            }
        }
    }




}
