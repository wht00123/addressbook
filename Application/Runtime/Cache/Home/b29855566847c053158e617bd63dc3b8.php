<?php if (!defined('THINK_PATH')) exit();?>﻿<?xml?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>通讯录</title>
 </head>
 <body>
 <form action="/addressbook/index.php/Home/Yg/index" method="get">
 关键词：<input type="text" name="keywords"/>
 类型：
 <select name="type">
 <option value="ygname">员工姓名</option>
 <option value="id">ID</option>
 <option value="bmname">部门名称</option>
 </select><br/>
 <input type="submit" value="员工查询"/>
 </form>
 <form action="/addressbook/index.php/Home/Yg/add" method="post">
 <input type="submit" value="员工添加"/>
 </form>
 <form action="/addressbook/index.php/Home/Bm/index" method="post">
 <input type="submit" value="部门管理"/>
 </form>
 <table border="1" bordercolour="black" width="100%">
 <tr><th>ID</th><th>员工姓名</th><th>性别</th><th>邮箱</th><th>电话1</th><th>电话2</th><th>QQ</th><th>所属部门</th><th>员工删除</th>
 
<?php if(is_array($ulist)): $i = 0; $__LIST__ = $ulist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$yg): $mod = ($i % 2 );++$i;?><tr>
     <td>
	 <a href="/addressbook/index.php/Home/Yg/edit/id/<?php echo ($yg['id']); ?>">
	 <?php echo ($yg['id']); ?> 
	 </a>
	 </td>
	 </td>
     <td><?php echo ($yg['ygname']); ?> </td>
	 <td><?php echo ($yg['sex']); ?></td>
	  <td><?php echo ($yg['email']); ?></td>
	 <td><?php echo ($yg['tel1']); ?></td>
	 <td><?php echo ($yg['tel2']); ?></td>
	 <td><?php echo ($yg['qq']); ?></td>
	 <td><?php echo ($yg['bmname']); ?></td>
	 <td>
	 <a href="/addressbook/index.php/Home/Yg/delete/id/<?php echo ($yg['id']); ?>">
	 删除
	 </a>
	 </td>
</tr><?php endforeach; endif; else: echo "" ;endif; ?>

</table>
<div>
<?php echo ($page); ?>
</div><br/>
 </body>
</html>