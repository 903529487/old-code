<?php
/**
 *
 * @authors Ysg (y.shi.guo@gmail.com)
 * @date    2016-09-10 13:39:34
 * @version $Id$
 */

/**
 * 网站帮助控制器
 */
namespace Home\Controller;


class HelpController extends ComController
{
    public function index()
    {
        $this->display('Index/index');
    }
    public function login(){
    	echo "string";
        $this->display();
    }
}
