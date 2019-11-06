$(document).ready(function(){
        var score=0;
        var count=0;
        var t = setInterval(function(){
            var ranNumL = Math.round(Math.random()*10)*100 //1의 자리 * 100
            var ranNumR = Math.round(Math.random()*10)*100 //1의 자리 * 100

            if(ranNumL>=900){
                ranNumL = 800;
            }
            if(ranNumR>=900){
                ranNumR = 774;
            }
            $("#mole").css("left",ranNumL);
            $("#mole").css("top",ranNumR);

            count++
            if(count>=10){
                clearInterval(t)
                alert("Game over")
            }

        },1000)

        //점수 올리기
        $("#mole").on("click",function(){
            score++;
            $("#score").text(score)
        })

    })
