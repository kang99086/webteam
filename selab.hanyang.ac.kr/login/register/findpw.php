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
				window.alert('새로운 비밀번호를 입력해주세요.');
				location.href='changePW.html';
			</script>";
		}
		else{
			echo
			"<script>
				window.alert('학번과 질문 대답중에 틀린것이 있습니다.');
				history.back(-1);
			</script>";
		}
	}
?>
