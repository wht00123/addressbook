<?php if (!defined('THINK_PATH')) exit();?><?xml?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>创建部门</title>
 </head>
 <body>


<form action="insert" method="post">
部门名称：<input type="text" name="bmname"/><br/>
部门地址：
一层<input type="radio" name="bmadress" value="一层" checked="checked"/>
二层<input type="radio" name="bmadress" value="二层"/><br/>
<input type="submit" value="保存">
</form>

 </body>
</html>