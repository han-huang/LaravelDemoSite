/*
 *  for index page
 */

function tune_img_max_height(){
  var win = $(this); //this = window
  var win_w = win.width();
  console.log(win_w);
  if(win_w >= 1280) {
      $('img').css("max-height", 420);
      console.log("condition 1");
  }
  else if(win_w >= 1024 && win_w < 1280 ) { 
      $('img').css("max-height", 350);
      console.log("condition 2");
  }
  else if(win_w >= 800 && win_w < 1024 ) { 
      $('img').css("max-height", 280);
      console.log("condition 3");
  }
  else if(win_w < 800 ) { 
      $('img').css("max-height", 200);
      console.log("condition 4");
  }
  console.log("window width " + win.width() + " window height " + win.height() + ", img max-height " + $('img').css("max-height"));
}

$(document).ready(function(){
  
  /* control_panel */
  $('#indexCarousel').mouseover(function() {
    $('#control_panel').css("display", "block");
  }).mouseout(function() {
    $("#control_panel").css("display", "none");
  });

  // Slide in elements on scroll
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });    
  
  tune_img_max_height();
  $(window).on('resize', function(){
    tune_img_max_height(); 
  });
  
  // $('#indexCarousel').parent().css("padding-top", "35px");

  var indexCarousel = document.getElementById('indexCarousel');
  indexCarousel.parentNode.style.paddingTop = "60px";

});
