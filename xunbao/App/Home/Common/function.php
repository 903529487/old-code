<?php
/**
 * 增加日志
 * @param $log
 * @param bool $name
 */

function addlog($log, $name = false)
{
    $Model = M('log');
    if (!$name) {
        session_start();
        $uid = session('uid');
        if ($uid) {
            $user = M('member')->field('user')->where(array('uid' => $uid))->find();
            $data['name'] = $user['user'];
        } else {
            $data['name'] = '';
        }
    } else {
        $data['name'] = $name;
    }
    $data['t'] = time();
    $data['ip'] = $_SERVER["REMOTE_ADDR"];
    $data['log'] = $log;
    $Model->data($data)->add();
}


/**
 *
 * 获取用户信息
 *
 **/
function member($uid    , $field = false)
{
    $model = M('user');
    if ($field) {
        return $model->field($field)->where(array('uid' => $uid))->find();
    } else {
        return $model->where(array('uid' => $uid))->find();
    }
}
/**
 * [getUid 获取已经登陆的用户ID]
 * @return [int] [UID]
 */
function getUid(){
    $ip=get_client_ip();
    $sname=md5('xb'.$ip.$_SERVER['HTTP_USER_AGENT']);
    if(!isset($_SESSION)){
        session_start();
    }
    $uid = intval(session($sname));
    return $uid;
}
