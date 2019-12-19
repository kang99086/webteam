<!DOCTYPE html>
<html lang="ko">

<!-- Mirrored from selab.hanyang.ac.kr/courses/cse326/2019/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Oct 2019 12:22:42 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
	<meta charset="utf-8" />
	<title>Software Engineering Lab - Courses: Web Application Development</title>
	<!--[if IE]>
	<script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="../maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" type="text/css" />
	<link rel="stylesheet" href="../common/styles/reset-1.6.1.css" type="text/css" />
	<link rel="stylesheet" href="../common/styles/jquery-ui.css" type="text/css" />
	<link rel="stylesheet" href="../common/styles/font-awesome-4.0.3/css/font-awesome.min.css" type="text/css" />
	<link rel="stylesheet" href="../common/styles/common.css" type="text/css" />
	<link rel="shortcut icon" href="../common/images/SelabFavicon.png" type="image/png">
	<link rel="stylesheet" href="../courses/styles/course-home.css" type="text/css" />
	<link rel="stylesheet" href="../courses/styles/course-slides.css" type="text/css" />
	<link rel="stylesheet" href="../courses/styles/course-calendar.css" type="text/css" />

	<script type="text/javascript" src="../common/scripts/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="../common/scripts/jquery-ui.js"></script>
	<script type="text/javascript" src="../common/scripts/buffered-keyup.js"></script>
	<script type="text/javascript" src="../common/scripts/common.js"></script>
	<script type="text/javascript" src="../courses/scripts/course-page.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>

<body>
	<header role="banner">
		<div class="container">
			<nav role="navigation">
				<div id="logo" class="pull-left"><a href="../index.html"><img src="../../../common/images/selab_logo_S.png" /></a></div>
				<ul id="menu" class="inline-list pull-left">
					<li class="pull-left"><a href="../notice/index.html" >NOTICE</a></li>
					<li class="pull-left"><a href="../members/index.html" >MEMBERS</a></li>
					<li class="pull-left"><a href="../research/index.html" >RESEARCH</a></li>
					<li class="pull-left"><a href="../publications/index.html" >PUBLICATIONS</a></li>
					<li class="pull-left"><a href="../index.html" class='selected'>COURSES</a></li>
					<li class="pull-left"><a href="../gallery/index.html" >GALLERY</a></li>
									</ul>
							<div role="login" class="pull-right">
											<a href="../login/login.php">LOGIN</a>
										</div>
				<a id="contact" href="../contact/index.html" class='pull-right'>CONTACT</a>
			</nav>
		</div>
	</header>

	<main role="main">
		<div class="container">
			<div class="contents">
				<h1>Web Application Development</h1>
<div id="tab">
  	<div class="first-tab" data-tab="main">Home</div>
  	<div class="deactive last-tab" data-tab="slides">Slides</div>
</div>
<div id="hl"></div>
<?php require 'calendar.php';
			session_start();
