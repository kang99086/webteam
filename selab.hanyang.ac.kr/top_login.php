<?php
  session_start();

  if(!isset($_SESSION['id']))
  {
?>
  <p><a href="login/login.html">로그인</a> |
    <a href="login/register/register.html">회원가입</a></p>
<?php
  }
  else
  {
?>
  <p><?=$_SESSION['id']?>님</a> |
    <a href="login/logout.php">로그아웃</a></p>
<?php
  }
?>
