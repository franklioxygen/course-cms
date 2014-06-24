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


<div class="config">

<?php
$res=mysql_query("SELECT * FROM 50config WHERE id='1' ");
while($rows=mysql_fetch_assoc($res))
{

echo"当前配置：<br/>";
echo "用户注册：";
if($rows["user_reg"]==1)echo"<div class='open'>开放</div>"; else echo"<div class='close'>关闭</div>";
echo"<br/>";
echo "修改信息：";
if($rows["user_edit"]==1)echo"<div class='open'>开放</div>"; else echo"<div class='close'>关闭</div>";
echo"<br/>";
echo "用户登录：";
if($rows["user_log"]==1)echo"<div class='open'>开放</div>"; else echo"<div class='close'>关闭</div>";
echo"<br/>";

	echo "<br/><br/>修改：<br/>
<form action='config.php?mode=update' method=POST enctype='multipart/form-data'>

用户注册<br />
开放：
<input type='radio' name='user_reg' value='1'>

关闭：
<input type='radio' name='user_reg' value='0'><br />
<br />
修改信息<br />
开放：
<input type='radio' name='user_edit' value='1'>

关闭：
<input type='radio' name='user_edit' value='0'><br />
<br />

用户登录<br />
开放：
<input type='radio' name='user_log' value='1'>

关闭：
<input type='radio' name='user_log' value='0'><br />
注意：以上3项留空默认关闭。
<br />
<br />
中文网站标题：
<input name='sitetitle_chs' type='text' style='width:150px' value='".$rows["sitetitle_chs"]."'>
英文网站标题：
<input name='sitetitle_eng' type='text' style='width:150px' value='".$rows["sitetitle_eng"]."'><br />
页底链接名称：
<input name='lasttitle_chs' type='text' style='width:150px' value='".$rows["lasttitle_chs"]."'>
英文链接名称：
<input name='lasttitle_eng' type='text' style='width:150px' value='".$rows["lasttitle_eng"]."'><br />
页底链接地址：
<input name='lasturl_url' type='text' style='width:150px' value='".$rows["lasturl_url"]."'>
页底联系方式：
<input name='connect' type='text' style='width:150px' value='".$rows["connect"]."'><br />
中文版权信息：
<input name='copyrt_chs' type='text' style='width:150px' value='".$rows["copyrt_chs"]."'>
英文版权信息：
<input name='copyrt_eng' type='text' style='width:150px' value='".$rows["copyrt_eng"]."'><br />
中文联系地址：
<input name='address_chs' type='text' style='width:150px' value='".$rows["address_chs"]."'>
英文联系地址：
<input name='address_eng' type='text' style='width:150px' value='".$rows["address_eng"]."'><br />
<br />
每页文章数量：
<input type='text' name='pgsize' style='width:150px;' value='".$rows["pgsize"]."'/>
热门文章数量：
<input type='text' name='hotsize' style='width:150px;' value='".$rows["hotsize"]."'/><br/>
中文顶部图片：
<input type='file' name='sitebanner_chs' style='width:10%'/><br/>
英文顶部图片：
<input type='file' name='sitebanner_eng' style='width:10%'/><br/>
首页 flash图：
<input type='file' name='siteflash' style='width:10%'/><br/>
网站 favicon：
<input type='file' name='fvico' style='width:10%'/><br/>
网站向导地图：
<input type='file' name='sitemap' style='width:10%'/><br/>

注意：更新网站顶部图片、首页flash、网站favicon等 都会覆盖原有文件。
<br />
<br />
<input type=submit name=submit value=保存>
<input type=reset value=重写>
</form>
";		
}