?>
<article id="userinfo">
	<?php if(isset($_SESSION['id'])){ ?>
		<div id="wrap">
			<header>
				<h1>LOGIN</h1>
			</header>
			<content>
				<form method="post" action="login_ok.php">

					<input id="idform" class="textfield" type="text" name="id" placeholder="Username">
					<div class="login_icon" id="usericon"></div>

					<input class="textfield" type="password" name="password" placeholder="Password">
					<div class="login_icon" id="passwdicon"></div>

					<input id="submit_button" type="submit" value="login">
					<input type="hidden" name="source" value="/courses/cse326/2019/index.php">
				</form>
				<div id="register">
					<ul>
						<li id="informSearch"><a href="register/findpw.html">Forgot your password?</a></li>
						<li id="join"><a href="register/register.html">Sign in</a></li>
					</ul>
				</div>
			</content>
		</div>
	<?php } else { ?>
		<?php
		$id = $_SESIION['id'];
		$name = $_SESSION['name'];
		$section = $_SESSION['section'];
		?>
		<section class="inner">
			<table>
				<caption>Student Information</caption>
				<thead>
					<tr>
						<th>ID : </th>
						<td><?= $id ?></td>
					</tr>
					<tr>
						<th>Name : </th>
						<td><?= $name?></td>
					</tr>
					<tr>
						<th>Class : </th>
						<td><?= $section ?></td>
					</tr>
			</table>
		</section>
		<div class="cover">
			<div class="event">
				<input class="textbox" type='text' name='events' placeholder='Input the Event.' id="event">
				<button class="inputbox"type="submit" name="event" onclick="add_event()">Register</button>
			</div>
		</div>
		<div class="cover2">
			<div class="attendance">
				<?php
				// $a="disabled";
				if($offset == 4) {
					$starttime = strtotime("10:30:00");
					$endtime = strtotime("12:00:00");

				}
				else if($offset ==5){
					$starttime = strtotime("14:30:00");
					$endtime = strtotime("16:00:00");
				}
				else {
					$starttime = strtotime("00:00:00");
					$endtime = strtotime("00:00:00");
				}
				$time = strtotime(date("H:i:s"));
				if($starttime<$time && $time<$endtime) {
					// $a="";
				}
				?>
				<button class="chk_button" type="submit" name="attend" onclick="attend()" <?=$a?>>Attend</button>
			</div>
		</div>
	<?php } ?>
</article>

