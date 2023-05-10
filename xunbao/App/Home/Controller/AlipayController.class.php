<?php
/**
 *
 * @authors Ysg (y.shi.guo@gmail.com)
 * @date    2016-09-24 16:08:44
 * @version $Id$
 */
namespace Home\Controller;

class AlipayController extends ComController {

    public function _initialize(){
        // Vendor('Alipay.lib.Alipay_submit');
        // Vendor('Alipay.lib.Alipay_core');
        // Vendor('Alipay.lib.Alipay_rsa');
        // Vendor('Alipay.lib.Alipay_notify');
    }
	public function index(){
		// echo "string";
		require VENDOR_PATH.'Alipay/'.'index.php';
	}
	public function alipayapi(){
		require VENDOR_PATH.'Alipay/'.'alipayapi.php';
	}
	//异步通知
	public function notify_url($value='')
	{
		# code...
	}
	//同步通知
	public function return_url($value='')
	{
		# code...
	}
}
