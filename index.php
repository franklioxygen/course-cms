
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   <!--  定义网站编码格式，告知浏览器编译方式，避免乱码  -->
<link href="images/index.css" rel="stylesheet" type="text/css" />
<title>
<?php
include_once("sitetitle.php"); //调用浏览器显示标题
?>
</title>
</head>
<body topmargin="0">  <!--  页面顶部无空白  -->


<table  width="100%" cellpadding="0" cellspacing="0" class="bgline"><tr><td align="center">
<?php
include_once("header.php");
?>
</td></tr>
<tr><td align="center">

<div  id="main">
<table cellpadding="0" cellspacing="0"><tr><td align="left">
<div id="gonggao01">     <!--  01公告层  -->
<?php

if($_GET[lan]==chs)  //汉语模式
{
$res=mysql_query("SELECT * FROM 20article WHERE itm_id='0' ORDER BY id desc LIMIT 1"); //抓取最新的一个文章，desc为逆序
while($rows=mysql_fetch_assoc($res)) 
    	{
		echo "<table border='0' cellpadding='0' cellspacing='0'>";
		echo "<tr><td><div class='item'><div class='item_title'>公告栏</div></div></td></tr>";
		echo "<tr><td align='center'><div class='title01'><a href=article_view.php?id=".$rows["id"]."&itm_id=".$rows["itm_id"]."&lan=chs><div class=title>".mb_substr($rows["title_chs"],0,18,'utf-8')."</div></a></div></td></tr>";
		echo  "<tr><td><div class='content01'>".mb_substr($rows["content_chs"],0,130,'utf-8')."...</div></td></tr>";  
		echo  "<tr><td><div class='date01'>".$rows["date"]."</div></td></tr>";
    	echo "</table>";
		}  //mb_substr函数用来截取若干数据，同时定义编码，可以防止截取半个文字的乱码产生
}
if($_GET[lan]==eng)  //英语模式
{
$res=mysql_query("SELECT * FROM 20article WHERE itm_id='0' ORDER BY id desc LIMIT 1"); //
while($rows=mysql_fetch_assoc($res)) 
    	{
		echo "<table border='0' cellpadding='0' cellspacing='0'>";
		echo "<tr><td><div class='item'><div class='item_title'>Attention</div></div></td></tr>";
		echo "<tr><td align='center'><div class='title01'><a href=article_view.php?id=".$rows["id"]."&itm_id=".$rows["itm_id"]."&lan=eng><div class=title>".mb_substr($rows["title_eng"],0,30,'utf-8')."</div></a></div></td></tr>";
		echo  "<tr><td><div class='content01'>".mb_substr($rows["content_eng"],0,250,'utf-8')."...</div></td></tr>";
		echo  "<tr><td><div class='date01'>".$rows["date"]."</div></td></tr>"; 
    	echo "</table>";
		}
}
?>
</div>
<div id="jianjie02">   <!--  02简介层  -->
<?php
if($_GET[lan]==chs)
{
$res=mysql_query("SELECT * FROM 20article WHERE itm_id='1' ORDER BY id desc LIMIT 1"); //   
while($rows=mysql_fetch_assoc($res)) 
    	{
		echo "<table border='0' cellpadding='0' cellspacing='0'>";
		echo "<tr><td><div class='item'><div class='item_title'>学科介绍</div></div></td></tr>";
		echo "<tr><td align='center'><div class='title01'><a href=article_view.php?id=".$rows["id"]."&itm_id=".$rows["itm_id"]."&lan=chs><div class=title>".mb_substr($rows["title_chs"],0,18,'utf-8')."</div></a></div></td></tr>";
		echo  "<tr><td><div class='content01'>".mb_substr($rows["content_chs"],0,170,'utf-8')."...</div></td></tr>";
    	echo "</table>";
		}
}
if($_GET[lan]==eng)
{
$res=mysql_query("SELECT * FROM 20article WHERE itm_id='1' ORDER BY id desc LIMIT 1"); //
while($rows=mysql_fetch_assoc($res)) 
    	{
		echo "<table border='0' cellpadding='0' cellspacing='0'>";
		echo "<tr><td><div class='item'><div class='item_title'>Introduction</div></div></td></tr>";
		echo "<tr><td align='center'><div class='title01'><a href=article_view.php?id=".$rows["id"]."&itm_id=".$rows["itm_id"]."&lan=eng><div class=title>".mb_substr($rows["title_eng"],0,40,'utf-8')."</div></a></div></td></tr>";
		echo  "<tr><td><div class='content01'>".mb_substr($rows["content_eng"],0,300,'utf-8')."...</div></td></tr>";
    	echo "</table>";
		}
}
?>



