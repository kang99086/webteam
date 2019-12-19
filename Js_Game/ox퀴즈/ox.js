var check = 1;

window.onload = function() {
  const allIconImg = document.querySelectorAll("img");

  allIconImg.forEach(img => img.onclick = clicks);
}

function clicks() {
  const quizNum = document.querySelector("#quizbox fieldset h1");
  const quiz1 = document.getElementById("quiz1"),
    quiz2 = document.getElementById("quiz2"),
    quiz3 = document.getElementById("quiz3"),
    quiz4 = document.getElementById("quiz4"),
    quiz5 = document.getElementById("quiz5");
  if (check == 1) {
    quizNum.innerText = "문제 " + (check+1) + "번";
    quiz1.classList.add("display_none");
    quiz2.classList.add("display_block");
    check = 2;
  } else if (check == 2) {
    quizNum.innerText = "문제 " + (check+1) + "번";
    quiz2.classList.remove("display_block");
    quiz3.classList.add("display_block");
    check = 3;
  } else if (check == 3) {
    quizNum.innerText = "문제 " + (check+1) + "번";
    quiz3.classList.remove("display_block");
    quiz4.classList.add("display_block");
    check = 4;
  } else if (check == 4) {
    quizNum.innerText = "문제 " + (check+1) + "번";
    quiz4.classList.remove("display_block");
    quiz5.classList.add("display_block");
    check = 5;
  } else if (check == 5) {
    quizNum.innerText = "Done!";
    quiz5.classList.remove("display_block");
    document.getElementById("subm").classList.add("display_block");
    check = 6;
  } else if (check == 6) {
    document.getElementById("quizbox").classList.add("display_none");
    document.getElementById("resultbox").style.visibility = "visible";
  }
}
