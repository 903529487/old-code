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
use Home\Lib\Tool;

class UserController extends ComController
{
    private $user=[];

    public function _initialize(){
        parent::_initialize();
	    $uid = getUid();
	    // echo $uid;
	    // var_dump($uid);
	    // exit;
        //获取用户的基本信息
        is_numeric($uid)?:$this->error('登录已过期',U('Login/login'));
        $field=['uid','uname','gold','silver','tags','sex','mobile','headimg','addr'];
    	$this->user=M('user')->field($field)->where()->limit()->find($uid);
        //将没有值的项变为0
    	foreach ($this->user as $k => &$v) {
    		if (is_null($v)) {
    			$v=0;
    		}
    	}
        $recharge=['recharge'=>intval(random(4,'number'))];
        if (is_array($recharge) && is_array($this->user)) {
        	$this->user +=$recharge;
        }

    	// print_r($_SESSION);
    	// exit;
    }
    public function index()
    {
        // var_dump($this->user);
        // exit;
    	$this->assign("user",$this->user);
        $this->display();
    }
    /**
     * [withdraw_deposit　提现]
     * @return [type] [description]
     */
    public function withdraw_deposit(){
    	$this->display('withdraw');
    }
    /**
     * [myJinBi 我的金币]
     * @param  string $value [description]
     * @return [type]        [description]
     */
    public function myJinBi()
    {
        $this->assign("user",$this->user);
        $this->display();
        # code...
    }
    /**
     * [update_data 更新个人信息]
     * @param  string $value [description]
     * @return [type]        [description]
     */
    public function update_data($value='')
    {
        if (IS_POST) {
            $post=I('post.');
            // var_dump($post);
            // exit;
            try {
                $res=M('user')->data($post)->save();
                if ($res) {
                    $this->success('资料更新成功');
                    exit;
                }
                E('更新失败');
            } catch (\Exception $e) {
                $this->error($e->getMessage());
            }
        }
        $this->assign("user",$this->user);
        $this->display();
    }
    /**
     * [account_set_site 获取地址列表]
     * @return [type] [description]
     */
    public function account_set_site(){
        $field=['s.uid','uname','addr','address_id','consignee','s.mobile','address']  ;
        $site=M('user_address')->where('s.uid = '.$this->user['uid'])
                               ->field($field)
                               ->alias('s')
                               ->join(C('DB_PREFIX')."user u on u.uid = s.uid")
                               // ->fetchSql()
                               ->select();
        $this->assign('site',$site);
        $this->display();
    }
    /**
     * [add_set_site 新增收货地址]
     * @param string $value [description]
     */
    public function add_set_site()
    {
        if (IS_POST) {
            $post=I('post.');
            try {
                if (!is_numeric($post['consignee']) && strlen($post['consignee']) < 2) {
                    E('请正确填写姓名');
                }
                Tool::checkPhone($post['mobile'])?:E('手机格式不正确');
                $ssq=explode(',',$post['ssq']);
                // var_dump($ssq);
                $post['province']=$ssq['0'];
                $post['city']=$ssq['1'];
                $post['district']=$ssq['2']?:'';
                $post['uid']=$this->user['uid'];
                $post['add_time']=$_SERVER['REQUEST_TIME'];
                $res=M('user_address')->data($post)->add();
                if ($res) {
                    $this->success('新增成功');
                    exit;
                }
                E('新增失败');
            } catch (\Exception $e) {
                $this->error($e->getMessage());
            }
        }
        $get=I('get.');
        if(is_numeric($get['aid'])){
            $site=M('user_address')->find($get['aid']);
        }
        $this->assign('site',$site);
        $this->display();
    }
    /**
     * [add_del_site 删除地址]
     */
    public function add_del_site()
    {
        $get=I('get.');
        $res=M('user_address')->delete($get['aid']);
        if ($res) {
            $this->success('删除地址成功');
            exit;
        }
        $this->error('删除地址失败');
    }





}
