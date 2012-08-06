<script>
function repage()
{
	location.replace("/ajaxEX/login.php");
}
</script>
<?
include './connect_sql.php';
$cm = 0;
$id = trim($_POST['id']);
$passwd = trim($_POST['password']);
$name = trim($_POST['name']);

if(!eregi("special",trim("int,kr,en"))){
	if(preg_match("/[!#$%^&*()?+=\/]/",$id)) $cm = 1;
	if(preg_match("/[!#$%^&*()?+=\/]/",$name)) $cm = 1;
	if(preg_match("/[!#$%^&*()?+=\/]/",$passwd)) $cm = 1;
	if($cm!=0){
		?>
<script>
alert('아아디 비밀번호 이름에는 특수기호는 사용할 수 없습니다.');
history.back();
</script>
<?
	}
}

if(!$id||!$passwd||!$name)
{
	?>
<script>
alert('아이디와 비밀번호와 이름을 올바르게 입력하세요');
history.back();
</script>
<?
}
$sql = "select id,name from user";
$que = mysql_query($sql, $dbconn);
$arr = mysql_fetch_array($que);
$row = mysql_num_rows($que);
for($i = 0;$i<$row;$i++)
{
	$Userid = mysql_result($que,$i,0);
	$UserName = mysql_result($que,$i,1);
	if($Userid==$id)
	{
		?>
<script>
alert('이미 등록되어 있는 아이디 입니다.');
history.back();
</script>
<?
break;
	}
	if($UserName==$name)
	{
		?>
<script>
alert('이미 등록되어 있는 이름 입니다.');
history.back();
</script>
<?
break;
	}
}
$query = "insert into user (id,password,name,m_read,m_write,m_modify) values ('".$id ."','".$passwd."','".$name."','1','0','0')";
$que = mysql_query($query, $dbconn);
echo("Success!");
?>
<script>location.replace('./outlogin.php');</script>
<?
?>