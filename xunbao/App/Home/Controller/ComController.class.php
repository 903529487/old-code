<?php
/**
 *
 * @authors  Ysg (y.shi.guo@gmail.com)
 * @website  http://ysg.bonza.cn
 * @date     2016-09-02 09:58:43
 * 版    本：1.0.0
 * 功能说明：前台公用控制器。
 *
 **/

namespace Home\Controller;

use Common\Controller\BaseController;
use Think\Auth;

class ComController extends BaseController
{
    public $USER;

    public function _initialize()
    {

        C(setting());
        if (!C("COOKIE_SALT")) {
            $this->error('请配置COOKIE_SALT信息');
        }
        /**
         * 不需要登录控制器
         */
        if (in_array(CONTROLLER_NAME, array("Login",'Index'))) {
            return true;
        }
        //检测是否登录
        $flag =  $this->check_login();
        $url = U("Login/index");
        if (!$flag) {
            header("Location: {$url}");
            exit(0);
        }

}
/**
 * [check_login 检查是否登陆]
 * @return [type] [description]
 */
public function check_login(){
    session_start();
    $flag = false;
    $salt = C("COOKIE_SALT");
    $ip = get_client_ip();
    $ua = $_SERVER['HTTP_USER_AGENT'];
    //获取前台登陆cookie
    $auth = cookie('hauth');

    $sname=md5('xb'.$ip.$_SERVER['HTTP_USER_AGENT']);
    $uid = session($sname);
    if ($uid) {
        $user = M('user')->where(array('uid' => $uid))->find();
        // var_dump($user);
        // exit;
        if ($user) {
            if ($auth   ==  password($uid.$user['uname'].$ip.$ua.$salt)) {
                $flag = true;
                $this->USER = $user;
            }
        }
    }
    return $flag;
}
}
