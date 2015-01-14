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
	//���Զ���֤
	protected $_validate=array(
	//array(��֤���ֶΣ���֤�Ĺ��򣬴�����ʾ����֤���������ӹ�����֤ʱ��)
	     array('bmname','require','�������Ʊ�����д��',1,'regex',3),
		// array('bmname','','�����Ѿ�����',1,'uniqe',1),
		 array('bmadress',array(0,1),'���ݴ���',0,'in'),
	);
	 
	protected $_auto=array(
	 //array(�����ֶΣ��������ݣ��������������ӹ���)
		
		//array('createtime','time',1,'function'),
	    array('createtime','GetTime',1,'callback'),
	);
	function GetTime(){
		return date('Y-m-d h:i:s');
	}
	
	
	
}