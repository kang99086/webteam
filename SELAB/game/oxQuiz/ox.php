<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Lilita+One|Source+Sans+Pro&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="ox.css">
</head>
<body>
  <script src="ox.js"></script>
  <div id="quizbox">
    <form method="post" id="ox_quiz" action="test.php">
      <div id="quizWrap">
        <fieldset>
          <legend> <h1>Problem(1/5)</h1> </legend>
          <p id="quiz">This is problem paragraph. This is problem paragraph. This is problem paragraph. This is problem paragraph. This is problem paragraph.</p>

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
          <div id="btnWrap" class="display_none"><button type="submit" onclick="click();" value="제출하기">Submit!</button></div>
        </fieldset>
      </div>
    </form>
  </div>
</body>
</html>