<div id="main">
  <div class="wrap-subcontent">
    <h3>Course Objectives</h3>
    <p>
      In this course, the followings will be covered to adequately enable web programming and web application development:
    </p>
    <ol>
  		<li>Understand the protocols, language  and systems used on the Web (HTML, CSS, HTTP, URLs, XML)</li>
  		<li>Understand the functions of clients and servers on the Web &amp; learn how to implement client-side scripts (JavaScript) and server-side scripts (PHP)</li>
  		<li>Obtain ability to design and implement an interactive web site where usability, accessibility and internationalization issues are considered</li>
  		<li>Learn how to use/manage database associated with web applications (mainly storage and retrieval)</li>
    </ol>
  </div>

  <div class="wrap-subcontent">
    <h3>Lecturer: Scott Lee</h3>
    <ul>
      <li>Office: 학연산클러스터 617호</li>
      <li>Tel: 031-400-5238</li>
      <li>Email: scottlee@hanyang.ac.kr</li>
    </ul>
  </div>

  <div class="wrap-subcontent">
    <h3>Teaching Assistants</h3>
	<ul>
    <li> Gichan Lee
      <ul>
        <li>Office: 학연산클러스터 621호</li>
        <li>Tel: 031-400-4754</li>
        <li>Email: <a href="mailto:fantasyopy@gmail.com">fantasyopy@gmail.com</a></li>
      </ul>
    </li>
    <li> HakJin Lee
      <ul>
        <li>Office: 학연산클러스터 621호</li>
        <li>Tel: 031-400-4754</li>
        <li>Email: <a href="mailto:gsdjini91@gmail.com">gsdjini91@gmail.com</a></li>
      </ul>
    </li>
  </ul>
  </div>

  <div class="wrap-subcontent">
    <h3>Places &amp; Dates</h3>
    <p>Class 1 (23497)</p>
			<ul>
				<li>Lecture : Thu (09:00 - 10:30) &amp; Fri (13:00 - 14:30) @ Engineering Building #1 Room 402</li>
		    <li>Lab : Fri (09:00 - 11:00) @ Engineering Building #4 PC Room 1 & 2</li>
		  </ul>
    <p>Class 2 (24465)</p>
	 		<ul>
	    	<li>Lecture : Thu (10:30 - 12:00)  &amp; Fri (14:30 - 16:00) @ Engineering Building #1 Room 407</li>
	    	<li>lab : Fri (16:00 - 18:00) @ Engineering Building #4 PC Room 1 & 2 </li>
    	</ul>
  </div>

  <div class="wrap-subcontent">
    <h3>Course Forum</h3>
    <ul>
      <li><a href="https://learn.hanyang.ac.kr/">Blackboard</a></li>
    </ul>
  </div>

  <div class="wrap-subcontent">
    <h3>Textbooks</h3>
    <ul>
      <li>Marty Stepp, Jessica Miller, Victoria Kirst, <strong>Web Programming Step by Step: Second Edition</strong>, Step by Step Publishing, 2012 </li>
    </ul>
  </div>

  <div class="wrap-subcontent">
    <h3>Course Schedule</h3>
	<ul>
	<li>Week 01 : 05/09/2019 - Introduction &amp; The Internet and World Wide Web</li>
    <li>Week 01 : 06/09/2019 - Basic HTML</li>
    <li>Week 02 : 12/09/2019 - No Lecture (추석 Thanksgiving)</li>
    <li>Week 02 : 13/09/2019 - No Lecture (추석 Thanksgiving)</li>
    <li>Week 03 : 19/09/2019 - Basic HTML</li>
    <li>Week 03 : 20/09/2019 - CSS for Styling </li>
    <li>Week 04 : 26/09/2019 - CSS for Styling</li>
    <li>Week 04 : 27/09/2019 - Page Layout </li>
    <li>Week 05 : 02/10/2019 - [특강] 게임 서버 개발 - 17:00 ~ 19:00 @제1학술관 101호 (supplementary lecture for 03/10/2019) </li>
    <li>Week 05 : 03/10/2019 - No Lecture (National Foundation Day) - supplementary lecture 02/10/2019</li>
    <li>Week 05 : 04/10/2019 - Page Layout </li>
    <li>Week 06 : 10/10/2019 - Basic PHP</li>
    <li>Week 06 : 11/10/2019 - Basic PHP</li>
    <li>Week 07 : 17/10/2019 - Basic PHP </li>
    <li>Week 07 : 18/10/2019 - Forms</li>
    <li>Week 08 : 24/10/2019 - Mid-Term Exam Preparation</li>
    <li>Week 08 : 25/10/2019 - Mid-Term Exam</li>
    <li>Week 09 : 31/10/2019 - Forms</li>
    <li>Week 09 : 01/11/2019 - Forms</li>
    <li>Week 10 : 07/11/2019 - Relational Database &amp; SQL</li>
    <li>Week 10 : 08/11/2019 - Relational Database &amp; SQL</li>
    <li>Week 11 : 14/11/2019 - Relational Database &amp; SQL</li>
    <li>Week 11 : 15/11/2019 - JavaScript</li>
    <li>Week 12 : 21/11/2019 - JavaScript</li>
    <li>Week 12 : 22/11/2019 - DOM</li>
    <li>Week 13 : 28/11/2019 - DOM</li>
    <li>Week 13 : 29/11/2019 - Prototype &amp; Event</li>
    <li>Week 14 : 05/12/2019 - Ajax &amp; XML &amp; JSON</li>
    <li>Week 14 : 06/12/2019 - Ajax &amp; XML &amp; JSON </li>
    <li>Week 15 : 12/12/2019 - Web Services</li>
    <li>Week 15 : 13/12/2019 - Scriptaculous</li>
    <li>Week 16 : 19/12/2019 - Final Exam</li>
    <li>Week 16 : 20/12/2019 - Team Project Presentation</li>
	</ul>
  </div>
  <div class="wrap-subcontent">
    <h3>Team Project</h3>
    <ul>
      <li><a target="_blank" href="project/project.html">Team Project</a></li>
    </ul>
  </div>


  <div class="wrap-subcontent">
    <h3>Team Project Group</h3>
    <ul>
      <li>
        Class 23497
        <ul>
          <li><strong>박서연</strong>, 이효원, 정희재, 김재현, 모지환, 황예찬</li>
          <li><strong>이종민</strong>, 박준영, 박진혁, 송현수, 엄세진, 이준섭</li>
          <li><strong>김소현</strong>, 임소윤, 이정인, 강가원, 안예지</li>
          <li><strong>이민혁</strong>, 백승민, 김유현, <strong>Ana Carolina Cardoso</strong>,  Zhou Xueyi, Frederik Bonde</li>
          <li><strong>양재우</strong>, 주한새, 강은호, 권순범, 김하영, 안한서</li>
          <li><strong>위준범</strong>, 배진우, 박재선, 박성수, 최준호</li>
          <li><strong>박재용</strong>, 김동규, 이세명, 오승기, 김덕영</li>
          <li><strong>고동현</strong>, 김동현, 김두호, 왕종휘, 김예진, 문수림</li>
          <li><strong>성태훈</strong>, 박예찬, 이무경, 장윤호, 심유빈</li>
          <li><strong>최웅순</strong>, 김태인, 이재윤, 김은영, 김민지, 고영준</li>
          <li><strong>윤규민</strong>, 박제현, 임정현, 윤지인, 이수종</li>
        </ul>
      </li>
      <li>
        Class 24465
        <ul>
          <li><strong>유영민</strong>, 강민제, 박연희, 이효원, 이정규</li>
          <li><strong>문현준</strong>, Tsoy Sergey, Shu Zhiwen, XIANG FANGSONG, 김태웅, 김세훈</li>
          <li><strong>박예림</strong>, 사은수, 이지선, 송용호, 권태형, 윤성주</li>
          <li><strong>박제균</strong>, 장주섭, 강은지, 정은지, 정은지</li>
          <li><strong>장윤지</strong>, 김종훈, 이해석, 이원석, 이준기</li>
          <li><strong>한동연</strong>, 안요한, 김민재, 석예림, 박재현, 김서권</li>
          <li><strong>김규진</strong>, 김승호, 김용준, 김우정, 김재훈</li>
          <li><strong>강동완</strong>, 김남호, 현병욱, 이진태, 김정우</li>
        </ul>
      </li>
    </ul>
  </div>

  <div class="wrap-subcontent last">
    <h3>Assessments</h3>
    <ul>
      <li>Attendance (10%)</li>
      <li>Midterm Exam (30%)</li>
      <li>Final Exam (30%)</li>
      <li>Team Project (30%)</li>
    </ul>
  </div>
