<?php
/**
 * @authors  Ysg (y.shi.guo@gmail.com)
 * @website  http://ysg.bonza.cn
 * @date     2016-09-02 09:58:43
 * 版    本：1.0.0
 * 功能说明：用户反馈。
 *
 **/

namespace Admin\Controller;

class FacebookController extends ComController
{

    //新增
    public function add($act = null)
    {

        if ($act) {
            $data['content'] = I('post.content', '', 'strip_tags');
            if ($data['content'] == '') {
                $this->error('反馈内容不能为空！');
            }
            $data['v'] = THINK_VERSION;
            $data['url'] = $_SERVER['SERVER_NAME'];

            // $url = "http://ysg.bonza.cn/index.php/api/facebook/add";
            $url = C('INTERFACE_URL_AUTHOR');
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            $r = curl_exec($ch);
            try {
                if (!empty($r)) {
                    $res=json_decode($r,true);
                    if ($res['code'] == 'ok') {
                        $this->success('感谢您的反馈！');
                        exit(0);
                    }
                }
                E('系统错误，请稍后再试！');
            } catch (\Exception $e) {
                $this->error($e->getMessage());
            }
        }

        $this->display();
    }
}
