<?
session_cache_limiter('');
session_start();
include './connect_sql.php';
$_SESSION['userID']=null;
$_SESSION['userName']=null;
?>
<script>alert("·Î±×¾Æ¿ô µÇ¼Ë½À´Ï´Ù.");</script>
<script>location.replace('./outlogin.php');</script>