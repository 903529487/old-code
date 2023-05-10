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


class TreasureController extends ComController
{
    public function index()
    {
    	//获取装备列表
    	$xzzb=M('equipment')->field()->order('o')->where()->limit()->select();
    	//获取藏品列表
    	$cp=M('collection')->field(['id,name,price'])->order()->where()->limit()->select();
    	//获取用户信息
    	$uid=getUid();
    	$udata=M('user')->field(['gold','silver'])->order()->where()->limit()->find($uid);
    	foreach ($udata as $k => &$v) {
    		if (is_null($v)) {
    			$v=0;
    		}
    		if(empty($v)){
    			$v='';
    		}
    	}
    	// var_dump($udata);
    	// exit;
    	$this->assign("cp",$cp);
    	$this->assign("udata",$udata);
    	$this->assign("xzzb",$xzzb);
        $this->display('index');
    }
    public function add(){
    	echo "string";
    }
    /**
     * [updateBi 实时修改用户数据]
     * @param  string $value [description]
     * @return [type]        [description]
     */
    public function updateBi($value='')
    {
    	$post=I('post.');
    	// var_dump($post);
    	// exit;
		$bi=str_replace('银币','',$post['bi']);
		try{
			$uid=getUid();
			$res=M('user')->where("uid = ".$uid)->setDec('silver',$bi);
			if ($res) {
		    	exit($this->ajaxReturn($bi));
			}
			E('网络错误');
		}
		catch(\Exception $e){
			exit($this->ajaxReturn($e->getMessage()));
		}
    }
}
