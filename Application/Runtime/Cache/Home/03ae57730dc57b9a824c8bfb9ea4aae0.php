<?php if (!defined('THINK_PATH')) exit();?>﻿<?xml?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>创建员工</title>
 </head>
 <body>


<form action="/addressbook/index.php/Home/Yg/insert" method="post">
 

员工姓名：<input type="text" name="ygname"/><br/>

选择部门：

<select name="bmname" >
<?php if(is_array($ulist)): $i = 0; $__LIST__ = $ulist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$bm): $mod = ($i % 2 );++$i;?><option value="<?php echo ($bm['bmname']); ?>">
<?php echo ($bm['bmname']); ?>
</option><?php endforeach; endif; else: echo "" ;endif; ?>
</select><br/>

QQ：<input type="text" name="qq"/><br/>
电话1：<input type="text" name="tel1"/><br/>
电话2：<input type="text" name="tel2"/><br/>
邮箱：<input type="text" name="email"/><br/>
性别：
男<input type="radio" name="sex" value="男" checked="checked"/>
女<input type="radio" name="sex" value="女"/><br/>
<input type="submit" value="保存">
</form>

 </body>
</html>