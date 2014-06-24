
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
<div class="links_namager">

<?php 

error_reporting(0);


if($_POST["mode"]!=update)
{
$res3=mysql_query("SELECT * FROM 10branch WHERE id='3'");
$rows3=mysql_fetch_assoc($res3);
$item3=$rows3["item"];
$address3=$rows3["address"];
$res4=mysql_query("SELECT * FROM 10branch WHERE id='4'");
$rows4=mysql_fetch_assoc($res4);
$item4=$rows4["item"];
$address4=$rows4["address"];
$res5=mysql_query("SELECT * FROM 10branch WHERE id='5'");
$rows5=mysql_fetch_assoc($res5);
$item5=$rows5["item"];
$address5=$rows5["address"];
echo "
<form action='links_manager.php' method='POST'  enctype='multipart/form-data'>

1.名称：<input name=item3 value='$item3'  style=width:200px;><br/>
1.地址：<input name=address3 value='$address3'  style=width:200px;><br/>
1.图标：<input type='file' name='pic3' style='width:10%'/><br/><br/>
2.名称：<input name=item4 value='$item4'  style=width:200px;><br/>
2.地址：<input name=address4 value='$address4'  style=width:200px;><br/>
2.图标：<input type='file' name='pic4' style='width:10%'/><br/><br/>
3.名称：<input name=item5 value='$item5'  style=width:200px;><br/>
3.地址：<input name=address5 value='$address5'  style=width:200px;><br/>
3.图标：<input type='file' name='pic5' style='width:10%'/><br/><br/>

<input type=hidden name=mode value='update'><br/>

<input name=submit type=submit value='提交'>
<input type=reset name=reset value='重写'><br/>
</form>";


}

?>
<?php
error_reporting(0);

if($_POST["mode"]==update)
{

if($_FILES["pic3"]["size"])
{
	if (($_FILES["pic3"]["type"] == "image/gif")||
		($_FILES["pic3"]["type"] == "image/jpeg")||
		($_FILES["pic3"]["type"] == "image/png")||
		($_FILES["pic3"]["type"] == "image/pjpeg")&&
		($_FILES["pic3"]["size"] < 400000))
     {
		$item3=$_POST["item3"];
		$address3=$_POST["address3"];
		$pic3="link1.jpg";
		$upldimg3=move_uploaded_file($_FILES['pic3']['tmp_name'],"../images/".$pic3);//要先有文件夹
		$pic3="images/".$pic3;//这是保存进数据库的路
		$res3=mysql_query("UPDATE 10branch SET item='$item3',address='$address3',item_eng='$pic3' WHERE id=3");
	}
}
if($_FILES["pic4"]["size"])
{
	if (($_FILES["pic4"]["type"] == "image/gif")||
		($_FILES["pic4"]["type"] == "image/jpeg")||
		($_FILES["pic4"]["type"] == "image/png")||
		($_FILES["pic4"]["type"] == "image/pjpeg")&&
		($_FILES["pic4"]["size"] < 400000))
     {
		$item4=$_POST["item4"];
		$address4=$_POST["address4"];
		$pic4="link2.jpg";
		$upldimg4=move_uploaded_file($_FILES['pic4']['tmp_name'],"../images/".$pic4);//要先有文件夹
		$pic4="images/".$pic4;//这是保存进数据库的路
		$res4=mysql_query("UPDATE 10branch SET item='$item4',address='$address4',item_eng='$pic4' WHERE id=4");
	}
}
if($_FILES["pic5"]["size"])
{
	if (($_FILES["pic5"]["type"] == "image/gif")||
		($_FILES["pic5"]["type"] == "image/jpeg")||
		($_FILES["pic5"]["type"] == "image/png")||
		($_FILES["pic5"]["type"] == "image/pjpeg")&&
		($_FILES["pic5"]["size"] < 400000))
     {
		$item5=$_POST["item5"];
		$address5=$_POST["address5"];
		$pic5="link3.jpg";
		$upldimg5=move_uploaded_file($_FILES['pic5']['tmp_name'],"../images/".$pic5);//要先有文件夹
		$pic5="images/".$pic5;//这是保存进数据库的路
		$res5=mysql_query("UPDATE 10branch SET item='$item5',address='$address5',item_eng='$pic5' WHERE id=5");
	}
}



if($res3||$res4||$res5){
echo "修改成功<a href=links_manager.php>单击此处返回</a>";
}


}


?>

</div>