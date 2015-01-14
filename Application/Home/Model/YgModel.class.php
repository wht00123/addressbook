<?php
namespace Home\Model;
use Think\Model\RelationModel;
class YgModel extends RelationModel{
	/* protected $_link=array(
	   'Bm'=>array(
	       'mapping_type'=>self::HAS_ONE,
		   'class_name'  =>'Bm',
		   'foreign_key' =>'ygid',
		   'mapping_name'=>'bmssss',
		   'mapping_order'=>'creattime desc',
		   'as_fields'   =>'bmname,ygid',
	   ),
	); */
	//表单自动验证
	protected $_validate=array(
	//array(验证的字段，验证的规则，错误提示，验证条件，附加规则，验证时间)
	     array('ygname','require','员工姓名必须填写！',1,'regex',3),
		 array('email','email','邮箱格式错误'),
		 //array('email','','邮箱已经存在',1,'uniqe',1),
		 array('sex',array(0,1),'数据错误！',0,'in'),
		 array('tel1','require','电话必须填写！',1,'regex',3),
		// array('tel1,tel2',11,'电话位数不对！',1,'length'),
		
		 array('qq,tel1,tel2','number','格式不对'),
	);
	 
	protected $_auto=array(
	 //array(填充的字段，填充的内容，填充的条件，附加规则)
		
		//array('createtime','time',1,'function'),
	    array('creattime','GetTime',1,'callback'),
	);
	function GetTime(){
		return date('Y-m-d h:i:s');
	}
	
	
	
}