if($_GET["mode"]=="update")
{
$user_log=$_POST["user_log"];
$user_reg=$_POST["user_reg"];
$user_edit=$_POST["user_edit"];
$pgsize=$_POST["pgsize"];
$hotsize=$_POST["hotsize"];

$sitetitle_chs=addslashes($_POST["sitetitle_chs"]);
$sitetitle_eng=addslashes($_POST["sitetitle_eng"]);
$connect=addslashes($_POST["connect"]);
$lasturl_url=addslashes($_POST["lasturl_url"]);
$lasttitle_chs=addslashes($_POST["lasttitle_chs"]);
$lasttitle_eng=addslashes($_POST["lasttitle_eng"]);
$copyrt_chs=addslashes($_POST["copyrt_chs"]);
$address_chs=addslashes($_POST["address_chs"]);
$copyrt_eng=addslashes($_POST["copyrt_eng"]);
$address_eng=addslashes($_POST["address_eng"]);

if($_FILES["sitebanner_chs"]["size"])
{

	 if (($_FILES["sitebanner_chs"]["type"] == "image/jpeg")||
		 ($_FILES["sitebanner_chs"]["type"] == "image/pjpeg")&&
		 ($_FILES["sitebanner_chs"]["size"] < 400000))
     {
		$sitebanner_chs="banner_chs.jpg";

		$upldchbnr=move_uploaded_file($_FILES['sitebanner_chs']['tmp_name'],"../images/".$sitebanner_chs);//要先有文件夹
		$sitebanner_chs="images/".$sitebanner_chs;//这是保存进数据库的路
		$reschbnr=mysql_query("UPDATE 50config SET sitebanner_chs='$sitebanner_chs' WHERE id=1");
		if($reschbnr)echo"更新sitebanner_chs成功";
	}
}


if($_FILES["sitebanner_eng"]["size"])
{

	 if (($_FILES["sitebanner_eng"]["type"] == "image/jpeg")||
		 ($_FILES["sitebanner_eng"]["type"] == "image/pjpeg")&&
		 ($_FILES["sitebanner_eng"]["size"] < 400000))
     {
		$sitebanner_eng="banner_eng.jpg";
		$upldenbnr=move_uploaded_file($_FILES['sitebanner_eng']['tmp_name'],"../images/".$sitebanner_eng);//要先有文件夹
		$sitebanner_eng="images/".$sitebanner_eng;//这是保存进数据库的路
		$resenbnr=mysql_query("UPDATE 50config SET sitebanner_eng='$sitebanner_eng' WHERE id=1");
		if($reschbnr)echo"更新sitebanner_eng成功";
	}
}
if($_FILES["siteflash"]["size"])
{

	 if ($_FILES["siteflash"]["size"] < 400000)
     {
		$siteflash="flashbanner.swf";
		$upldenbnr=move_uploaded_file($_FILES['siteflash']['tmp_name'],"../images/".$siteflash);//要先有文件夹
		$siteflash="images/".$siteflash;//这是保存进数据库的路
		$resswf=mysql_query("UPDATE 50config SET siteflash='$siteflash' WHERE id=1");
		if($resswf)echo"更新siteflash成功";
	}
}



if($_FILES["fvico"]["size"])
{

	 if (($_FILES["fvico"]["type"] == "image/x-icon")&&($_FILES["fvico"]["size"] < 400000))
     {
		$fvico="favicon.ico";
		$upldico=move_uploaded_file($_FILES['fvico']['tmp_name'],"../images/".$fvico);//要先有文件夹
		$fvico="images/".$fvico;//这是保存进数据库的路
		$resico=mysql_query("UPDATE 50config SET fvico='$fvico' WHERE id=1");
		if($resico)echo"更新favicon成功";
	}
}


if($_FILES["sitemap"]["size"])
	{
if ((($_FILES["sitemap"]["type"] == "image/jpeg")||($_FILES["sitemap"]["type"] == "image/pjpeg"))&&($_FILES["sitemap"]["size"] < 4000000))
     {
		$sitemap="sitemap.jpg";//名
		$upldsitemap=move_uploaded_file($_FILES['sitemap']['tmp_name'],"../images/".$sitemap);//要先有文件夹
		$sitemap="images/".$sitemap;//这是保存进数据库的路径
		$ressitemap=mysql_query("UPDATE 50config SET sitemap='$sitemap' WHERE id=1");
		if($ressitemap)echo"更新sitemap成功";
	}	else echo"图片格式不正确或文件太大";
}




$res=mysql_query("UPDATE 50config SET user_log='$user_log',user_reg='$user_reg',user_edit='$user_edit',pgsize='$pgsize',hotsize='$hotsize',sitetitle_chs='$sitetitle_chs',sitetitle_eng='$sitetitle_eng',connect='$connect',lasturl_url='$lasturl_url',lasttitle_chs='$lasttitle_chs',lasttitle_eng='$lasttitle_eng',copyrt_chs='$copyrt_chs',copyrt_eng='$copyrt_eng',address_chs='$address_chs',address_eng='$address_eng'
 WHERE id='1'");
 header("Location:config.php");


}
?>


</div>