</div>
<div id="zuixin03">  <!--  03最新文章层  -->
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr><td><div class="item"><div class="item_title">
<?php
if($_GET[lan]==chs)
{echo "最新文章";}
if($_GET[lan]==eng)
{echo "Latest";}
?>

</div></div></td><td><div class="item">&nbsp;  <!--  本小层用来支撑表格，对应下栏中的时间位置  --></div></td></tr>
<?php
//-------------------------------------------------------------------

$res=mysql_query("SELECT * FROM 20article ORDER BY id desc LIMIT 6"); //
while($rows=mysql_fetch_assoc($res)) 
    	{
if($_GET[lan]==chs)
{
    	echo "<tr><td><div class='list'><li><a href=article_view.php?id=".$rows["id"]."&itm_id=".$rows["itm_id"]."&lan=chs>".mb_substr($rows["title_chs"],0,19,'utf-8')."</a></li></div></td><td><div class='date'>".$rows["date"]."</div></td></tr>";//
}
if($_GET[lan]==eng)
{
    	echo "<tr><td><div class='list'><li><a href=article_view.php?id=".$rows["id"]."&itm_id=".$rows["itm_id"]."&lan=eng>".mb_substr($rows["title_eng"],0,45,'utf-8')."</a></li></div></td><td><div class='date'>".$rows["date"]."</div></td></tr>";//
}



    	}
//------------------------------------------------------------------------	
?>
</table>




</div>
<div id="a0405">    <!--  04登录及搜索层  -->
<div id="denglu04"><div class='item'><div class='item_title'>
<?php
if($_GET[lan]==chs)
{echo "用户登录";}
if($_GET[lan]==eng)
{echo "Login";}
?>

</div></div><table border="0" cellpadding="0" cellspacing="0" width="235px" height="100px" class="denglu0401"><tr><td align="center" valign="middle">

<?php
include_once("login.php");
?>
</td></tr></table>

</div>

<div id="sousuo05">
<div class='item'><div class='item_title'>
<?php
if($_GET[lan]==chs)
{echo "站内搜索";}
if($_GET[lan]==eng)
{echo "Search";}
?>

</div></div>
<table border="0" cellpadding="0" cellspacing="0" width="235px" height="20px" class="denglu0401"><tr><td align="center" valign="middle">

<form action="search.php?lan=<?php echo "$_GET[lan]"; ?>" method="POST" enctype="multipart/form-data">
<input name="keywords" type="text" />
<input name="submit" type="submit"  value="<?php
if($_GET[lan]==chs)
{echo "搜索";}
if($_GET[lan]==eng)
{echo "Seek";}
?>
"/>

</form>


</td></tr></table>
</div>

</div><!-- div 0405*/ -->
<div id="jinzhan06"> <!--  06进展层  -->



<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr><td><div class="item"><div class="item_title">
<?php
$res=mysql_query("SELECT * FROM 10branch WHERE id='10'");     //  抓取本版块栏目标题
while($rows=mysql_fetch_assoc($res)) 
    if(($rows["visiable"])&&($rows["id"]!=0))//  非必要判断，留扩展用
    {
if($_GET[lan]==chs)	
    	{
    	echo $rows["item"];//  中文栏目名称
    	}
if($_GET[lan]==eng)	
    	{
    	echo $rows["item_eng"];//  英文栏目名称
    	}
    } 

?>



</div></div></td><td><div class="item">&nbsp;</div></td></tr>
<?php
//-------------------------------------------------------------------
$res=mysql_query("SELECT * FROM 20article WHERE itm_id=10 ORDER BY id desc LIMIT 6"); //
while($rows=mysql_fetch_assoc($res)) 
    	{
if($_GET[lan]==chs)
{
    	echo "<tr><td><div class='list'><li><a href=article_view.php?id=".$rows["id"]."&itm_id=".$rows["itm_id"]."&lan=chs>".mb_substr($rows["title_chs"],0,18,'utf-8')."</a></li></div></td><td></td></tr>";//
}
if($_GET[lan]==eng)
{
    	echo "<tr><td><div class='list'><li><a href=article_view.php?id=".$rows["id"]."&itm_id=".$rows["itm_id"]."&lan=eng>".mb_substr($rows["title_eng"],0,35,'utf-8')."</a></li></div></td><td></td></tr>";//
}





    	}
//------------------------------------------------------------------------	
?>
</table>


