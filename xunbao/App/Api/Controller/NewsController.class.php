<?php
/**
 *
 * @authors  Ysg (y.shi.guo@gmail.com)
 * @website  http://ysg.bonza.cn
 * @date     2016-09-05 11:48:48
 */

namespace Api\Controller;
use Think\Controller;

class NewsController extends Controller {

    function __construct(){

    }

    /**
     * 用于为后台控制台提供消息接口
     */
    public function index(){
    	$t=$_SERVER['REQUEST_TIME']-3600*0.38;
    	$data=[
    		'msg'=>'success',
    		'news'=>[
	    		[
		    		'pre'=>'时代万网1.0.0.23',
		    		'url'=>'www.agewnet.com',
		    		'title'=>'时代新互联后台系统',
		    		'time'=>date('Y年m月d日 H时i分s秒',$t)
	    		],
	    		[
		    		'pre'=>'时代万网1.0.0.21',
		    		'url'=>'www.agewnet.com',
		    		'title'=>'你好，移动互联网',
		    		'time'=>date('Y年m月d日 H时i分s秒',$t-3600*5.2)
	    		]
    		],
    	];
    	exit(json_encode($data));
    }
}
