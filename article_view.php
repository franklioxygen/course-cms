<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="images/article_view.css" rel="stylesheet" type="text/css" />
<title>
<?php
include_once("sitetitle.php"); 
?>
</title>
</head>
<body topmargin="0">

<table  width=100% cellpadding="0" cellspacing="0" class="bgline"><tr><td align="center">
<?php
include_once("header.php");
?>
</td></tr>
<tr><td align="center">

<div  id="main">
<table cellpadding="0" cellspacing="0" width=100% height=100%><tr>
<td align="left" valign="top" width="250px">
<div class="list_item">&nbsp;
<?php
error_reporting(0);
echo "<div class='text'>";
if($_GET[lan]==chs)
{


if($_GET[itm_id]==0){	echo " <a href=article_view.php?id=main&itm_id=".$_GET["itm_id"]."&lan=".$_GET["lan"].">公&nbsp;&nbsp;告</a>";}
if($_GET[itm_id]==1){	echo"<a href=article_view.php?id=main&itm_id=".$_GET["itm_id"]."&lan=".$_GET["lan"].">简&nbsp;&nbsp;介</a>";}

$res=mysql_query("SELECT * FROM 10branch ORDER BY id"); //
while($rows=mysql_fetch_assoc($res))
	{
    	if(($rows["visiable"])&&($rows["id"]==$_GET["itm_id"])&&($rows["id"]!=0))//
    	{
		echo "<a href=article_view.php?id=main&itm_id=".$_GET["itm_id"]."&lan=".$_GET["lan"].">".$rows["item"]."</a>";
		if($_GET[itm_id]==70){	header("Location:bbs.php?lan=$_GET[lan]");}
		}
	}
}


if($_GET[lan]==eng)
{
if($_GET[itm_id]==0){	echo " <a href=article_view.php?id=main&itm_id=".$_GET["itm_id"]."&lan=".$_GET["lan"].">Attention</a>";}
if($_GET[itm_id]==1){	echo"<a href=article_view.php?id=main&itm_id=".$_GET["itm_id"]."&lan=".$_GET["lan"].">Introduction</a>";}

$res=mysql_query("SELECT * FROM 10branch ORDER BY id"); //
while($rows=mysql_fetch_assoc($res))
	{
    	if(($rows["visiable"])&&($rows["id"]==$_GET["itm_id"]))//
    	{
		echo "<a href=article_view.php?id=main&itm_id=".$_GET["itm_id"]."&lan=".$_GET["lan"].">".$rows["item_eng"]."</a>";
		if($_GET[itm_id]==70){	header("Location:bbs.php?lan=$_GET[lan]");}
		}
	}



}

echo"</div>";


?>
</div>
<div class="list_hot">
<div class="text">
<?php
       echo "<div style='font-size:14px;padding:10px 0px 10px 25px; font-weight:bold; color:#888888;'>";
	   

if($_GET[lan]==chs)
{echo "热门文章";}
if($_GET[lan]==eng)
{echo "Popular articles";}

	   
	   echo "</div>";
//-------------------------------------------------------------------
	$reshot=mysql_query("SELECT * FROM 50config WHERE id='1'");
	$rowshot=mysql_fetch_assoc($reshot);
	$hotsize=$rowshot["hotsize"];   


$res=mysql_query("SELECT * FROM 20article WHERE itm_id='$_GET[itm_id]' ORDER BY click_throughs desc LIMIT $hotsize "); //
while($rows=mysql_fetch_assoc($res)) 
    	{
if($_GET[lan]==chs)
{
    	echo "<div class='list'><li><a href=article_view.php?id=".$rows["id"]."&itm_id=".$rows["itm_id"]."&lan=".$_GET["lan"].">".mb_substr($rows["title_chs"],0,17,'utf-8')."</a></li></div>";//
}
if($_GET[lan]==eng)
{
    	echo "<div class='list'><li><a href=article_view.php?id=".$rows["id"]."&itm_id=".$rows["itm_id"]."&lan=".$_GET["lan"].">".mb_substr($rows["title_eng"],0,30,'utf-8')."</a></li></div>";//
}
    	}
