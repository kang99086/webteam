function gamerestart(){//게임 다시 시작 (페이지 다시 로딩)
   window.location.reload(true);
}

function shuffle(){// 카드 섞기
   var carddeck = [
   'card1',
   'card2',
   'card3',
   'card4',
   'card5',
   'card1',
   'card2',
   'card3',
   'card4',
   'card5',
   ]
   var j,x,i;
      for(i = carddeck.length; i; i -= 1) {
         j = Math.floor(Math.random() * i);
         x = carddeck[i - 1];
         carddeck[i-1] = carddeck[j];
         carddeck[j] = x;
      }
   return carddeck;
}

function cardset(){ //카드 깔기
   var mixup = shuffle();
      for(var i=0; i<mixup.length; i++){
         var createcard = "<img src='./pic/backimg.jpg' class="+mixup[i]+" width='100px' height='150px'>&nbsp"
         $("#cardground").append(createcard);
      }
}

cardset();

$(document).ready(function(){
   $(document).on("click","img",function(){ //클릭시 id 값 가져와서 사진 매치 시키기
     var check = $(this).hasClass('back');
     var CSS = $(this).attr('class');

     if(!check && CSS != "success"){
       $(this).attr('src','./pic/'+CSS+'.jpg');
       $(this).addClass("back");
     } else{
       console.log("back");
     }
     var BackLength = $(".back").length;

     if(BackLength == 2){
       var FirstB = $('.back').eq(0).attr('class');
       var SecondB = $('.back').eq(1).attr('class');
       if(FirstB != SecondB){
         setTimeout(function(){
           $(".back").attr('src','./pic/backimg.jpg');
           $("img").removeClass("back");
         },500);
       } else{
         $(".back").attr("class","success");
       }
       BackLength = 0;
     }
   });
});