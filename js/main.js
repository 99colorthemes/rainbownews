
//Stickybar
// if(jQuery('.site-header').length){
//  var stickyNavTop = jQuery('.site-header').offset().top;
//  var stickyNav = function(){
//  var scrollTop = jQuery(window).scrollTop();
//   if (scrollTop > stickyNavTop) {
//          jQuery('.site-header').addClass('tm-sticky');
//           } else {
//               jQuery('.site-header').removeClass('tm-sticky');
//           }
//       };
//       stickyNav(); 
//       jQuery(window).scroll(function() {
//           stickyNav();
//       });
//   }
  

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
        row_height: 38,
        max_rows: 1,
        speed: 1000,
        direction: 'down',
        duration: 4000,
        autostart: 1,
        pauseOnHover: 1
    }); 

});