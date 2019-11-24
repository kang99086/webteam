(function() {
  'use strict';

  /*
  $('input').on('keyup', function(e) {
    console.log($(this).val());
  });
  */

  var settings = [
    {
      el: 'wheel-1',
      members: ['두더지잡기', '벽돌깨기', '스네이크게임', '카드짝맞추기'],
      colors: ['#C7181D', '#FCB937', '#A1B836', '#371979'],
      radius: 250,
      startAngle: 'random'
    }
  ];

  var wheels = [
    new Wheel(settings[0])
  ];

  wheels.forEach(function(wheel) {
    wheel.init();
  });

  var spinBtn = document.querySelector('.btn-spin');
  spinBtn.addEventListener('click', function(e) {
    wheels.forEach(function(wheel) {
      wheel.spin(function(member) {
        alert(member);
        if(member == ('두더지잡기')){
          window.open("../두더지잡기/index.html");

        }
        else if( member == ('벽돌깨기')){
          window.openm("../벽돌깨기/index.html");

        }
        else if(member == ('스네이크게임')){
          window.open("../스네이크/index.html");

        }
        else{
          window.open("../짝맞추기/index.html");

        }
      });
  }, false);
  });

})();
