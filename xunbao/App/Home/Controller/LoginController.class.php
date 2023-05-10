<?php
/**
 *
 * 版权所有：时代万网<ysg@bonza.cn>
 * 作    者：Ysg<ysg@bonza.cn>
 * 日    期：2016-01-21
 * 版    本：1.0.0
 * 功能说明：前台控制器演示。
 *
 **/
namespace Home\Controller;

use Home\Lib\Tool,
    Home\Lib\Sms,
    Home\Lib\Redis;


class LoginController extends ComController
{
	public function index()
	{
        $flag=$this->check_login();
        if ($flag) {
            $this->success('您已登陆','',1);
            return;
            // exit("hhhhh");
        }
		$this->login();
	}
	public function add(){
		echo "string";
	}
    /**
     * [login 登陆控制]
     * @return [type] [description]
     */
    public function login(){
    	try {
    		if (IS_POST) {
    			$post=I('post.');
    			$condition['mobile']=['eq',trim($post['uname'])];
    			$condition['uname']=['eq',trim($post['uname'])];
    			$condition['_logic']='or';
    			$map['_complex']=$condition;
    			$map['passwd']=password(trim($post['passwd']));

                $user=M('user');
    			$res=$user->where($map)->find();
    			// var_dump($res);
    			// exit;
    			if ($res) {
    				if(!isset($_SESSION)){
    					session_start();
    				}
    				$ip=get_client_ip();
    				$sname=md5('xb'.$ip.$_SERVER['HTTP_USER_AGENT']);
    				session($sname,$res['uid']);

		            $salt = C("COOKIE_SALT");
		            $ua = $_SERVER['HTTP_USER_AGENT'];
		            $auth = password($res['uid'].$res['uname'].$ip.$ua.$salt);
		            //设置前台cookie
	                cookie('hauth', $auth, 3600 * 24);//记住我

                    //修改最后登陆时间和ＩＰ
                    $user->where('uid ='.$res['uid'])->setField(['last_login'=>$_SERVER['REQUEST_TIME'],'last_ip'=>$ip]);

	                // print_r($_COOKIE);
	                // echo "</br>";
	                // print_r($_SESSION);
	                // echo $_SERVER['HTTP_USER_AGENT'];
	                // exit;
    				$this->success('登陆成功',U('Index/index'));
    				exit;
    			}
    			E('登陆失败，请检查用户名密码是否正确');
    		}
    	} catch (\Exception $e) {
    		$this->error($e->getMessage());
    	}
    	$this->display('login');
    }
    /**
     * [register 注册控制]
     * @return [type] [description]
     */
    public function register(){
    	try {
            if (IS_AJAX) {
                exit(json_encode(['a'=>'非法请求']));
            }
            if (IS_POST) {
                if(!isset($_SESSION)){
                    session_start();
                }
                $post=I('post.');
                $data=[];
                $post['service']=='checked'?:E('请先同意服务协议');
                Tool::checkPhone($post['mobile'])?:E('请输入正确的手机号');
                $mobile=$post['mobile'];
                !$this->verfiyMobile($mobile)?:E('用户已存在');
                $redis=Redis::getInstance();
                if (trim($post['verfiy']) !== $redis->get($mobile)) {
                    E('验证码错误');
                }
                $post['secret']===$post['resecret']?:E('两次密码必须一致');
                // trim($post['verfiy'])==session($mobile)?:E('验证码错误');
                Tool::checkPw($post['secret'])?:E('密码为数字字符的组合，至少６位');
                //效验用户是否存在
                $data['passwd']=password($post['secret']);
                $data['mobile']=$post['mobile'];
                $data['gold']=10;
                $data['silver']=100;
                $data['reg_time']=$_SERVER['REQUEST_TIME'];
                $res=M('user')->data($data)->add();
                $res?$this->success('注册成功！',U('Login/login')):E('注册失败');
            }
        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }
        $this->display();
    }
    //校验手机号码是否已经注册
    private function verfiyMobile($mobile){
        Tool::checkPhone($mobile)?:$this->error('手机号格式不正确');
        $m=M('user')->where('mobile = '.$mobile)->find();
        if ($m) {
            return true;
        }
        return false;
    }
    //发送验证码
    public function verfiy($value='')
    {
        $post=I('post.');
        try{
            Tool::checkPhone($post['mobile'])?:E('请输入正确的手机号');
            $mobile=$post['mobile'];
            !$this->verfiyMobile($mobile)?:E('用户已存在');
            $sms=new Sms();
            $a=$sms->send($sms->sms_data['yzm'],$mobile);
            $a=str_replace(PHP_EOL,',',$a);
            $a=explode(',',$a);
            $b=['sms_a'=>$a[0],'sms_b'=>$a[1],'sms_c'=>$a[2]];
            $code=$sms->getCode();
            //使用Redis存储验证码
            $redis=Redis::getInstance();
            $redis->set($mobile,$code,120);

            $this->ajaxReturn($b);
        }catch (\Exception $e) {
            $this->ajaxReturn($e->getMessage());
        }
    }




}
