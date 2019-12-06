const //checkID = /^[a-zA-Z0-9]{6,20}$/,
  checkPW = /^(?=.*[a-zA-Z])(?=.*[!?@#$%^&*+\-=~])(?=.*[0-9]).{6,20}$/,
  checkStudentID = /^20[0-3][0-9][0-9]{6}$/,
  checkNameKR = /^[가-힣]+$/,
  checkNameENG = /^\w+(\s[A-Za-z]+)*$/,
  checkDept = /^[가-힣]+$/;

const userStudentID = document.getElementById("user_Student_ID"),
  userPW = document.getElementById("user_PW"),
  userPW_Confirm = document.getElementById("user_PW_Confirm"),
  name = document.getElementById("name"),
  dept = document.getElementById("dept");

const errorColor = 'red',
  collectColor = 'green';

var id_check = false;
var ps_check = false;
var pc_check = false;
var na_check = false;
var de_check = false;
// const studentIdSpan = document.querySelector("#studentIdSpan"),
//   pwSpan = document.querySelector("#pwSpan"),
//   pwConfirmSpan = document.querySelector("#pwConfirmSpan"),
//   nameSpan = document.querySelector("#"),
//   deptSpan = document.querySelector("#deptSpan");

const sel = document.querySelector(".sel");

function alertMSG(regex, userInform) {
  const inputText = userInform.value;
  const errorSpan = userInform.parentElement.nextSibling.nextSibling;

  if (inputText !== "") {
    if (!regex.test(inputText)) {
      switch (userInform.getAttribute("id")) {
        case "user_PW":
          errorSpan.innerText = "6~20자의 영문 대소문자, 숫자, 특수기호(~~)를 혼합해야합니다.";
          errorSpan.classList.add("errorVisible");
          errorSpan.style.color = errorColor;
          ps_check = fasle;
          break;
        case "user_Student_ID":
          errorSpan.innerText = "학번 양식에 맞는 10자리의 숫자로 입력해주세요.";
          errorSpan.classList.add("errorVisible");
          errorSpan.style.color = errorColor;
          id_check = false;
          break;
        case "name":
          errorSpan.innerText = "한글또는 영어만으로 입력해주세요.";
          errorSpan.classList.add("errorVisible");
          errorSpan.style.color = errorColor;
          na_check = false;
        case "dept":
          errorSpan.innerText = "띄어쓰기 없이 한글로만 입력해주세요.";
          errorSpan.classList.add("errorVisible");
          errorSpan.style.color = errorColor;
          de_check = false;
          break;
      }
    } else {
      errorSpan.innerText = "사용가능합니다.";
      errorSpan.classList.add("errorVisible");
      errorSpan.style.color = collectColor;
      switch (userInform.getAttribute("id")) {
        case "user_PW":
          ps_check = true;
        case "user_Student_ID":
          id_check = true;
        case "name":
          na_check = true;
        case "dept":
          de_check = true;
      }
    }
  } else {
    errorSpan.innerText = "필수입력사항입니다.";
    errorSpan.classList.add("errorVisible");
    errorSpan.style.color = errorColor;
    switch (userInform.getAttribute("id")) {
      case "user_PW":
        ps_check = false;
      case "user_Student_ID":
        id_check = false;
      case "name":
        na_check = false;
      case "dept":
        de_check = false;
    }
  }
}
function check(){
  if(document.getElementById("answer").value != ''){
    if(document.getElementById("select").value != ''){
      if(id_check&&ps_check&&pc_check&&na_check&&de_check){
        return true;
      }else{
        return false;
      }
    }else{
      return false;
    }
  }else{
    return false;
  }
}

function confirmPW(password, passwordCheck) {
  const PW = password.value;
  const PW_CHECK = passwordCheck.value;
  const errorSpan = passwordCheck.parentElement.nextSibling.nextSibling;

  if (!PW_CHECK) {
    errorSpan.innerText = "필수입력사항입니다.";
    errorSpan.classList.add("errorVisible");
    errorSpan.style.color = errorColor;
    pc_check = false;
  } else if (PW !== PW_CHECK) {
    errorSpan.innerText = "비밀번호가 다릅니다.";
    passwordCheck.value = '';
    errorSpan.classList.add("errorVisible");
    errorSpan.style.color = errorColor;
    pc_check = false;
  } else {
    errorSpan.innerText = "일치합니다.";
    errorSpan.classList.add("errorVisible");
    errorSpan.style.color = collectColor;
    pc_check = true;
  }
}

function init() {
  userStudentID.addEventListener("focusout", function() {
    alertMSG(checkStudentID, userStudentID);
  });

  userPW.addEventListener("focusout", function() {
    alertMSG(checkPW, userPW);
  });

  userPW_Confirm.addEventListener("focusout", function() {
    confirmPW(userPW, userPW_Confirm);
  });

  name.addEventListener("focusout", function() {
    alertMSG(checkNameKR, name);
  });

  dept.addEventListener("focusout", function() {
    alertMSG(checkDept, dept);
  });
}

init();