</div>
<div id="xiangmu07"> <!--  07项目与进展层  -->


<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr><td><div class="item"><div class="item_title">
<?php
$res=mysql_query("SELECT * FROM 10branch WHERE id='30'"); //
while($rows=mysql_fetch_assoc($res)) 
    if(($rows["visiable"])&&($rows["id"]!=0))//
    {
if($_GET[lan]==chs)	
    	{
    	echo $rows["item"];//
    	}
if($_GET[lan]==eng)	
    	{
    	echo $rows["item_eng"];//
    	}
    } 

?>


</div></div></td><td><div class="item">&nbsp;</div></td></tr>
<?php
//-------------------------------------------------------------------
$res=mysql_query("SELECT * FROM 20article WHERE itm_id=30 ORDER BY id desc LIMIT 6"); //
while($rows=mysql_fetch_assoc($res)) 
    	{
if($_GET[lan]==chs)
{
    	echo "<tr><td><div class='list'><li><a href=article_view.php?id=".$rows["id"]."&itm_id=".$rows["itm_id"]."&lan=chs>".mb_substr($rows["title_chs"],0,18,'utf-8')."</a></li></div></td><td></td></tr>";//
}
if($_GET[lan]==eng)
{
    	echo "<tr><td><div class='list'><li><a href=article_view.php?id=".$rows["id"]."&itm_id=".$rows["itm_id"]."&lan=eng>".mb_substr($rows["title_eng"],0,35,'utf-8')."</a></li></div></td><td></td></tr>";//
}
    	}
//------------------------------------------------------------------------	
?>
</table>








</div>
<div id="zhanshi08"> <!--  08成果展示层  -->


<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr><td><div class="item"><div class="item_title">
<?php
$res=mysql_query("SELECT * FROM 10branch WHERE id='40'"); //
while($rows=mysql_fetch_assoc($res)) 
    if(($rows["visiable"])&&($rows["id"]!=0))//
    {
if($_GET[lan]==chs)	
    	{
    	echo $rows["item"];//
    	}
if($_GET[lan]==eng)	
    	{
    	echo $rows["item_eng"];//
    	}
    } 

?>


</div></div></td><td><div class="item">&nbsp;</div></td></tr>
<?php
//-------------------------------------------------------------------
$res=mysql_query("SELECT * FROM 20article WHERE itm_id=40 ORDER BY id desc LIMIT 6"); //
while($rows=mysql_fetch_assoc($res)) 
    	{
if($_GET[lan]==chs)
{
    	echo "<tr><td><div class='list'><li><a href=article_view.php?id=".$rows["id"]."&itm_id=".$rows["itm_id"]."&lan=chs>".mb_substr($rows["title_chs"],0,18,'utf-8')."</a></li></div></td><td></td></tr>";//
}
if($_GET[lan]==eng)
{
    	echo "<tr><td><div class='list'><li><a href=article_view.php?id=".$rows["id"]."&itm_id=".$rows["itm_id"]."&lan=eng>".mb_substr($rows["title_eng"],0,35,'utf-8')."</a></li></div></td><td></td></tr>";//
}


    	}
//------------------------------------------------------------------------	
?>
</table>






</div>
<div id="flash09">  <!--  09flash动画层  -->
<EMBED width="1000px" height="140px"  src="
<?php
$res=mysql_query("SELECT * FROM 50config WHERE id='1'");   //flash地址存在数据库，可通过后台修改
$rows=mysql_fetch_assoc($res);
$siteflash=$rows["siteflash"]; 
 echo $siteflash; 
?>
?>
" type=application/x-shockwave-flash; quality="high"/>

</div>
<div id="jiangzuo10"><!--  10讲座与机会层  -->




<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr><td><div class="item"><div class="item_title">
<?php
$res=mysql_query("SELECT * FROM 10branch WHERE id='50'"); //
while($rows=mysql_fetch_assoc($res)) 
    if(($rows["visiable"])&&($rows["id"]!=0))//
    {
if($_GET[lan]==chs)	
    	{
    	echo $rows["item"];//
    	}
if($_GET[lan]==eng)	
    	{
    	echo $rows["item_eng"];//
    	}
    } 

?>

