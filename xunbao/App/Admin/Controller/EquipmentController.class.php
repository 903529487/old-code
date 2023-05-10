<?php
/**
 *
 * 版权所有：时代万网<ysg@bonza.cn>
 * 作    者：Ysg<ysg@bonza.cn>
 * 日    期：2016-09-19
 * 版    本：1.0.0
 * 功能说明：前台控制器首页。
 *
 **/
namespace Admin\Controller;

class EquipmentController extends ComController{
	public function index()
	{
		$this->elist();
	}
	public function add($value='')
	{
    	//取得所有的场景列表
		$equipment=M('equipment')->field(['e_name','e_id'])->select();
		$this->assign('equipment',$equipment);
		$this->display('form');
	}
	public function update (){
		$post=I('post.');
    	// print_r($post);
    	// exit;
		try {
			$data['e_name']=$post['name'];
			$data['e_status']=$post['e_status'];
			$data['e_price']=is_numeric($post['price'])?$post['price']:E('价格必须是数字');
			$data['e_img']=$post['thumbnail'];
			$data['o']=is_numeric($post['order'])?$post['order']:E('排序必须是数字');
			$data['add_time']=$_SERVER['REQUEST_TIME'];

			if (isset($post['id']) && is_numeric($post['id']) && !empty($post['id'])) {
				$res=M('equipment')->data($data)->where('e_id = '.$post['id'])->save();
				if ($res){
					$this->success('修改成功',U('elist'),3);
					exit;
				}else{
					E('没有修改任何内容');
				}
			}else{
				$res=M('equipment')->data($data)->add();
				if ($res) {
					$this->success('添加装备成功',U('elist'),3);
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
     * [elist 装备列表]
     * @return [type] [description]
     */
    public function elist(){
    	$equipment=M('equipment')->order('o')->select();
    	$this->assign('equipment',$equipment);
    	$this->display('index');
    }
    /**
     * [del 删除装备]
     * @param  string $value [description]
     * @return [mixed]        [无返回]
     */
    public function del($value='')
    {
    	$get=I('get.');
    	try {
    		if (IS_GET) {
    			if (isset($get['ids']) && is_numeric($get['ids'])) {
    				$res=M('equipment')->delete($get['ids']);
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
    				$res=M('equipment')->delete($deldata);
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
    			$equipment=M('equipment')->find($get['id']);
    			// $sname=M('equipment')->field(['e_name'])->find($equipment['e_id']);
    			// $equipment += $sname;
    			$this->assign('equipment',$equipment);
    		}
    	} catch (\Exception $e) {
    		$this->error('提示: '.$e->getMessage());
    	}
    	$this->display('form');
    }
}
