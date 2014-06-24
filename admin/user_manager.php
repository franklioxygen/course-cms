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
include_once("../conn.php");
?>
<?php
include_once("auth.php");
?>

<div class="main"> 
<?php 
if(($_COOKIE["auth"]==3)&&($_GET["mode"]!="detail"))
{
echo "<div class=adduser>";
echo "
超级管理员密码修改：<br/>
<form action='user_manager.php?mode=superadmin' method='POST' enctype='multipart/form-data'>
密码:<input name='password1'  type='password' style='width:120px; height:14px;' /><br />
确认:<input name='password2'  type='password' style='width:120px; height:14px;'' /><br />
<input name='submit' type=submit value='修改'>
<input name='reset' type='button' value='重置'/><br/>
</form>";
echo "</div>";
}

?>


<table>


<?php
if($_GET["mode"]!="detail"){
$res=mysql_query("SELECT * FROM 30user ORDER BY id desc"); //
while($rows=mysql_fetch_assoc($res)) 
    	{
		if($rows["auth"]<3)
			{
		echo "";
		echo "<tr><td><a href=user_manager.php?id=".$rows["id"]."&mode=detail>详情</a></td><td>
				<a href=user_manager.php?id=".$rows["id"]."&mode=delete>删除</a></td><td>
				<a href=user_manager.php?id=".$rows["id"]."&mode=fbd>禁言</a></td><td>
				<a href=user_manager.php?id=".$rows["id"]."&mode=formal>设为会员</a></td><td>
				<a href=user_manager.php?id=".$rows["id"]."&mode=adm>设为管理员</a></td><td>

		编号[".$rows["id"]."] 用户名：".mb_substr($rows["username"],0,40,'utf-8')."</br></td><td></tr>";
    	echo "";
			}
		}
} 
?>

<?php
error_reporting(0);
$id=$_GET["id"];
$mode=$_GET["mode"];

if($mode==delete)
	{
	$res=mysql_query("DELETE FROM 30user WHERE id = $id ");
    
	if($res)
		{
		echo "删除成功";
		}
header("Location:user_manager.php");
	}
	
	
if($mode==formal)
	{
	
	$res=mysql_query("UPDATE 30user SET auth='1' WHERE id=$id ");   
	if($res)
		{
		echo "";
		}
header("Location:user_manager.php");
	}



if($mode==adm)
	{
	$res=mysql_query("UPDATE 30user SET auth='2' WHERE id=$id ");
    
	if($res)
		{
		echo "";
		}
header("Location:user_manager.php");
	}
	
	
if($mode==fbd)
	{
	$res=mysql_query("UPDATE 30user SET auth='0' WHERE id=$id ");
    
	if($res)
		{
		echo "";
		}
header("Location:user_manager.php?id=".$_GET["id"]."");
	}



if($mode==update)
	{

	if(empty($_POST["password"]))
	{
	$id=$_POST["id"];
	$res1=mysql_query("UPDATE 30user SET username='$_POST[newusername]',email='$_POST[email]' WHERE id=$id ");
	$res2=mysql_query("UPDATE 20article SET username='$_POST[newusername]' WHERE username='$_POST[oriusername]' ");
	header("Location:user_manager.php");
	
	}
	else{
	$password=md5($_POST["password"]);
	$id=$_POST["id"];
	$res1=mysql_query("UPDATE 30user SET username='$_POST[newusername]',email='$_POST[email]',password='$password' WHERE id=$id ");
	$res2=mysql_query("UPDATE 20article SET username='$_POST[newusername]' WHERE username='$_POST[oriusername]' ");
	header("Location:user_manager.php");

 	}
	}






if($mode==detail)
	{
	$id=$_GET["id"];
	$resdetail=mysql_query("SELECT * FROM 30user WHERE id=$id"); //
	while($rows=mysql_fetch_assoc($resdetail))
		{
		if($rows["auth"]==0){$au="新会员";}
		if($rows["auth"]==1){$au="正式会员";}
		if($rows["auth"]==2){$au="管理员";}
		if($rows["auth"]==3){$au="超级管理员";}
	echo "<form  action=user_manager.php?mode=update method=POST>";
	echo "<tr><td>用户名:";
	echo "<input name=newusername type=text value='".$rows["username"]."' style='width:120px; height:14px;'><br/></td></tr>";
	echo "<tr><td>邮&nbsp;&nbsp;箱:";
	echo "<input name=email type=text value='".$rows["email"]."' style='width:120px; height:14px;'><br/></td></tr>";
	echo "<tr><td>密&nbsp;&nbsp;码:";
	echo "<input type=password name=password style='width:120px; height:14px;'><br/></td></tr>";
	echo "
	<tr><td>最后登陆日期：</td><td>".$rows["logdate"]."</td></tr>
	<tr><td>用户组:</td><td>".$au."</td></tr>
	<tr><td>最后登录IP：</td><td>".$rows["ip"]."</td></tr>
	";
	echo "<input type=hidden name=id value='$id'>";
	echo "<input type=hidden name=oriusername value='".$rows["username"]."'>";
	echo "<tr><td><input type=submit name=submit value=保存返回>";
	echo "<input type=reset value=重写></td></tr>";
	echo "</form>";		
		}
	}



?>
</table>

</div>