$(function(){
    //floating_button=sildetoggle
    $("#floating_button").find("#btn").click(function(){
        $("#floating_button").find("ul").slideToggle(200)
    })
    //globla_header=addclass+offset().top
    $('#global_header').each(function () {
        var $window = $(window);
        var $header = $(this);
        var headerOffsetTop = $header.offset().top;
    
        $window.on('scroll', function () {
          if ($window.scrollTop() > headerOffsetTop) {
            $header.addClass('sticky');
          } else {
            $header.removeClass('sticky');
          }
        });
      });
      //focus
      var timer = null;
      var num = 0;
      var $alis =$('.focus ul li');
      var $adots =$('.focus .dots li');
      var $F =$('.focus');
      function play(){
        num=num%3;
        $alis.eq(num).stop().fadeIn(500).siblings().fadeOut(1000);
        $adots.eq(num).addClass('active').siblings().removeClass('active');
      }
      function autoplay(){
        timer = setInterval(function(){
          num++;
          play();
        },2000)
      }
      autoplay();
      $('.focus .left').click(function(){
        num--;
        play();
      })
      $('.focus .right').click(function(){
        num++;
        play();
      })

      //マウスがmoveinのとき、autoplayが止まる
      $F.hover(function(){
        clearInterval(timer);
      },function(){
        autoplay();
      });
      //cosss_content=append(<div><p>)+fadeIn/fadeOut
      $('#games').find('li').on('mouseenter', function() {
        $(this).append(
          '<div><p>' +
          $(this).children('img').attr('alt') +
          '</p></div>'
        );
        $(this).children('div').stop().fadeIn(300);
        $(this).children('div').children('p')
          .stop()
          .animate({ 'top': 0 }, 300);
      })
      .on('mouseleave', function() {
        $(this).children('div').stop().fadeOut(300);
        $(this).children('div').children('p')
          .stop().animate({ 'top': '10px' }, 300, function() {
            $(this).parent('div').remove();
          });
      });
})