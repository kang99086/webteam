<?php
	include "../../DB_Connect.php";
	$db = connect();

	$id=$_POST['id'];
	$question_no=$_POST['selectedQuestion'];
	$question_answer=$_POST['ans'];

	$check_sql = "select id,question_no,question_answer from students where id='$id'";
	$check_stt=$db->prepare($check_sql);
	$check_stt->execute();

	foreach($check_stt as $ch){
		if($ch['id'] == $id and $ch['question_no'] == $question_no and $ch['question_answer'] == $question_answer){
			$_SESSION['id']=$_POST['id'];
			echo
			"<script>
				location.href='changePW.html';
			</script>";
		}
		else{
			echo
			"<script>
				window.alert('존재하지 않는 회원입니다.');
				location.href='findPW.html';
			</script>";
		}
	}
?>
