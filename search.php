
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="images/article_view.css" rel="stylesheet" type="text/css" />
<title>
<?php
include_once("sitetitle.php"); 
?>
</title>
</head>

<body  topmargin="0">

<table  width=100% cellpadding="0" cellspacing="0" class="bgline"><tr><td align="center">
<?php
include_once("header.php");
?>

</td></tr>
<tr><td align="center">

<div  id="main">
<div class="search">
<table width=900px >

<?php



$keywords=$_POST["keywords"];
	
if($_GET[lan]==chs)
	{echo " <a href=index.php?lan=".$_GET[lan].">[返回]</a> ";}
if($_GET[lan]==eng)
	{echo " <a href=index.php?lan=".$_GET[lan].">[BACK]</a> ";}	 
if($_GET[lan]==chs)
	{echo "&nbsp;&nbsp;搜索关键词:";}
if($_GET[lan]==eng)
	{echo "&nbsp;&nbsp;Searching Keywords: ";}
echo  $keywords;

if($_POST["keywords"])
{	
	$res=mysql_query("SELECT * FROM 20article WHERE
	   title_chs LIKE '%$keywords%'
	OR title_eng LIKE '%$keywords%'
	OR content_chs LIKE '%$keywords%'
	OR content_eng LIKE '%$keywords%'
	OR picdesc_chs LIKE '%$keywords%'
	OR picdesc_eng LIKE '%$keywords%'
	OR username LIKE '%$keywords%'");
	while($rows=mysql_fetch_assoc($res)) 
    	{	
		$it_id=$rows["itm_id"];
		$resitm=mysql_query("SELECT * FROM 10branch WHERE id=$it_id");
		$rowsitm=mysql_fetch_assoc($resitm);
		if($_GET[lan]==chs)
			{
			echo  "<tr><td width=120px; class='search_style'>";
			if($rows["itm_id"]==0)
				{echo "<a href=article_view.php?id=main&itm_id=".$rows["itm_id"]."&lan=$_GET[lan]>[公告]</a>";}
			if($rows["itm_id"]==1)
				{echo "<a href=article_view.php?id=main&itm_id=".$rows["itm_id"]."&lan=$_GET[lan]>[简介]</a>";}
			if(($rows["itm_id"]!=1)&&$rows["itm_id"]!=0)
				{echo "<a href=article_view.php?id=main&itm_id=".$rows["itm_id"]."&lan=$_GET[lan]>[".$rowsitm["item"]."]</a>";}
			
			echo "</td><td width=550px; class='search_style'><a href=article_view.php?id=".$rows["id"]."&itm_id=".$rows["itm_id"]."&lan=$_GET[lan]>".mb_substr($rows["title_chs"],0,40,'utf-8')."</a></td><td class='search_style'>".$rows["username"]."</td><td class='search_style'>".$rows["date"]."</td></tr>";
			}
		if($_GET[lan]==eng)
			{
			echo  "<tr><td width=180px; class='search_style'>";
			if($rows["itm_id"]==0)
				{echo "<a href=article_view.php?id=main&itm_id=".$rows["itm_id"]."&lan=$_GET[lan]>[Attention]</a>";}
			if($rows["itm_id"]==1)
				{echo "<a href=article_view.php?id=main&itm_id=".$rows["itm_id"]."&lan=$_GET[lan]>[Introduction]</a>";}
			if(($rows["itm_id"]!=1)&&$rows["itm_id"]!=0)
				{echo "<a href=article_view.php?id=main&itm_id=".$rows["itm_id"]."&lan=$_GET[lan]>[".$rowsitm["item_eng"]."]</a>";}
			echo "</td><td width=550px; class='search_style'><a href=article_view.php?id=".$rows["id"]."&itm_id=".$rows["itm_id"]."&lan=$_GET[lan]>".mb_substr($rows["title_eng"],0,80,'utf-8')."</a></td><td class='search_style'>".$rows["username"]."</td><td class='search_style'>".$rows["date"]."</td></tr>";
			}	
	
		}
}


if(!$_POST["keywords"]) echo "<script>alert('没有填写关键词  Input Keywords Please');history.back(-1);</script>";
?>


</table>
</div>
</div>
<!-- div main*/ -->



</td></tr></table>
<table  width=100% cellpadding="0" cellspacing="0"><tr><td align="center">
<?php
include_once("footer.php");
?>

</td></tr></table>
</body>
</html>