//------------------------------------------------------------------------	
?>
</div>


</div>
</td>


<td  align="left" valign="top" width="750px" align="center">


<div class="article">

<?php
if($_GET[id]==main){
        echo "<div class='art_title'>";
if($_GET[lan]==chs)
{echo "文章列表";}
if($_GET[lan]==eng)
{echo "Articles' list";}		
		echo"</div>";
}

?>






<?php
if($_GET[id]==main)
{
$itm_id=$_GET['itm_id'];
$lan=$_GET['lan'];


    $id=$_GET['id'];
        
    if(isset($_GET['page'])){
        $page=intval($_GET['page']);
    }
    else{
        $page = 1;
    } 
	$respg=mysql_query("SELECT * FROM 50config WHERE id='1'");
	$rowspg=mysql_fetch_assoc($respg);
	$pgsize=$rowspg["pgsize"];   
    $page_size=$pgsize;
    $pages="SELECT count(*) as amount FROM 20article WHERE itm_id='$itm_id'";
    $result=mysql_query($pages);
    while($row=mysql_fetch_row($result)){
    $amount=$row[0];
    }
    //    echo $amount;

    if($amount){
        if($amount<$page_size){$page_count=1;} //如果总数小于$pagesize，那么只有一页

        if($amount%$page_size){$page_count=(int)($amount/$page_size)+1;} //如果有余数，则页数等于总数除以每页数的结果取整再加上一

        else {$page_count=$amount / $page_size;}    //如果没有余数，则页数等于总数除以每页的结果

    }
    //翻页链接
	if(empty($id)){ $sql="SELECT * FROM 20article where id='$id'";  echo "bbbbbbbbb";}
    else{
        $sql="SELECT * FROM 20article WHERE itm_id=$itm_id  order by id DESC limit ".($page-1)*$page_size.",".$page_size."";}
        $res=mysql_query($sql) or die(mysql_error());
        while($row=mysql_fetch_array($res))
        {
			
if($_GET[lan]==chs)
{
    	echo "<li><div class='list'><a href=article_view.php?id=".$row["id"]."&itm_id=".$row["itm_id"]."&lan=".$_GET["lan"].">".mb_substr($row["title_chs"],0,35,'utf-8')."</a></div><div class='date'>".$row["date"]."</div></li>";//
}
if($_GET[lan]==eng)
{
    	echo "<li><div class='list'><a href=article_view.php?id=".$row["id"]."&itm_id=".$row["itm_id"]."&lan=".$_GET["lan"].">".mb_substr($row["title_eng"],0,35,'utf-8')."</a></div><div class='date'>".$row["date"]."</div></li>";//
}
			
			
			
        }
	echo "<div class=page><table width=590px border='0' cellspacing='0' cellpadding='0'>
     <tr><td width=240px>";

	
	

    $page_string='';
    if($page==1){
        echo "第一页 | 上一页 | ";
    }
    else{
        echo "<a href=article_view.php?id=main&itm_id=".$_GET['itm_id']."&lan=".$_GET['lan']."&page=1>第一页</a> | <a href=article_view.php?id=main&itm_id=".$_GET['itm_id']."&lan=".$_GET['lan']."&page=".($page-1).">上一页</a> | ";
    }
    if(($page==$page_count) || ($page_count == 0)){
        echo "下一页 | 尾页";
    }
    else{
        echo "<a href=article_view.php?id=main&itm_id=".$_GET['itm_id']."&lan=".$_GET['lan']."&page=".($page+1).">下一页</a> | <a href=article_view.php?id=main&itm_id=".$_GET['itm_id']."&lan=".$_GET['lan']."&page=".$page_count.">尾页</a>";
    }
    
	echo "</td>";

 ?>
                

    <td >&nbsp;</td>
    <td width="220px" align="right">当前<?php echo "$page";?>/<?php echo "$page_count";?>页
                            
                              <?php $page_string ?>
                              | 转到第
                              <select name="sel_page" onChange="javascript:location=this.options[this.selectedIndex].value;">
                                <?php
       for($i = 1 ;$i <=$page_count;$i++){
     if($i==$page){
    ?>
                                <option value="article_view.php?id=main&itm_id=<?php echo $_GET['itm_id'];?>&lan=<?php echo $_GET['lan'];?>&page=<?php echo $i;?>" selected />
                                <?php echo $i;?>
                                <?php }
     else
     { ?>
                                <option value="article_view.php?id=main&itm_id=<?php echo $_GET['itm_id'];?>&lan=<?php echo $_GET['lan'];?>&page=<?php echo $i;?>">
                                  <?php echo $i;?>
                                  </option>
                                <?php }
        }    ?>
                              </select>
                              页</td>
  </tr>
</table>
<?php  echo "</div>";  ?>
<?php  } ?>






