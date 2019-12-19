<?php
	extract($_POST);
	date_default_timezone_set('Asia/Seoul');
    $id = $_POST['id'];
    $date = date("Y-m-d");
	$time = date("H:i:s");
	include_once 'dbconnect.php'; // DB 연결
	$sql = "INSERT INTO attendance_check (attendance_date, attendance_time,  student_id) VALUES ('".$date."','".$time."','$id')";
	$result = mysqli_query($dbconn, $sql);
	if($result){
		echo 1;
	} else {
		echo 0;
	}
?>
