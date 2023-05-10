<?php
/**
 *
 * @authors Ysg (y.shi.guo@gmail.com)
 * @date    2016-09-08 10:37:53
 * @version $Id$
 */
namespace Admin\Controller;

use   Think\Upload;


class SceneController extends ComController{


    public function index($value='')
    {
    	$this->slist();
    }
    /**
     * [add　添加场景]
     * @param string $value [description]
     */
    public function add($value='')
    {
    	$uid=session('uid')?:$this->error('请先登录!');
    	$member['uid']=$uid;
    	if (IS_POST) {
	    	try {
	    	$post=I('post.');
	    	// var_dump($post);
	    	// exit;
			$data['scene_id']   =isset($post['id'])?intval($post['id']):E('似乎有错误发生');
			$data['scene_name'] =!empty($post['sname']) && strlen($post['sname']) >2 ?$post['sname']:E('场景名称必填并且大于２个字符');
			$data['o']      =isset($post['order']) && is_numeric($post['order'])?$post['order']:20;
			$data['is_display'] =$post['isdisplay']?intval($post['isdisplay']):0;
			$data['scene_img']  =isset($post['simg'])?$post['simg']:'';
			$data['uid']        =isset($post['uid'])?$post['uid']:E('请登录后操作');
			$data['add_time']   =$_SERVER['REQUEST_TIME'];
	    	// header('charset:utf8');
	    	// echo $data['scene_id'];
		    		$res='';
		    		//如果有ＩＤ就表示更新数据，显示定义更新
			    	if (isset($post['id']) && is_numeric($post['id']) && !empty($post['id'])) {
				    	$res=M('scene')->data($data)->where('scene_id = '.$post['id'])->save();
				    	if ($res){
				    		$this->success('修改成功',U('slist'),3);
				    		exit;
				    	}else{
				    		E('没有修改任何内容');
				    	}
					}else{
				    	$res=M('scene')->data($data)->add();
				    	if ($res){
				    		$this->success('添加成功',U('slist'),3);
				    		exit;
				    	}else{
				    		E('没有添加任何内容');
				    	}
					}
	    	} catch (\Exception $e) {
	    		$this->error('提示:'.$e->getMessage());
	    	}
    	}
    	$this->assign('member',$member);
        $this->display('form');
    }
    /**
     * [list 场景列表]
     * @param  string $value [description]
     * @return [type]        [description]
     */
    public function slist($value='')
    {
    	$scene=M('scene')->order('o')->page(1,10)->select();
    	$this->assign('list',$scene);
        $this->display('index');
    	# code...
    }
    /**
     * [edit 编辑场景]
     * @param  string $value [description]
     * @return [type]        [description]
     */
    public function edit($value='')
    {
		try {
	    	$get=I('get.');
	    	if (isset($get['id']) && is_numeric($get['id'])) {
	    		$scene=M('scene')->find($get['id']);
		    	$this->assign('scene',$scene);
	    	}
		} catch (\Exception $e) {
			$this->error('提示: '.$e->getMessage());
		}
        $this->display('form');
    }
    /**
     * [del 删除场景]
     * @param  string $value [description]
     * @return [mixed]        [无返回]
     */
    public function del($value='')
    {
    	$get=I('get.');
    	try {
    		if (IS_GET) {
	    		if (isset($get['ids']) && is_numeric($get['ids'])) {
	    			$res=M('scene')->delete($get['ids']);
	    			if ($res) {
	    				$this->success('删除成功');
	    			}else{
	    				E('删除失败');
	    			}
	    		}
    		}elseif(IS_POST){
		    	$post=I('post.');
		    	if (!empty($post) && is_array($post)) {
		    		$deldata=implode(',',$post['ids']);
		    		// echo $deldata;
	    			$res=M('scene')->delete($deldata);
	    			if ($res) {
	    				$this->success('删除成功');
	    			}else{
	    				E('删除失败');
	    			}
		    	}
    		}else{
    			E('未知错误');
    		}
    	} catch (\Exception $e) {
    		$this->error('提示: '.$e->getMessage());
    	}
    }
}
