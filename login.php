<?
session_start(); // ���� ����
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
        		alert('���̵�� ��й�ȣ�� �ùٸ��� �Է��ϼ���');
        		history.back();
        		</script>
<?
}

if(!$row||$row==0) {
	?>
<script>
        		alert('��ϵ� ����ڰ� �����ϴ�');
        		history.back();
        		</script>
<?
}
else {
	$Userpwd = $pwd;
	$DB_pwd=$arr[0]; // ���⼱ $arr[0]�� DB�� �����pwd�Դϴ�.
	if($Userpwd == $DB_pwd)
	{
		$_SESSION['userID']=$id;
		$_SESSION['userName']=$arr[1]; // $arr[1]�� DB�� �����name.
		?><script>location.replace('./outlogin.php');</script><?
				
	}
	else
	{
		$_SESSION['userID']=null;
		$_SESSION['userName']=null; // $arr[1]�� DB�� �����name.
		?>
<script>alert('��й�ȣ�� Ʋ�Ƚ��ϴ�.'); history.back();</script>
<?
	}
}
?>