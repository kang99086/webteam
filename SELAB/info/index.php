<html><head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Software Engineering Lab - Students Info Tables</title>
	<!--[if IE]>
	<script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" type="text/css">
	<link rel="stylesheet" href="../common/styles/reset-1.6.1.css" type="text/css">
	<link rel="stylesheet" href="../common/styles/jquery-ui.css" type="text/css">
	<link rel="stylesheet" href="../common/styles/font-awesome-4.0.3/css/font-awesome.min.css" type="text/css">
	<link rel="stylesheet" href="../common/styles/common.css" type="text/css">
	<link rel="shortcut icon" href="../common/images/SelabFavicon.png" type="image/png">
	<link rel="stylesheet" href="styles/students_info.css" type="text/css">

	<script type="text/javascript" src="../common/scripts/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="../common/scripts/jquery-ui.js"></script>
	<script type="text/javascript" src="../common/scripts/buffered-keyup.js"></script>
	<script type="text/javascript" src="../common/scripts/common.js"></script>

</head>

<body style="">
	<header role="banner">
		<div class="container">
			<nav role="navigation" style="top: 0px;">
				<div id="logo" class="pull-left"><a href="https://selab.hanyang.ac.kr/"><img src="./Software Engineering Lab - Publications_files/selab_logo_S.png"></a></div>
				<ul id="menu" class="inline-list pull-left">
					<li class="pull-left"><a href="https://selab.hanyang.ac.kr/notice">NOTICE</a></li>
					<li class="pull-left"><a href="https://selab.hanyang.ac.kr/members">MEMBERS</a></li>
					<li class="pull-left"><a href="https://selab.hanyang.ac.kr/research">RESEARCH</a></li>
					<li class="pull-left"><a href="https://selab.hanyang.ac.kr/publications" class="selected">PUBLICATIONS</a></li>
					<li class="pull-left"><a href="https://selab.hanyang.ac.kr/courses">COURSES</a></li>
					<li class="pull-left"><a href="https://selab.hanyang.ac.kr/gallery">GALLERY</a></li>
				</ul>
				<div role="login" class="pull-right">
					<a href="https://selab.hanyang.ac.kr/login/index.php?source=/publications/index.php">LOGIN</a>
				</div>
				<a id="contact" href="https://selab.hanyang.ac.kr/contact" class="pull-right">CONTACT</a>
			</nav>
		</div>
	</header>

	<main role="main" style="height: 720px;">
		<div class="container">
			<div class="contents">
				<h1>STUDENTS INFORMATION</h1>
				<div id="tab">
					<div class="first-tab" data-type="ALL">All students</div>
					<div class="deactive" data-type="CA">Class A</div>
					<div class="deactive" data-type="CB">Class B</div>
				</div>
				<div id="studentTables">
					<div id="hl"></div>
				  <!-- 모든학생 출력 -->
					<table class="ALL">
						<tbody>
							<tr>
								<th>Name</th>
								<th>Id</th>
								<th>Class</th>
								<th>Attendence</th>
							</tr>
							<tr>
								<td>홍길두</td>
								<td>2022222221</td>
								<td>A</td>
								<td>X</td>
							</tr>
							<tr>
								<td>홍길동</td>
								<td>2022222222</td>
								<td>B</td>
								<td>O</td>
							</tr>
						</tbody>
					</table>
					<!-- Class A학생들 출력 -->
					<table class="display_none CA" style="display: none;">
						<tbody>
							<tr>
								<th>Name</th>
								<th>Id</th>
								<th>Class</th>
								<th>Attendence</th>
							</tr>

							<?php
							  #요런식으로 테이블 생성해주면 됨, 그냥 예시
								#$students = "db에서 가져온 Class A 학생들";
							  #foreach ($studentsA as $student) {
									#학생 1명의 정보
									#list($name, $id, $class, $attendence) = explode(" ", $student);
									?>
							  	<tr>
										<td>$name</td>
										<td>$id</td>
										<td>$class</td>
										<td>$attendence</td>
									</tr>
							<?php
						    #}
							?>

						</tbody>
					</table>

          <!-- Class B학생들 출력 -->
					<table class="display_none CB" style="display: none;">
						<tbody>
							<tr>
								<th>Name</th>
								<th>Id</th>
								<th>Class</th>
								<th>Attendence</th>
							</tr>
						</tbody>
					</table>
				</div>

			</div>
		</div>
	</main>

	<footer role="contentinfo">
		<div class="container">
			<p>COPYRIGHT 2014 SELAB, ALL RIGHTS RESERVED. COMPUTER SCIENECE AND ENGINEERING, HANYANG UNIV. LOCATION: ENGINEERING BUILDING #3, ROOM 421. T +82-31-400-4754</p>
		</div>
	</footer>


</body>

</html>
