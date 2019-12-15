<html>
<head>
  <link rel="stylesheet" href="ox.css">
</head>
<body>
  <script src="ox.js"></script>
  <div id="quizbox">
    <form method="post" id="ox_quiz" action="test.php">
      <div id="quiz_1">
        <fieldset>
          <legend>문제 1번</legend>
          문제1번 넣는곳<br/>
          <div id="quiz_1O">
            <p><label for="answer1_o"><img src="oo.png" width="40%" height="20%" alt="" onclick="clicks();"></label></p>
            <p><input type="radio" name="answer1"  value="1" id="answer1_o"></p>
          </div>
          <div id="quiz_1X">
            <p><label for="answer1_x"><img src="xx.png" width="40%" height="20%" alt="" onclick="clicks();"></label></p>
    				<p><input type="radio" name="answer1" value="0" id="answer1_x"></p>
          </div>
        </fieldset>
      </div>
      <div id="quiz_2" style="visibility:hidden">
        <fieldset>
          <legend>문제 2번</legend>
          문제2번 넣는곳<br/>
          <div id="quiz_2O">
            <p><label for="answer2_o"><img src="oo.png" width="40%" height="20%" alt="" onclick="clicks();"></label></p>
            <p><input type="radio" name="answer2"  value=1 id="answer2_o"></p>
          </div>
          <div id="quiz_2X">
            <p><label for="answer2_x"><img src="xx.png" width="40%" height="20%" alt="" onclick="clicks();"></label></p>
    				<p><input type="radio" name="answer2" value=0 id="answer2_x"></p>
          </div>
        </fieldset>
      </div>
      <div id="quiz_3" style="visibility:hidden">
        <fieldset>
          <legend>문제 3번</legend>
          문제3번 넣는곳<br/>
          <div id="quiz_3O">
            <p><label for="answer3_o"><img src="oo.png" width="40%" height="20%" alt="" onclick="clicks();"></label></p>
            <p><input type="radio" name="answer3"  value=1 id="answer3_o"></p>
          </div>
          <div id="quiz_3X">
            <p><label for="answer3_x"><img src="xx.png" width="40%" height="20%" alt="" onclick="clicks();"></label></p>
    				<p><input type="radio" name="answer3" value=0 id="answer3_x"></p>
          </div>
        </fieldset>
      </div>
      <div id="quiz_4" style="visibility:hidden">
        <fieldset>
          <legend>문제 4번</legend>
          문제4번 넣는곳<br/>
          <div id="quiz_4O">
            <p><label for="answer4_o"><img src="oo.png" width="40%" height="20%" alt="" onclick="clicks();"></label></p>
            <p><input type="radio" name="answer4"  value=1 id="answer4_o"></p>
          </div>
          <div id="quiz_4X">
            <p><label for="answer4_x"><img src="xx.png" width="40%" height="20%" alt="" onclick="clicks();"></label></p>
    				<p><input type="radio" name="answer4" value=0 id="answer4_x"></p>
          </div>
        </fieldset>
      </div>
      <div id="quiz_5" style="visibility:hidden">
        <fieldset>
          <legend>문제 5번</legend>
          문제5번 넣는곳<br/>
          <div id="quiz_5O">
            <p><label for="answer5_o"><img src="oo.png" width="40%" height="20%" alt="" onclick="clicks();"></label></p>
            <p><input type="radio" name="answer5"  value=1 id="answer5_o"></p>
          </div>
          <div id="quiz_5X">
            <p><label for="answer5_x"><img src="xx.png" width="40%" height="20%" alt="" onclick="clicks();"></label></p>
    				<p><input type="radio" name="answer5" value=0 id="answer5_x"></p>
          </div>
        </fieldset>
      </div>
      <div id="subm" style="visibility:hidden"><input type="submit" onclick="click();" value="제출하기"></div>
    </form>
  </div>
</body>
</html>
