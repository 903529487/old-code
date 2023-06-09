<?php
/**
 *
 * @authors  Ysg (y.shi.guo@gmail.com)
 * @website  http://ysg.bonza.cn
 * @date     2016-09-02 09:58:43
 * 版    本：1.0.3
 * 功能说明：文件上传控制器。
 *
 **/

namespace Admin\Controller;

class UploadController extends ComController
{
    public function index($type = null)
    {

    }

    public function uploadpic()
    {
        $Img = I('Img');
        $Path = null;
        if ($_FILES['img']) {
            $Img = $this->saveimg($_FILES['img']);
        }
        $BackCall = I('BackCall');
        $Width = I('Width');
        $Height = I('Height');
        if (!$BackCall) {
            $Width = $_POST['BackCall'];
        }
        if (!$Width) {
            $Width = $_POST['Width'];
        }
        if (!$Height) {
            $Width = $_POST['Height'];
        }
        $this->assign('Width', $Width);
        $this->assign('BackCall', $BackCall);
        $this->assign('Img', $Img);
        $this->assign('Height', $Height);
        $this->display('Uploadpic');
    }

    private function saveimg($file)
    {
        $uptypes = array(
            'image/jpeg',
            'image/jpg',
            'image/jpeg',
            'image/png',
            'image/pjpeg',
            'image/gif',
            'image/bmp',
            'image/x-png'
        );
        $max_file_size = 2000000;     //上传文件大小限制, 单位BYTE
        $destination_folder = 'Public/attached/' . date('Ym') . '/'; //上传文件路径
        if ($max_file_size < $file["size"]) {
            echo "文件太大!";
            return null;
        }
        if (!in_array($file["type"], $uptypes)) {
            $name = $file["name"];
            $type = $file["type"];
            echo "<script>alert('{$name}文件类型不符!{$type}')</script>";
            return null;
        }
        if (!file_exists($destination_folder)) {
            mkdir($destination_folder);
        }
        $filename = $file["tmp_name"];
        $image_size = getimagesize($filename);
        $pinfo = pathinfo($file["name"]);
        $ftype = $pinfo['extension'];
        //@todo 有可能生成同一个文件名，需要重新优化
        $imgname = date("YmdHis") . rand(0000, 9999) . "." . $ftype;
        $destination = $destination_folder . $imgname;
        if (file_exists($destination)) {
            echo "同名文件已经存在了";
            return null;
        }
        if (!move_uploaded_file($filename, $destination)) {
            return null;
        }
        return "/" . $destination;
    }

    public function batchpic()
    {
        $ImgStr = I('Img');
        $ImgStr = trim($ImgStr, '|');
        $Img = array();
        if (strlen($ImgStr) > 1) {
            $Img = explode('|', $ImgStr);
        }
        $Path = null;
        if ($_FILES['uploadimg']) {
            foreach ($_FILES['uploadimg']['name'] as $key => $value) {
                $fileinfo = array(
                    'name' => $_FILES['uploadimg']['name'][$key],
                    'type' => $_FILES['uploadimg']['type'][$key],
                    'tmp_name' => $_FILES['uploadimg']['tmp_name'][$key],
                    'error' => $_FILES['uploadimg']['error'][$key],
                    'size' => $_FILES['uploadimg']['size'][$key],
                );

                $filename = $this->saveimg($fileinfo);
                if ($filename) {
                    array_push($Img, $filename);
                }


            }
//          $Img=$this->saveimg($_FILES['img']);
        }
        $ImgStr = implode("|", $Img);
        $BackCall = I('BackCall');
        $Width = I('u');
        $Height = I('Height');
        if (!$BackCall) {
            $Width = $_POST['BackCall'];
        }
        if (!$Width) {
            $Width = $_POST['Width'];
        }
        if (!$Height) {
            $Width = $_POST['Height'];
        }
        $this->assign('Width', $Width);
        $this->assign('BackCall', $BackCall);
        $this->assign('ImgStr', $ImgStr);
        $this->assign('Img', $Img);
        $this->assign('Height', $Height);
        $this->display('Batchpic');
    }
}
