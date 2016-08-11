
if($('.main-navigation').length){ 
 var stickyNavTop = $('.main-navigation').offset().top;
 var stickyNav = function(){
 var scrollTop = $(window).scrollTop();
  if (scrollTop > stickyNavTop) {
         $('.main-navigation').addClass('nnc-sticky');
          } else {
              $('.main-navigation').removeClass('nnc-sticky');
          }
      };
      stickyNav(); 
      $(window).scroll(function() {
          stickyNav();
      });
  }
 
 

//Responsive Menu
// jQuery(function() {
// 	jQuery(".search-icon").click(function() {
// 		jQuery(".s-form").slideToggle("fast");
// 	});
// }); 


// ScrollSpeed
// jQuery(function() {
//     jQuery.scrollSpeed(80, 800);
// });

// jQuery('.owl-carousel').owlCarousel({
//     items:1,
//     loop:true, 
//     nav:true, 
//     smartSpeed:1200,
//     navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"], 
// })


jQuery(document).ready(function(){

    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > 1){
            jQuery('.nnc-scroll-top').addClass("show");
        }
        else{
            jQuery('.nnc-scroll-top').removeClass("show");
        }
    });
        jQuery(".nnc-scroll-top").on("click", function() {
         jQuery("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });

    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        paginationClickable: true,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        slidesPerView: 1,
        spaceBetween: 0,
        loop: true,
        autoplay: 3000,
        speed: 600
    });


    jQuery('input,textarea').focus(function(){
        jQuery(this).data('placeholder',jQuery(this).attr('placeholder'))
            jQuery(this).attr('placeholder','');});jQuery('input,textarea').blur(function(){
            jQuery(this).attr('placeholder',jQuery(this).data('placeholder'));
    });

    // News Ticker   
    $('.newsticker').newsTicker({
        row_height: 35,
        max_rows: 1,
        speed: 1000,
        direction: 'down',
        duration: 4000,
        autostart: 1,
        pauseOnHover: 1
    });


    var tabs = function() {
        $('.tabs').each(function() {
            var el = $(this);
            el.find('.content').hide();
            el.find('.menu-tab > li').on('click', function(e) {
                var liActive = $(this).index();
                var contentActive = $(this).parents('.tabs').find('.content').eq(liActive);

                $(this).addClass('active').siblings().removeClass('active');
                contentActive.fadeIn().siblings().hide();

                e.preventDefault();
            }).filter('.active').trigger('click');
        });
    };


});

