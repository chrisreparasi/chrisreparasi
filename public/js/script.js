$(function () {
  var scroll = new SmoothScroll('a[href*=section-');
}, { speed: 3000 });

$(window).scroll(function(){
  $('nav').toggleClass('scrolled', $(this).scrollTop()  > 200);
});

// parallax
$(window).scroll(function() {
  var wScroll = $(this).scrollTop();

  // jumbotron
  $('.jumbotron h1').css({
    'transform' : 'translate(0px, '+ wScroll/4 +'%)'
  });

  $('.jumbotron a').css({
    'transform' : 'translate(0px, '+ wScroll/2 +'%)'
  });

  // card
  if( wScroll > $('.service').offset().top - 200 ) {
    $('.service .card').each(function(i) {
      setTimeout(function() {
        $('.service .card').eq(i).addClass('muncul');
      }, 200 * (i+1));
    });

  
  }

  //portfolio
  if( wScroll > $('.portfolio').offset().top - 300 ) {
    $('.portfolio .card-img-top').addClass('muncul');
  }
  
  


});
