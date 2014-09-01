jQuery(document).ready(function($) {
	jQuery('#menu-bit').click(function() {
		jQuery('.menu').slideToggle('slow');
	});
	
	if(!Modernizr.svg) {
		$("img[src$='.svg'").each(function() {
			var $img = $(this);
			
			$img.attr("src", $img.attr("src").replace(/svg$/, "png"));
		});
	}
	
	
});
