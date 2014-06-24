
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
<div class="item_mamager">

<?php 

error_reporting(0);


if($_POST["mode"]!=update)
{
$res10=mysql_query("SELECT * FROM 10branch WHERE id='10'");
$rows10=mysql_fetch_assoc($res10);
$item10=$rows10["item"];
$res20=mysql_query("SELECT * FROM 10branch WHERE id='20'");
$rows20=mysql_fetch_assoc($res20);
$item20=$rows20["item"];
$res30=mysql_query("SELECT * FROM 10branch WHERE id='30'");
$rows30=mysql_fetch_assoc($res30);
$item30=$rows30["item"];
$res40=mysql_query("SELECT * FROM 10branch WHERE id='40'");
$rows40=mysql_fetch_assoc($res40);
$item40=$rows40["item"];
$res50=mysql_query("SELECT * FROM 10branch WHERE id='50'");
$rows50=mysql_fetch_assoc($res50);
$item50=$rows50["item"];
$res60=mysql_query("SELECT * FROM 10branch WHERE id='60'");
$rows60=mysql_fetch_assoc($res60);
$item60=$rows60["item"];
$res70=mysql_query("SELECT * FROM 10branch WHERE id='70'");
$rows70=mysql_fetch_assoc($res70);
$item70=$rows70["item"];
//--------------------------以下为英文部分
$res11=mysql_query("SELECT * FROM 10branch WHERE id='10'");
$rows11=mysql_fetch_assoc($res11);
$item11=$rows11["item_eng"];
$res21=mysql_query("SELECT * FROM 10branch WHERE id='20'");
$rows21=mysql_fetch_assoc($res21);
$item21=$rows21["item_eng"];
$res31=mysql_query("SELECT * FROM 10branch WHERE id='30'");
$rows31=mysql_fetch_assoc($res31);
$item31=$rows31["item_eng"];
$res41=mysql_query("SELECT * FROM 10branch WHERE id='40'");
$rows41=mysql_fetch_assoc($res41);
$item41=$rows41["item_eng"];
$res51=mysql_query("SELECT * FROM 10branch WHERE id='50'");
$rows51=mysql_fetch_assoc($res51);
$item51=$rows51["item_eng"];
$res61=mysql_query("SELECT * FROM 10branch WHERE id='60'");
$rows61=mysql_fetch_assoc($res61);
$item61=$rows61["item_eng"];
$res71=mysql_query("SELECT * FROM 10branch WHERE id='70'");
$rows71=mysql_fetch_assoc($res71);
$item71=$rows71["item_eng"];
//----------------------------------------------
echo "中文栏目&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;英文栏目<br/><br/>";
echo "
<form action=item_manager.php method=post>

<input name=item10 value='$item10'  style=width:100px;><input name=item11 value='$item11'  style=width:100px;><br/><br/>
<input name=item20 value='$item20'  style=width:100px;><input name=item21 value='$item21'  style=width:100px;><br/><br/>
<input name=item30 value='$item30'  style=width:100px;><input name=item31 value='$item31'  style=width:100px;><br/><br/>
<input name=item40 value='$item40'  style=width:100px;><input name=item41 value='$item41'  style=width:100px;><br/><br/>
<input name=item50 value='$item50'  style=width:100px;><input name=item51 value='$item51'  style=width:100px;><br/><br/>
<input name=item60 value='$item60'  style=width:100px;><input name=item61 value='$item61'  style=width:100px;><br/><br/>
<input name=item70 value='$item70'  style=width:100px;><input name=item71 value='$item71'  style=width:100px;><br/><br/>
<input type=hidden name=mode value='update'><br/>

<input name=submit type=submit value='提交'>
<input type=reset name=reset value='重写'><br/>
</form>";


}




if($_POST["mode"]==update)
{
$item10=$_POST["item10"];
$item20=$_POST["item20"];
$item30=$_POST["item30"];
$item40=$_POST["item40"];
$item50=$_POST["item50"];
$item60=$_POST["item60"];
$item70=$_POST["item70"];

$item11=$_POST["item11"];
$item21=$_POST["item21"];
$item31=$_POST["item31"];
$item41=$_POST["item41"];
$item51=$_POST["item51"];
$item61=$_POST["item61"];
$item71=$_POST["item71"];

$res10=mysql_query("UPDATE 10branch SET item='$item10' WHERE id=10");
$res20=mysql_query("UPDATE 10branch SET item='$item20' WHERE id=20");
$res30=mysql_query("UPDATE 10branch SET item='$item30' WHERE id=30");
$res40=mysql_query("UPDATE 10branch SET item='$item40' WHERE id=40");
$res50=mysql_query("UPDATE 10branch SET item='$item50' WHERE id=50");
$res60=mysql_query("UPDATE 10branch SET item='$item60' WHERE id=60");
$res70=mysql_query("UPDATE 10branch SET item='$item70' WHERE id=70");

$res11=mysql_query("UPDATE 10branch SET item_eng='$item11' WHERE id=10");
$res21=mysql_query("UPDATE 10branch SET item_eng='$item21' WHERE id=20");
$res31=mysql_query("UPDATE 10branch SET item_eng='$item31' WHERE id=30");
$res41=mysql_query("UPDATE 10branch SET item_eng='$item41' WHERE id=40");
$res51=mysql_query("UPDATE 10branch SET item_eng='$item51' WHERE id=50");
$res61=mysql_query("UPDATE 10branch SET item_eng='$item61' WHERE id=60");
$res71=mysql_query("UPDATE 10branch SET item_eng='$item71' WHERE id=70");

if($res10&&$res20&&$res30&&$res40&&$res50&&$res60&&$res70&&$res11&&$res21&&$res31&&$res41&&$res51&&$res61&&$res71){

echo "修改成功<a href=item_manager.php>单击此处返回</a>";
		}
else echo"falid";


}


?>

</div>