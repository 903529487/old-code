<?php
/**
 *
 * @authors  Ysg (y.shi.guo@gmail.com)
 * @website  http://ysg.bonza.cn
 * @date     2016-09-02 09:58:43
 * 版    本： 1.0.0
 * 功能说明：管理后台模块公共控制器，用于储存公共数据。
 *
 **/

namespace Common\Controller;

use Think\Controller;

class BaseController extends Controller
{
    public function _initialize()
    {
        C(setting());
    }
}
