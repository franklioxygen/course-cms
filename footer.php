<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="images/header.css" rel="stylesheet" type="text/css" />
<title>
<?php
include_once("sitetitle.php"); 
?>
</title>

<?php
include_once("conn.php");
?> 



<body>


<div  class="footer">

<?php  
$res=mysql_query("SELECT * FROM 50config WHERE id='1' ");
$rows=mysql_fetch_assoc($res);



echo "";
if($_GET[lan]==chs)
{echo $rows["copyrt_chs"]."<br/> ";}
if($_GET[lan]==eng)
{echo $rows["copyrt_eng"]."<br/> ";}

echo "<a href='mailto:".$rows["connect"]."'>";
if($_GET[lan]==chs)
{echo "联系我们";}
if($_GET[lan]==eng)
{echo "connect us";}
echo "</a> | 

<a href='admin/admin.php'>";
if($_GET[lan]==chs)
{echo "后台管理";}
if($_GET[lan]==eng)
{echo "management";}
echo "</a> | 

<a href='sitemap.php?lan=".$_GET[lan]."'>";
if($_GET[lan]==chs)
{echo "网站地图";}
if($_GET[lan]==eng)
{echo "site map";}
echo "</a> | 

<a href='".$rows["lasturl_url"]."'>";
if($_GET[lan]==chs)
{echo $rows["lasttitle_chs"];}
if($_GET[lan]==eng)
{echo $rows["lasttitle_eng"];}
echo "</a> <br/>";

if($_GET[lan]==chs)
{echo $rows["address_chs"]."<br/>";}
if($_GET[lan]==eng)
{echo $rows["address_eng"]."<br/>";}
echo "</div>";




?>

</body>
</html>
