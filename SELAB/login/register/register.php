<?php
	include "../../DB_Connect.php";
	$db = connect();

	$id=$_POST['ID'];
	$pw=password_hash($_POST['password'],PASSWORD_DEFAULT);
	$name=$_POST['name'];
	$section=$_POST['selectedClass'];
	$major=$_POST['department'];
	$question_no=$_POST['selectedQuestion'];
	$question_answer=$_POST['ans'];

	$st = $db->prepare("INSERT INTO students VALUES ('$id','$pw','$name','$section','$major','$question_no','$question_answer')");
	$st->execute();
	echo
	"<script>
			window.alert('회원가입이 완료되었습니다!');
			location.href='../login.html'
	</script>";
?>
