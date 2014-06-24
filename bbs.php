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

<table  width=100% cellpadding="0" cellspacing="0" class="bgline">
<tr><td align="center">
<?php
include_once("header.php");
?>

</td></tr>
<tr><td align="center">

<div  id="main">

<table border="0" cellpadding="0" cellspacing="0" width=100% height="500px"><tr><td >


<div class="bbs_list">

<?php
error_reporting(0);
if($_GET["mode"]==delete)
	{
	$resdel=mysql_query("SELECT * FROM 40bbs WHERE  id = '$_GET[id]'"); //
	$rows=mysql_fetch_assoc($resdel);

	$res=mysql_query("DELETE FROM 40bbs WHERE id = '$_GET[id]' OR subid = '$_GET[id]'");
	if($res)
		{
		echo "删除成功";
		}
header("Location:bbs.php?lan=".$_GET["lan"]."");
	}




if($_GET["mode"]!=topic)
{
       echo "<div style='font-size:14px;padding:10px 0px 10px 25px; font-weight:bold; color:#666666;'>";
	   
if($_GET[lan]==chs)
{echo "话题区";}
if($_GET[lan]==eng)
{echo "Topics";}		   
	   
	   echo " <a href=bbs.php?mode=topic&lan=".$_GET["lan"].">";
	   

if($_GET[lan]==chs)
{echo "发表话题";}
if($_GET[lan]==eng)
{echo "New Topic";}

	   
	   echo "</a></div>";
//-------------------------------------------------------------------


if(1)
{

$lan=$_GET['lan'];

        
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
    $pages="SELECT count(*) as amount FROM 40bbs WHERE subid=0";
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
	if(!empty($id)){ $sql="SELECT * FROM 40bbs WHERE subid=0";  echo "bbbbbbbbb";}
    else{
        $sql="SELECT * FROM 40bbs WHERE subid=0  order by id DESC limit ".($page-1)*$page_size.",".$page_size."";}
        $res=mysql_query($sql) or die(mysql_error());
        while($row=mysql_fetch_array($res))
        {
		    echo "<table  border='0' cellpadding='0' cellspacing='0'><tr><td width=350px valign='top'>";
    		echo "<tr><td><li>";
if ($_COOKIE["auth"]>=2)
{echo "<a href=bbs.php?id=".$row["id"]."&mode=delete&lan=".$_GET["lan"].">删</a> ";}
			
			if($_GET["page"]==""){$_GET["page"]=1;}
			echo "<a href=bbs.php?id=".$row["id"]."&mode=read&lan=".$_GET["lan"]."&page=".$_GET["page"].">".mb_substr($row["title"],0,21,'utf-8')."</a></td><td><div class='date'>".$row["username"]."|".$row["date"]."|</div></li>";//
			echo "</td></tr></table>";
			
			
        }
	echo "<div class=page><table width=450px border='0' cellspacing='0' cellpadding='0'>
     <tr><td width=200px>";

	
	

    $page_string='';
    if($page==1){
        echo "第一页 | 上一页 | ";
    }
    else{
        echo "<a href=bbs.php?lan=".$_GET['lan']."&page=1>第一页</a> | <a href=bbs.php?lan=".$_GET['lan']."&page=".($page-1).">上一页</a> | ";
    }
    if(($page==$page_count) || ($page_count == 0)){
        echo "下一页 | 尾页";
    }
    else{
        echo "<a href=bbs.php?&lan=".$_GET['lan']."&page=".($page+1).">下一页</a> | <a hrefbbs.php?&lan=".$_GET['lan']."&page=".$page_count.">尾页</a>";
    }
    
	echo "</td>";
}
 ?>
                

    <td >&nbsp;</td>
    <td width="200px" align="right">当前<?php echo "$page";?>/<?php echo "$page_count";?>页
                            
                              <?php $page_string ?>
                              | 转到第
                              <select name="sel_page" onChange="javascript:location=this.options[this.selectedIndex].value;">
                                <?php
       for($i = 1 ;$i <=$page_count;$i++){
     if($i==$page){
    ?>
                                <option value="bbs.php?&lan=<?php echo $_GET['lan'];?>&page=<?php echo $i;?>" selected />
                                <?php echo $i;?>
                                <?php }
     else
     { ?>
                                <option value="bbs.php?&lan=<?php echo $_GET['lan'];?>&page=<?php echo $i;?>" />
                                  <?php echo $i;?>
                                  </option>
                                <?php }
        }    ?>
                              </select>
                              页</td>
  </tr>
</table>
<?php  echo "</div>";  ?>


<?php

//------------------------------------------------------------------------
}

