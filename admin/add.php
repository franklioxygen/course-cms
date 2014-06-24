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
</head>
<?php
include_once("../conn.php");
?>
<?php
include_once("auth.php");
?>

<div class="main">



<form action="add.php" method="POST" enctype="multipart/form-data">
文章类别
<select name="itm_id" style="width:10%;">
<option  value="0">公告</option>
<option  value="1">简介</option>
<?php
//-------------------------------------------------------------------

$res=mysql_query("SELECT * FROM 10branch ORDER BY id"); //
while($rows=mysql_fetch_assoc($res)) 
    if($rows["visiable"]&$rows["id"]!=0&$rows["id"]!=70)//
    {
    	{
    	echo "<option  value='".$rows["id"]."'>".$rows["item"]."</option>";//

    	}
    } 

//------------------------------------------------------------------------	
?>
</select><br/>


中文标题<br/>
<input name="title_chs" type="text" style="width:75%;" /><br/>
english title<br/>
<input name="title_eng" type="text" style="width:75%;" /><br/>
中文正文<br/>
<textarea name="content_chs"  style="width:75%; height:250px;"></textarea><br/>
english content<br/>
<textarea name="content_eng"  style="width:75%; height:250px;"></textarea><br/>
图片上传(upload picture)<br/>
<input type="file" name="pic" style="width:20%"/><br/>
图片描述<br/>
<textarea name="picdesc_chs"  style="height:18px; width:75%;"></textarea><br/>
picture description<br/>
<textarea name="picdesc_eng"  style="height:18px; width:75%;"></textarea><br/>
文件上传(upload file)<br/>
<input type="file" name="doc" style="width:20%"/><br/>

<input type="hidden" name="mode" value="add">
<input type="submit" name="submit" value="提交 submit" />
<input type="reset"  name="reset" value="重写 reset"/>


</form>



<?php
error_reporting(0);
if($_POST["mode"]=="add")
{

$itm_id=$_POST["itm_id"];
$title_chs=addslashes($_POST["title_chs"]);
$content_chs=addslashes($_POST["content_chs"]);
$picdesc_chs=addslashes($_POST["picdesc_chs"]);
$title_eng=addslashes($_POST["title_eng"]);
$content_eng=addslashes($_POST["content_eng"]);
$picdesc_eng=addslashes($_POST["picdesc_eng"]);
$username=$_COOKIE["username"];
$date=date("Y-m-d");





if($_FILES["pic"]["size"])
	{
if ((($_FILES["pic"]["type"] == "image/gif")||
($_FILES["pic"]["type"] == "image/jpeg")||
($_FILES["pic"]["type"] == "image/png")||
($_FILES["pic"]["type"] == "image/pjpeg"))&&
($_FILES["pic"]["size"] < 4000000)&&
($_FILES["doc"]["size"] < 10000000))
     {
		$pic=date("Ymd").rand(10000,99999)."_".$_FILES['pic']['name'];//加个随机数，因为上传图片可能同名
		$upldimg=move_uploaded_file($_FILES['pic']['tmp_name'],"../pic/".$pic);//要先有文件夹
		$pic="../pic/".$pic;//这是保存进数据库的路径
		

		
	}	else echo"图片格式不正确或文件太大";
}


if($_FILES["doc"]["size"])
{
if ($_FILES["doc"]["size"] < 10000000)
	{
		$doc=date("Ymd").rand(10000,99999)."_".$_FILES['doc']['name'];
		$uplddoc=move_uploaded_file($_FILES['doc']['tmp_name'],"../doc/".$doc);
		$doc="../doc/".$doc;
	}

}




		$res=mysql_query("INSERT INTO 20article (title_chs,title_eng,content_chs,content_eng,date,username,itm_id,pic,picdesc_chs,picdesc_eng,fileupload) VALUES ('$title_chs','$title_eng','$content_chs','$content_eng','$date','$username','$itm_id','$pic','$picdesc_chs','$picdesc_eng','$doc')");
		if($res){ echo "文章添加成功<br/>";}
			else{ echo "文章添加失败<br/>"; }
		if($upldimg){ echo "图片上传成功<br/>";}
			else{ echo "图片上传失败<br/>"; }
		if($uplddoc){ echo "文件上传成功<br/>";}
			else{ echo "文件上传失败<br/>"; }






}





?>


</div>