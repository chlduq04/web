<?
session_cache_limiter('');
session_start();
include './connect_sql.php';
$_SESSION['userID']=null;
$_SESSION['userName']=null;
?>
<script>alert("�α׾ƿ� �Ǽ˽��ϴ�.");</script>
<script>location.replace('./outlogin.php');</script>