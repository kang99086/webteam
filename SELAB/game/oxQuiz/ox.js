var check = 1;

function clicks(){
  if(check == 1){
    document.getElementById("quiz_1").style.display="none";
    document.getElementById("quiz_2").style.visibility="visible";
    check = 2;
  }else if(check == 2){
    document.getElementById("quiz_2").style.display="none";
    document.getElementById("quiz_3").style.visibility="visible";
    check = 3;
  }else if(check == 3){
    document.getElementById("quiz_3").style.display="none";
    document.getElementById("quiz_4").style.visibility="visible";
    check = 4;
  }else if(check == 4){
    document.getElementById("quiz_4").style.display="none";
    document.getElementById("quiz_5").style.visibility="visible";
    check = 5;
  }else if(check == 5){
    document.getElementById("subm").style.visibility="visible";
    check=6;
  }else if(check==6){
    document.getElementById("quizbox").style.display="none";
    document.getElementById("resultbox").style.visibility="visible";
  }
}
