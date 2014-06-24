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

error_reporting(0);

if(!$_POST["mode"]){


$itm_id=$_GET["itm_id"];
$id=$_GET["id"];

$res=mysql_query("SELECT * FROM 20article WHERE id=$id AND itm_id=$itm_id ");
$rows=mysql_fetch_assoc($res);
$title_chs=addslashes($rows["title_chs"]);
$content_chs=addslashes($rows["content_chs"]);
$picdesc_chs=addslashes($rows["picdesc_chs"]);
$title_eng=addslashes($rows["title_eng"]);
$content_eng=addslashes($rows["content_eng"]);
$picdesc_eng=addslashes($rows["picdesc_eng"]);



echo "
<form action=edit.php?itm_id=$_GET[itm_id]&id=$rows[id] method=post>
新闻标题<br/>
<input name=title_chs  style=width:75%; value='$title_chs' ><br/>
english title<br/>
<input name=title_eng  style=width:75%; value='$title_eng'><br/>
详细内容<br/>
<textarea name=content_chs style='width:75%; height:250px;'>$content_chs</textarea><br/>
english content<br/>
<textarea name=content_eng style='width:75%; height:250px;'>$content_eng</textarea><br/>
图片描述<br/>
<textarea name='picdesc_chs'  style='height:18px; width:75%;'>$picdesc_chs</textarea><br/>
picture description<br/>
<textarea name='picdesc_eng'  style='height:18px; width:75%;'>$picdesc_eng</textarea><br/>



<input type=hidden name=itm_id value='$_GET[itm_id]'>
<input type=hidden name=id value='$_GET[id]'>
<input type=hidden name=mode value='update'>
<input name=submit type=submit value='提交'>
<input type=reset name=reset value='重写'>
</form>";
}




if($_POST["mode"]=="update"){

$itm_id=$_GET["itm_id"];
$id=$_GET["id"];
$title_chs=addslashes($_POST["title_chs"]);
$content_chs=addslashes($_POST["content_chs"]);
$picdesc_chs=addslashes($_POST["picdesc_chs"]);
$title_eng=addslashes($_POST["title_eng"]);
$content_eng=addslashes($_POST["content_eng"]);
$picdesc_eng=addslashes($_POST["picdesc_eng"]);
$username=$_COOKIE["username"];
$date=date("Y-m-d H:i:s");


$res=mysql_query("UPDATE 20article SET title_chs='$title_chs', title_eng='$title_eng',username='$username',content_chs='$content_chs',content_eng='$content_eng',picdesc_chs='$picdesc_chs',picdesc_eng='$picdesc_eng' WHERE id=$id AND itm_id=$itm_id");
if($res){

echo "修改成功<a href=article_manager.php?itm_id=".$_GET["itm_id"].">单击此处返回</a>";
header("Location:article_manager.php?itm_id=".$_GET["itm_id"]."");
		}
else echo"falid";
}

?>
<br />
</div>
