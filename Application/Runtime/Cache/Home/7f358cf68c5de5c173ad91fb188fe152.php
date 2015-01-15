<?php if (!defined('THINK_PATH')) exit();?><?xml?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>部门表</title>
 </head>
 <body>
 <form action="/addressbook/index.php/Home/Yg/index" method="post">
 <input type="submit" value="首页"/>
 </form>
 <form action="/addressbook/index.php/Home/Bm/index" method="post">
 关键词：<input type="text" name="keywords"/>
 类型：
 <select name="type">
 <option value="bmname">部门名称</option>
 <option value="id">ID</option>
 </select><br/>
 <input type="submit" value="部门查询"/>
 </form>
 
 <form action="/addressbook/index.php/Home/Bm/add" method="post">
 <input type="submit" value="部门添加"/>
 </form>
 <table border="1" bordercolour="black" width="100%">
 <tr><th>ID</th><th> 部门名称</th><th>部门地址</th><th>部门删除</th>
<?php if(is_array($ulist)): $i = 0; $__LIST__ = $ulist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$bm): $mod = ($i % 2 );++$i;?><tr>
     <td>
	 <a href="/addressbook/index.php/Home/Bm/edit/id/<?php echo ($bm['id']); ?>">
	 <?php echo ($bm['id']); ?> 
	 </a>
	 </td>
     <td><?php echo ($bm['bmname']); ?> </td>
	  <td><?php echo ($bm['bmadress']); ?> </td>
	 <td>
	 <a href="/addressbook/index.php/Home/Bm/delete/id/<?php echo ($bm['id']); ?>">
	 删除
	 </a>
	 </td>
</tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>


 </body>
</html>