<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="images/index.css" rel="stylesheet" type="text/css">
<title>
<?php
include_once("sitetitle.php"); 
?>
</title>
</head>
<?php
include_once("conn.php");
?>

<?php
session_start();
?>

<div class=login>
<?php


if (isset($_COOKIE["username"])==0)
{
    if(@$_POST["submit"])
	{
	if($_POST["secucode"]!=$_SESSION['re_code']) 
	{echo "<script>alert('验证码错误！');history.back(-1);</script>"; 	exit;}
	else{
			
			
				if(empty ($_POST["username"]))
				{echo "<script>alert('没有填写帐号！');history.back(-1);</script>"; 	exit;}
				if(empty ($_POST["password"]))
				{echo "<script>alert('没有填写密码！');history.back(-1);</script>"; 	exit;}
				else
				{
						$username = $_POST["username"];
						$password = md5($_POST["password"]);
						$res=mysql_query("SELECT * FROM 30user WHERE username='$username'");
					while($rows=mysql_fetch_assoc($res))
					{
						if($rows["password"] != $password )
						{ echo "<script>alert('密码错误');history.back(-1);</script>";     	exit;}
					
						else
						{
						
						$reslog=mysql_query("SELECT * FROM 50config WHERE id='1'");
						$rowslog=mysql_fetch_assoc($reslog);
						$lan=$_GET["lan"];
						if(($rowslog["user_log"]==0)&&($rows["auth"]<2))
						die ("<script>alert('没有开放登录');location.href='index.php?lan=$lan';</script>");
						else{
							setcookie("username",$_POST["username"]);
							setcookie("auth",$rows["auth"]);
							$logdate=date("y-m-d");
							$resip=mysql_query("UPDATE 30user SET ip='$onlineip',logdate='$logdate' WHERE username='$username'");
							header("Location:index.php");
							}
						}
					}
				}
		}
	}
}


if(@$_GET["logout"]){
	setcookie("username","");
	setcookie("password","");
	setcookie("auth","");
	header("Location:index.php?lan=".$_GET[lan]."");
	}
?>

<?php



if (isset($_COOKIE["username"])==0)
{
	echo "<form  action=login.php method=POST>";
	echo "";
	   
if($_GET[lan]==chs)
{echo "帐&nbsp;&nbsp;&nbsp; 号：";}
if($_GET[lan]==eng)
{echo "Username:";}		   
	   
	   echo "";
	echo "<input name=username type=text style='height:20px; width:120px;'><br/>";
	echo "";
	   
if($_GET[lan]==chs)
{echo "密&nbsp;&nbsp;&nbsp; 码：";}
if($_GET[lan]==eng)
{echo "Password:";}		   
	   
	   echo "";
	echo "<input type=password name=password style='width:120px; height:20px;'><br/>";
	echo "";
	   
if($_GET[lan]==chs)
{echo "验证码：";}
if($_GET[lan]==eng)
{echo "Secu.Code:";}		   
	   
	   echo "";
	echo "<input type=text name=secucode style='width:60px; height:20px;'><img src='code.php' /><br/>";
	echo "<input type=submit name=submit style='font-size:12px;' value='";
	   
if($_GET[lan]==chs)
{echo "登&nbsp;&nbsp;录";}
if($_GET[lan]==eng)
{echo "Login";}		   
	   
	   echo "'>";
	echo "<input name=register style='font-size:12px;' value='";
	   
if($_GET[lan]==chs)
{echo "注&nbsp;&nbsp;册'";}
if($_GET[lan]==eng)
{echo "Reg'";}		   

	   echo " type=button onclick=top.location.href='register.php?lan=".$_GET[lan]."'>";
	echo "<input type=reset style='font-size:12px;' value='";
	   
if($_GET[lan]==chs)
{echo "重&nbsp;&nbsp;写";}
if($_GET[lan]==eng)
{echo "Reset";}		   
	   
	   echo "'>";
	echo "</form>";
	}
else{
	echo"";
	   
if($_GET[lan]==chs)
{echo "欢迎你， ";}
if($_GET[lan]==eng)
{echo "Welcome, ";}		   
	   
	   echo "". $_COOKIE["username"] . "!";
	   $lan=$_GET["lan"];
	   echo "<br/><a href=usercenter.php?lan=$lan>";
	if($_GET[lan]==chs)
{echo "修改个人信息";}
if($_GET[lan]==eng)
{echo "Modify info.";}
	echo "</a>";
  	echo "<form  action=login.php method=GET>";
 	echo "<input type=submit name=logout value='";
	   
if($_GET[lan]==chs)
{echo "注&nbsp;&nbsp;销";}
if($_GET[lan]==eng)
{echo "Logout";}		   
	   
	   echo "'>"; 
	echo "</form>";
	}
	
?>
</div>
</html>