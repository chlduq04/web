<?
session_start(); // 역시 젤위
include './connect_sql.php';
$id = $_POST['id'];
$pwd = $_POST['pwd'];
$sql = "select password,name from user where id = "."'".$id."'";

$que = mysql_query($sql, $dbconn);
$arr = mysql_fetch_array($que);
$row = mysql_num_rows($que);
if(!$id || !$pwd) {

	?>
<script>
        		alert('아이디와 비밀번호를 올바르게 입력하세요');
        		history.back();
        		</script>
<?
}

if(!$row||$row==0) {
	?>
<script>
        		alert('등록된 사용자가 없습니다');
        		history.back();
        		</script>
<?
}
else {
	$Userpwd = $pwd;
	$DB_pwd=$arr[0]; // 여기선 $arr[0]이 DB의 사용자pwd입니다.
	if($Userpwd == $DB_pwd)
	{
		$_SESSION['userID']=$id;
		$_SESSION['userName']=$arr[1]; // $arr[1]은 DB의 사용자name.
		?><script>location.replace('./outlogin.php');</script><?
				
	}
	else
	{
		$_SESSION['userID']=null;
		$_SESSION['userName']=null; // $arr[1]은 DB의 사용자name.
		?>
<script>alert('비밀번호가 틀렸습니다.'); history.back();</script>
<?
	}
}
?>