</div>

<div id="slides" class="display_none">
  <div id="lecture">
    <table>
      <tr>
        <th class="number">No.</th>
        <th class="title">Lecture Slides</th>
      </tr>
      <tr>
        <td class="number">0</td>
        <td class="title"><a target="_blank" href="lecture/00-introduction.html">Introduction</a></td>
      </tr>
      <tr>
        <td class="number">1</td>
        <td class="title"><a target="_blank" href="lecture/01-www.html">The Internet &amp; World Wide Web</a></td>
      </tr>
      <tr>
        <td class="number">2</td>
        <td class="title"><a target="_blank" href="lecture/02-html.html">Basic HTML</a></td>
      </tr>
      <tr>
        <td class="number">3</td>
        <td class="title"><a target="_blank" href="lecture/03-css.html">CSS for Styling</a></td>
      </tr>
      <tr>
        <td class="number">4</td>
        <td class="title"><a target="_blank" href="lecture/04-layout.html">Page Layout</a></td>
      </tr>
      <tr>
        <td class="number">5</td>
        <td class="title"><a target="_blank" href="lecture/05-PHP.html">PHP</a></td>
      </tr>
      <tr>
        <td class="number">6</td>
        <td class="title"><a target="_blank" href="lecture/06-forms.html">Forms</a></td>
      </tr>
      <tr>
        <td class="number">7</td>
        <td class="title">
          <a target="_blank" href="lecture/07-sql.html">Relational Database &amp; SQL</a>
          [<a target="_blank" href="lecture/examples/07SQL/db.zip">DBs</a>]
        </td>
      </tr><!--
      <tr>
        <td class="number">8</td>
        <td class="title"><a target="_blank" href="lecture/08-javascript.html">JavaScript</a></td>
      </tr>
      <tr>
        <td class="number">9</td>
        <td class="title"><a target="_blank" href="lecture/09-dom.html">Document Object Model (DOM)</a></td>
      </tr>
      <tr>
        <td class="number">10</td>
        <td class="title"><a target="_blank" href="lecture/10-prototype.html">Prototype</a></td>
      </tr>
      <tr>
        <td class="number">11</td>
        <td class="title"><a target="_blank" href="lecture/11-events.html">Events</a></td>
      </tr>
      <tr>
        <td class="number">12</td>
        <td class="title"><a target="_blank" href="lecture/12-ajaxXmlJson.html">Ajax, XML, JSON</a></td>
      </tr>
      <tr>
        <td class="number">13</td>
        <td class="title"><a target="_blank" href="lecture/13-webServices.html">Web Services</a></td>
      </tr>
      <tr>
        <td class="number">14</td>
        <td class="title"><a target="_blank" href="lecture/14-scriptaculous.html">Scriptaculous</a></td>
      </tr>
      <tr>
        <td class="number">15</td>
        <td class="title"><a target="_blank" href="#"></a></td>
      </tr>-->
    </table>
  </div>

  <div id="lab">
    <table>
   	  <!-- <tr>
        <th class="number">No.</th>
        <th class="title">Project</th>
      </tr>
      <tr>
        <td class="number">*</td>
        <td class="title"><a target="_blank" href="#"></a></td>
      </tr> -->
      <tr>
        <th class="number">No.</th>
        <th class="title">Labs</th>
      </tr>
      <tr>
        <td class="number">0</td>
        <td class="title"><a target="_blank" href="labs/lab0-introduction.html">Introduction - Week 3</a></td>
      </tr>
      <tr>
        <td class="number">1</td>
        <td class="title"><a target="_blank" href="labs/lab1-aboutme(HTML).html">About Me (HTML) - Week 4</a></td>
      </tr>
      <tr>
        <td class="number">2</td>
        <td class="title"><a target="_blank" href="labs/lab2-aboutme(CSS).html">CSS - Week 5</a></td>
      </tr>
      <tr>
        <td class="number">3</td>
        <td class="title"><a target="_blank" href="labs/lab3-favorite.html">CSS Design &amp; Layout - Week 6</a></td>
      </tr>
      <tr>
        <td class="number">4</td>
        <td class="title"><a target="_blank" href="labs/lab4-movieReview.html">Movie Review (HTML, CSS, Layout)- Week 7</a></td>
      </tr><!--
      <tr>
        <td class="number">5</td>
        <td class="title"><a target="_blank" href="./labs/lab5-musicLibrary.html">Basic PHP</a></td>
      </tr>
      <tr>
        <td class="number">6</td>
        <td class="title"><a target="_blank" href="./labs/lab6-gradeStore.html">Forms</a></td>
      </tr>
      <tr>
        <td class="number">7</td>
        <td class="title"><a target="_blank" href="./labs/lab7-SQL.html">SQL</a></td>
      </tr>
      <tr>
        <td class="number">8</td>
        <td class="title"><a target="_blank" href="./labs/lab8-pimpMyText.html">JavaScript</a></td>
      </tr>
      <tr>
        <td class="number">9</td>
        <td class="title"><a target="_blank" href="./labs/lab9-maze.html">Assignment: Maze</a></td>
      </tr>
      <tr>
        <td class="number">10</td>
        <td class="title"><a target="_blank" href="./labs/lab10-bookSearch.html">Ajax &amp; XML &amp; JSON</a></td>
      </tr>
      <tr>
        <td class="number">11</td>
        <td class="title"><a target="_blank" href="#"></a></td>
      </tr>
      <tr>
        <td class="number">12</td>
        <td class="title"><a target="_blank" href="#"></a></td>
      </tr>
      <tr>
        <td class="number">13</td>
        <td class="title"><a target="_blank" href="#"></a></td>
      </tr>
      <tr>
        <td class="number">14</td>
        <td class="title"><a target="_blank" href="#"></a></td>
      </tr>
      <tr>
        <td class="number">15</td>
        <td class="title"><a target="_blank" href="#"></a></td>
      </tr>
		-->
    </table>
  </div>
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

<!-- Mirrored from selab.hanyang.ac.kr/courses/cse326/2019/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Oct 2019 12:22:46 GMT -->
</html>
