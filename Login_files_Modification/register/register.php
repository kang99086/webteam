<?php

	$id = $_POST['id'];
	$pw = $_POST['pw'];
	$pwc = $_POST['pwc'];
	$studentid = $_POST['studentid'];
	$name = $_POST['name'];
	$section = $_POST['section'];

	if($pw!=$pwc)
	{
		echo "비밀번호와 비밀번호 확인이 서로 다릅니다.";
		echo "<a href=register.html>back page</a>";
		exit();
	}
	if($id==NULL || $pw==NULL || $studentid==NULL || $name==NULL || $section==NULL )
	{
		echo "빈 칸을 모두 채워주세요";
		echo "<a href=register.html>back page</a>";
		exit();
	}

	$host="localhost";
	$user="root";
	$password="";
	$con=mysql_connect($host,$user,$password);
	if(!$con) {
		echo 'Connect'

		$db = mysql_select_db("stduent",$con);
		$check=mysql_query("SELECT * from student where id='$id'",$db);

		if($check)
		{
			echo "중복된 id입니다."
			echo "<a href=register.html>back page</a>"
			exit();
		}

		$register=mysql_query("INSERT INTO student VALUES('$id','$pw','$studentid','name','section')",$db);
	}
	else{
		echo 'not connect'
	}
?>