<table cellpadding="0" cellspacing="0" border="0" width=100%><tr><td align="center">


<?php
$res=mysql_query("SELECT * FROM 20article WHERE itm_id='$_GET[itm_id]' AND id='$_GET[id]'"); //
while($rows=mysql_fetch_assoc($res)) 
    	{
echo "<div class='art_title'>";
if($_GET[lan]==chs)
{
    	echo $rows["title_chs"];//
}
if($_GET[lan]==eng)
{
    	echo $rows["title_eng"];//
}
    	}
echo "</div>";

?>

<?php
$res=mysql_query("SELECT * FROM 20article WHERE id='$_GET[id]'"); //
while($rows=mysql_fetch_assoc($res)) 
    	{

$counter=$rows["click_throughs"]+1;
$rescounter=mysql_query("UPDATE 20article SET click_throughs='$counter' WHERE itm_id='$_GET[itm_id]' AND id='$_GET[id]'");

}

?>




</td></tr>
<tr><td>
<div class="art_date">
<?php
$res=mysql_query("SELECT * FROM 20article WHERE itm_id='$_GET[itm_id]' AND id='$_GET[id]'"); //
while($rows=mysql_fetch_assoc($res)) 
    	{

if($_GET[lan]==chs)
{
    	echo "作者：".$rows["username"]."&nbsp;&nbsp;发布日期：".$rows["date"]."&nbsp;&nbsp;点击量：".$rows["click_throughs"]."&nbsp;&nbsp;<a href=article_view.php?id=main&itm_id=".$_GET["itm_id"]."&lan=".$_GET["lan"].">返回列表</a>";//
}
if($_GET[lan]==eng)
{
    	echo "Author ".$rows["username"]."&nbsp;&nbsp; Last updated at ".$rows["date"]."&nbsp;&nbsp;Clicks ".$rows["click_throughs"]."&nbsp;&nbsp;<a href=article_view.php?id=main&itm_id=".$_GET["itm_id"]."&lan=".$_GET["lan"].">BACK</a>";//
}



    	}
?>
</div>
</td></tr>
<tr><td>
<div class="art_content">
<?php
$res=mysql_query("SELECT * FROM 20article WHERE itm_id='$_GET[itm_id]' AND id='$_GET[id]'"); //
while($rows=mysql_fetch_assoc($res)) 
    	{
        if($rows["pic"])
			{
			echo"<div class='art_pic'><img src=course/".$rows["pic"]." width=320px height=240px /><div class='art_pic_desc'>";
if($_GET[lan]==chs)
{
			echo $rows["picdesc_chs"];
}
if($_GET[lan]==eng)
{
			echo $rows["picdesc_eng"];
}
	
			
			echo "</div></div>";
	
			}
if($_GET[lan]==chs)
{
    	echo nl2br($rows["content_chs"]);//
}
if($_GET[lan]==eng)
{
    	echo nl2br($rows["content_eng"]);//
}
    	}
?>
<?php  
$res=mysql_query("SELECT * FROM 20article WHERE itm_id='$_GET[itm_id]' AND id='$_GET[id]'"); //
while($rows=mysql_fetch_assoc($res)) 
    	{
		if($rows["fileupload"])
			{
    		echo "<tr><td><div class='download'><a href=course/".$rows["fileupload"]."&lan=".$_GET["lan"].">下载相关文件(download file)</a></div></td></tr>";//
			}
    	}
?>
</div>
</td></tr></table>
</div>

</td>

</tr></table>
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
