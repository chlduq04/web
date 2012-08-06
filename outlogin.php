<?
session_start(); // 세션시작입니다. 항상젤위에 있어야합니다,,
?>
<script>
function logout(){
	location.href = "/ajaxEx/logout.php";
	}
function join(){
	location.href = "/ajaxEx/join.php";
	}
</script>
<form method='POST' action='./login.php'>
	<?
	$_SESSION['userID']=="";
	$_SESSION['password']=="";	
	if($_SESSION['userID']=="") {
		echo "<input name='id'> <br>";
		echo "<input type='password' name='pwd'> <br>";
		echo "<input type='submit' value='로그인'>";
		echo "</form>";
	}
	else {
		$userID = $_SESSION['userID'];
		$userName = $_SESSION['userName'];
		?>
	<script>alert("<?echo($userID)?> 님이 접속중이고 <?echo($userName)?>님 반갑습니다");</script>
	</form>
	<button name=logout onclick="logout()">로그아웃</button>
	<?
	}
	?>
<button name=logout onclick="join()">회원가입</button>	


