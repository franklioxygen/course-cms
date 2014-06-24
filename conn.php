
<?php
$link=mysql_connect("localhost","root","");//数据库密码留空
mysql_query("SET NAMES UTF8");
mysql_select_db("course", $link); //选择数据库
//if($link) echo "连接数据库成功!";
if(!$link) echo "连接数据库失败!";
$host = "localhost";
$dbname = "course";
$user = "root"

?> 

<?php
    error_reporting(0);
    unset($onlineip);
    if($_SERVER['HTTP_CLIENT_IP']){
    $onlineip=$_SERVER['HTTP_CLIENT_IP'];
    }elseif($_SERVER['HTTP_X_FORWARDED_FOR']){
    $onlineip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
    $onlineip=$_SERVER['REMOTE_ADDR'];
    }
   // echo $onlineip; 
?>