function vis(){
   document.getElementById("myside").style.visibility = "visible";
}
function openNav() {
  document.getElementById('mysidenav').style.width = '15%';
  setTimeout(()=> (vis()),300);
}

function closeNav() {
  document.getElementById("myside").style.visibility = "hidden";
  document.getElementById('mysidenav').style.width = '0';
}
window.onload = function(){
  document.getElementById("myside").style.visibility = "hidden";
}
