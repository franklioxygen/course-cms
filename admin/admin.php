
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

<?php
if (isset($_COOKIE["auth"])>=2) echo "";
else die ("没有权限<br/>请您<a href='../index.php'>重新登陆</a>");;
?>



<frameset name="all" rows="100px,*" cols="100%" border="0" marginwidth="0" marginheight="0" style="background-color:#F8F8F8;">
  <frame src="top.php"  name="topFrame"  cols="100%"  scrolling="No" noresize="noresize" id="topFrame" title="top" border="0" marginwidth="0" marginheight="0" />
  <frameset cols="200px,*"  cols="100%">
    <frame src="left.php" name="leftFrame"  scrolling="no"  id="leftFrame" title="left"  border="0" marginwidth="0" marginheight="0"/>
    <frame src="main.php" name="mainFrame" id="mainFrame" title="main" border="0" marginwidth="0" marginheight="0"/>
  </frameset><noframes></noframes>
</frameset>

