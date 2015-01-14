<?php
namespace Home\Controller;
use Think\Controller;
class BmController extends Controller {
	function index(){
		$bm=D('Bm');
		//接收查询的表单数据
		$keywords=$_POST['keywords'];
		$type=$_POST['type'];
		//判断表单是否提交数据
		if(!empty($keywords)&&!empty($type)){
			$where=$type." like '%".$keywords."%'";
			$list=$bm->relation(true)->where($where)->select();
		}else{
			$list=$bm->relation(true)->select();
		}
		$this->assign('ulist',$list);
		$this->display();
	}
	function add(){
		$this->display();
	}
	function edit(){
		$id=$_GET['id'];
		if(!empty($id)){
			 $bm=D('Bm');
			 $data=$bm->getById($id);//动态查询，根据编号查询
			 $this->assign('data',$data);
		}else{
			echo '请选择编辑用户';
			return;
		}
		$this->display();
	}
	function insert(){
		 $bm=D('Bm');
		 if($data=$bm->create()){
			//表单验证成功，要进行数据插入操作
			//dump($bm);
			//获得最新数据的编号，自动增长列
			if(false!==$bm->add()){
				$this->success('新增成功', 'index');
			}else{
				$this->error('新增失败','index');
			}
			//延迟几秒返回到首页
			
		}else{
			//验证失败
		       echo $bm->getError();
		} 
	}
	function update(){
		$bm=D('Bm');
		if($data=$bm->create()){
			if(!empty($data['id'])){
				if(false!==$bm->save()){
					$this->success('更新成功', 'index');
				}else{
					echo  '更新失败'.$bm->getDbError();
				}
				
			}else{
				echo '没有更新用户编号';
			}
		}else{
			echo $bm->getError();
		}
	}
	function delete(){
		$id=$_GET['id'];
		//dump($id);
 		if(!empty($id)){
			$bm=D('Bm');
			$where['id']=$id;
		    if($bm->where($where)->delete()){
			  $this->success('删除成功', '../../index');
	     	}else{
			   echo '删除失败,ID:'.$id.'不存在';
		} 
		}else{
			echo '请选择删除的用户';
			return;
		} 
		$this->display();
	}
}