if($_GET["mode"]==topic)
{
       echo "<div style='font-size:14px;padding:10px 0px 10px 25px; font-weight:bold; color:#666666;'>";
	   
if($_GET[lan]==chs)
{echo "话题区";}
if($_GET[lan]==eng)
{echo "Topics";}		   
	   
	   echo " <a href=bbs.php?lan=".$_GET["lan"].">";
	   
if($_GET[lan]==chs)
{echo "返回列表";}
if($_GET[lan]==eng)
{echo "Back";}	   
	   
	   echo "</a></div>";
//-------------------------------------------------------------------
echo "<div class='txtarea'>
<form action=bbs.php?mode=topic&lan=".$_GET["lan"]." method=post>
";
if($_GET[lan]==chs)
{echo "主题";}
if($_GET[lan]==eng)
{echo "Topic";}


echo "<br/>
<input name=title  style='width:440px;' value='$title'  ><br/>
";
	   
if($_GET[lan]==chs)
{echo "内容";}
if($_GET[lan]==eng)
{echo "Content";}		   
	   
	   echo "
<br/>
<textarea name=content style='width:440px; height:300px;'></textarea><br/>

<input type=hidden name=mode value='topic'>
<input name=submit type=submit value='";
	   
if($_GET[lan]==chs)
{echo "提交";}
if($_GET[lan]==eng)
{echo "Submit";}		   
	   
	   echo "'>
<input type=reset name=reset value='";
	   
if($_GET[lan]==chs)
{echo "重写";}
if($_GET[lan]==eng)
{echo "Reset";}		   
	   
	   echo "'>
</form>
</div>
";

if($_COOKIE["auth"]>0){

	if($_POST["title"])
	{
	echo "主题不能为空";
	$title=$_POST["title"];
	$content=$_POST["content"];
	$username=$_COOKIE["username"];
	$date=date("Y-m-d");
		$res=mysql_query("INSERT INTO 40bbs (title,content,date,username) VALUES ('$title','$content','$date','$username')");
		if($res){ echo header("Location:bbs.php?lan=".$_GET["lan"]."");}

	}
}

if($_COOKIE["auth"]==0) { echo "<script>alert('没有发言权限');history.back(-1);</script>"; 	exit;}

//------------------------------------------------------------------------
}



	
?>

</div>
</td><td>
<div class="bbs_view">

<?php 
if(!$_GET["mode"])
{
echo "<div class='bbs_bnr'></div>";
}





