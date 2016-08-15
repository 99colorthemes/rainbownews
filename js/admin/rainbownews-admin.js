/**
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */
jQuery(document).ready(function() {
	jQuery('.controls#rainbownews-img-container li img').click(function(){
		jQuery('.controls#rainbownews-img-container li').each(function(){
			jQuery(this).find('img').removeClass ('rainbownews-radio-img-selected') ;
		});
		jQuery(this).addClass ('rainbownews-radio-img-selected') ;
	});
});
