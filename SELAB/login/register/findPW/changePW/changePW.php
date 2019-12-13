<?php
	include "../../DB_Connect.php";
	$db = connect();
  session_start();

	$id=$_SESSION['id'];
  $pw=password_hash($_POST['newPW'],PASSWORD_DEFAULT);

	$change_sql = "update students set pw='$pw' where id='$id'";
	$change_stt=$db->prepare($change_sql);
	$change_stt->execute();

	echo
  "<script>
    window.alert('비밀번호가 변경되었습니다.');
    location.href='../login.html';
  </script>"
?>
