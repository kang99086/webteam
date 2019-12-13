<?php
	include "../DB_Connect.php";
	include "../top_login.php";
	$db = connect();
	$id=$_POST['id'];
	$pw=$_POST['password'];

	$login_sql = "select id,pw from students where id='$id'";
	$login_stt=$db->prepare($login_sql);
	$login_stt->execute();

	foreach($login_stt as $lo){
			if(password_verify($pw,$lo['pw']) and $lo['id']==$id){
				$_SESSION['id']=$_POST['id'];
				echo "<script>location.href='../index.html';</script>";
			}
			else{
				echo
				"<script>
					window.alert('아이디 또는 비밀번호가 일치하지 않습니다.');
					history.back(-1);
				</script>";
			}
	}
?>
