<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>
<?php
include_once("../sitetitle.php"); 
?>
</title>

<?php
if ($_COOKIE["auth"]<2) die ("<script>alert('没有权限！');history.back(-1);</script>");
?>
