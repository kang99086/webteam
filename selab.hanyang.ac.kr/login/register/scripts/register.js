const //checkID = /^[a-zA-Z0-9]{6,20}$/,
  checkPW = /^(?=.*[a-zA-Z])(?=.*[!?@#$%^&*+\-=~])(?=.*[0-9]).{6,20}$/,
  checkStudentID = /^20[0-3][0-9][0-9]{6}$/,
  checkNameKR = /^[가-힣]+$/,
  checkNameENG = /^\w+(\s[A-Za-z]+)*$/,
  checkDept = /^[가-힣]+$/;

const userStudentID = document.getElementById("user_Student_ID"),
  userPW = document.getElementById("user_PW"),
  userPW_Confirm = document.getElementById("user_PW_Confirm"),
  name = document.getElementById("user_name"),
  dept = document.getElementById("user_dept");

const errorColor = 'red',
  collectColor = 'green';

let id_check = false,
  ps_check = false,
  pc_check = false,
  name_check = false,
  dept_check = false;

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
          ps_check = false;
          break;
        case "user_Student_ID":
          errorSpan.innerText = "학번 양식에 맞는 10자리의 숫자로 입력해주세요.";
          errorSpan.classList.add("errorVisible");
          errorSpan.style.color = errorColor;
          id_check = false;
          break;
        case "user_name":
          errorSpan.innerText = "한글또는 영어만으로 입력해주세요.";
          errorSpan.classList.add("errorVisible");
          errorSpan.style.color = errorColor;
          name_check = false;
          break;
        case "user_dept":
          errorSpan.innerText = "띄어쓰기 없이 한글로만 입력해주세요.";
          errorSpan.classList.add("errorVisible");
          errorSpan.style.color = errorColor;
          dept_check = false;
          break;
      }
    } else {
      errorSpan.innerText = "사용가능합니다.";
      errorSpan.classList.add("errorVisible");
      errorSpan.style.color = collectColor;
      switch (userInform.getAttribute("id")) {
        case "user_PW":
          ps_check = true;
          break;
        case "user_Student_ID":
          id_check = true;
          break;
        case "user_name":
          name_check = true;
          break;
        case "user_dept":
          dept_check = true;
          break;
      }
    }
  } else {
    errorSpan.innerText = "필수입력사항입니다.";
    errorSpan.classList.add("errorVisible");
    errorSpan.style.color = errorColor;
    switch (userInform.getAttribute("id")) {
      case "user_PW":
        ps_check = false;
        break;
      case "user_Student_ID":
        id_check = false;
        break;
      case "user_name":
        name_check = false;
        break;
      case "user_dept":
        dept_check = false;
        break;
    }
  }
}

function alerts(){
  if(check()){
    return true;
  }else{
//     alert("양식에 맞게 입력해주세요.");
//     return false;
//   }
// }
    if(!id_check){
      alert("ID를 입력해주세요.");
      return false;
    }else{
      if(!ps_check){
        alert("비밀번호를 입력해주세요.");
        return false;
      }else{
        if(!pc_check){
          alert("비밀번호가 일치해야 합니다.");
          return false;
        }else{
          if(!name_check){
            alert("이름을 입력해주세요.");
            return false;
          }else{
            if(!dept_check){
              alert("학과를 입력해주세요.");
              return false;
            }else{
              if(document.getElementById("select").value == ''){
                alert("반을 선택해주세요.");
                return false;
              }else{
                alert("질문에 답변을 적어주세요.");
                return false;
              }
            }
          }
        }
      }
    }
  }
}
function check() {
  if (document.getElementById("selAnswer").value != '') {
    if (document.getElementById("select").value != '') {
      if ((id_check) && (ps_check) && (pc_check) && (name_check) && (dept_check)) {
        return true;
      } else {
        return false;
      }
    } else {
      return false;
    }
  } else {
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
