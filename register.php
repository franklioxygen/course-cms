
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="images/index.css" rel="stylesheet" type="text/css" />
<title>
<?php
include_once("sitetitle.php"); 
?>
</title>
<body topmargin="0">



<?php
session_start();
?>
<table  width=100% cellpadding="0" cellspacing="0" class="bgline"><tr><td align="center">
<?php
include_once("header.php");
?>
<?php
			$res=mysql_query("SELECT * FROM 50config WHERE id='1'");
			$rows=mysql_fetch_assoc($res);
			$lan=$_GET["lan"];
			if($rows["user_reg"]==0)  //注册权限开放检测
			die ("<script>alert('没有开放权限！');location.href='index.php?lan=$lan';</script>");
?>
</td></tr>
<tr><td align="center">

<div  id="main" style="height:300px;">


<div class="reg">
<?php
if($_GET[lan]==chs)
{echo "用户注册 ";}
if($_GET[lan]==eng)
{echo "Register ";}

$lan=$_GET["lan"];
echo "<a href=index.php?lan=$lan>";
	if($_GET[lan]==chs)
{echo "返回";}
if($_GET[lan]==eng)
{echo "BACK";}
	echo "</a><br/>";


?>
<?php


if(@$_POST["submit"])
{
	
	if($_POST["secucode"]!=$_SESSION['re_code']) 
	{echo "<script>alert('验证码错误！');history.back(-1);</script>"; 	exit;}
	else{
	

			if(empty ($_POST["username"])) 		
			{echo "<script>alert('没有填写帐号！');history.back(-1);</script>"; 	exit;}
			if(empty ($_POST["password1"]))
			{echo "<script>alert('没有填写密码！');history.back(-1);</script>"; 	exit;}
			if(empty ($_POST["password2"]))
			{echo "<script>alert('没有确认密码！');history.back(-1);</script>"; 	exit;}		
			if ( empty($_POST["email"])||!ereg("^[_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,4}$",$_POST["email"]))
			{echo "<script>alert('邮箱格式错误！');history.back(-1);</script>"; exit;} 		
			if($_POST["password1"] !=$_POST["password2"])
			{echo "<script>alert('两次输入密码不一致！');history.back(-1);</script>"; 	exit;}
				else{
					$username = $_POST["username"];
					$password = md5($_POST["password1"]);
					$ip= $onlineip;
					$email =  $_POST["email"];
					$regdate=date("y-m-d");
					$res=mysql_query("INSERT INTO 30user(regdate,username,password,email,ip) VALUES ( '$regdate','$username','$password','$email','$onlineip')");
		
					if($res){echo"<script>alert('注册成功');history.back(-1);</script>";}
					else echo"<script>alert('已存在的用户名');history.back(-1);</script>";
		
					}
		}
}

?>



<?php
if (1)
	{
	echo "<form  action=register.php?lan=".$_GET[lan]." method=POST>";
	echo "";
	if($_GET[lan]==chs)
{echo "用户名：";}
if($_GET[lan]==eng)
{echo "Username:";}
	echo "";
	echo "<input name=username type=text style=width:120px; height:14px;><br/>";
	echo "";
	if($_GET[lan]==chs)
{echo "输入密码：";}
if($_GET[lan]==eng)
{echo "Password:";}
	echo "";
	echo "<input type=password name=password1 style=width:120px; height:14px;><br/>";
	echo "";
	if($_GET[lan]==chs)
{echo "确认密码：";}
if($_GET[lan]==eng)
{echo "EnterAgain:";}
	echo "";
	echo "<input type=password name=password2 style=width:120px; height:14px;><br/>";
	echo "";
	if($_GET[lan]==chs)
{echo "电子邮箱：";}
if($_GET[lan]==eng)
{echo "Email:";}
	echo "";
	echo "<input  name=email type=text style=width:120px; height:14px;><br/>";
	echo "";
if($_GET[lan]==chs)
{echo "验证码：";}
if($_GET[lan]==eng)
{echo "Secu.Code:";}	
	echo "";
	echo "<input type=text name=secucode style='width:82px; height:20px;'><img src='code.php' /><br/><br/>";
	echo "<input type=submit name=submit value='";
	if($_GET[lan]==chs)
{echo "注册";}
if($_GET[lan]==eng)
{echo "Regist";}
	echo "'>";
	echo "<input type=reset value='";
	if($_GET[lan]==chs)
{echo "重写";}
if($_GET[lan]==eng)
{echo "Reset";}
	echo "'>";
	echo "</form>";
	}
	
?>
</div>
</div>
<!-- div main*/ -->



</td></tr></table>
<table  width=100% cellpadding="0" cellspacing="0"><tr><td align="center">
<?php
include_once("footer.php");
?>

</td></tr></table>
</body>
</html>



