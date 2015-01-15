<?php
namespace Home\Controller;
use Think\Controller;
class YgController extends Controller {
	
	 function index(){
		 $yg=D('Yg');
		$keywords=$_GET['keywords'];
		$type=$_GET['type'];
		//$p=getpage($yg,$where,3);
		if(!empty($keywords)&&!empty($type)){
			$where=$type." like '%".$keywords."%'";
			//$where=$type."=".$keywords;
			//$where=[$type]=$keywords;
			//$where[$type]=array('like',"%".$keywords."%");
			$count=$yg->where($where)->count();
			$Page=new \Think\Page($count,5,I("param."));
			$page = $Page->show();
			$list=$yg->where($where)->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		    foreach($list as $key=>$val) { 
                            $Page->parameter .= "$key=".urlencode($val).'&';
							//dump($key);
							//dump($val);
            }
			
			 $this->assign('ulist', $list);
             $this->assign('page', $page);
             $this->display();	   
			//$list=$yg->where($where)->select();
		}else{
			$count  = $yg->count();    //计算总数
			$Page = new \Think\Page($count,5);
			$list=$yg->limit($Page->firstRow. ',' . $Page->listRows)->order('id desc')->select();
			$page = $Page->show();
            $this->assign('page', $page);
            $this->assign('ulist', $list);
            $this->display();
		}
		//$data=$User->where($where)->select();
		//$user->count();$user->max();
		//$this->assign('ulist',$list);
	   // $this->display(); 
       // $Form   = D('Yg');
        //$list =$Form->limit($Page->firstRow. ',' . $Page->listRows)->order('id desc')->select();
        // 模拟设置分页额外传入的参数
        //$Page->parameter    =   '';
		//$page->parameter =   array_map('urlencode',$parpams);
	 }

	function add(){
	   $bm=D('Bm');
	   $list=$bm->select();
	   $this->assign('ulist',$list);
	   //$this->check_verify(strtolower($verifycode));
	   $this->display();
	}
	function edit(){
		$id=$_GET['id'];
		if(!empty($id)){
			 $bm=D('Bm');
	         $list=$bm->select();
	         $this->assign('ulist',$list);
			 $yg=D('Yg');
			 $data=$yg->getById($id);//动态查询，根据编号查询
			 $this->assign('data',$data);
		}else{
			echo '请选择编辑用户';
			return;
		}
		$this->display();
	}
	
	function delete(){
		$id=$_GET['id'];
		//dump($id);
 		if(!empty($id)){
			$yg=D('Yg');
			$where['id']=$id;
		    if($yg->where($where)->delete()){
			  $this->success('删除成功','../../index');
	     	}else{
			   echo '删除失败,ID不存在';
		} 
		}else{
			echo '请选择删除的用户';
			return;
		} 
	}
	function insert(){
	  $yg=D('Yg');
      
		 if($data=$yg->create()){
			//表单验证成功，要进行数据插入操作
			//dump($yg);
			//获得最新数据的编号，自动增长列
			if(false!==$yg->add()){
				$ygid=$yg->getLastInsID();
				$this->success('新增成功', 'index');
			}else{
				$this->error('新增失败','index');
			}
			//延迟几秒返回到首页
			
		}else{
			//验证失败
		       echo $yg->getError();
		} 
	}
	function update(){
		$yg=D('Yg');
		if($data=$yg->create()){
			if(!empty($data['id'])){
				if(false!==$yg->save()){
					$this->success('更新成功', 'index');
				}else{
					echo  '更新失败'.$yg->getDbError();
				}
				
			}else{
				echo '没有更新用户编号';
			}
		}else{
			echo $yg->getError();
		}
	}
	function upimg(){
		$id=$_GET['id'];
		$yg=D(Yg);
		$params=$yg->getById($id);
		dump($params);
       // $this->display();
	}
	 public function upload() {
        if (!empty($_FILES)) {
            //如果有文件上传 上传附件
            $this->_upload();
        }
    }
    // 文件上传
    protected function _upload() {
		$params=$_GET['params'];
	    dump($_GET['params']);
		$yg=D('Yg');
		$paramss=$yg->getByParams($params);
        $upload = new \Think\Upload();
        //设置上传文件大小
        $upload->maxSize            = 3292200;
        //设置上传文件类型
        $upload->exts          = array('jpg','gif','png','jpeg');
        //设置附件上传根目录
        $upload->rootPath           = './Upload/';
		//试着附件上传子目录
		$upload->savePath       = '';
		//上传文件保存规则，支持数组合字符串方式定义
		$upload->saveName=array('uniqid','');
		//自动使用子目录保存上传文件 默认为true
		$upload->autoSub     =true;
		//子目录创建方式，采用数组或者字符串方式定义
		$upload->subName     =array('date','Ymd');
		
        //上传文件
		$info           =  $upload->upload();
        $model  = M('Photo');
        //保存当前数据对象
		
        $data['image'] = $info['image']['savename'];
        $data['createtime']    = NOW_TIME;
		$model->add($data);
		$image=new \Think\Image();
		//dump('./Upload/'.$info['image']['savepath'].$info['image']['savename']);
        $image->open('./Upload/'.$info['image']['savepath'].$info['image']['savename']);
		$image->thumb(150,150)->save('./Upload/'.$info['image']['savepath'].$info['image']['savename']);
		$paramss['params']=$image;
		$yg->save($paramss);
         /* if ($list !== false) {
            $this->success('上传图片成功！','../index');
        } else {
            $this->error('上传图片失败!');
        }  */
    }
	public function selfverify(){
          $verify = new \Think\Verify;
          $verify->entry();
    } 
	
    
}