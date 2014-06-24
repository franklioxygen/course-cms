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
$itm_id=$_GET["itm_id"];
$res=mysql_query("SELECT * FROM 20article WHERE itm_id=$itm_id ORDER BY id desc LIMIT 30"); //
while($rows=mysql_fetch_assoc($res)) 
    	{
		echo "";
		echo "<a href=edit.php?id=".$rows["id"]."&itm_id=".$rows["itm_id"].">编辑</a>/<a href=article_manager.php?id=".$rows["id"]."&itm_id=".$rows["itm_id"]."&mode=delete>删除</a>编号[".$rows["id"]."]".mb_substr($rows["title_chs"],0,40,'utf-8')." 发布者：".$rows["username"]." 发布日期：".$rows["date"]."</br>";
    	echo "";
		}
 
?>

<?php
error_reporting(0);


if($_GET["mode"]==delete)
	{
	$resdel=mysql_query("SELECT * FROM 20article WHERE  id = '$_GET[id]'"); //
	$rows=mysql_fetch_assoc($resdel);
	unlink($rows["pic"]);
	unlink($rows["fileupload"]);
	$res=mysql_query("DELETE FROM 20article WHERE id = '$_GET[id]' ");
    
	if($res)
		{
		echo "删除成功";
		}
header("Location:article_manager.php?itm_id=".$_GET["itm_id"]."");
	}


?>

</div>