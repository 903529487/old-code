<?php
/**
 * @Author: anchen
 * @Date:   2016-07-11 10:24:22
 * @Last Modified by:   ysg
 * @Last Modified time: 2016-07-23 09:01:52
 */


namespace Home\Lib;

/**
* 短信发送类
*/
class Sms
{
    const  TARGET='http://send.18sms.com/msg/HttpBatchSendSM';
    private $code='';
    // private $sms_account='lu15167119944';
    private $sms_account='7g9z2j';
    // private $sms_pw='Sy123456';
    private $sms_pw='9VxU04o6';
    private $content='';
    public  $sms_data=[
        'yzm'=>'您的验证码是:',
    ];

    public function __construct($length = 6 , $numeric = 1)
    {
        $this->code=self::random($length,$numeric);
        // echo $numeric.'---';
    }
    //生产验证码
    static private function random($length, $numeric) {
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
    //获取验证码
    public function getCode(){
        return $this->code;
    }
    //创建发送数据
    private function createData($mobile)
    {
        $post_data = array();
        $post_data['account'] = $this->sms_account;   //帐号
        $post_data['pswd'] = $this->sms_pw;  //密码
        $post_data['msg'] =urlencode($this->content.$this->code); //短信内容需要用urlencode编码下
        $post_data['mobile'] = $mobile; //手机号码， 多个用英文状态下的 , 隔开
        $post_data['product'] = ''; //产品ID  不需要填写
        $post_data['needstatus']='true'; //是否需要状态报告，需要true，不需要false
        $post_data['extno']='';  //扩展码   不用填写
        $o='';
        foreach ($post_data as $k=>$v)
        {
            $o.="$k=".urlencode($v).'&';
        }
        $post_data=substr($o,0,-1);
        return $post_data;
    }
    //发送验证码
    public function send($content,$mobile){
        $this->content=$content;
        $post_data=$this->createData($mobile);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_URL,self::TARGET);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // 如果需要将结果直接返回到变量里，那加上这句
        $result = curl_exec($ch);
        return $result;
    }


}
