const holes = document.querySelectorAll(".hole");
const scoreBoard = document.querySelector(".score");
const moles = document.querySelectorAll(".mole");

let lastMole;
let timeUp = false;
let score = 0;
let result = 0;

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

function check(){
  if(score > 9){
    result = 1;
    alert("Pass");
  }else{
    result - 1;
    alert("Fail");
  }
}

function startGame() {
  scoreBoard.textContent = 0;
  timeUp = false;
  score = 0;
  peep();
  setTimeout(() => (timeUp = true), 10000);
  setTimeout(() => (alert("Your score is " + score)), 10400);
  setTimeout(()=> (check()),10500);
  setTimeout(() => (self.close()), 10600);
}

function bonk(e) {
  const mole = e.target;
  if (!e.isTrusted) return; //cheater
  if (mole.parentNode.classList.contains("up") !== null) {
    mole.parentNode.classList.remove("up");
    score++;
  }
  scoreBoard.textContent = score;
}

moles.forEach(mole => mole.addEventListener("click", bonk));
