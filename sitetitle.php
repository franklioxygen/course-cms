<?php
include_once("conn.php"); 
?>

<?php
$res=mysql_query("SELECT * FROM 50config WHERE id='1'");
$rows=mysql_fetch_assoc($res);
$sitetitle_chs=$rows["sitetitle_chs"];
$sitetitle_eng=$rows["sitetitle_eng"]; 

if($_GET["lan"]=="") echo $sitetitle_chs; 
if($_GET["lan"]==chs) echo $sitetitle_chs; 
if($_GET["lan"]==eng) echo $sitetitle_eng;  

?>