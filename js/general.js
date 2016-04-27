(function($) {
    
    
    // ! Menu Toggle
    $('.mobileToggle').on('click', function(e) {
        e.stopPropagation();
        
        $(this).toggleClass('is-active');
        $('.topMenu').toggleClass('is-active');
    });
  
    $(window).on('click', function(e) {
        if($('.topMenu.is-active') && (e.target.parentNode.className.indexOf('menu-item') === -1)) {
                        
            $('.mobileToggle.is-active').removeClass('is-active');
            $('.topMenu.is-active').removeClass('is-active');
        }
    });
    
    
    $('.sliderNav').flexslider({
        asNavFor: '.slider',
        controlNav: false,
        directionNav: false,
        animationLoop: false,
        animation: 'slide',
        itemWidth: 150,
        itemMargin: 8,
    });
    
    
    $('.slider').flexslider({
        sync: '.sliderNav',
        controlNav: false,
        directionNav: false,
        animationLoop: false,
        animation: 'slide',
    });
    

})(jQuery);