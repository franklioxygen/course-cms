<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="images/admin.css" rel="stylesheet" type="text/css">
<title>
<?php
include_once("../sitetitle.php"); 
?>
</title>
<?php
include_once("auth.php");
?>
</head> 


<body>
<div class="top">
<div class="top_text">
<?php
include("../sitetitle.php"); 
?>
网站后台管理系统</div>
<div class="top_admin"><br/><br/>当前管理员：
<?php

echo $_COOKIE["username"];

?>
<br/>
<a href="../index.php" target="_blank">&nbsp;查看首页</a>
<a href="../index.php?logout=logout" target="_parent">登出系统 &nbsp;</a>
</div>



</div>
</body> 