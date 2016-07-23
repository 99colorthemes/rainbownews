
//Stickybar
// if($('.site-header').length){ 
//  var stickyNavTop = $('.site-header').offset().top;
//  var stickyNav = function(){
//  var scrollTop = $(window).scrollTop();
//   if (scrollTop > stickyNavTop) {
//          $('.site-header').addClass('tm-sticky');
//           } else {
//               $('.site-header').removeClass('tm-sticky');
//           }
//       };
//       stickyNav(); 
//       $(window).scroll(function() {
//           stickyNav();
//       });
//   }
  

//Responsive Menu
// $(function() {
// 	$(".search-icon").click(function() {
// 		$(".s-form").slideToggle("fast");
// 	});
// }); 


// ScrollSpeed
// $(function() {
//     $.scrollSpeed(80, 800);
// });

// $('.owl-carousel').owlCarousel({
//     items:1,
//     loop:true, 
//     nav:true, 
//     smartSpeed:1200,
//     navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"], 
// })


$(window).scroll(function() {
    if ($(this).scrollTop() > 1){  
        $('.nnc-scroll-top').addClass("show");
    }
    else{
        $('.nnc-scroll-top').removeClass("show");
    }
});
    $(".nnc-scroll-top").on("click", function() {
     $("html, body").animate({ scrollTop: 0 }, 600);
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


$('input,textarea').focus(function(){   
	$(this).data('placeholder',$(this).attr('placeholder'))   
		$(this).attr('placeholder','');});$('input,textarea').blur(function(){   
		$(this).attr('placeholder',$(this).data('placeholder'));
});