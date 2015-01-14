<?php
namespace Home\Model;
use Think\Model\RelationModel;
class BmModel extends RelationModel{
	protected $_link=array(
	   'Yg'=>array(
	       'mapping_type'=>self::HAS_MANY,
		   'class_name'  =>'Yg',
		   'foreign_key' =>'bmid',
		   'mapping_name'=>'ygs',
		   'mapping_order'=>'creattime desc',
	   ),
	);
	//表单自动验证
	protected $_validate=array(
	//array(验证的字段，验证的规则，错误提示，验证条件，附加规则，验证时间)
	     array('bmname','require','部门名称必须填写！',1,'regex',3),
		// array('bmname','','部门已经存在',1,'uniqe',1),
		 array('bmadress',array(0,1),'数据错误！',0,'in'),
	);
	 
	protected $_auto=array(
	 //array(填充的字段，填充的内容，填充的条件，附加规则)
		
		//array('createtime','time',1,'function'),
	    array('createtime','GetTime',1,'callback'),
	);
	function GetTime(){
		return date('Y-m-d h:i:s');
	}
	
	
	
}