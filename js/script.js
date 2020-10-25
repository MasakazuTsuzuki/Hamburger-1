jQuery(function() {

jQuery(window).resize(function(){
    //windowの幅をxに代入
    var x =jQuery(window).width();
    //windowの分岐幅をyに代入
    var y = 940;
    if (x > y) {
    jQuery('.l-side_wrapper').removeClass('open')   
    jQuery('.l-side_overlay').css(
          'display','none')
          jQuery('.l-side_back').removeClass('none')
    }else{}
  });

jQuery('.l-header_menu').on('click', function(){
  jQuery('.l-side_wrapper').addClass('open')
  });

jQuery('.l-header_menu').on('click', function(){
  jQuery('.l-side_back').addClass('none')
  });

jQuery('.l-side_close').on('click', function(){
  jQuery('.l-side_wrapper').removeClass('open')
  });

jQuery('.l-side_close').on('click', function(){
  jQuery('.l-side_back').removeClass('none')
  });


jQuery('.l-header_menu').on('click', function(){
  jQuery('.l-side_overlay').css({'display' : 'block',
  });

jQuery('.l-side_close').on('click', function(){
  jQuery('.l-side_overlay').css({'display' : 'none',
  });

  });
 });
});


