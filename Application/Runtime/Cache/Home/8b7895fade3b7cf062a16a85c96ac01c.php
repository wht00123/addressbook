<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>ThinkPHP上传图片</title>
	<style type="text/css">
	*{ padding: 0; margin: 0;font-size:16px; font-family: "????"} 
	div{ padding: 3px 20px;} 
	body{ background: #fff; color: #333;}
	h2{font-size:36px}
	input,textarea {border:1px solid silver;padding:5px;width:350px}
	input{height:60px}
	input.button,input.submit{width:68px; margin:2px 5px;letter-spacing:4px;font-size:16px; font-weight:bold;border:1px solid silver; text-align:center; background-color:#F0F0FF;cursor:pointer}
	div.result{border:1px solid #d4d4d4; background:#FFC;color:#393939; padding:8px 20px;float:auto; width:450px;margin:2px}
	img {border:1px solid silver;padding:1px;margin:5px}
	</style>
 </head>
 <body>
 <div class="main">
 <h2>ThinkPHP上传图片</h2>
<form id="upload" method='post' action="/addressbook/index.php/Home/Yg/upload/" enctype="multipart/form-data">
<input name="image" id="image" type="file" />
<input type="submit" value="上传" class="button" >
</form>
</div>
</body>
</html>