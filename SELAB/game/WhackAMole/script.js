const holes = document.querySelectorAll(".hole");
const scoreBoard = document.getElementById("score");
const moles = document.querySelectorAll(".mole");

let lastMole;
let timeUp = false;
let score = 0;
let result = 0;
let a = 0;

function randomTime(min, max) {
  return Math.round(Math.random() * (max - min) + min);
}

function randomMole(Moles) {
  const idx = Math.floor(Math.random() * holes.length);
  const mole = moles[idx];
  if (mole === lastMole) {
    return randomMole(moles);
  }
  lastMole = mole;
  return mole;
}

function peep() {
  const time = randomTime(200, 1000);
  const mole = randomMole(moles);
  const moleUp = mole.parentNode;
  moleUp.classList.add("up");
  setTimeout(() => {
    if(moleUp !== null)
    mole.parentNode.classList.remove("up");
    if (!timeUp) peep();
  }, time);
}

function startGame() {
  document.getElementById("titleWrap").style.display = "none";
  document.getElementById("startWrap").style.display ="none";
  document.getElementById("scoreWrap").style.display = "block";
  document.getElementById("games").style.visibility = "visible";
  scoreBoard.textContent = 'score: '+ 0;
  timeUp = false;
  score = 0;
  peep();
  setTimeout(() => (timeUp = true), 15000);
  setTimeout(() => (alert("Your score is " + score)), 15000);
  setTimeout(()=> (window.history.back(),15000);
}

function time(){
  setTimeout(() => (a = 0), 300);
}

function bonk(e) {
  const mole = e.target;
  if (!e.isTrusted) return; //cheater
  // if (mole.parentNode.classList.contains("up") !== null) {
  //   mole.parentNode.classList.remove("up");
  if(a == 0){
    score++;
    a = 1;
    time();
    mole.parentNode.classList.remove("up");
  }
  mole.parentNode.classList.remove("up");
  scoreBoard.textContent = 'score: ' + score;
}

moles.forEach(mole => mole.addEventListener("click", bonk));
