<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="images/header.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
<title>
<?php
include_once("sitetitle.php"); 
?>
</title>
</head>
<?php
include_once("conn.php");
?> 
<body>

<?php
if($_GET[lan]==chs)
{
	echo"
	<div class='banner_chs'>
	<div class='language'>
	<a href='index.php?lan=chs'>
	简体中文
	</a>
	/
	<a href='index.php?lan=eng'>
	English
	</a>
	</div>
	";
}
if($_GET[lan]==eng)
{
	echo"
	
	<div class='banner_eng'>
	<div class='language'>
	<a href='index.php?lan=chs'>
	简体中文
	</a>
	/
	<a href='index.php?lan=eng'>
	English
	</a>
	</div>
	";
}



?>

<?php
if(!$_GET[lan])
{
header("Location:index.php?lan=chs");
}


?>



</div>
<table cellpadding="0" cellspacing="0" border="0"><tr><td class="navi">

<ul>
<li><a href="index.php<?php echo "?lan=$_GET[lan]"    ?>">
<?php
if($_GET[lan]==chs)
{echo "首　页";}
if($_GET[lan]==eng)
{echo "Index";}
?>

</a></li>
<li>
<?php
//-------------------------------------------------------------------
$res=mysql_query("SELECT * FROM 10branch ORDER BY id"); //
while($rows=mysql_fetch_assoc($res)) 
    if(($rows["visiable"])&&($rows["id"]!=0)&&($rows["id"]<=70))//
    {
if($_GET[lan]==chs)	
    	{
    	echo "<a href=article_view.php?id=main&itm_id=".$rows["id"]."&lan=$_GET[lan]>".$rows["item"]."</a>";//
    	}
if($_GET[lan]==eng)	
    	{
    	echo "<a href=article_view.php?id=main&itm_id=".$rows["id"]."&lan=$_GET[lan]>".$rows["item_eng"]."</a>";//
    	}
    } 
//------------------------------------------------------------------------	
?></li>
</ul>


</td></tr></table>






</body>
</html>

