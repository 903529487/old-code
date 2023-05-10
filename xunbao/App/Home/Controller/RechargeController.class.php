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


class RechargeController extends ComController
{
    public function index()
    {
        $this->display('user');
    }
    public function add(){
    	echo "string";
    }
}
