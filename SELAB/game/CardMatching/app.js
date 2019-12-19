var imageCards = [],
    numberOfTries = 0,
    selectedImages = [],
    waitTime = 500,
    statusArea;
    timeset = 600.0;
    checking = 0;
    result = 0;

function initialize() {
    statusArea = document.getElementById("status-area");
    statusArea.style.fontSize = "30pt";

    imageCards = [
        "leafers-seed",
        "leafers-seedling",
        "leafers-sapling",
        "leafers-tree",
        "leafers-ultimate",
        "marcimus",
        "mr-pants",
        "mr-pink",
        "old-spice-man",
        "robot_female_1"
    ];

    imageCards = imageCards.concat(imageCards);

    imageCards.sort(function () {
        return 0.5 - Math.random();
    });

    for (var i = 0; i < imageCards.length; i++) {
        var imageObjects = document.createElement("img");
        imageObjects.src = "img/" + imageCards[i] + ".png";
        imageObjects.title = imageCards[i];
        imageObjects.alt = imageCards[i];
        imageObjects.onclick = checkIt;
        document.getElementById("game-area").appendChild(imageObjects);
    }

    setTimeout(function () {
        for (var i = 0; i < document.images.length; i++) {
            document.images[i].src = "img/leaf-green.png";
            document.images[i].title = "leaf-green";
        }
    }, waitTime * 4);

}



function checkIt() {
    if (this.title != "leaf-green" || this.title == "open" || this.title == "opened") return;

    if (selectedImages.length < 2) {

        selectedImages.push(this.alt);

        this.src = "img/" + this.alt + ".png";
        this.title = "open";

        if (selectedImages.length === 2) {

            if (selectedImages[0] === selectedImages[1]) {

                for (var i = 0; i < document.images.length; i++) {
                    if (document.images[i].title == "open") {
                        document.images[i].title = "opened";
                    }
                }
                selectedImages = [];
                checking++;
            } else {

                setTimeout(function () {
                    for (var i = 0; i < document.images.length; i++) {
                        if (document.images[i].title == "open") {
                            document.images[i].src = "img/leaf-green.png";
                            document.images[i].title = "leaf-green";
                        }
                    }
                    selectedImages = [];
                }, waitTime);

                // numberOfTries++;
                // statusArea.innerText = "Try it " + numberOfTries + " times.";
            }
        }
    }
}
function startGame(){
  document.getElementById("titleWrap").style.display ="none";
  document.getElementById("startWrap").style.display ="none";
  initialize();
  setInterval(function(){
      if(timeset%10 == 0){
        statusArea.innerText = timeset/10 + "초 남았습니다.";
      }
      if(timeset <10){
        setTimeout(() => (alert("Fail")),50);
        window.history.back();
      }else{
        timeset--;
      }
      if(checking == 10){
        alert((600.0-timeset)/10+"초 걸렸습니다.")
        window.history.back();
      }
  },100);
}
