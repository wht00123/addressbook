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
	//���Զ���֤
	protected $_validate=array(
	//array(��֤���ֶΣ���֤�Ĺ��򣬴�����ʾ����֤���������ӹ�����֤ʱ��)
	     array('ygname','require','Ա������������д��',1,'regex',3),
		 array('email','email','�����ʽ����'),
		 //array('email','','�����Ѿ�����',1,'uniqe',1),
		 array('sex',array(0,1),'���ݴ���',0,'in'),
		 array('tel1','require','�绰������д��',1,'regex',3),
		// array('tel1,tel2',11,'�绰λ�����ԣ�',1,'length'),
		
		 array('qq,tel1,tel2','number','��ʽ����'),
	);
	 
	protected $_auto=array(
	 //array(�����ֶΣ��������ݣ��������������ӹ���)
		
		//array('createtime','time',1,'function'),
	    array('creattime','GetTime',1,'callback'),
	);
	function GetTime(){
		return date('Y-m-d h:i:s');
	}
	
	
	
}