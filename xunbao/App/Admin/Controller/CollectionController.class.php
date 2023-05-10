<?php
/**
 *
 * @authors Ysg (y.shi.guo@gmail.com)
 * @date    2016-09-08 10:37:53
 * @version $Id$
 */

namespace Admin\Controller;


class CollectionController extends ComController
{

    public function index()
    {
        $this->add();
    }
    public function add($value='')
    {
    	//取得所有的场景列表
    	$scene=M('scene')->field(['scene_name','scene_id'])->select();
    	$this->assign('scene',$scene);
    	$this->display('form');
    }
    public function update (){
    	$post=I('post.');
    	// print_r($post);
    	// exit;
    	try {
    		$data['sid']=is_numeric($post['scene'])?$post['scene']:E('未知错误');
    		$data['category']=$post['category'];
    		$data['type']=$post['type'];
    		$data['name']=$post['name'];
    		$data['sn']='xb_'.$_SERVER['REQUEST_TIME'].mt_rand(1000,9999);
    		$data['is_sale']=$post['is_sale'];
    		$data['price']=is_numeric($post['price'])?$post['price']:E('价格必须是数字');
    		$data['img']=$post['thumbnail'];
    		$data['o']=is_numeric($post['order'])?$post['order']:E('排序必须是数字');
    		$data['add_time']=$_SERVER['REQUEST_TIME'];

	    	if (isset($post['id']) && is_numeric($post['id']) && !empty($post['id'])) {
		    	$res=M('collection')->data($data)->where('id = '.$post['id'])->save();
		    	if ($res){
		    		$this->success('修改成功',U('clist'),3);
		    		exit;
		    	}else{
		    		E('没有修改任何内容');
		    	}
	    	}else{
	    		$res=M('collection')->data($data)->add();
	    		if ($res) {
	    			$this->success('添加藏品成功');
	    			exit;
	    		}else{
	    			E('添加失败');
	    		}
	    	}
    	} catch (\Think\Exception $e) {
			$this->error('提示: '.$e->getMessage());
    	}
    }
    /**
     * [clist 藏品列表]
     * @return [type] [description]
     */
    public function clist(){
    	$coll=M('collection')->order('o')->select();
    	$this->assign('coll',$coll);
    	$this->display('index');
    }
    /**
     * [del 删除藏品]
     * @param  string $value [description]
     * @return [mixed]        [无返回]
     */
    public function del($value='')
    {
    	$get=I('get.');
    	try {
    		if (IS_GET) {
	    		if (isset($get['ids']) && is_numeric($get['ids'])) {
	    			$res=M('collection')->delete($get['ids']);
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
	    			$res=M('collection')->delete($deldata);
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
	    		$coll=M('collection')->find($get['id']);
	    		$sname=M('scene')->field(['scene_name'])->find($coll['sid']);
	    		$coll += $sname;
		    	$this->assign('coll',$coll);
	    	}
		} catch (\Exception $e) {
			$this->error('提示: '.$e->getMessage());
		}
        $this->display('form');
    }







}
