<?php
/**
 *
 * @authors  Ysg (y.shi.guo@gmail.com)
 * @website  http://ysg.bonza.cn
 * @date     2016-09-02 09:58:43
 * 版    本：1.0.0
 * 功能说明：升级控制器。
 *
 **/

namespace Admin\Controller;

class CacheController extends ComController
{

    //清除缓存
    public function clear()
    {
        $this->rmdirr(RUNTIME_PATH);
        $this->success('系统缓存清除成功！');
    }

    /**
     * [rmdirr 递归删除缓存信息]
     * @param  [string] $dirname [文件夹路径]
     * @return [boolean]         [返回值]
     */
    private function rmdirr($dirname)
    {
        //判断路径是否存在，不存在返回false
        if (!file_exists($dirname)) {
            return false;
        }
        //如果是文件或者链接直接删除
        if (is_file($dirname) || is_link($dirname)) {
            return unlink($dirname);
        }
        //遍历文件夹
        $dir = dir($dirname);
        if ($dir) {
            while (false !== $entry = $dir->read()) {
                if ($entry == '.' || $entry == '..') {
                    continue;
                }
                //递归
                $this->rmdirr($dirname . DIRECTORY_SEPARATOR . $entry);
            }
        }
        $dir->close();
        return rmdir($dirname);
    }

}