error_reporting(0);
if($_GET["mode"]==read)
{
$id=$_GET["id"];


       echo "<div style='font-size:14px;padding:10px 0px 10px 25px; font-weight:bold; color:#666666;'>";
	   
if($_GET[lan]==chs)
{echo "阅读文章 ";}
if($_GET[lan]==eng)
{echo "Reading area ";}		   
	   
	   echo "<a href=bbs.php?id=$id&mode=sub&lan=".$_GET["lan"].">";
	   
if($_GET[lan]==chs)
{echo " 回复该话题";}
if($_GET[lan]==eng)
{echo " Reply the Topic";}		   
	   
	   echo "</a></div>";
	   
//-------------------------------------------------------------------
$res=mysql_query("SELECT * FROM 40bbs WHERE id='$id' "); //
while($rows=mysql_fetch_assoc($res)) 
    	{
		if($rows["subid"]==0)
			{
    		echo "<div class='bbs_title'>";
	   
if($_GET[lan]==chs)
{echo "主题：";}
if($_GET[lan]==eng)
{echo "Titie : ";}		   
	   
	   echo "".$rows["title"]."</div>";//
			echo "<div class='bbs_username'>".$rows["username"]."——".$rows["date"]."</div>";//
    		echo "<div class='bbs_content'>".$rows["content"]."</div>";//
    		}
		}
$ressub=mysql_query("SELECT * FROM 40bbs WHERE subid='$id'  ORDER BY id "); //
while($rowssub=mysql_fetch_assoc($ressub)) 
    	{
		echo "<table  border='0' cellpadding='0' cellspacing='0'><tr><td width=350px valign='top'>";
		echo "<div class='sublist'><li><div class='bbs_subcontent'>";
if ($_COOKIE["auth"]>=2)
{echo "<a href=bbs.php?id=".$rowssub["id"]."&mode=delete&lan=".$_GET["lan"].">删</a> ";}
			
			
			echo ">>".$rowssub["content"]."</div>";//
		echo "</td><td valign='top'><div class='bbs_subusername'>".$rowssub["username"]."";
	   
if($_GET[lan]==chs)
{echo "于";}
if($_GET[lan]==eng)
{echo " at ";}		   
	   
	   echo "".$rowssub["date"]."</div></li></div>";//
    	echo "</td></tr></table>";
		}		
//------------------------------------------------------------------------	
}
if($_GET["mode"]==sub)
{
$id=$_GET["id"];
       echo "<div style='font-size:14px;padding:10px 0px 10px 25px; font-weight:bold; color:#666666;'>";
	   
if($_GET[lan]==chs)
{echo "阅读文章";}
if($_GET[lan]==eng)
{echo "Reading area ";}		   
	   
	   echo "<a href=bbs.php?id=$id&mode=read&lan=".$_GET["lan"].">";
	   
if($_GET[lan]==chs)
{echo " 返回话题";}
if($_GET[lan]==eng)
{echo " Back";}		   
	   
	   echo "</a></div>";
$subid=$_GET["id"];
echo "
<div class='txtarea'>
<form action=bbs.php?id=$subid&mode=sub&lan=".$_GET["lan"]." method=post>";
	   
if($_GET[lan]==chs)
{echo "回复内容";}
if($_GET[lan]==eng)
{echo "Reply:";}		   
	   
	   echo "<br/>
<textarea name=content style='width:440px; height:100px;'></textarea><br/>
<input type=hidden name=mode value='sub'>
<input name=submit type=submit value='";
	   
if($_GET[lan]==chs)
{echo "提交";}
if($_GET[lan]==eng)
{echo "Submit";}		   
	   
	   echo "'>
<input type=reset name=reset value='";
	   
if($_GET[lan]==chs)
{echo "重写";}
if($_GET[lan]==eng)
{echo "Reset";}		   
	   
	   echo "'>
</form>
</div>
";

if($_COOKIE["auth"]>0){
$id=$_GET["id"];
	if($_POST["content"])
	{

	$date=date("Y-m-d");
	$content=$_POST["content"];
	$username=$_COOKIE["username"];
		$res=mysql_query("INSERT INTO 40bbs (subid,content,date,username) VALUES ('$subid','$content','$date','$username')");
		if($res){ echo "<script>
		window.navigate('bbs.php?id=$id&mode=read&lan=".$_GET["lan"]."');
		</script>";}

	}
}
if($_COOKIE["auth"]==0) { echo "<script>alert('没有发言权限');history.back(-1);</script>; 	exit;";}

}
?>






</div>
</td></tr></table>





</div>

<!-- div main*/ -->



</td></tr></table>


<table  width=100% cellpadding="0" cellspacing="0">
<tr><td align="center">
<?php
include_once("footer.php");
?>

</td></tr></table>

</body>

</html>