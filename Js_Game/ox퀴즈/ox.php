<html>
<head>
  <link rel="stylesheet" href="oxUpgrade.css">
</head>
<body>
  <script src="oxUpgrade.js"></script>
  <div id="quizbox">
    <form method="post" id="ox_quiz" action="test.php">
      <div id="quizWrap">
        <fieldset>
          <legend> <h1>문제 1번</h1> </legend>
          <p>문제 넣는곳</p>

          <div id="quiz1">
            <div class="ansO">
                <label>
                  <input type="radio" name="answer1"  value="1" class="O_icon">
                  <img src="oo.png">
                </label>
            </div>
            <div class="ansX">
                <label>
                  <input type="radio" name="answer1" value="0" class="X_icon">
                  <img src="xx.png">
                </label>
            </div>
          </div>

          <div id="quiz2" class="display_none">
            <div class="ansO">
                <label>
                  <input type="radio" name="answer2"  value="1" class="O_icon">
                  <img src="oo.png">
                </label>
            </div>
            <div class="ansX">
                <label>
                  <input type="radio" name="answer2" value="0" class="X_icon">
                  <img src="xx.png">
                </label>
            </div>
          </div>

          <div id="quiz3" class="display_none">
            <div class="ansO">
                <label>
                  <input type="radio" name="answer3"  value="1" class="O_icon">
                  <img src="oo.png">
                </label>
            </div>
            <div class="ansX">
                <label>
                  <input type="radio" name="answer3" value="0" class="X_icon">
                  <img src="xx.png">
                </label>
            </div>
          </div>

          <div id="quiz4" class="display_none">
            <div class="ansO">
                <label>
                  <input type="radio" name="answer4"  value="1" class="O_icon">
                  <img src="oo.png">
                </label>
            </div>
            <div class="ansX">
                <label>
                  <input type="radio" name="answer4" value="0" class="X_icon">
                  <img src="xx.png">
                </label>
            </div>
          </div>

          <div id="quiz5" class="display_none">
            <div class="ansO">
                <label>
                  <input type="radio" name="answer5"  value="1" class="O_icon">
                  <img src="oo.png">
                </label>
            </div>
            <div class="ansX">
                <label>
                  <input type="radio" name="answer5" value="0" class="X_icon">
                  <img src="xx.png">
                </label>
            </div>
          </div>
          <div id="subm" class="display_none"><input type="submit" onclick="click();" value="제출하기"></div>
        </fieldset>
      </div>

    </form>
  </div>
</body>
</html>
