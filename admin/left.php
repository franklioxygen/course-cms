
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

<body>
<div class="left">
  <div id="lft">

    <ul id="submenu_1" class="dis">
      <li class="left_link" onClick="DoLocation(this)"><a href="add.php" target="mainFrame">添加文章</a></li>
      <li class="left_link" onClick="DoLocation(this)"><a href="user_manager.php" target="mainFrame">用户管理</a></li>
      <li class="left_link" onClick="DoLocation(this)"><a href="item_manager.php" target="mainFrame">栏目管理</a></li>
      <li class="left_link" onClick="DoLocation(this)"><a href="article_manager.php?itm_id=0" target="mainFrame">公告</a></li>
      <li class="left_link" onClick="DoLocation(this)"><a href="article_manager.php?itm_id=1" target="mainFrame">简介</a></li>

<?php
//-------------------------------------------------------------------
$res=mysql_query("SELECT * FROM 10branch ORDER BY id"); //
while($rows=mysql_fetch_assoc($res)) 
    if($rows["visiable"]&&$rows["id"]!=0&&$rows["id"]!=70)//
    {
    	{
    	echo "<li class='left_link' onClick='DoLocation(this)'><a href=article_manager.php?itm_id=".$rows["id"]." target='mainFrame'>".$rows["item"]."</a></li>";//

    	}
    } 
//------------------------------------------------------------------------	
?>

    <li class="left_link" onClick="DoLocation(this)"><a href="links_manager.php" target="mainFrame">友情链接</a></li>
    <li class="left_link" onClick="DoLocation(this)"><a href="config.php" target="mainFrame">网站设置</a></li>
    </ul>

  </div>
</div>
</div>
</body>
</html>
