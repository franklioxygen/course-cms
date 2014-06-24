
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="images/index.css" rel="stylesheet" type="text/css">
<title>
<?php
include_once("sitetitle.php"); 
?>
</title>
<body topmargin="0">

<table  width=100% cellpadding="0" cellspacing="0" class="bgline"><tr><td align="center">
<?php
include_once("header.php");
?>
</td></tr>
<tr><td align="center">
<?php
			$res=mysql_query("SELECT * FROM 50config WHERE id='1'");
			$rows=mysql_fetch_assoc($res);
			$lan=$_GET["lan"];
			if($rows["user_edit"]==0)  //编辑权限开放检测
			die ("<script>alert('没有开放权限！');location.href='index.php?lan=$lan';</script>");

?>


<div  class="reg">
<?php

	if($_GET[lan]==chs)
{echo "修改个人信息";}
if($_GET[lan]==eng)
{echo "Modify info.";}



?>


<?php
$lan=$_GET["lan"];
echo "<a href=index.php?lan=$lan>";
	if($_GET[lan]==chs)
{echo "返回";}
if($_GET[lan]==eng)
{echo "BACK";}
	echo "</a><br/>";

if(@$_POST["submit"])
{

		if(empty ($_POST["email"])) 		
		{echo "<script>alert('没有填写邮箱！');history.back(-1);</script>"; 	exit;}
		if(empty ($_POST["password0"])) 		
		{echo "<script>alert('请填写旧密码！');history.back(-1);</script>"; 	exit;}  //作任何修改都要输入旧密码
		if((empty ($_POST["password1"]))&&(empty ($_POST["password2"])))   //没有输入新密码
			{
			$username=$_COOKIE["username"];
			$res=mysql_query("SELECT * FROM 30user WHERE username='$username'");
				while($rows=mysql_fetch_assoc($res))
					{
					
					$password0=md5($_POST["password0"]);
					if($password0!=$rows["password"])die ("<script>alert('密码错误！');history.back(-1);</script>");
					else{
					$email= $_POST["email"];

					$logdate=date("y-m-d");
					$res=mysql_query("UPDATE 30user SET email='$email',logdate='$logdate',ip='$onlineip' WHERE username='$username'");
						if($res){echo"<script>alert('修改成功');history.back(-1);</script>";}
						else echo"<script>alert('修改失败');history.back(-1);</script>";
					}
					}
			
			}

		else{
			$username=$_COOKIE["username"];
			if($_POST["password1"] !=$_POST["password2"])       //修改新密码
			{echo "<script>alert('两次输入密码不一致！');history.back(-1);</script>"; 	exit;}
			else{
				$res=mysql_query("SELECT * FROM 30user WHERE username='$username'");
				while($rows=mysql_fetch_assoc($res))
					{
					$password0=md5($_POST["password0"]);
					if($password0!=$rows["password"])die ("<script>alert('密码错误！');history.back(-1);</script>");
					else{
							$email = $_POST["email"];
							$password = md5($_POST["password1"]);
							$logdate=date("y-m-d");
							$res=mysql_query("UPDATE 30user SET email='$email',password='$password',logdate='$logdate',ip='$onlineip' WHERE username='$username'");
							if($res){echo"<script>alert('修改成功');history.back(-1);</script>";}
							else {echo"<script>alert('修改失败');history.back(-1);</script>";}
						}
					}
				}
			}
	}

?>



<?php
if (1)
{
	
$username=$_COOKIE["username"] ;
$res=mysql_query("SELECT * FROM 30user WHERE username='$username'");
while($rows=mysql_fetch_assoc($res))
	{
	echo "";
	if($_GET[lan]==chs)
{echo "您的用户名是 ";}
if($_GET[lan]==eng)
{echo "Your username is ";}
	echo "".$rows["username"].",";
	if($_GET[lan]==chs)
{echo "如需修改请联系管理员";}
if($_GET[lan]==eng)
{echo "please get connect with administrator if wanna change.";}
	echo "<br/>";	
	$lan=$_GET['lan'];
	
	echo "<form  action=usercenter.php?lan=$lan method=POST>";
	echo "";
	if($_GET[lan]==chs)
{echo "请输入邮箱：";}
if($_GET[lan]==eng)
{echo "email:";}
	echo "";
	echo "<input name=email type=text value='".$rows["email"]."' style=width:120px; height:14px;><br/>";
	echo "";
	if($_GET[lan]==chs)
{echo "请输入密码：";}
if($_GET[lan]==eng)
{echo "password:";}
	echo "";
	echo "<input type=password name=password0 style=width:120px; height:14px;><br/>";
	echo "";
	if($_GET[lan]==chs)
{echo "请输入新密码：";}
if($_GET[lan]==eng)
{echo "new password:";}
	echo "";
	echo "<input type=password name=password1 style=width:120px; height:14px;><br/>";
	echo "";
	if($_GET[lan]==chs)
{echo "确认新密码：";}
if($_GET[lan]==eng)
{echo "confirm:";}
	echo "";
	echo "<input type=password name=password2 style=width:120px; height:14px;><br/>";
	echo "<input type=submit name=submit value=";
	if($_GET[lan]==chs)
{echo "修改";}
if($_GET[lan]==eng)
{echo "Modify";}
	echo ">";
	echo "<input type=reset value=";
	if($_GET[lan]==chs)
{echo "重写";}
if($_GET[lan]==eng)
{echo "Reset";}
	echo ">";
	echo "</form>";
	}
}
	
?>

</div>
<!-- div main*/ -->


</td></tr></table>
<table  width=100% cellpadding="0" cellspacing="0"><tr><td align="center">
<?php
include_once("footer.php");
?>

</td></tr></table>