</div></div></td><td><div class="item">&nbsp;</div></td></tr>
<?php
//-------------------------------------------------------------------
$res=mysql_query("SELECT * FROM 20article WHERE itm_id=50 ORDER BY id desc LIMIT 6"); //
while($rows=mysql_fetch_assoc($res)) 
    	{
if($_GET[lan]==chs)
{
    	echo "<tr><td><div class='list'><li><a href=article_view.php?id=".$rows["id"]."&itm_id=".$rows["itm_id"]."&lan=chs>".mb_substr($rows["title_chs"],0,15,'utf-8')."</a></li></div></td><td><div class='date'>".$rows["date"]."</div></td></tr>";//
}
if($_GET[lan]==eng)
{
    	echo "<tr><td><div class='list'><li><a href=article_view.php?id=".$rows["id"]."&itm_id=".$rows["itm_id"]."&lan=eng>".mb_substr($rows["title_eng"],0,20,'utf-8')."</a></li></div></td><td><div class='date'>".$rows["date"]."</div></td></tr>";//
}


    	}
//------------------------------------------------------------------------	
?>
</table>






</div>
<div id="dianping11">   <!--  11论文点评层  -->




<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr><td><div class="item"><div class="item_title">
<?php
$res=mysql_query("SELECT * FROM 10branch WHERE id='60'"); //
while($rows=mysql_fetch_assoc($res)) 
    if(($rows["visiable"])&&($rows["id"]!=0))//
    {
if($_GET[lan]==chs)	
    	{
    	echo $rows["item"];//
    	}
if($_GET[lan]==eng)	
    	{
    	echo $rows["item_eng"];//
    	}
    } 

?>

</div></div></td><td><div class="item">&nbsp;</div></td></tr>
<?php
//-------------------------------------------------------------------
$res=mysql_query("SELECT * FROM 20article WHERE itm_id=60 ORDER BY id desc LIMIT 6"); //
while($rows=mysql_fetch_assoc($res)) 
    	{
if($_GET[lan]==chs)
{
    	echo "<tr><td><div class='list'><li><a href=article_view.php?id=".$rows["id"]."&itm_id=".$rows["itm_id"]."&lan=chs>".mb_substr($rows["title_chs"],0,17,'utf-8')."</a></li></div></td><td></td></tr>";//
}
if($_GET[lan]==eng)
{
    	echo "<tr><td><div class='list'><li><a href=article_view.php?id=".$rows["id"]."&itm_id=".$rows["itm_id"]."&lan=eng>".mb_substr($rows["title_eng"],0,25,'utf-8')."</a></li></div></td><td></td></tr>";//
}


    	}
//------------------------------------------------------------------------	
?>
</table>

</div>
<div id="jiaoliu12">  <!--  12交流区层  -->

<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr><td><div class="item"><div class="item_title">
<?php
$res=mysql_query("SELECT * FROM 10branch WHERE id='70'"); //
while($rows=mysql_fetch_assoc($res)) 
    if(($rows["visiable"])&&($rows["id"]!=0))//
    {
if($_GET[lan]==chs)	
    	{
    	echo $rows["item"];//
    	}
if($_GET[lan]==eng)	
    	{
    	echo $rows["item_eng"];//
    	}
    } 

?>


</div></div></td><td><div class="item">&nbsp;</div></td></tr>
<?php
//-------------------------------------------------------------------
$res=mysql_query("SELECT * FROM 40bbs WHERE subid=0 ORDER BY id desc LIMIT 6"); //
while($rows=mysql_fetch_assoc($res)) 
    	{
if($_GET[lan]==chs)
{
    	echo "<tr><td><div class='list'><li><a href=bbs.php?id=".$rows["id"]."&mode=read&lan=chs>".$rows["username"]." 说 ".mb_substr($rows["title"],0,14,'utf-8')."</a></li></div></td><td></td></tr>";//
}
if($_GET[lan]==eng)
{
    	echo "<tr><td><div class='list'><li><a href=bbs.php?id=".$rows["id"]."&mode=read&lan=eng>".$rows["username"]." says ".mb_substr($rows["title"],0,14,'utf-8')."</a></li></div></td><td></td></tr>";//
}

    	}
//------------------------------------------------------------------------	
?>
</table>



</div>
<div id="youqing13"> <!--  13友情链接层  -->
<div class="item"><div class="item_title">
<?php
if($_GET[lan]==chs)
{echo "友情链接";}
if($_GET[lan]==eng)
{echo "Links";}
?>
</div>

<?php
$res=mysql_query("SELECT * FROM 10branch WHERE id<=5 AND id>=3 ORDER BY id"); //
while($rows=mysql_fetch_assoc($res)) 
    {
	 echo "<div class='links'><a href=".$rows["address"]." target=_blank><img src=".$rows["item_eng"]." width=130px height=40px border=0></a></div>";

	}


?>


</div>



</div>
</td></tr></table>
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